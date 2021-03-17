(function($) {

  /* globals jQuery */

  "use strict";

  var MfnFieldPreview = (function() {

    var preview = $('.mfn-item-preview .mfn-button');
    var condition = preview.closest('tbody').find('.condition');
    var text = preview.text();
    var systemFonts = [
      'Arial',
      'Georgia',
      'Tahoma',
      'Times',
      'Trebuchet',
      'Verdana'
    ];
    var font = {
      'family' : '',
      'style' : ''
    };

    /**
     * Padding
     */

    function padding( el ){

      var val = el.val(),
        key = el.data('key');

      // auto px

      if( val == parseInt(val, 10) ){
        val = val + 'px';
      }

      preview.css( 'padding-' + key , val );

    }

    /**
     * Font family
     */

    function fontFamily( el ){

      var val = el.val();

      if( -1 === $.inArray( val, systemFonts ) ){

        font['family'] = val;

        WebFont.load({
          google: {
            families: [font['family'] + ':400,' + font['style']],
            text: text
          }
        });

      } else {

        font['family'] = '';

      }

      preview.css( 'font-family', val );

    }

    /**
     * Font
     */

    function fontStyle( el ){

      var val = el.val(),
        key = el.data('key'),
        weight, style;

      // weight & style

      if( 'weight-style' == key ){

        font['style'] = val;

        preview.css( 'font-weight', val.replace('italic', '') );

        if( -1 === val.indexOf('italic') ){
          preview.css( 'font-style', 'normal' );
        } else {
          preview.css( 'font-style', 'italic' );
        }

        if( font['family'] ){
          WebFont.load({
            google: {
              families: [font['family'] + ':400,' + font['style']],
              text: text
            }
          });
        }

        return true;
      }

      // auto px

      if( val == parseInt(val, 10) ){
        val = val + 'px';
      }

      // line height

      if( 'font-size' == key ){
        preview.css( 'line-height', val );
      }

      preview.css( key, val );
    }

    /**
     * Color
     */

    function color( el, val ){

      var selector = "." + el.data('key');

      if( el.closest('tr').hasClass('highlighted') ){
        selector += "." + 'highlighted';
      }

      preview.filter( selector ).first().css( 'color', val );
    }

    /**
     * Background
     */

    function background( el, val ){

      var selector = "." + el.data('key');

      if( el.closest('tr').hasClass('highlighted') ){
        selector += "." + 'highlighted';
      }

      preview.filter( selector ).first().css( 'background-color', val );

    }

    /**
     * Border color
     */

    function borderColor( el, val ){

      var selector = "." + el.data('key');

      if( el.closest('tr').hasClass('highlighted') ){
        selector += "." + 'highlighted';
      }

      preview.filter( selector ).first().css( 'border-color', val );

    }

    /**
     * Border width
     */

    function borderWidth( el ){

      var val = el.val() + 'px';

      preview.css( 'border-width', val );

    }

    /**
     * Border radius
     */

    function borderRadius( el ){

      var val = el.val() + 'px';

      preview.css( 'border-radius', val );

    }

    /**
     * Attach events to buttons
     */

    function bind() {

      preview.on('click', function(e){
        e.preventDefault();
      })

      $('.preview-padding input').on('change', function() {
        padding( $(this) );
      });

      $('.preview-font-family select').on('change', function() {
        fontFamily( $(this) );
      });

      $('.preview-font input, .preview-font select').on('change', function(e) {
        fontStyle( $(this) );
      });

      $('.preview-color input').on('mfn:wpColorPicker:changed', function(e, value) {
        color( $(this), value );
      });

      $('.preview-color input').on('change', function(e, value) {
        color( $(this), $(this).val() );
      });

      $('.preview-background input').on('mfn:wpColorPicker:changed', function(e, value) {
        background( $(this), value );
      });

      $('.preview-background input').on('change', function(e, value) {
        background( $(this), $(this).val() );
      });

      $('.preview-border-width input').on('change', function() {
        borderWidth( $(this) );
      });

      $('.preview-border-color input').on('mfn:wpColorPicker:changed', function(e, value) {
        borderColor( $(this), value );
      });

      $('.preview-border-color input').on('change', function(e, value) {
        borderColor( $(this), $(this).val() );
      });

      $('.preview-border-radius input').on('change', function() {
        borderRadius( $(this) );
      });

    }

    /**
     * Preview state on document ready
     */

    function ready(){

      if( mfn_fonts ){
        systemFonts = systemFonts.concat( mfn_fonts );
      }

      $('.preview-padding input').trigger('change');
      $('.preview-font-family select').trigger('change');
      $('.preview-font input, .preview-font select').trigger('change');
      $('.preview-color input').trigger('change');
      $('.preview-background input').trigger('change');
      $('.preview-border-width input').trigger('change');
      $('.preview-border-color input').trigger('change');
      $('.preview-border-radius input').trigger('change');

      $( 'input', condition ).on('change', function(){
        custom();
      });

    }

    /**
     * Show/hide custom controls
     */

    function custom(){

      var val = $('input:checked', condition).val();

      if( 'custom' !== val ){
        condition.siblings('.custom').addClass('hidden');
        condition.siblings(':not(.custom)').removeClass('hidden');
      } else {
        condition.siblings('.custom').removeClass('hidden');
        condition.siblings(':not(.custom)').addClass('hidden');
      }

    }

    /**
     * Runs whole script.
     */

    function init() {
      bind();
      ready();
      custom();
    }

    /**
     * Return
     * Method to start the closure
     */

    return {
      init: init
    };

  })();

  /**
   * $(document).ready
   * Specify a function to execute when the DOM is fully loaded.
   */

  $(function() {
    MfnFieldPreview.init();
  });

})(jQuery);
