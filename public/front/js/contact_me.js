$(function() {

  $("#contactForm input,#contactForm textarea").jqBootstrapValidation({
    submitError: function($form, event, errors) {
      // additional error messages or events
    },
    submitSuccess: function($form, event) {
        // get values from FORM
        var email = $("input#email").val();
        var question = $("textarea#question").val();

        $this = $("#sendMessageButton");
        $this.submit();
    }
  });

  $("a[data-toggle=\"tab\"]").click(function(e) {
    e.preventDefault();
    $(this).tab("show");
  });
});

/*When clicking on Full hide fail/success boxes */
$('#name').focus(function() {
  $('#success').html('');
});
