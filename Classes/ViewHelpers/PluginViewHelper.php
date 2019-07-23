<?php
declare(strict_types=1);

namespace RaccoonDepot\RdContactPlugin\ViewHelpers;

use RaccoonDepot\RdContactPlugin\Domain\Model\Restriction;
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
            $newOption = '';
            $isRestrictionTypeWithoutReplacingFound = false;

            if (! empty($option->getRestrictions())) {
                foreach ($option->getRestrictions() as $restriction) {

                    $restrictionMatch = self::processRestriction($restriction);

                    // Show this option only when restriction is matched
                    if ($restriction->getRestrictionType() == 0 && $restrictionMatch) {
                        $newOption = $option;
                        $isRestrictionTypeWithoutReplacingFound = true;
                        break;
                    }

                    // Replace this option with alternative one or hide
                    if ($restriction->getRestrictionType() == 1 && $restrictionMatch) {
                        // if should be replaced
                        $newOption = array_shift($restriction->getAlternativeOptions()->toArray());
                        break;
                    }

                }
            }
            // if nothing matched use original one
            if (empty($newOption) && ! $isRestrictionTypeWithoutReplacingFound) {
                $newOption = $option;
            }
            $filteredOptions[] = $newOption;
        }
        return $filteredOptions;
    }

    /**
     * @param Restriction $restriction
     *
     * @return bool
     */
    public static function processRestriction(Restriction $restriction): bool
    {
        // let's check pages restriction
        if ($restriction->getPagesRespect()) {
            $pages = explode(',', $restriction->getPagesRespect());
            $pagesRestriction = in_array($GLOBALS['TSFE']->id, $pages, false);
        } else {
            $pagesRestriction = true;
        }

        // let's check http referer restriction
        $doesHttpRefererMatch = empty($_SERVER['HTTP_REFERER']) || strpos($_SERVER['HTTP_REFERER'], trim($restriction->getHttpReferer())) === FALSE;
        if ($restriction->getHttpReferer() && $doesHttpRefererMatch) {
            $httpRefererRestriction = false;
        } else {
            $httpRefererRestriction = true;
        }

        // in general
        return $pagesRestriction && $httpRefererRestriction;
    }
}
