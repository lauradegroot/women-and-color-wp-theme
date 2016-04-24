;(function($){
  $(function(){
    var picker = new Pikaday({ field: document.getElementById('datepicker') });
    $(".time-input").timePicker({ show24Hours: false });

    $('body').on('click', '.more', function() {
      var menuHeight = $('.sub-category-menu-inner').outerHeight();
      if ($(this).hasClass('closed')) {
        $(this).removeClass('closed').addClass('open');
        $('.sub-category-menu').css('height', menuHeight);
      } else {
        $(this).removeClass('open').addClass('closed');
        $('.sub-category-menu').css('height', 0);
      }
    }).on('click', '.nav-icon', function() {
      var body = $('body');
      var mobileMenu = $('.mobile-menu-tags');
      $(this).toggleClass('open');
      mobileMenu.toggleClass('menu-open');
      body.toggleClass('mobile-menu-open');
    });

    // ajax email
    $('.send-input').on('click', function(event) {
      event.preventDefault();
      var form = $('#contact-speaker');
      var message = $('#ajax-email-message');
      if (form.length) {
        $.ajax({
          type: "POST",
          url: form.attr('action'),
          data: form.serialize(),
          complete: function(data) {
            var res = data.responseText
            if (res === 'bail') {
              message
                .text('Please fill out the required fields')
                .show()
                .attr('class', 'error');
              form
                .find('[name="name"], [name="email"], [name="organization"]')
                .css('border-bottom-color', '#F36363');
            } else if (res === 'success') {
              form.hide();
              message
                .text('Your message has been sent, thank you!')
                .show()
                .attr('class', 'success');
            } else {
              message
                .text('error!')
                .show()
                .attr('class', 'error');
            }
          }
        });
      }
    });

    var setActiveTags = function () {
      var body = $('body');
      var linkWrap= $('.tags-wrap p');
      var tagAll = $('.tag-all');
      if (body.hasClass("home")) {
        tagAll.addClass('current-tag');
      } else {
        linkWrap.each(
          function(i) {
            var classes = this.classList;
            for (var j=0,len=classes.length; j<len; j++){
              if ($('body').hasClass(classes[j])){
                  $(this).addClass('current-tag');
              }
            }
        });
      }
    };

    setActiveTags();

    // ajax "show more"
    if (window.location.pathname === '/' ) {
      var link = $(".next-page a");
      link.data("page", "2");
      link.on("click", function(event) {
        event.preventDefault();
        var clicked = $(this);
        var page = parseInt(clicked.data("page"));
        $.get('/page/' + page + '/?partial=true', function(data) {
          var html = data.replace('<head/>','');
          $('.articles').append(html);
          clicked.data("page", page+1);
        });
      });
    }

  });
}(jQuery));
