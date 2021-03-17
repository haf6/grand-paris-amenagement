<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class Mfn_Elementor_Widget_Quick_Fact extends \Elementor\Widget_Base {

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
					'field' => 'heading',
					'type' => $this->get_title() .'<br />'. __( 'Heading', 'mfn-opts' ),
					'editor_type' => 'LINE'
			  ],
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
					'field' => 'prefix',
					'type' => $this->get_title() .'<br />'. __( 'Prefix', 'mfn-opts' ),
					'editor_type' => 'LINE'
			  ],
			  [
					'field' => 'label',
					'type' => $this->get_title() .'<br />'. __( 'Postfix', 'mfn-opts' ),
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
		return 'mfn_quick_fact';
	}

	/**
	 * Get widget title
	 */

	public function get_title() {
		return __( 'Be • Quick fact', 'mfn-opts' );
	}

	/**
	 * Get widget icon
	 */

	public function get_icon() {
		return 'far fa-lightbulb';
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
			'heading',
			[
				'label' => __( 'Heading', 'mfn-opts' ),
				'default' => __( 'This is the heading', 'mfn-opts' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

    $this->add_control(
			'title',
			[
				'label' => __( 'Title', 'mfn-opts' ),
				'default' => __( 'This is the title', 'mfn-opts' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

    $this->add_control(
      'content',
      [
        'label' => __( 'Content', 'mfn-opts' ),
        'type' => \Elementor\Controls_Manager::WYSIWYG,
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.',
      ]
    );

    $this->end_controls_section();

    $this->start_controls_section(
      'fact_section',
      [
        'label' => __( 'Quick fact', 'mfn-opts' ),
      ]
    );

    $this->add_control(
			'prefix',
			[
				'label' => __( 'Prefix', 'mfn-opts' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

    $this->add_control(
			'number',
			[
				'label' => __( 'Number', 'mfn-opts' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
        'default' => 99,
			]
		);

    $this->add_control(
			'label',
			[
				'label' => __( 'Postfix', 'mfn-opts' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'options_section',
			[
				'label' => __( 'Options', 'mfn-opts' ),
			]
		);

		$this->add_control(
			'align',
			[
				'label' => __( 'Align', 'mfn-opts' ),
				'type' => \Elementor\Controls_Manager::SELECT,
        'options' 	=> array(
          ''			=> __('Center', 'mfn-opts'),
          'left'		=> __('Left', 'mfn-opts'),
          'right'		=> __('Right', 'mfn-opts'),
        ),
				'default' => '',
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render widget output on the frontend
	 */

	protected function render() {

		$settings = $this->get_settings_for_display();

		echo sc_quick_fact( $settings, $settings['content'] );

	}

}
