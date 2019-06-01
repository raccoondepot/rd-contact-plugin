<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$boot = function ($extensionKey='rd_contact_plugin') {
    $extensionPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($extensionKey);

    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'RaccoonDepot.RdContactPlugin',
        'EmailActions',
        [
            'Email' => 'callmeformHandler, answermebyemailformHandler, getAppointmentformHandler'
        ],
        // non-cacheable actions
        [
            'Email' => 'callmeformHandler, answermebyemailformHandler, getAppointmentformHandler'
        ]
    );

    // Register icons
    $objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
    $iconRegistry = $objectManager->get(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
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
        $iconRegistry->registerIcon(
            'mkraina-' . $icon,
            TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            ['source' => 'EXT:' . $extensionKey . '/Resources/Public/Images/Icons/' . $icon . '.svg']
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
        $iconRegistry->registerIcon(
            $standardIcon,
            TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
            ['source' => 'EXT:' . $extensionKey . '/Resources/Public/Images/Icons/' . $standardIcon . '.svg']
        );
    }
    //end

};

$boot($_EXTKEY);
unset($boot);