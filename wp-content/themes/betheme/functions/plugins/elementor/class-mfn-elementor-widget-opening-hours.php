<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( class_exists( 'WPML_Elementor_Module_With_Items' ) )
{
	class Mfn_WPML_Elementor_Widget_Opening_Hours extends WPML_Elementor_Module_With_Items  {

		public function get_items_field() {
			return 'tabs';
		}

		public function get_fields() {
			return array( 'days', 'hours' );
		}

		protected function get_title( $field ) {
			switch( $field ) {
				case 'days':
					return esc_html__( 'Item days', 'sitepress' );
				case 'hours':
					return esc_html__( 'Item hours', 'sitepress' );
				default:
					return '';
			}
		}

		protected function get_editor_type( $field ) {
			switch( $field ) {
				case 'days':
				case 'hours':
					return 'LINE';
				default:
					return '';
			}
		}

	}
}

class Mfn_Elementor_Widget_Opening_Hours extends \Elementor\Widget_Base {

	/**
	 * Widget base constructor
	 */

	public function __construct( $data = [], $args = null ) {

		add_filter( 'wpml_elementor_widgets_to_translate', [ $this, 'wpml_widgets_to_translate_filter' ] );

		parent::__construct( $data, $args );
	}

	/**
	 * WPML compatibility
	 */

	public function wpml_widgets_to_translate_filter( $widgets ) {

	  $widgets[ $this->get_name() ] = [
			'conditions' => [
				'widgetType' => $this->get_name(),
			],
			'fields' => [
				[
					'field' => 'title',
					'type' => $this->get_title() .'<br />'. __( 'Title', 'mfn-opts' ),
					'editor_type' => 'LINE'
				],
			],
			'integration-class' => 'Mfn_WPML_Elementor_Widget_Opening_Hours',
	  ];

	  return $widgets;
	}

	/**
	 * Get widget name
	 */

	public function get_name() {
		return 'mfn_opening_hours';
	}

	/**
	 * Get widget title
	 */

	public function get_title() {
		return __( 'Be • Opening hours', 'mfn-opts' );
	}

	/**
	 * Get widget icon
	 */

	public function get_icon() {
		return 'far fa-clock';
	}

	/**
	 * Get widget categories
	 */

	public function get_categories() {
		return [ 'mfn_builder' ];
	}

	/**
	 * Register widget controls
	 */

	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'mfn-opts' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'mfn-opts' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'This is the heading', 'mfn-opts' ),
				'label_block' => true,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'days',
			[
				'label' => __( 'Days', 'mfn-opts' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Monday - Friday', 'mfn-opts' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'hours',
			[
				'label' => __( 'Hours', 'mfn-opts' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( '8am - 4pm', 'mfn-opts' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'tabs',
			[
				'label' => __( 'Items', 'mfn-opts' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'days' => __( 'Monday - Friday', 'mfn-opts' ),
						'hours' => '8am - 4pm',
					],
					[
						'days' => __( 'Saturday', 'mfn-opts' ),
						'hours' => '10am - 2pm',
					],
				],
				'title_field' => '{{{ days }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'adcanced_section',
			[
				'label' => __( 'Advanced', 'mfn-opts' ),
			]
		);

    $this->add_control(
			'image',
			[
				'label' => __( 'Background Image', 'mfn-opts' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
			]
		);

		$this->add_control(
			'content',
			[
				'label' => __( 'Additional content', 'mfn-opts' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render widget output on the frontend
	 */

	protected function render() {

		$settings = $this->get_settings_for_display();

		$settings['image'] = $settings['image']['url'];

		echo sc_opening_hours( $settings, $settings['content'] );

	}

}
