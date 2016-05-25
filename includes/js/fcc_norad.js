
jQuery(document).ready(function($) {
  $('.segment--show').click(function(){
    $(this).closest(".podcast--segment").find('.segment--description').slideToggle();
    $(this).find('.fa').toggleClass("fa-caret-down fa-caret-up");
  });

});
