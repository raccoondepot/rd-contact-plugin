<?php
declare(strict_types=1);

namespace RaccoonDepot\RdContactPlugin\ViewHelpers;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManager;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use RaccoonDepot\RdContactPlugin\Domain\Repository\PluginRepository;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;
use RaccoonDepot\RdContactPlugin\Domain\Model\Plugin;

class PluginViewHelper extends AbstractViewHelper
{
    /**
     * @param array                     $arguments
     * @param \Closure                  $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     *
     * @return Plugin
     * @throws \TYPO3\CMS\Extbase\Configuration\Exception\InvalidConfigurationTypeException
     */
    public static function renderStatic(
        array $arguments,
        \Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ): Plugin {
        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $pluginRepository = $objectManager->get(PluginRepository::class);

        // get plugin settings
        $configurationManager = $objectManager->get(ConfigurationManager::class);
        $extbaseFrameworkConfiguration = $configurationManager->getConfiguration(ConfigurationManagerInterface::CONFIGURATION_TYPE_SETTINGS);
        //$storagePid = $extbaseFrameworkConfiguration['plugin.']['tx_guesthouse_guesthouse.']['settings.']['storagePid'];

        // disable pid respect
        $querySettings = $objectManager->get(Typo3QuerySettings::class);
        $querySettings->setRespectStoragePage(false);
        $pluginRepository->setDefaultQuerySettings($querySettings);

        return $pluginRepository->findAll()->getFirst();
    }
}
