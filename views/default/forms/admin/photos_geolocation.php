<?php
/**
 * Map of Photos Location
 * @package photosmap 
 */

// batch convert geolocation	

elgg_require_js("photosmap/photos_geolocation");

$batchlink = elgg_format_element('div', ['class' => 'elgg-text'], elgg_echo('photosmap:settings:batchusers:note'));

echo elgg_view_module("inline", elgg_echo('photosmap:settings:batchusers'), $batchlink);

echo elgg_view('input/submit', array(
	'name' => 'submit',
	'value' => elgg_echo('amap_maps_api:settings:batchusers:start'),
	'style' => 'margin-bottom:10px;',
	'id' => 'users_geolocation_btn',
));


