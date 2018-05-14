<?php

/**
 * Cookieconsent Addon
 *
 * @author Markus Schnieder https://github.com/mschnieder
 *
 * @package redaxo4
 */

$Basedir = dirname(__FILE__);

$page = rex_request('page', 'string');
$subpage = rex_request('subpage', 'string');
$func = rex_request('func', 'string');

require $REX['INCLUDE_PATH'] . '/layout/top.php';


rex_title('Cookieconsent', $subpages);

require $Basedir . '/settings.inc.php';

require $REX['INCLUDE_PATH'] . '/layout/bottom.php';
