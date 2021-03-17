(function($) {

  /* globals jQuery */

  "use strict";

  var MfnFieldDimensions = (function() {

    var field = $('.mfn-item-dimensions');

    /**
     * Change field values on keypress
     */

    function changeVal(el, key){

      var val = el.val();

      if( 38 == key.which ){
        val = parseInt( val ) + 1;
        el.val( val );
      }

      if( 40 == key.which ){
        val = parseInt( val ) - 1;
        el.val( val );
      }

      if( field.hasClass('isLinked') ){
        $('.disableable input',field).val( val );
      }

      $('.numeral', field).trigger('change');

    }

    /**
     * Link values
     */

    function link(el){

      var input = $('input', el);
      var val = $('input[data-key="top"]', field).val();

      if( 1 == input.val() ){

        input.val(0);
        field.removeClass('isLinked');

        $('.disableable input',field)
          .removeClass('readonly').removeAttr('readonly');

      } else {

        input.val(1);
        field.addClass('isLinked');

        $('.disableable input',field).val(val).trigger('change')
          .addClass('readonly').attr('readonly','readonly');

      }

    }

    /**
     * Attach events to buttons.
     */

    function bind() {

      $('.numeral', field).on('keyup', function(key) {
        changeVal($(this), key);
      });

      $('.link', field).on('click', function(key) {
        link($(this));
      });

    }

    /**
     * Runs whole script.
     */

    function init() {
      bind();
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
    MfnFieldDimensions.init();
  });

})(jQuery);
