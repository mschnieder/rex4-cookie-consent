<?php

/**
 * Cookieconsent Addon
 *
 * @author Markus Schnieder https://github.com/mschnieder
 *
 * @package redaxo4
 */

$mypage = 'cookieconsent';

$REX['ADDON']['name'][$mypage] = 'Cookieconsent';
$REX['ADDON']['perm'][$mypage] = 'cookieconsent[]';
$REX['ADDON']['version'][$mypage] = '1.0.5';
$REX['ADDON']['author'][$mypage] = 'Markus Schnieder';
$REX['ADDON']['supportpage'][$mypage] = 'https://github.com/mschnieder';

$REX['PERM'][] = 'cookieconsent[]';

require_once $REX['INCLUDE_PATH'] . '/addons/cookieconsent/classes/class.consent.inc.php';

if (!$REX['SETUP']) {
	// send additional headers if necessary
	rex_register_extension('OUTPUT_FILTER', 'consent::setConsents');
}