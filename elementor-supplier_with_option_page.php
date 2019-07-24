<?php

/**
 * Plugin Name: Elementor Supplier
 * Description: Custom element Supplier added to Elementor
 * Plugin URI: 
 * Version: 1.0.0
 * Author: SviRom
 * Author URI: https://svirom.work
 * Text Domain: supplier-elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

/*Add DSM Tool Social Networks Options Page to dashboard*/

function add_suppliers_menu_page() {
	/* add_menu_page("Social Networks", "DSM Tool Social Networks", "manage_options", "suppliers", "social_settings_page", null, 99); */
	add_options_page( "Social Networks", "DSM Tool Social Networks", "manage_options", "suppliers", "social_settings_page");
}
add_action("admin_menu", "add_suppliers_menu_page");

function display_facebook_element() {	?>
	<input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>" />
	<input type="checkbox" name="facebook_checkbox" value="1" <?php checked(1, get_option('facebook_checkbox'), true); ?> /> 
<?php
}

function display_youtube_element() {	?>
	<input type="text" name="youtube_url" id="youtube_url" value="<?php echo get_option('youtube_url'); ?>" />
	<input type="checkbox" name="youtube_checkbox" value="1" <?php checked(1, get_option('youtube_checkbox'), true); ?> /> 
<?php
}

function display_twitter_element() { ?>
	<input type="text" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" />
	<input type="checkbox" name="twitter_checkbox" value="1" <?php checked(1, get_option('twitter_checkbox'), true); ?> /> 
<?php
}

function display_instagram_element() {	?>
	<input type="text" name="instagram_url" id="instagram_url" value="<?php echo get_option('instagram_url'); ?>" />
	<input type="checkbox" name="instagram_checkbox" value="1" <?php checked(1, get_option('instagram_checkbox'), true); ?> /> 
<?php
}

function display_social_panel_fields() {
	add_settings_section("section", "What social networks to display in the Suppliers widget", null, "social-options");
	add_settings_field("facebook_url", "Facebook Profile Url", "display_facebook_element", "social-options", "section");
	add_settings_field("youtube_url", "Youtube Profile Url", "display_youtube_element", "social-options", "section");
	add_settings_field("twitter_url", "Twitter Profile Url", "display_twitter_element", "social-options", "section");
	add_settings_field("instagram_url", "Instagram Profile Url", "display_instagram_element", "social-options", "section");
	register_setting("section", "facebook_url");
	register_setting("section", "facebook_checkbox");
	register_setting("section", "youtube_url");
	register_setting("section", "youtube_checkbox");
  register_setting("section", "twitter_url");
  register_setting("section", "twitter_checkbox");
	register_setting("section", "instagram_url");
  register_setting("section", "instagram_checkbox");
}
add_action("admin_init", "display_social_panel_fields");

function social_settings_page() { ?>
	<div class="wrap">
	  <h1>DSM Tool Social Networks</h1>
	  <form method="post" action="options.php">
	  <?php
	    settings_fields("section");
	    do_settings_sections("social-options");      
	    submit_button(); 
	  ?>          
		</form>
	</div>
<?php
}

// This file is pretty much a boilerplate WordPress plugin.
// It does very little except including wp-widget.php

class ElementorSupplier {

	private static $instance = null;

	public static function get_instance() {
		if ( ! self::$instance )
			self::$instance = new self;
		return self::$instance;
	}

	public function widget_styles() {
	 	wp_enqueue_style( 'elementor-supplier', plugins_url( 'css/style.css', __FILE__ ), array() );
	}

	private function include_widgets_files() {
    require_once( __DIR__ . '/supplier-widget.php' );
	}
 
  public function register_widgets() {
    // Its is now safe to include Widgets files
    $this->include_widgets_files();
 
    // Register Widgets
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Elementor\Widget_Elementor_Supplier() );
	}
	
	public function init() {
 
    // Register widget styles
		add_action( 'elementor/frontend/before_enqueue_styles', [ $this, 'widget_styles' ] );
 
    // Register widgets
    add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
	}
	
}

ElementorSupplier::get_instance()->init();