<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://mikecornish.net
 * @since      1.0.0
 *
 * @package    Immersive_Carousel
 * @subpackage Immersive_Carousel/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Immersive_Carousel
 * @subpackage Immersive_Carousel/admin
 * @author     Mike Cornish <cornishmw@gmail.com>
 */
class Immersive_Carousel_Admin {

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
	 * The options name to be used in this plugin
	 *
	 * @since  	1.0.0
	 * @access 	private
	 * @var  	string 		$option_name 	Option name of this plugin
	 */
	private $option_name = 'immersive_carousel';

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/immersive-carousel-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/immersive-carousel-admin.js', array( 'jquery' ), $this->version, false );

	}

  /**
	 * Add an options page under the Settings submenu
	 *
	 * @since  1.0.0
	 */
	public function add_options_page() {

		$this->plugin_screen_hook_suffix = add_options_page(
			__( 'Immersive Carousel Settings', 'immersive-carousel' ),
			__( 'Immersive Carousel', 'immersive-carousel' ),
			'manage_options',
			$this->plugin_name,
			array( $this, 'display_options_page' )
		);

	}

  /**
	 * Render the options page for plugin
	 *
	 * @since  1.0.0
	 */
	public function display_options_page() {
		include_once 'partials/immersive-carousel-admin-display.php';
	}

  /**
	 * Register a settings section
	 *
	 * @since  1.0.0
	 */
	public function register_setting() {
    // Add a General section
	  add_settings_section(
  		$this->option_name . '_general',
  		__( 'General', 'immersive-carousel' ),
  		array( $this, $this->option_name . '_general_cb' ),
  		$this->plugin_name
	 );

    add_settings_field(
  		$this->option_name . '_image_url',
  		__( 'Image', 'immersive-carousel' ),
  		array( $this, $this->option_name . '_image_url_cb' ),
  		$this->plugin_name,
  		$this->option_name . '_general',
  		array( 'label_for' => $this->option_name . '_image_url' )
  	);

    register_setting( $this->plugin_name, $this->option_name . '_image_url', 'strval' );

 }

 /**
	 * Render the text for the general section
	 *
	 * @since  1.0.0
	 */
	public function immersive_carousel_general_cb() {
		echo '<p>' . __( 'Please change the settings accordingly.', 'immersive-carousel' ) . '</p>';
	}

  /**
	 * Render the file input field for image option
	 *
	 * @since  1.0.0
	 */
	public function immersive_carousel_image_url_cb() {
    $image_url = get_option( $this->option_name . '_image_url' );
    // jQuery
    wp_enqueue_script('jquery');
    // This will enqueue the Media Uploader script
    wp_enqueue_media();
    ?>
      <input type="hidden" name="<?php echo $this->option_name . '_image_url' ?>" id="<?php echo $this->option_name . '_image_url' ?>" value="<?php echo $image_url ?>">
      <img class="js-image-url" src="<?php echo $image_url ?>">
      <input type="button" name="upload-btn" id="upload-btn" class="button-secondary" value="Upload Image">
      <script type="text/javascript">
        jQuery(document).ready(function($){
            $('#upload-btn').on('click', function(e) {
                e.preventDefault();
                var image = wp.media({
                    title: 'Upload Image',
                    // mutiple: true if you want to upload multiple files at once
                    multiple: false
                }).open()
                .on('select', function(e){
                    // This will return the selected image from the Media Uploader, the result is an object
                    var uploaded_image = image.state().get('selection').first();
                    // We convert uploaded_image to a JSON object to make accessing it easier
                    // Output to the console uploaded_image
                    console.log(uploaded_image.toJSON().url);
                    var image_url = uploaded_image.toJSON().url;
                    // Let's assign the url value to the input field
                    $('.js-image-url').attr('src', image_url);
                    $('#<?php echo $this->option_name . '_image_url' ?>').val(image_url);
                });
            });
        });
      </script>
    <?php
	}

}
