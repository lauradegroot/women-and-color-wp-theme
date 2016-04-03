// ==== CORE ==== //

// A simple wrapper for all your custom jQuery; everything in this file will be run on every page
;(function($){
  $(function(){
    // Example integration: JavaScript-based human-readable timestamps
    if ($.timeago) {
      $('time').timeago();
    }
  });

  $('body').on('click', '.more', function() {
    var menu_height = $('.sub-category-menu-inner').outerHeight()
    if ($(this).hasClass('closed')) {
      $(this).removeClass('closed').addClass('open');
      $('.sub-category-menu').css('height', menu_height);
    } else {
      $(this).removeClass('open').addClass('closed');
      $('.sub-category-menu').css('height', 0);
    }
  });

  $('body').on('click', '.nav-icon', function() {
    var mobile_menu = $('.mobile-menu-tags');
    $(this).toggleClass('open');
    mobile_menu.toggleClass('menu-open');
  });

}(jQuery));
