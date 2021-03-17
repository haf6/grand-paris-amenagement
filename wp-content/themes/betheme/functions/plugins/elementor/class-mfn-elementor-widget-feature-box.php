<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Mfn_Elementor_Widget_Feature_Box extends \Elementor\Widget_Base {

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
				[
					'field' => 'content',
					'type' => $this->get_title() .'<br />'. __( 'Content', 'mfn-opts' ),
					'editor_type' => 'VISUAL'
			  ],
			  [
					'field' => 'link',
					'type' => $this->get_title() .'<br />'. __( 'Link', 'mfn-opts' ),
					'editor_type' => 'LINE'
			  ],
			],
	  ];

	  return $widgets;
	}

	/**
	 * Get widget name
	 */

	public function get_name() {
		return 'mfn_feature_box';
	}

	/**
	 * Get widget title
	 */

	public function get_title() {
		return __( 'Be • Feature box', 'mfn-opts' );
	}

	/**
	 * Get widget icon
	 */

	public function get_icon() {
		return 'eicon-featured-image';
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
			'image',
			[
				'label' => __( 'Image', 'mfn-opts' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
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

		$this->add_control(
			'content',
			[
				'label' => __( 'Content', 'mfn-opts' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
			]
		);

		$this->add_control(
			'background',
			[
				'label' => __( 'Background color', 'mfn-opts' ),
				'type' => \Elementor\Controls_Manager::COLOR,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'link_section',
			[
				'label' => __( 'Link', 'mfn-opts' ),
			]
		);

		$this->add_control(
			'link',
			[
				'label' => __( 'Link', 'mfn-opts' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'target',
			[
				'label' => __( 'Target', 'mfn-opts' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options'	=> array(
					0 => __('_self', 'mfn-opts'),
					1 => __('_blank', 'mfn-opts'),
				),
				'default' => 0,
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

		echo sc_feature_box( $settings, $settings['content'] );

	}

}
