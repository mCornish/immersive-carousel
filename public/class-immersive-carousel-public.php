<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://mikecornish.net
 * @since      1.0.0
 *
 * @package    Immersive_Carousel
 * @subpackage Immersive_Carousel/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Immersive_Carousel
 * @subpackage Immersive_Carousel/public
 * @author     Mike Cornish <cornishmw@gmail.com>
 */
class Immersive_Carousel_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Immersive_Carousel_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Immersive_Carousel_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/immersive-carousel-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Immersive_Carousel_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Immersive_Carousel_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/immersive-carousel-public.js', array( 'jquery' ), $this->version, false );

	}

  /**
	 * The content.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function render() {

		$image_url = get_option( 'immersive_carousel_image_url', '' );
    $text = get_option( 'immersive_carousel_text', '' );
    $color = get_option( 'immersive_carousel_color', '' );

    if ( is_home() ) {
      echo '<div class="carousel__item js-carousel" data-color="' . $color . '">';
        echo '<img class="carousel__image" src="' . $image_url . '">';
        echo '<h1>' . $text . '</h1>';
      echo '</div>';
    }

  }

}
