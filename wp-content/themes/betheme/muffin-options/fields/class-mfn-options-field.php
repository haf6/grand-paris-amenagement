<?php
class Mfn_Options_field
{

	protected $field = [];
	protected $value = false;
	protected $prefix = false;

	/**
	 * Constructor
	 */

	public function __construct( $field, $value = false, $prefix = false )
	{
		$this->field = $field;
		$this->value = $value;
		$this->prefix = $prefix;
	}

  /**
   * Get input name
   * Builder uses field types: select, text, textarea, upload, tabs, icon
   */

  public function get_name( $meta = false, $key = false  ){

		$name = $this->field['id'];

		// theme options 'betheme[name]'

		if( ! $meta ){
			 $name = $this->prefix .'['. $name .']';
		}

		// field that returns array, i.e. "dimensions"

		if( $key ){
			$name = $name .'['. $key .']';
		}

		// prepare 'name="name"'

		$name = 'name="'. esc_attr( $name ) .'"';

		// builder new field 'data-name="name"'

		if( 'new' == $meta ) {
			$name = 'data-'. $name;
		}

    return $name;

  }

  /**
   * Get field bottom description
   */

  public function get_description(){

    if ( isset( $this->field['desc'] ) ) {
      echo '<span class="description">'. wp_kses( $this->field['desc'], mfn_allowed_html('desc') ) .'</span>';
    }

  }

}
