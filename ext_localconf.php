<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'derhansen.' . $_EXTKEY,
	'Pi1',
	array(
		'Addressdata' => 'new,create',
	),
	// non-cacheable actions
	array(
		'Addressdata' => 'new,create',
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'derhansen.' . $_EXTKEY,
	'Pi2',
	array(
		'MultipleSteps' => 'step1, step2, step3, step1redirect, step2redirect, step3redirect, create',
	),
	// non-cacheable actions
	array(
		'MultipleSteps' => 'step1, step2, step3, step1redirect, step2redirect, step3redirect, create',
	)
);

?>