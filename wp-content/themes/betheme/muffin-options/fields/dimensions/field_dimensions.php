<?php
class MFN_Options_dimensions extends Mfn_Options_field
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
	}

	/**
	 * Render
	 */

	public function render($meta = false)
	{
    $inputs = [
      'top', 'right', 'bottom', 'left'
    ];

		$class = '';

		if( $this->value['isLinked'] ){
			$class = 'isLinked';
		}

		// output -----

    echo '<div class="mfn-item-dimensions '. $class .'">';

      foreach( $inputs as $input ){

				$readonly = false;
				$input_class = false;

				if( 'top' != $input ){

					$in_class = 'disableable';

					if( $class ){
						$readonly = 'readonly="readonly"';
						$input_class = 'readonly';
					}

				} else {

					$in_class = false;

				}

        echo '<span class="field '. esc_attr($in_class) .'" data-key="'. esc_attr($input) .'">';
        	echo '<input type="text" class="numeral '. esc_attr( $input_class ) .'" '. $this->get_name( $meta, $input ) .' data-key="'. esc_attr($input) .'" value="'. esc_attr($this->value[$input]) .'" '. $readonly .' autocomplete="off"/>';
        echo '</span>';
      }

			echo '<span class="link dashicons dashicons-admin-links"><input type="hidden" '. $this->get_name( $meta, 'isLinked' ) .' value="'. esc_attr($this->value['isLinked']) .'" autocomplete="off"/></span>';

      echo $this->get_description();

    echo '</div>';

		$this->enqueue();
	}

	/**
	 * Enqueue Function.
	 */

	public function enqueue()
	{
		wp_enqueue_script('mfn-field-dimensions', MFN_OPTIONS_URI .'fields/dimensions/field_dimensions.js', array('jquery'), MFN_THEME_VERSION, true);
	}

}
