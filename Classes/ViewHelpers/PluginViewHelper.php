<?php
declare(strict_types=1);

namespace RaccoonDepot\RdContactPlugin\ViewHelpers;

use RaccoonDepot\RdContactPlugin\Domain\Model\AlternativeOption;
use RaccoonDepot\RdContactPlugin\Domain\Model\Option;
use RaccoonDepot\RdContactPlugin\Domain\Model\Restriction;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Database\Query\Restriction\DeletedRestriction;
use TYPO3\CMS\Core\Database\Query\Restriction\HiddenRestriction;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\ObjectStorage;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use RaccoonDepot\RdContactPlugin\Domain\Repository\PluginRepository;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;
use Closure;

class PluginViewHelper extends AbstractViewHelper
{
    /**
     * Initialize arguments
     *
     * @api
     */
    public function initializeArguments(): void
    {
        parent::initializeArguments();
        $this->registerArgument('pluginToUseUid', 'integer', 'plugin which should be used');
    }

    /**
     * @param array                     $arguments
     * @param Closure                   $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     *
     * @return array
     */
    public static function renderStatic(
        array $arguments,
        Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ): array {
        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $pluginRepository = $objectManager->get(PluginRepository::class);

        // disable pid respect
        $querySettings = $objectManager->get(Typo3QuerySettings::class);
        $querySettings->setRespectStoragePage(false);
        $pluginRepository->setDefaultQuerySettings($querySettings);

        // should we use specific plugin configurations here?
        if (! empty($arguments['pluginToUseUid'])) {
            $pluginConfiguration = $pluginRepository->findByUid((int) $arguments['pluginToUseUid']);
        } else {
            $pluginConfiguration = $pluginRepository->findAll()->getFirst();
        }

        // filter by restrictions
        $filteredOptions = [];
        if (! empty($pluginConfiguration) && $pluginConfiguration->getOptions()) {
            $filteredOptions = self::respectRestrictions($pluginConfiguration->getOptions());
        }

        // filter content elements
        if (!empty($filteredOptions)) {
            foreach ($filteredOptions as $fKey => $fOption) {
                if ($fOption !== null && $fOption->getSysLanguageUid() > 0) {
                    // check if l10n_state is custom
                    $l10nState = (array) json_decode($fOption->getL10nState());
                    if (empty($l10nState['content_elements']) || $l10nState['content_elements'] === 'custom') {
                        $filteredOptions[$fKey]->setContentElementIdList(implode(',', self::getLocalizedContentElements($fOption)));
                    }
                }
            }
        }

        return [$pluginConfiguration, $filteredOptions];
    }

    /**
     * @param ObjectStorage $options
     *
     * @return array
     */
    public static function respectRestrictions(ObjectStorage $options): array
    {
        $filteredOptions = [];
        foreach ($options as $option) {
            if ($option->getProcessAllRestrictions() === 1) {
                self::followAllRestrictions($option, $filteredOptions);
            } else {
                self::followFirstMatchedRestriction($option, $filteredOptions);
            }
        }
        return $filteredOptions;
    }

    /**
     * @param Option $option
     * @param array  $filteredOptions
     */
    public static function followAllRestrictions(Option $option, & $filteredOptions): void
    {
        $alternativeWasFound = false;
        $thereAreSimpleRestrictionType = false;
        $isRestrictionTypeWithoutReplacingFound = false;

        if (! empty($option->getRestrictions())) {
            foreach ($option->getRestrictions() as $restriction) {

                $restrictionMatch = self::processRestriction($restriction);

                // Show this option only when restriction is matched
                if ($restriction->getRestrictionType() == 0) {
                    $thereAreSimpleRestrictionType = true;
                    if ($restrictionMatch && ! $isRestrictionTypeWithoutReplacingFound) {
                        if ((int) $option->getOptionType()) {
                            $filteredOptions[] = $option;
                        }
                        $isRestrictionTypeWithoutReplacingFound = true;
                    }
                }

                // Replace this option with alternative one or hide
                if ($restriction->getRestrictionType() == 1 && $restrictionMatch) {
                    $altOption = array_shift($restriction->getAlternativeOptions()->toArray());
                    if ((int) $altOption->getOptionType()) {
                        $filteredOptions[] = $altOption;
                    }
                    $alternativeWasFound = true;
                }
            }
        }
        // if nothing matched use original one
        if (! $alternativeWasFound && ! $isRestrictionTypeWithoutReplacingFound && ! $thereAreSimpleRestrictionType && (int) $option->getOptionType()) {
            $filteredOptions[] = $option;
        }
    }

    /**
     * @param Option $option
     * @param array  $filteredOptions
     */
    public static function followFirstMatchedRestriction(Option $option, & $filteredOptions): void
    {
        $newOption = '';
        $thereAreSimpleRestrictionType = false;
        $isRestrictionTypeWithoutReplacingFound = false;

        if (! empty($option->getRestrictions())) {
            foreach ($option->getRestrictions() as $restriction) {

                $restrictionMatch = self::processRestriction($restriction);

                // Show this option only when restriction is matched
                if ($restriction->getRestrictionType() == 0) {
                    $thereAreSimpleRestrictionType = true;
                    if ($restrictionMatch) {
                        $newOption = $option;
                        $isRestrictionTypeWithoutReplacingFound = true;
                        break;
                    }
                }

                // Replace this option with alternative one or hide
                if ($restriction->getRestrictionType() == 1 && $restrictionMatch) {
                    $newOption = array_shift($restriction->getAlternativeOptions()->toArray());
                    break;
                }
            }
        }
        // if nothing matched use original one
        if (empty($newOption) && ! $isRestrictionTypeWithoutReplacingFound && ! $thereAreSimpleRestrictionType) {
            $newOption = $option;
        }
        if (! empty($newOption) && (int) $newOption->getOptionType()) {
            $filteredOptions[] = $newOption;
        }
    }

    /**
     * @param Restriction $restriction
     * @param bool        $defaultPagesRestrictionState
     * @param bool        $defaultHttpRefererRestrictionState
     *
     * @return bool
     */
    public static function processRestriction(
        Restriction $restriction,
        bool $defaultPagesRestrictionState = true,
        bool $defaultHttpRefererRestrictionState = true
    ): bool {
        // let's check pages restriction
        if ($restriction->getPagesRespect()) {
            $pages = explode(',', $restriction->getPagesRespect());
            $pagesRestriction = in_array($GLOBALS['TSFE']->id, $pages, false);
        } else {
            $pagesRestriction = $defaultPagesRestrictionState;
        }

        // let's check http referer restriction
        $doesHttpRefererNotMatch = empty($_SERVER['HTTP_REFERER']) || empty(trim($restriction->getHttpReferer())) || strpos($_SERVER['HTTP_REFERER'], trim($restriction->getHttpReferer())) === FALSE;
        if ($restriction->getHttpReferer() && $doesHttpRefererNotMatch) {
            $httpRefererRestriction = false;
        } else {
            $httpRefererRestriction = $defaultHttpRefererRestrictionState;
        }

        // in general
        return $pagesRestriction && $httpRefererRestriction;
    }

    /**
     * Get localized content elements for specific option
     *
     * @param Option|AlternativeOption $fOption item
     *
     * @return array
     */
    public static function getLocalizedContentElements($fOption): array
    {
        $itemId = (int) $fOption->_getProperty('_localizedUid');
        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $connectionPool = $objectManager->get(ConnectionPool::class);
        $queryBuilder = $connectionPool->getQueryBuilderForTable('tt_content');
        $queryBuilder->getRestrictions()
            ->removeAll()
            ->add(GeneralUtility::makeInstance(DeletedRestriction::class))
            ->add(GeneralUtility::makeInstance(HiddenRestriction::class));

        return $queryBuilder
            ->select('uid')
            ->from('tt_content')
            ->where(
                $queryBuilder->expr()->eq('tx_rdcontactplugin_related_option', $queryBuilder->createNamedParameter($itemId, \PDO::PARAM_INT))
            )
            ->orderBy('sorting')
            ->execute()
            ->fetchAll(\PDO::FETCH_COLUMN);
    }
}
