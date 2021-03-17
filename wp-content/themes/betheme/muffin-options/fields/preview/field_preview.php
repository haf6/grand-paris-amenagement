<?php
class MFN_Options_preview extends Mfn_Options_field
{

  /**
	 * Constructor
	 */

	public function __construct( $field, $value = false, $prefix = false )
	{
    parent::__construct( $field, $value, $prefix );
	}

	/**
	 * Render
	 */

	public function render($meta = false)
	{
    echo '<div class="mfn-item-preview">';

			echo '<div class="item">';
				echo '<div class="inner">';
					echo '<a class="mfn-button default normal" data-label="Default" href="#">Button text</a>';
					echo '<a class="mfn-button default hover" data-label="Default" href="#">Button text</a>';
				echo '</div>';
			echo '</div>';

			echo '<div class="item">';
				echo '<div class="inner">';
					echo '<a class="mfn-button highlighted normal" data-label="Highlighted" href="#">Button text</a>';
					echo '<a class="mfn-button highlighted hover" data-label="Highlighted" href="#">Button text</a>';
				echo '</div>';
			echo '</div>';

    echo '</div>';

		$this->enqueue();
	}

	/**
	 * Enqueue Function.
	 */

	public function enqueue()
	{
		wp_enqueue_script('mfn-webfont', 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js', array('jquery'), false, true);

		wp_register_script('mfn-field-preview', MFN_OPTIONS_URI .'fields/preview/field_preview.js', array('jquery'), MFN_THEME_VERSION, true);

		$custom_fonts = mfn_fonts('custom');
		wp_localize_script( 'mfn-field-preview', 'mfn_fonts', $custom_fonts );

		wp_enqueue_script( 'mfn-field-preview' );
	}

}
