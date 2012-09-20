<?php

header('Content-type: text/css');

parse_str($_SERVER['QUERY_STRING']);
 
if ( is_dir('css') ) $path = 'css/';
else $path = rtrim(dirname(dirname(__FILE__)), '/') . '/css/';

$build = isset($build) && $build !== '_' ? array_unique(explode(',', $build)) : array(
    'normalize'
  , 'h5bp'
  , 'fit'
  , 'custom'
);

$nfo = '/* :::::::::::::::::: '
. "\n" . ' * @link  css3base.com/build/' . str_replace('.css', '', implode(',', $build)) 
. "\n" . ' * @date  ' . date('Y-m-d')
. "\n" . ' * ::::::::::::::::: */';

// after hours of trial and error:
function css3base_compress ($css) {
	if ( empty($css) || !is_string($css) ) { return false; }
	$doc = array();
	preg_match( '/\/\*![\s\S]+?\*\//', $css, $doc );
	$doc = isset($doc[0]) ? $doc[0] : '';
	$css = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css ); // remove comments
	$css = preg_replace( '/\s+/', ' ', $css ); // whitespace to single spaces
	$css = preg_replace( '/([\w\-])\s*(,|;|{|})\s+({|}|;|,|\+|\.|\-|!|::)/', '$1$2$3', $css ); // leading spaces
	$css = preg_replace( '/(,|;|{)\s*([\w\.\-#\s]+)(\:|\}|,)/', '$1$2$3', $css );  // leading spaces
	$css = preg_replace( '/([a-zA-Z0-9])\s+(!important)/', '$1$2', $css );
	$css = preg_replace( '/([\w\-,]+)\s*(\:)\s*([\w\-,:]*)/', '$1$2$3', $css ); // `width: 0` to `width:0`
	$css = preg_replace( '/({|}|;|,||\+|\-|!)\s+(,|;|{|})/', '$1$2', $css );
	$css = preg_replace( '/([\w\-]),\s+/', '$1,', $css );
	$css = preg_replace( '/({|})\s+([a-zA-Z0-9\-_]|::|@page|@media)/', '$1$2', $css );
	$css = preg_replace( '/([\w\-]+\:)(;|\s+)({|})/', '$1$3', $css );
	return trim($doc . "\n" . trim($css));
}

$output = array();

foreach ( $build as &$n ) {
	if ( empty($n) ) { continue; }
	$n = $path . $n;
	file_exists($n) || file_exists($n .= '.css') and $css = file_get_contents($n);
	$css = css3base_compress($css);
	$n = array_pop(explode('/', $n)); // get filename w/ extension but w/o preceding path
	//empty($css) or $n = '/* ==start=> ' . $n . ' */' . "\n" . $css . "\n" . '/* <=end== ' . $n . ' */';
	empty($css) or array_push($output, $css);
	unset($css);
}

$output = array_filter($output);
echo $nfo . "\n\n" . implode("\n\n\n", $output) . "\n\n";

