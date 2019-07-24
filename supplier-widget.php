<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Widget_Elementor_Supplier extends Widget_Base {

	public function get_name() {
		return 'my-web';
	}

	public function get_title() {
		return __( 'Supplier Widget', 'elementor-supplier' );
	}

	public function get_icon() {
		// Icon name from the Elementor font file, as per http://dtbaker.net/web-development/creating-your-own-custom-elementor-widgets/
		// return 'eicon-elementor-square';
		return 'eicon-plus-square';
	}
	
	protected function _register_controls() {

		if ( function_exists('dsmsrcs_get_sources') ) {
			$sources = dsmsrcs_get_sources();
		}
		$arr = [];

		foreach($sources as $source) {
			/* print_r($source['name']);
			echo '<br>'; */
			array_push($arr, $source['name']);
		}

		// Supplier Section
		$this->start_controls_section(
			'section_supplier',
			[
				'label' => esc_html__( 'Supplier', 'elementor-supplier' ),
			]
		);

		$this->add_control(
			'supplier_name',
			[
				 'label' => __( 'Name', 'elementor-supplier' ),
				 'type' => Controls_Manager::TEXT,
				 'default' => '',
				 'placeholder' => __( 'Supplier Name', 'elementor-supplier' ),
				 'title' => __( 'Enter Supplier\'s title', 'elementor-supplier' ),
			]
	 	);

		$this->add_control(
			'supplier_select',
			[
				'label' => __( 'Select Supplier', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'solid',
				'options' => $arr,
			]
		);

		$this->add_control(
			'supplier_type',
			[
				'label' => __( 'Supplier Type', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'Online Marketplace'  => __( 'Online Marketplace', 'elementor-supplier' ),
					'Online Retailer' => __( 'Online Retailer', 'elementor-supplier' ),
					'Dropshipping friendly supplier' => __( 'Dropshipping Friendly Supplier', 'elementor-supplier' ),
				],
			]
		);

		$this->add_control(
			'supplier_location',
			[
				'label' => __( 'Location Iframe Code', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 8,
				'placeholder' => __( 'Embed supplier google map code', 'elementor-supplier' ),
			]
		);

		$this->add_control(
			'supplier_address',
			[
				 'label' => __( 'Address', 'elementor-supplier' ),
				 'type' => Controls_Manager::TEXT,
				 'default' => '',
				 'placeholder' => __( 'Supplier Address', 'elementor-supplier' ),
				 'title' => __( 'Enter Supplier\'s address', 'elementor-supplier' ),
				 'label_block' => true,
			]
		 );
		 
		$repeater_warehouses = new \Elementor\Repeater();

		$repeater_warehouses->add_control(
			'supplier_warehouse', [
				'label' => __( 'Warehouse Address', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'label_block' => true,
			]
		);

		// Warehouses addresses List
		$this->add_control(
			'list_warehouses',
			[
				'label' => __( 'Warehouses Addresses', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater_warehouses->get_controls(),
				'default' => [],
				'prevent_empty' => false,
				'title_field' => '{{{ supplier_warehouse }}}',
			]
		);

		$this->end_controls_section();

		// Dropshipping Program Section
		$this->start_controls_section(
			'section_dropshipping',
			[
				'label' => __( 'Dropshipping Program', 'elementor-supplier' ),
			]
		);

		$this->add_control(
			'supplier_program',
			[
				'label' => __( 'Dropshipping Program', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'elementor-supplier' ),
				'label_off' => __( 'No', 'elementor-supplier' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'supplier_programTextarea',
			[
				'label' => __( 'Text for Dropshipping Program', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 5,
				'default' => __( '', 'elementor-supplier' ),
				'placeholder' => __( 'Write text about Dropshipping Program', 'elementor-supplier' ),
			]
		);

		$this->add_control(
			'supplier_programButton',
			[
				'label' => __( 'Action Button', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'elementor-supplier' ),
				'label_off' => __( 'No', 'elementor-supplier' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'supplier_programButtonText',
			[
				 'label' => __( 'Action Button Text', 'elementor-supplier' ),
				 'type' => Controls_Manager::TEXT,
				 'default' => 'Action Button',
				 'placeholder' => __( '', 'elementor-supplier' ),
				 'title' => __( 'Enter Button Title', 'elementor-supplier' ),
			]
		 );
		 
		 $this->add_control(
			'supplier_programButtonLink',
			[
				'label' => __( 'Action Button Link', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'url',
				'placeholder' => __( 'https://your-link.com', 'elementor-supplier' ),
			]
		);

		$this->end_controls_section();

		// Reseller Agreement Section
		$this->start_controls_section(
			'section_reseller',
			[
				'label' => __( 'Reseller Agreement', 'elementor-supplier' ),
			]
		);

		$this->add_control(
			'supplier_reseller',
			[
				'label' => __( 'Reseller Agreement', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'elementor-supplier' ),
				'label_off' => __( 'No', 'elementor-supplier' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);

		$this->add_control(
			'supplier_resellerTextarea',
			[
				'label' => __( 'Text for Reseller Agreement', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 5,
				'default' => __( '', 'elementor-supplier' ),
				'placeholder' => __( 'Write text about Reseller Agreement', 'elementor-supplier' ),
			]
		);

		$this->add_control(
			'supplier_resellerButton',
			[
				'label' => __( 'Action Button', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'elementor-supplier' ),
				'label_off' => __( 'No', 'elementor-supplier' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'supplier_resellerButtonText',
			[
				 'label' => __( 'Action Button Text', 'elementor-supplier' ),
				 'type' => Controls_Manager::TEXT,
				 'default' => 'Action Button',
				 'placeholder' => __( '', 'elementor-supplier' ),
				 'title' => __( 'Enter Button Title', 'elementor-supplier' ),
			]
		 );
		 
		 $this->add_control(
			'supplier_resellerButtonLink',
			[
				'label' => __( 'Action Button Link', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'url',
				'placeholder' => __( 'https://your-link.com', 'elementor-supplier' ),
			]
		);

		$this->end_controls_section();

		// Dropship Packaging Section
		$this->start_controls_section(
			'section_packaging',
			[
				'label' => __( 'Dropship Packaging', 'elementor-supplier' ),
			]
		);

		$this->add_control(
			'supplier_packaging',
			[
				'label' => __( 'Dropship Packaging', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'elementor-supplier' ),
				'label_off' => __( 'No', 'elementor-supplier' ),
				'return_value' => 'yes',
				'default' => '',
			]
		);

		$this->add_control(
			'supplier_packagingTextarea',
			[
				'label' => __( 'Text for Dropship Packaging', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 5,
				'default' => __( '', 'elementor-supplier' ),
				'placeholder' => __( 'Write text about Dropship Packaging', 'elementor-supplier' ),
			]
		);

		$this->add_control(
			'supplier_packagingButton',
			[
				'label' => __( 'Action Button', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'elementor-supplier' ),
				'label_off' => __( 'No', 'elementor-supplier' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'supplier_packagingButtonText',
			[
				 'label' => __( 'Action Button Text', 'elementor-supplier' ),
				 'type' => Controls_Manager::TEXT,
				 'default' => 'Action Button',
				 'placeholder' => __( '', 'elementor-supplier' ),
				 'title' => __( 'Enter Button Title', 'elementor-supplier' ),
			]
		 );
		 
		 $this->add_control(
			'supplier_packagingButtonLink',
			[
				'label' => __( 'Action Button Link', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'url',
				'placeholder' => __( 'https://your-link.com', 'elementor-supplier' ),
			]
		);

		$this->end_controls_section();

		// Policies Section
		$this->start_controls_section(
			'section_policies',
			[
				'label' => __( 'Policies', 'elementor-supplier' ),
			]
		);

		$this->add_control(
			'supplier_shipButton',
			[
				'label' => __( 'Shipping Policy', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'elementor-supplier' ),
				'label_off' => __( 'No', 'elementor-supplier' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'supplier_ship',
			[
				'label' => __( 'Shipping Policy Link', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'elementor-supplier' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'supplier_returnButton',
			[
				'label' => __( 'Return Policy', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'elementor-supplier' ),
				'label_off' => __( 'No', 'elementor-supplier' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'supplier_return',
			[
				'label' => __( 'Return Policy Link', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'elementor-supplier' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'supplier_paymentButton',
			[
				'label' => __( 'Payment Methods', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'elementor-supplier' ),
				'label_off' => __( 'No', 'elementor-supplier' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'supplier_payment',
			[
				'label' => __( 'Payment Methods Link', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'elementor-supplier' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->end_controls_section();

		// Help Links Section
		$this->start_controls_section(
			'section_help',
			[
				'label' => __( 'Help Links', 'elementor-supplier' ),
			]
		);

		$this->add_control(
			'supplier_articleButton',
			[
				'label' => __( 'Dropshipping Academy Article', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'elementor-supplier' ),
				'label_off' => __( 'No', 'elementor-supplier' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'supplier_article',
			[
				'label' => __( 'Dropshipping Academy Article Link', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'elementor-supplier' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'supplier_youtubeButton',
			[
				'label' => __( 'Youtube Video', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'elementor-supplier' ),
				'label_off' => __( 'No', 'elementor-supplier' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'supplier_youtube',
			[
				'label' => __( 'Youtube Video Link', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'elementor-supplier' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->add_control(
			'supplier_helpButton',
			[
				'label' => __( 'Help Center', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => __( 'Yes', 'elementor-supplier' ),
				'label_off' => __( 'No', 'elementor-supplier' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'supplier_help',
			[
				'label' => __( 'Help Center Link', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'elementor-supplier' ),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);

		$this->end_controls_section();

		// Social Networks Section
		$this->start_controls_section(
			'section_social',
			[
				'label' => esc_html__( 'Social Networks', 'elementor-supplier' ),
			]
		);

		$repeater_social = new \Elementor\Repeater();

		$repeater_social->add_control(
			'supplier_socialSelect',
			[
				'label' => __( 'Select Social Network', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'facebook'  => __( 'Facebook', 'elementor-supplier' ),
					'youtube' => __( 'Youtube', 'elementor-supplier' ),
					'twitter' => __( 'Twitter', 'elementor-supplier' ),
					'instagram' => __( 'Instagram', 'elementor-supplier' ),
				],
			]
		);

		$repeater_social->add_control(
			'supplier_socialTitle', [
				'label' => __( 'Social Network Title', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'label_block' => true,
			]
		);

		$repeater_social->add_control(
			'supplier_socialLink',
			[
				'label' => __( 'Social Network Link', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'url',
				'placeholder' => __( 'https://your-link.com', 'elementor-supplier' ),
			]
		);

		// Social Networks List
		$this->add_control(
			'list_social',
			[
				'label' => __( 'Social Networks', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater_social->get_controls(),
				'default' => [],
				'prevent_empty' => false,
				'title_field' => '{{{ supplier_socialSelect }}}',
			]
		);

		$this->end_controls_section();

		// Links Reviews Section
		$this->start_controls_section(
			'section_reviews',
			[
				'label' => esc_html__( 'Links Reviews', 'elementor-supplier' ),
			]
		);

		$repeater_reviews = new \Elementor\Repeater();

		$repeater_reviews->add_control(
			'supplier_reviewsTitle', [
				'label' => __( 'Link Reviews Title', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '',
				'label_block' => true,
			]
		);

		$repeater_reviews->add_control(
			'supplier_reviewsLink',
			[
				'label' => __( 'Reviews Link', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'input_type' => 'url',
				'placeholder' => __( 'https://your-link.com', 'elementor-supplier' ),
			]
		);

		// Links Reviews List
		$this->add_control(
			'list_reviews',
			[
				'label' => __( 'Reviews Websites', 'elementor-supplier' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater_reviews->get_controls(),
				'default' => [],
				'prevent_empty' => false,
				'title_field' => '{{{ supplier_reviewsTitle }}}',
			]
		);

		$this->end_controls_section();

	}

	protected function render( $instance = [] ) {

		// get our input from the widget settings.

		$settings = $this->get_settings_for_display();

		$supplier_name = $settings['supplier_name'];
		$supplier_select = $settings['supplier_select'];
		$supplier_type = $settings['supplier_type'];
		$supplier_location = $settings['supplier_location'];
		$supplier_address = $settings['supplier_address'];

		// Policies Section
		$supplier_shipButton = $settings['supplier_shipButton'];
		$supplier_ship = $settings['supplier_ship'];
		$supplier_targetShipping = $settings['supplier_ship']['is_external'] ? ' target="_blank"' : '';
		$supplier_nofollowShipping = $settings['supplier_ship']['nofollow'] ? ' rel="nofollow"' : '';
		
		$supplier_returnButton = $settings['supplier_returnButton'];
		$supplier_return = $settings['supplier_return'];
		$supplier_targetReturn = $settings['supplier_return']['is_external'] ? ' target="_blank"' : '';
		$supplier_nofollowReturn = $settings['supplier_return']['nofollow'] ? ' rel="nofollow"' : '';
		
		$supplier_paymentButton = $settings['supplier_paymentButton'];
		$supplier_payment = $settings['supplier_payment'];
		$supplier_targetPayment = $settings['supplier_payment']['is_external'] ? ' target="_blank"' : '';
		$supplier_nofollowPayment = $settings['supplier_payment']['nofollow'] ? ' rel="nofollow"' : '';

		// Help Links Section
		$supplier_articleButton = $settings['supplier_articleButton'];
		$supplier_article = $settings['supplier_article'];
		$supplier_targetArticle = $settings['supplier_article']['is_external'] ? ' target="_blank"' : '';
		$supplier_nofollowArticle = $settings['supplier_article']['nofollow'] ? ' rel="nofollow"' : '';

		$supplier_youtubeButton = $settings['supplier_youtubeButton'];
		$supplier_youtube = $settings['supplier_youtube'];
		$supplier_targetYoutube = $settings['supplier_youtube']['is_external'] ? ' target="_blank"' : '';
		$supplier_nofollowYoutube = $settings['supplier_youtube']['nofollow'] ? ' rel="nofollow"' : '';

		$supplier_helpButton = $settings['supplier_helpButton'];
		$supplier_help = $settings['supplier_help'];
		$supplier_targetHelp = $settings['supplier_help']['is_external'] ? ' target="_blank"' : '';
		$supplier_nofollowHelp = $settings['supplier_help']['nofollow'] ? ' rel="nofollow"' : '';

		// Dropshipping program
		$supplier_program = $settings['supplier_program'];
		$supplier_programTextarea = $settings['supplier_programTextarea'];
		$supplier_programButton = $settings['supplier_programButton'];
		$supplier_programButtonText = $settings['supplier_programButtonText'];
		$supplier_programButtonLink = $settings['supplier_programButtonLink'];

		// Reseller Agreement
		$supplier_reseller = $settings['supplier_reseller'];
		$supplier_resellerTextarea = $settings['supplier_resellerTextarea'];
		$supplier_resellerButton = $settings['supplier_resellerButton'];
		$supplier_resellerButtonText = $settings['supplier_resellerButtonText'];
		$supplier_resellerButtonLink = $settings['supplier_resellerButtonLink'];

		// Dropship Packaging
		$supplier_packaging = $settings['supplier_packaging'];
		$supplier_packagingTextarea = $settings['supplier_packagingTextarea'];
		$supplier_packagingButton = $settings['supplier_packagingButton'];
		$supplier_packagingButtonText = $settings['supplier_packagingButtonText'];
		$supplier_packagingButtonLink = $settings['supplier_packagingButtonLink'];
		

		$arr = [];

		if ( function_exists('dsmsrcs_get_sources') ) {
			$sources = dsmsrcs_get_sources();
		}

		// init Array of Suppliers names
		foreach($sources as $source) {
			array_push($arr, $source['name']);	
		}
		// comparing keys with selected in widget and giving it proper name
		foreach ($arr as $key => $value) {
			if ($key == $supplier_select) {
				$supplier_title = $value;
			}
		}

		foreach($sources as $source) {
			if ($source['name'] == $supplier_title) {
				$supplier_url = $source['url'];
				$supplier_img = $source['image_url'];
				$supplier_cat = $source['categories'];
				
				// variables for Integrations table
				$supplier_itemsCollector = $source['items_collector'];
				$supplier_lister = $source['lister'];
				$supplier_repriceInterval = $source['reprice_interval'];
				$supplier_autoPaste = $source['auto_paste'];
				$supplier_autoOrder = $source['auto_order'];
				$supplier_shipping = $source['shipping'];
			}
		}

		include 'inc/widget-html.php';
	
	}
	
	protected function content_template() {}

	public function render_plain_content( $instance = [] ) {}

}


