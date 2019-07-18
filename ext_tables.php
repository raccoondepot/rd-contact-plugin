<?php

if (! defined('TYPO3_MODE')) {
	die('Access denied.');
}

(function ($extKey) {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
        $extKey,
        'Configuration/TypoScript',
        'Configuration includes (required)'
    );
})('rd_contact_plugin');
