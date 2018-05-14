<?php

/**
 * Cookieconsent Addon
 *
 * @author Markus Schnieder https://github.com/mschnieder
 *
 * @package redaxo4
 */

$consent = new consent();

$cfg['bg']         = rex_post('bg',  'string', $consent->bg);
$cfg['fontcolor']  = rex_post('fontcolor',      'string', $consent->fontcolor);
$cfg['hinweistext'] = rex_post('hinweistext', 'string', $consent->hinweistext);
$cfg['buttontxt']  = rex_post('buttontxt', 'string', $consent->buttontxt);
$cfg['position']   = rex_post('position', 'string', $consent->position);
$cfg['moreinfo']   = rex_post('moreinfo', 'string', $consent->moreinfo);
$cfg['link']       = rex_post('link', 'string', $consent->link);

$btn['fontcolor']  = rex_post('btn_fontcolor', 'string', $consent->btn_fontcolor);
$btn['bg']         = rex_post('btn_bg', 'string', $consent->btn_bg);

$message = '';

if (rex_post('btn_save', 'string') != '') {
    $file = rex_path::addonData('cookieconsent', 'settings.inc.php');

    $message  = 'Daten wurden nicht gespeichert';

    $content = '<?php
$this->bg             = ' . var_export($cfg['bg'], true) . ';
$this->fontcolor      = ' . var_export($cfg['fontcolor'], true) . ';
$this->hinweistext    = ' . var_export($cfg['hinweistext'], true) . ';
$this->buttontxt      = ' . var_export($cfg['buttontxt'], true) . ';
$this->position       = ' . var_export($cfg['position'], true) . ';
$this->moreinfo       = ' . var_export($cfg['moreinfo'], true) . ';
$this->link           = ' . var_export($cfg['link'], true) . ';
$this->btn_fontcolor  = ' . var_export($btn['fontcolor'], true) . ';
$this->btn_bg         = ' . var_export($btn['bg'], true) . ';
';

    if (rex_file::put($file, $content) !== false) {
        $message = 'Daten wurden gespeichert';
    }
}

$position = new rex_select();
$position->setId('position');
$position->setName('position');
$position->setSize(1);
$position->setSelected($mailer);
foreach (array('oben', 'unten') as $type) {
    $position->addOption($type, $type);
}

$datenschutz = new rex_input_linkbutton();
$datenschutz->setValue($consent->link);
$datenschutz->setAttribute('name', 'link');


if ($message != '') {
    echo rex_info($message);
}

require 'ausgabe.php';
?>
