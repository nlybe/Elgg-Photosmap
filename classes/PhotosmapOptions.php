<?php
/**
 * Map of Photos Location
 * @package photosmap 
 */

class PhotosmapOptions {

    const PLUGIN_ID = 'photosmap';    // current plugin ID
    const YES = 'yes';  // general purpose yes
    const NO = 'no';    // general purpose no
    
    /**
     * Get param value from settings
     * 
     * @return type
     */
    Public Static function getParams($setting_param = ''){
        if (!$setting_param) {
            return false;
        }
        
        return trim(elgg_get_plugin_setting($setting_param, self::PLUGIN_ID));
    }
   
}
