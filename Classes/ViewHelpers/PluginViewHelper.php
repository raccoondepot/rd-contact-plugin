<?php
declare(strict_types=1);

namespace RaccoonDepot\RdContactPlugin\ViewHelpers;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use RaccoonDepot\RdContactPlugin\Domain\Repository\PluginRepository;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;
use RaccoonDepot\RdContactPlugin\Domain\Model\Plugin;
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
     * @return Plugin
     */
    public static function renderStatic(
        array $arguments,
        Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ): Plugin {
        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $pluginRepository = $objectManager->get(PluginRepository::class);

        // disable pid respect
        $querySettings = $objectManager->get(Typo3QuerySettings::class);
        $querySettings->setRespectStoragePage(false);
        $pluginRepository->setDefaultQuerySettings($querySettings);

        // should we use specific plugin configurations here?
        if (! empty($arguments['pluginToUseUid'])) {
            return $pluginRepository->findByUid((int) $arguments['pluginToUseUid']);
        }

        return $pluginRepository->findAll()->getFirst();
    }
}
