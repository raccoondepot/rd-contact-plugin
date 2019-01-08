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
            'Email' => 'callmeformHandler'
        ],
        // non-cacheable actions
        [
            'Email' => 'callmeformHandler'
        ]
    );
};

$boot($_EXTKEY);
unset($boot);