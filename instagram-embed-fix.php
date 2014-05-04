<?php
/*
Plugin Name: Instagram Embed Fix
Plugin URI: https://github.com/lostfocus/instagram-embed-fix
Description: Embedding Instagram posts is broken at the moment. This plugin provides a temporary and dirty solution.
Version: 0.1
Author: Dominik Schwind
Author URI: http://lostfocus.de/
License: GPL2
*/

/*
 * This is necessary because Instagram returns a broken image url if the
 * requested dimensions are smaller than 613px.
 */
function instagram_embed_fix($dimensions){
    if(isset($dimensions['width']) && ($dimensions['width'] < 613)){
        $dimensions['width'] = 613;
    }
    if(isset($dimensions['height']) && ($dimensions['height'] < 613)){
        $dimensions['height'] = 613;
    }
    return $dimensions;
}

add_filter('embed_defaults', 'instagram_embed_fix',10,1);
