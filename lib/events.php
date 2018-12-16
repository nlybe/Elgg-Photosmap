<?php
/**
 * Map of Photos Location
 * @package photosmap
 *
 * All events are here
 */

/**
 * Geolocate photos based on exif data
 * 
 * @param type $event
 * @param type $object_type
 * @param type $object
 * @return boolean
 */
function photosmap_get_coords($event, $object_type, $object) {
    
    if (elgg_instanceof($object, 'object', 'image')) {
        
        elgg_load_library('elgg:amap_maps_api');
        
        // these are used in batch upload
        $lat = get_input('latitude_'.$object->getGUID());
        if (!$lat) {
            // if empty location check for 'location' input used when edit a single photo
            $lat = get_input('latitude');
        }
        
        $lng = get_input('longitude_'.$object->getGUID());
        if (!$lng) {
            // if empty location check for 'location' input used when edit a single photo
            $lng = get_input('longitude');
        }
        
        $location = get_input('location_'.$object->getGUID());        
        if (!$location) {
            // if empty location check for 'location' input used when edit a single photo
            $location = get_input('location');
        }
        
        if ($location) {
            $object->location = $location;
        }
        else if (!$object->location && isset($lat) && isset($lng)) {
            $object->location = amap_ma_reverse_geocoding($lat, $lng);
        }
                      
        if ($location || (isset($lat) && isset($lng))) {
            amap_ma_save_object_coords($location, $object, AMAP_MA_PLUGIN_ID, (isset($lat) ? $lat : ''), (isset($lng) ? $lng : ''));
        } else {
            $object->setLatLong('', '');
        }
    }
    return true;
}
