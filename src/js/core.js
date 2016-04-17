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
    var body = $('body');
    var link_wrap= $('.mobile-menu-tags-wrap p');
    var tagAll = $('.tag-all');

    $(this).toggleClass('open');
    mobile_menu.toggleClass('menu-open');
    body.toggleClass('mobile-menu-open');
    if (body.hasClass("home")) {
      tagAll.addClass('current-tag');
    } else {
      link_wrap.each(
        function(i) {
          var classes = this.classList;
          for (var i=0,len=classes.length; i<len; i++){
            if ($('body').hasClass(classes[i])){
                $(this).addClass('current-tag');
            }
          }
      });
    }
  });

}(jQuery));
