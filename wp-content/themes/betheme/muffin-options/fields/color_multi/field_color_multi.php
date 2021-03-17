<?php
class MFN_Options_color_multi extends Mfn_Options_field
{

  /**
	 * Constructor
	 */

	public function __construct( $field, $value = false, $prefix = false )
	{
    parent::__construct( $field, $value, $prefix );

		if( ! is_array( $this->value ) ){
      $this->value = $field['std'];
    }

		foreach( $field['std'] as $s_key => $s_val ){
			if( empty( $this->value[$s_key] ) ){
				$this->value[$s_key] = $field['std'][$s_key];
			}
		}

		$this->enqueue();
	}

	/**
	 * Render
	 */

	public function render($meta = false)
	{
		if ( isset( $this->field[ 'alpha' ] ) ) {
			$alpha = 'data-alpha="true"';
		} else {
			$alpha = false;
		}

    echo '<div class="mfn-field-color multi">';

		foreach( $this->field['std'] as $s_key => $s_val ){

			echo '<div class="color-field" data-label="'. $s_key .'">';
				echo '<input type="text" class="has-colorpicker" id="'. esc_attr( $this->field['id'] ) .'['. $s_key .']" '. $this->get_name( $meta, $s_key ) .' value="'. esc_attr($this->value[$s_key]) .'" data-key="'. esc_attr( $s_key ) .'" '. $alpha .'/>';
			echo '</div>';

		}

    echo '</div>';
	}

	/**
	 * Enqueue
	 */

	public function enqueue()
	{
		// Add the color picker css file
		wp_enqueue_style('wp-color-picker');

		// Include our custom jQuery file with WordPress Color Picker dependency
		wp_enqueue_script('mfn-opts-field-color', MFN_OPTIONS_URI .'fields/color/field_color.js', array('wp-color-picker'), MFN_THEME_VERSION, true);
	}

}
