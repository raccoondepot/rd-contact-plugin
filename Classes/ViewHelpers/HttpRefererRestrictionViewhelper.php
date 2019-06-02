<?php
namespace RaccoonDepot\RdContactPlugin\ViewHelpers;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use RaccoonDepot\RdContactPlugin\Domain\Repository\OptionRepository;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;

class HttpRefererRestrictionViewhelper extends AbstractViewHelper
{
    /**
     * Initialize arguments
     *
     * @api
     */
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('uid', 'string', 'uid of item');
    }

    /**
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return string
     */
    public static function renderStatic(
        array $arguments,
        \Closure $renderChildrenClosure,
        RenderingContextInterface $renderingContext
    ) {
        $objectManager = GeneralUtility::makeInstance(ObjectManager::class);
        $optionRepository = $objectManager->get(OptionRepository::class);

        // disable pid respect
        $querySettings = $objectManager->get(Typo3QuerySettings::class);
        $querySettings->setRespectStoragePage(false);
        $optionRepository->setDefaultQuerySettings($querySettings);

        // get option
        $option = $optionRepository->findByUid($arguments['uid']);

        // check restriction
        if ($option && $option->getHttpReferer()) {
            $httpReferer = trim($option->getHttpReferer());
            if (strpos($_SERVER['HTTP_REFERER'], $httpReferer) !== FALSE) {
                return true;
            } else {
                return false;
            }
        }

        return true;
    }
}
