<?php
/*
Plugin Name: Dizzle Vendor list
Plugin URI: http://www.dizzle.com
Description: Displays your Dizzle vendor list inside the current post or page.
Author: Dizzle
Author URI: http://app.dizzle.com
Tags: dizzle, vendor, agent, real estate
Version: 1.0
*/

/**
 * Based on the work of: Show Website Content in WordPress Page or Post
 * http://wordpress.org/extend/plugins/show-website-content-in-wordpress-page-or-post/
 * By Chrsitopher Ross
 * @license		http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 */

$GLOBALS["dizzle_vendor_root"] = "https://app.dizzle.com";

function dizzle_get_html( $settings ) {

  $atts = shortcode_atts( array(
        'list' => '',
        'category' => '',
        'vendor' => '',
        'dropdown_nav' => '',
        'link_nav' => '',
    ), $settings );

    $list = $atts['list'];
    $category = $atts['category'];
    $vendor = $atts['vendor'];
    $dropdown_nav = $atts['dropdown_nav'];
    $link_nav = $atts['link_nav'];
  
  $html = dizzle_get_html_get( $list, $category, $vendor, $dropdown_nav, $link_nav );

    if ( empty( $html ) )
        $html = dizzle_get_html_curl( $list, $category, $vendor, $dropdown_nav, $link_nav );

    return $html;

}

add_shortcode( 'dizzle_vendor' , 'dizzle_get_html' );

function dizzle_get_html_get( $list, $category, $vendor, $dropdown_nav, $link_nav  ) {

    if ( function_exists( 'file_get_contents' ) ) {
        return @file_get_contents( $GLOBALS["dizzle_vendor_root"] . "/profile_wp?username=" . urlencode ($list) . "&category=" . urlencode ($category) . "&vendor=" . urlencode ($vendor)  . "&dropdown_nav=" . urlencode ($dropdown_nav) . "&link_nav=" . urlencode ($link_nav) );
    }

}

function dizzle_get_html_curl( $list, $category, $vendor, $dropdown_nav, $link_nav  ) {

    if( is_callable( 'curl_init' ) ) {
        $url = $GLOBALS["dizzle_vendor_root"] . "/profile_wp?username=" . urlencode ($list) . "&category=" . urlencode ($category) . "&vendor=" . urlencode ($vendor) . "&dropdown_nav=" . urlencode ($dropdown_nav) . "&link_nav=" . urlencode ($link_nav) ;

        $referer = get_bloginfo( 'url' );
        $timeout = 15;

        $curl = curl_init( );

        if( strstr( $referer,"://" ) )
            curl_setopt ( $curl, CURLOPT_REFERER, $referer );

        curl_setopt ( $curl, CURLOPT_URL, $url );
        curl_setopt ( $curl, CURLOPT_TIMEOUT, $timeout );
        curl_setopt ( $curl, CURLOPT_USERAGENT, sprintf( "DizzleWP/%d.0",rand( 4,5 ) ) );
        curl_setopt ( $curl, CURLOPT_HEADER, ( int )$header );
        curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, 0 );
        $html = curl_exec ( $curl );
        curl_close ( $curl );

        return $html;
    }
}