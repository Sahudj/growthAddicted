
// loader js
$(window).on('load', function(){
  setTimeout(function() {
      $('body').addClass('site_loaded');	
  }, 500);
});
function customRadio(radioName) {
  var radioButton = $('input[name="' + radioName + '"]');
  $(radioButton).each(function () {
      $(this).wrap("<span class='custom-radio'></span>");
      if ($(this).is(':checked')) {
          $(this).parent().addClass("selected");
      }
  });
  $(radioButton).click(function () {
      if ($(this).is(':checked')) {
          $(this).parent().addClass("selected");
      }
      $(radioButton).not(this).each(function () {
          $(this).parent().removeClass("selected");
      });
  });
  }
  $(document).ready(function () {          
    customRadio("package");
    })

// $(document).ready(function() {
//     $('input[type="radio"]').click(function() {
//         var inputValue = $(this).attr("value");
//         var targetBox = $("." + inputValue);
//         $(".sign-radio-price").not(targetBox).hide();
//         $(targetBox).show();

//     });
// });
