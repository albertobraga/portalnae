(function($) {
  'use strict';

  var location = window.location;

  $(function() {
    $("#dataEnvio").val(new Date().toISOString());
  });

  $('.wpcf7-form').on('submit', function() {
    $.ajax({
      type: "POST",
      url: $('input[name="_wpcf7_urlhook"]').val(),
      data: $('.wpcf7-form input:visible').serialize(),
      success: function() {
        //window.location = location;
      }
    });

  });

})(jQuery);