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
        if ( is_page() ) {
            wp_enqueue_style( 'elementor-supplier', plugins_url( 'css/style.css', __FILE__ ), array() );
        }
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