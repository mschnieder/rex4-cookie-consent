<?php
/**
 * Created by PhpStorm.
 * User: markus
 * Date: 14.05.18
 * Time: 13:06
 */

class consent {
	var $bg;
	var $fontcolor;
	var $hinweistext;
	var $buttontxt;
	var $position;
	var $moreinfo;
	var $link;
	var $target;
	var $linkfarbe;
	var $btn_fontcolor;
	var $btn_bg;


	public function __construct() {
		if(class_exists('rex_path')) {
			$settings = rex_path::addonData('cookieconsent', 'settings.inc.php');
		} else {
			$settings = str_replace('addons/cookieconsent/classes/class.consent.inc.php', 'data/addons/cookieconsent/settings.inc.php', __FILE__);
		}
		if (file_exists($settings)) {
			include $settings;
		} else {
			$this->bg = 'rgba(0, 0, 0, 0.7)';
			$this->fontcolor = '#ffffff';
			$this->btn_bg = '#ff0000';
			$this->btn_fontcolor = '#ccc';
			$this->buttontxt = 'einverstanden';
			$this->hinweistext = 'Diese Webseite verwendet Cookies, um Ihnen ein angenehmeres Surfen zu ermöglichen.';
			$this->position = 'unten';
			$this->link = '';
			$this->moreinfo = 'Mehr Informationen';
			$this->target = '_self';
			$this->linkfarbe = 'initial';
		}
	}

	public static function setConsents($content) {
		if (!isset($_COOKIE['cookieconsent']) && $content['environment'] != 'backend') {
			self::removeCookies();
			$content['subject'] = self::addCookiePopup($content['subject']);
		}

		return $content['subject'];
	}

	public static function removeCookies() {
		global $REX;
		header_remove('set-cookie');
	}

	public static function addCookiePopup($content) {
		$a = new consent();
		$linkfarbe = ($a->linkfarbe != '' ? $a->linkfarbe : 'initial');
		$daten = '<style>
			.cc-window{opacity:1;transition:opacity 1s ease}.cc-window.cc-invisible{opacity:0}.cc-animate.cc-revoke{transition:transform 1s ease}.cc-animate.cc-revoke.cc-top{transform:translateY(-2em)}.cc-animate.cc-revoke.cc-bottom{transform:translateY(2em)}.cc-animate.cc-revoke.cc-active.cc-bottom,.cc-animate.cc-revoke.cc-active.cc-top,.cc-revoke:hover{transform:translateY(0)}.cc-grower{max-height:0;overflow:hidden;transition:max-height 1s}
.cc-link,.cc-revoke:hover{text-decoration:underline}.cc-revoke,.cc-window{position:fixed;overflow:hidden;box-sizing:border-box;font-family:Helvetica,Calibri,Arial,sans-serif;font-size:16px;line-height:1.5em;display:-ms-flexbox;display:flex;-ms-flex-wrap:nowrap;flex-wrap:nowrap;z-index:9999}.cc-window.cc-static{position:static}.cc-window.cc-floating{padding:2em;max-width:24em;-ms-flex-direction:column;flex-direction:column}.cc-window.cc-banner{padding:1em 1.8em;width:100%;-ms-flex-direction:row;flex-direction:row}.cc-revoke{padding:.5em}.cc-header{font-size:18px;font-weight:700}.cc-btn,.cc-close,.cc-link,.cc-revoke{cursor:pointer}.cc-link{opacity:.8;display:inline-block;padding:.2em}.cc-link:hover{opacity:1}
.cc-link:active,.cc-link:visited{color:'.$linkfarbe.'}.cc-btn{display:block;padding:.4em .8em;font-size:.9em;font-weight:700;border-width:2px;border-style:solid;text-align:center;white-space:nowrap}.cc-banner .cc-btn:last-child{min-width:140px}.cc-highlight .cc-btn:first-child{background-color:transparent;border-color:transparent}.cc-highlight .cc-btn:first-child:focus,.cc-highlight .cc-btn:first-child:hover{background-color:transparent;text-decoration:underline}.cc-close{display:block;position:absolute;top:.5em;right:.5em;font-size:1.6em;opacity:.9;line-height:.75}.cc-close:focus,.cc-close:hover{opacity:1}
.cc-revoke.cc-top{top:0;left:3em;border-bottom-left-radius:.5em;border-bottom-right-radius:.5em}.cc-revoke.cc-bottom{bottom:0;left:3em;border-top-left-radius:.5em;border-top-right-radius:.5em}.cc-revoke.cc-left{left:3em;right:unset}.cc-revoke.cc-right{right:3em;left:unset}.cc-top{top:1em}.cc-left{left:1em}.cc-right{right:1em}.cc-bottom{bottom:1em}.cc-floating>.cc-link{margin-bottom:1em}.cc-floating .cc-message{display:block;margin-bottom:1em}.cc-window.cc-floating .cc-compliance{-ms-flex:1;flex:1}.cc-window.cc-banner{-ms-flex-align:center;align-items:center}.cc-banner.cc-top{left:0;right:0;top:0}.cc-banner.cc-bottom{left:0;right:0;bottom:0}.cc-banner .cc-message{-ms-flex:1;flex:1}.cc-compliance{display:-ms-flexbox;display:flex;-ms-flex-align:center;align-items:center;-ms-flex-line-pack:justify;align-content:space-between}.cc-compliance>.cc-btn{-ms-flex:1;flex:1}.cc-btn+.cc-btn{margin-left:.5em}
@media print{.cc-revoke,.cc-window{display:none}}@media screen and (max-width:900px){.cc-btn{white-space:normal}}@media screen and (max-width:414px) and (orientation:portrait),screen and (max-width:736px) and (orientation:landscape){.cc-window.cc-top{top:0}.cc-window.cc-bottom{bottom:0}.cc-window.cc-banner,.cc-window.cc-left,.cc-window.cc-right{left:0;right:0}.cc-window.cc-banner{-ms-flex-direction:column;flex-direction:column}.cc-window.cc-banner .cc-compliance{-ms-flex:1;flex:1}.cc-window.cc-floating{max-width:none}.cc-window .cc-message{margin-bottom:1em}.cc-window.cc-banner{-ms-flex-align:unset;align-items:unset}}
.cc-floating.cc-theme-classic{padding:1.2em;border-radius:5px}.cc-floating.cc-type-info.cc-theme-classic .cc-compliance{text-align:center;display:inline;-ms-flex:none;flex:none}.cc-theme-classic .cc-btn{border-radius:5px}.cc-theme-classic .cc-btn:last-child{min-width:140px}.cc-floating.cc-type-info.cc-theme-classic .cc-btn{display:inline-block}
.cc-theme-edgeless.cc-window{padding:0}.cc-floating.cc-theme-edgeless .cc-message{margin:2em 2em 1.5em}.cc-banner.cc-theme-edgeless .cc-btn{margin:0;padding:.8em 1.8em;height:100%}.cc-banner.cc-theme-edgeless .cc-message{margin-left:1em}.cc-floating.cc-theme-edgeless .cc-btn+.cc-btn{margin-left:0}
</style>
<script type="text/javascript">
	function acceptCookies() {
	    document.cookie = "cookieconsent=accepted; expires=Thu, 22 Dec 2099 12:00:00 UTC";
		var x = document.getElementById("cookieconsent");
		x.style.display = "none";
	}
</script>
';

		$content = str_replace('</head>', $daten.PHP_EOL.'</head>', $content);

		$a = new consent();
		$banner = $a->getBanner();
		$content = str_replace('</body>', $banner.PHP_EOL.'</body>', $content);

		return $content;
	}

	public function getBanner() {
		$d = '<div class="cc-window cc-banner cc-type-info cc-theme-classic '.($this->position == 'oben' ? 'cc-top' : 'cc-bottom').'" id="cookieconsent" style="background: '.$this->bg.';">
				<div id="cookieconsent:desc" class="cc-message" style="color: '.$this->fontcolor.'">'.$this->hinweistext.'&nbsp;
					<a aria-label="learn more about cookies" role="button" tabindex="0" class="cc-link" href="'.rex_getUrl($this->link).'" target="'.$this->target.'">'.$this->moreinfo.'</a>
				</div>
				<div class="cc-compliance" style="border-radius: 5px; background: '.$this->btn_bg.'">
					<a tabindex="0" class="cc-btn cc-dismiss" style="border: 0px; color: '.$this->fontcolor.';" href="javascript:acceptCookies();">'.$this->buttontxt.'</a>
				</div>
				</div>';
		return $d;
	}
}