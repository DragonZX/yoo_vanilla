<?php
/**
* @package   yoo_vanilla
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// init vars
$config = $this['config'];
$style  = $config->get('style');
$bgcolor  = $config->get('background');
$color  = $config->get('color');
		
// set template css
$css = 'body { min-width: '.intval($config->get('template_width')).$config->get('template_width_unit')."; }\n";
$css .= '.wrapper { width: '.intval($config->get('template_width')).$config->get('template_width_unit')."; }\n";
		
// 3-column-layout
if ($this['modules']->count('left')) {
	$css .= '#main-shift { margin-left: '.(intval($config->get('left_width')) + intval($config->get('left_space')))."px; }\n";
	$css .= '#left { width: '.intval($config->get('left_width'))."px; }\n";
}

if ($this['modules']->count('right')) {
	if (!$this['modules']->count('left'))  { $config->set('left_width', '0'); }
	$css .= '#main-shift { margin-right: '.(intval($config->get('right_width')) + intval($config->get('right_space')))."px; }\n";
	$css .= '#right { width: '.intval($config->get('right_width')).'px; margin-left: -'.(intval($config->get('left_width')) + intval($config->get('right_width')))."px; }\n";
}

// inner 3-column-layout
if ($this['modules']->count('contentleft')) {
	$css .= '#content-shift { margin-left: '.(intval($config->get('contentleft_width')) + intval($config->get('contentleft_space')))."px; }\n";
	$css .= '#contentleft { width: '.intval($config->get('contentleft_width'))."px; }\n";
}		

if ($this['modules']->count('contentright')) {
	if (!$this['modules']->count('contentleft')) { $config->set('contentleft_width', '0'); }
	$css .= '#content-shift { margin-right: '.(intval($config->get('contentright_width')) + intval($config->get('contentright_space')))."px; }\n";
	$css .= '#contentright { width: '.intval($config->get('contentright_width')).'px; margin-left: -'.(intval($config->get('contentleft_width')) + intval($config->get('contentright_width')))."px; }\n";
}

// drop down menu
$css .= '#menu .dropdown { width: '.intval($config->get('menu_width'))."px; }\n";
$css .= '#menu .columns2 { width: '.(2*intval($config->get('menu_width')))."px; }\n";
$css .= '#menu .columns3 { width: '.(3*intval($config->get('menu_width')))."px; }\n";
$css .= '#menu .columns4 { width: '.(4*intval($config->get('menu_width')))."px; }\n";

$this['asset']->addString('css', $css);
$this['asset']->addFile('css', 'css:reset.css');
$this['asset']->addFile('css', 'css:layout.css');
$this['asset']->addFile('css', 'css:typography.css');
$this['asset']->addFile('css', 'css:menus.css');
$this['asset']->addFile('css', 'css:modules.css');
$this['asset']->addFile('css', 'css:system.css');
$this['asset']->addFile('css', 'css:extensions.css');
$this['asset']->addFile('css', 'css:style.css');

if ($config->get('direction') == 'rtl') {
	$this->warp->stylesheets->add('css:rtl.css');
}
	
$this['asset']->addFile('css', "css:styles/$style-$bgcolor.css");
$this['asset']->addFile('css', "css:styles/color-$color.css");
$this['asset']->addFile('css', "css:styles/{$style}.css");
$this['asset']->addFile('css', 'css:custom.css');

// set google fonts
if ($config->get('load_googlefonts', false)) {
	
	$httpmode = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
	
	$this['config']->set('webfonts','webfonts');
	$this['asset']->addFile('css', $httpmode.'://fonts.googleapis.com/css?family=Lobster');	
}


$config->set('contentwrapper-class', $config->get("contentwrapper") ? "contentwrapper":"");

// javascripts
$this['asset']->addString('js','var Warp = Warp || {}; Warp.Settings = '.json_encode(array('itemColor' => $config->get('itemcolor'))).';');
$this['asset']->addFile('js', 'js:warp.js');
$this['asset']->addFile('js', 'js:accordionmenu.js');
$this['asset']->addFile('js', 'js:dropdownmenu.js');
$this['asset']->addFile('js', 'js:spotlight.js');
$this['asset']->addFile('js', 'js:template.js');

// ie8 hacks
if ($this['useragent']->browser() == 'msie' && $this->warp->useragent->version() == '8.0') {
	$css = '<link rel="stylesheet" href="%s" type="text/css" />';
	$ie8[] = sprintf($css, $this->warp->path->url('css:ie8hacks.css'));
	$head[] = '<!--[if IE 8]>'.implode("\n", $ie8).'<![endif]-->';
}

// ie7 hacks
if ($this['useragent']->browser() == 'msie' && $this->warp->useragent->version() == '7.0') {
	$css = '<link rel="stylesheet" href="%s" type="text/css" />';
	$ie7[] = sprintf($css, $this->warp->path->url('css:ie7hacks.css'));
	$head[] = '<!--[if IE 7]>'.implode("\n", $ie7).'<![endif]-->';
}

// ie6 hacks
if ($this['useragent']->browser() == 'msie' && $this->warp->useragent->version() == '6.0') {
	$css = '<link rel="stylesheet" href="%s" type="text/css" />';
	$js = '<script type="text/javascript" src="%s"></script>';
	$ie6[] = sprintf($css, $this->warp->path->url('css:ie6hacks.css'));

	$ie6[] = sprintf($js, $this->warp->path->url('js:ie6fix.js'));
	$ie6[] = sprintf($js, $this->warp->path->url('js:ie6png.js'));
	$ie6[] = sprintf($js, $this->warp->path->url('js:ie6.js'));
	$head[] = '<!--[if IE 6]>'.implode("\n", $ie6).'<![endif]-->';
}

// add $head
if (isset($head)) {
	$this->warp->template->set('head', implode("\n", $head));
}

// set css class for specific columns
$columns = null;
if ($this['modules']->count('left')) $columns .= 'column-left';
if ($this['modules']->count('right')) $columns .= ' column-right';
if ($this['modules']->count('contentleft')) $columns .= ' column-contentleft';
if ($this['modules']->count('contentright')) $columns .= ' column-contentright';

$config->set('columns', $columns);