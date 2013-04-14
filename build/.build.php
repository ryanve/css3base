<?php
/**
 * @link css3base.com
 * @link github.com/ryanve/css3base
 */
namespace css3base;

# set output to css:
header('Content-type: text/css');

/**
 * @param  string  $css
 * @return string
 */
function compressCss($css) {
    if ( !$css || !is_string($css))
        return '';
    $doc = [];
    preg_match('/\/\*![\s\S]+?\*\//', $css, $doc);  // `/*!` comments
    $doc = isset($doc[0]) ? $doc[0] : ''; // the initial `/*!` docblock
    $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css); // remove comments
    $css = preg_replace('/\s+/', ' ', $css ); // whitespace to single spaces
    $css = preg_replace('/([\w\-])\s*(,|;|{|})\s+({|}|;|,|\+|\.|\-|!|::)/', '$1$2$3', $css); // leading spaces
    $css = preg_replace('/(,|;|{)\s*([\w\.\-#\s]+)(\:|\}|,)/', '$1$2$3', $css);  // leading spaces
    $css = preg_replace('/([a-zA-Z0-9])\s+(!important)/', '$1$2', $css);
    $css = preg_replace('/([\w\-,]+)\s*(\:)\s*([\w\-,:]*)/', '$1$2$3', $css); // `width: 0` to `width:0`
    $css = preg_replace('/({|}|;|,||\+|\-|!)\s+(,|;|{|})/', '$1$2', $css);
    $css = preg_replace('/([\w\-]),\s+/', '$1,', $css);
    $css = preg_replace('/({|})\s+([a-zA-Z0-9\-_]|::|@page|@media)/', '$1$2', $css );
    $css = preg_replace('/([\w\-]+\:)(;|\s+)({|})/', '$1$3', $css);
    return trim($doc . "\n" . trim($css));
}

/**
 * @return object
 */
function getParams() {
    $params = [];
    parse_str($_SERVER['QUERY_STRING'], $params);
    $params = (object) $params;
    $params->mode = $params->mode ?: 'min';
    $params->build = !$params->build || '_' === $params->build ? [
        'normalize', 'h5bp', 'fit', 'custom'
    ] : array_unique(array_filter(explode(',', preg_replace('#(\.\d+)?(\.css)?#', '', $params->build))));
    return $params;
}

/**
 * @param   string      $file
 * @param   string      $min
 * @return  string|boolean
 */
function getCss($file, $mode = 'min') {
    $file = (is_dir('css') ? '.' : '..') . '/css/' . $file;
    $css = is_file($file) || is_file($file .= '.css') ? file_get_contents($file) : false;
    return $css && 'min' === $mode ? compressCss($css) : $css;
}

# generate the output:
call_user_func(function() {
    $params = getParams(); 
    $nfo = '/*!'
        . "\n" . ' * @link css3base.com/build/' . implode(',', $params->build)
        . "\n" . ' * @time ' . date(DATE_W3C)
        . "\n" . ' */';
    $output = [];
    foreach ($params->build as $n)
        $css = ($css = getCss($n, $params->mode)) ? array_push($output, $css) : null;
    $output = array_filter($output);
    echo $nfo . "\n\n" . implode("\n\n\n", $output) . "\n\n";
});