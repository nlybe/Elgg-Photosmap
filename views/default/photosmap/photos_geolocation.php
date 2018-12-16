<?php
/**
 * Map of Photos Location
 * @package photosmap 
 */

elgg_admin_gatekeeper();

elgg_load_library('elgg:amap_maps_api');

$options = array(
    'type' => 'object', 
    'subtype' => 'image', 
    'limit' => 0
);
$entities = elgg_get_entities($options);

foreach ($entities as $image) {
    
    if ($image->tp_exif) {
        $exif = unserialize($image->tp_exif);

        $lat = $exif['latitude'];  
        $lng = $exif['longitude']; 
        $location = amap_ma_reverse_geocoding($lat, $lng);
        
        if ($location || (isset($lat) && isset($lng))) {            
            $ccc = amap_ma_save_object_coords($location, $image, AMAP_MA_PLUGIN_ID, (isset($lat) ? $lat : ''), (isset($lng) ? $lng : ''));
            if ($ccc) {
                $image->location = $location;
                echo elgg_format_element('p', [], $image->title . ': geolocation DONE');
            }
            else {
                echo elgg_format_element('p', [], $image->title . ': geolocation failed' . $location);
            }            
        } 
        else {
            echo elgg_format_element('p', [], $image->title . ': no geo information on exif data');
            $image->setLatLong('', '');
        }        
    }
    else {
        echo elgg_format_element('p', [], $image->title . ': no exif data');
    }
}

echo "Geolocation finished for all photos";

