<?php
/**
 * Map of Photos Location
 * @package photosmap 
 */

//analysis form
echo elgg_view_form('admin/photos_geolocation', array(
    'action' => '#',
    'disable_security' => true,
));

//analysis result
$body .= elgg_view('graphics/ajax_loader', array(
    'id' => 'photos_geolocation-loader'
));
$body .= '<div id="photos_geolocation-result">';

if ($version) {
    $body .= elgg_view('amap_maps_api/users_geolocation', array(
        'version' => $version,
    ));
} 

$body .= '</div>';

echo elgg_view_module('main', elgg_echo('photosmap:settings:geolocation:results'), $body, array(
    'class' => 'mbl',
));
