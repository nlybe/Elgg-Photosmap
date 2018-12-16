<?php
/**
 * Map of Photos Location
 * @package photosmap
 */

$image = $vars['entity'];

if (!elgg_instanceof($image, 'object', 'image')) {
    return;
}

if (!elgg_is_active_plugin('amap_maps_api')){
    return;
}

$address = '';
if ($image->location) {
    $address = $image->location;
} 
else {

    $exif = $image->tp_exif;

    if ($exif) {
        $exif = unserialize($exif);

        $lat = $exif['latitude'];  
        $lng = $exif['longitude']; 
        $address = amap_ma_reverse_geocoding($lat, $lng);
        
        echo elgg_format_element('div', [], elgg_view_input('hidden', array(
            'id' => 'latitude_' . $image->getGUID(),
            'name' => 'latitude_' . $image->getGUID(),
            'value' => $lat,
        )));

        echo elgg_format_element('div', [], elgg_view_input('hidden', array(
            'id' => 'longitude_' . $image->getGUID(),
            'name' => 'longitude_' . $image->getGUID(),
            'value' => $lng,
        )));
    }
}

echo elgg_format_element('div', [], elgg_view_input('text', array(
    'id' => 'location_' . $image->getGUID(),
    'name' => 'location_' . $image->getGUID(),
    'class' => 'location_image',
    'value' => $address?$address:'',
    'label' => elgg_echo('photosmap:location'),
    'help' => elgg_echo('photosmap:location:help'),
)));
