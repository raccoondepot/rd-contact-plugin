<?php

if (! defined('TYPO3_MODE')) {
    die('Access denied.');
}

(function ($extKey) {
    // Register new icons set
    $icons = [
        'content-tabs',
        'content-media-slider',
        'content-contact',
        'content-stage-slider',
        'content-stage-element',
        'content-teaser-list',
        'content-gallery-slider',
        'content-social-media',
        'content-space-before-class-none',
        'content-space-before-class-small',
        'content-space-after-class-none',
        'content-space-after-class-small',
        'content-textmedia',
        'content-cta-buttons',
        'content-cta-primary',
        'content-cta-secondary',
        'content-textmedia-imageorient-txt-img-w100',
        'content-textmedia-imageorient-img-txt-w100',
        'content-textmedia-imageorient-txt-img-w50-50',
        'content-textmedia-imageorient-img-txt-w50-50',
        'content-textmedia-imageorient-txt-img-w75-25',
        'content-textmedia-imageorient-img-txt-w25-75',
        'content-textmedia-imageorient-txt-txt-w50-50',
        'facebook',
        'image-zoom',
        'documents',
        'delete',
        'shoppingcart',
        'direct-order',
        'filter-grid',
        'twitter',
        'zip-download',
        'whatsapp',
        'filter-list',
        'document-random',
        'sitemap',
        'document',
        'share',
        'xing',
        'arrow-dropdown',
        'filter',
        'creditcard',
        'language',
        'contact',
        'slider-back',
        'error',
        'slider-forward',
        'document-pdf',
        'document-jpg',
        'document-xls',
        'overview',
        'menu-sub',
        'user',
        'gallery-small',
        'arrow-left',
        'menu-main',
        'mail',
        'folder',
        'check',
        'arrow-link',
        'calendar',
        'gallery-big',
        'search',
        'document-doc',
        'arrow-right',
        'linkedin',
        'content-news-pi1',
        'content-vectorbase-address',
        'content-powermail-pi1',
        'youtube',
        'instagram',
    ];
    foreach ($icons as $icon) {
        $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
        $iconRegistry = $objectManager->get(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
        $iconRegistry->registerIcon(
            'mkraina-' . $icon,
            TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            ['source' => 'EXT:' . $extKey . '/Resources/Public/Images/Icons/' . $icon . '.svg']
        );
    }

    // Override standard or third-party icons
    $standardIcons = [
        'content-textmedia',
        'ext-news-wizard-icon',
        'extensions-solr-plugin-contentelement',
        'extension-powermail-main',
    ];
    foreach ($standardIcons as $standardIcon) {
        $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
        $iconRegistry = $objectManager->get(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
        $iconRegistry->registerIcon(
            $standardIcon,
            TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            ['source' => 'EXT:' . $extKey . '/Resources/Public/Images/Icons/' . $standardIcon . '.svg']
        );
    }

    // add old icons set
    $oldIcons = [
        'calendar',
        'call-center-worker-with-headset',
        'christmas-day_2',
        'christmas-day',
        'christmas',
        'close',
        'earphones',
        'facebook',
        'hand-holding-up-a-clock',
        'icon',
        'old-telephone-ringing',
        'passage-of-time',
        'phone-receiver',
        'sms-bubble-speech',
        'support',
        'support2',
        'telephone',
        'time',
        'viber',
        'viber2',
    ];
    foreach ($oldIcons as $oldIcon) {
        $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
        $iconRegistry = $objectManager->get(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
        $iconRegistry->registerIcon(
            'mkraina-old-' . $oldIcon,
            TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            ['source' => 'EXT:' . $extKey . '/Resources/Public/icons/' . $oldIcon . '.svg']
        );
    }
})('rd_contact_plugin');
