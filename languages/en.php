<?php
/**
 * Map of Photos Location
 * @package photosmap 
 */

$language = array(

    'photosmap' => "Map of Photos",
    'photosmap:menu' => "Map of Photos",
    'photosmap:title' => "Map of Photos",
    'photosmap:location' => "Location",
    'photosmap:location:help' => "Enter photo location",
    'photosmap:newest' => 'Map with %s photos groups',  
    'photosmap:nearby:search' => 'Photos near "%s"',
    
    // settings
    'photosmap:settings:amap_maps_api:notenabled' => 'The Maps Api plugin is not enable',
    'photosmap:settings:geolocation:results' => 'Geolocation Results',    
    'photosmap:settings:batchusers' => 'Batch Photos Geolocation',
    'photosmap:settings:batchusers:start' => 'Start Geolocation',
    'photosmap:settings:batchusers:note' => 'If you have already photos uploaded with tidypics plugin on your Elgg site, click on this button for converting photo\'s location to coordinates.<br />You have to do it <strong>just once</strong> before start using this plugin.',
    'photosmap:error:request' => 'There was problem during request',
    
);

add_translation("en", $language);
