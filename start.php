<?php
/**
 * Map of Photos Location
 * @package photosmap 
 */

require_once(dirname(__FILE__) . "/lib/hooks.php");
require_once(dirname(__FILE__) . "/lib/events.php");

elgg_register_event_handler('init', 'system', 'photosmap_init');

 
/**
 * photosmap plugin initialization functions.
 */
function photosmap_init() {  
	
    // register a library of helper functions
    elgg_register_library('elgg:photosmap', elgg_get_plugins_path() . 'photosmap/lib/functions.php');	

    // Extend CSS
    elgg_extend_view('css/elgg', 'photosmap/photosmap');
 
    // Register a handler for create images
    elgg_register_event_handler('update:after', 'object', 'photosmap_get_coords');
    
    // Register a page handler, so we can have nice URLs
    elgg_register_page_handler('photosmap', 'photosmap_page_handler');
    
    // register ajax view for users geolocation
    elgg_register_ajax_view('photosmap/photos_geolocation');    
    
    // Register actions
    $action_path = elgg_get_plugins_path() . 'photosmap/actions/photosmap';
    elgg_register_action('photosmap/admin/general_options', "$action_path/admin/settings.php", 'admin');	
    elgg_register_action('photosmap/nearby_search', "$action_path/nearby_search.php", 'public');     

}

/**
 *  Dispatches photosmap pages.
 *
 * @param array $page
 * @return bool
 */
function photosmap_page_handler($page) {
    $vars = array();
    $vars['page'] = $page[0];
    elgg_push_context('photosmap');

    $resource_vars = array();
    echo elgg_view_resource('photosmap/nearby', $resource_vars);

    return true;
}

