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
$cfg['target']	   = rex_post('target', 'string', $consent->target);
$cfg['linkfarbe']  = rex_post('linkfarbe', 'string', $consent->linkfarbe);

$btn['fontcolor']  = rex_post('btn_fontcolor', 'string', $consent->btn_fontcolor);
$btn['bg']         = rex_post('btn_bg', 'string', $consent->btn_bg);

$message = '';

if (rex_post('btn_save', 'string') != '') {
	if(class_exists('rex_path')) {
		$file = rex_path::addonData('cookieconsent', 'settings.inc.php');
	} else {
		$file = str_replace('addons/cookieconsent/pages/settings.inc.php', 'data/addons/cookieconsent/settings.inc.php', __FILE__);
	}

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
$this->target		  = ' . var_export($cfg['target'], true) . ';
$this->linkfarbe	  = ' . var_export($cfg['linkfarbe'], true) . ';
';

    if(class_exists('rex_file')) {
		$erg = rex_file::put($file, $content);
    } else {
        $pfad = str_replace('/settings.inc.php', '', $file);
		if (!is_dir($pfad)) {
			mkdir($pfad, 777, true);
		}
		$d = fopen($file, 'w');
        $erg = fwrite($d, $content);
        fclose($d);
    }
    if($erg !== false) {
        $message = 'Daten wurden gespeichert';
    }
}

$position = new rex_select();
$position->setId('position');
$position->setName('position');
$position->setSize(1);
$position->setSelected($cfg['position']);
foreach (array('oben', 'unten') as $type) {
    $position->addOption($type, $type);
}

$datenschutz = new rex_input_linkbutton();
$datenschutz->setValue($consent->link);
$datenschutz->setAttribute('name', 'link');

$target = new rex_select();
$target->setId('target');
$target->setName('target');
$target->setSize(1);
$target->setSelected($cfg['target']);
foreach(array('_self' => 'gleicher Tab oder Seite (_self)', '_blank' => 'Neuer Tab oder Fenster (_blank)', '_parent' => 'Elternfenster (_parent)', '_top' => 'ganzes Fenster (_top)') as $id => $val) {
	$target->addOption($val, $id);
}

if ($message != '') {
    echo rex_info($message);
}

require 'ausgabe.php';
?>
