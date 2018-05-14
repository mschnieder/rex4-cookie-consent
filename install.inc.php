<?php

/**
 * Cookieconsent Addon
 *
 * @author Markus Schnieder https://github.com/mschnieder
 *
 * @package redaxo4
 */

$error = '';

if ($error != '') {
    $REX['ADDON']['installmsg']['cookieconsent'] = $error;
} else {
    $REX['ADDON']['install']['cookieconsent'] = true;
}
