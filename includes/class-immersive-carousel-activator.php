<?php

/**
 * Fired during plugin activation
 *
 * @link       http://mikecornish.net
 * @since      1.0.0
 *
 * @package    Immersive_Carousel
 * @subpackage Immersive_Carousel/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Immersive_Carousel
 * @subpackage Immersive_Carousel/includes
 * @author     Mike Cornish <cornishmw@gmail.com>
 */
class Immersive_Carousel_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
    // global $wpdb;
    //
    // $table_name = $wpdb->prefix . "immersivecarousel";
    //
    // $charset_collate = $wpdb->get_charset_collate();
    //
    // $sql = "CREATE TABLE $table_name (
    //   id mediumint(9) NOT NULL AUTO_INCREMENT,
    //   time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
    //   image_url varchar(200) DEFAULT '' NOT NULL,
    //   text text NOT NULL,
    //   color text NOT NULL,
    //   UNIQUE KEY id (id)
    // ) $charset_collate;";
    //
    // require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    // dbDelta( $sql );
    //
    // $welcome_image = '';
    // $welcome_text = 'welcome';
    // $welcome_color = 'blue';
    //
    // $wpdb->insert(
    // 	$table_name,
    // 	array(
    // 		'time' => current_time( 'mysql' ),
    // 		'image_url' => $welcome_image,
    // 		'text' => $welcome_text,
    //     'color' => $welcome_color,
    // 	)
    // );
	}

}
