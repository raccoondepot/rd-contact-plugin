<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

$boot = function ($extensionKey='rd_contact_plugin') {
    $extensionPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($extensionKey);

	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
		'RaccoonDepot.RdContactPlugin',
		'EmailActions',
		'Email Actions'
	);

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extensionKey, 'Configuration/TypoScript', 'Configuration includes (required)');
};

$boot($_EXTKEY);
unset($boot);
	