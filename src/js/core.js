;(function($){
  $(function(){
    var picker = new Pikaday({ field: document.getElementById('datepicker') });
    $(".time-input").timePicker({ show24Hours: false });

    $('body').on('click', '.more', function() {
      var menuHeight = $('.sub-category-menu-inner').outerHeight();
      $(this).toggleClass('closed').toggleClass('open');
      if ($(this).hasClass('closed')) {
        $('.sub-category-menu').css('height', menuHeight);
      } else {
        $('.sub-category-menu').css('height', 0);
      }
    }).on('click', '.nav-icon', function() {
      $(this).toggleClass('open');
      $('.mobile-menu-tags').toggleClass('menu-open');
      $('body').toggleClass('mobile-menu-open');
    });

    // ajax email
    $('.send-input').on('click', function(event) {
      event.preventDefault();
      var form = $('#contact-speaker');
      var message = $('#ajax-email-message');
      var speaker_name = $('.wrap-first-name').text()
      if (form.length) {
        $.ajax({
          type: "POST",
          url: form.attr('action'),
          data: form.serialize(),
          complete: function(data) {
            var res = data.responseText;
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
                .text('Thanks! Your message was successfully sent to '+speaker_name+'.')
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

    var next = function (page) {
      var path = window.location.pathname.replace(/page\/[0-9]+\//, '');
      path = (path !== '/') ? path : '';
      return path + '/page/' + page + '/?partial=true';
    }

    // ajax "show more"
    $(".next-page a").on("click", function(event) {
      event.preventDefault();
      var clicked = $(this);
      var page = parseInt(clicked.parent().data("page"));
      clicked.css('pointer-events', 'none');
      $.get(next(page), function(data) {
        var html = data.replace('<head/>','');
        $('.articles').append(html);
        clicked
          .parent()
          .data("page", page+1)
          .end()
          .css('pointer-events', 'auto');
        $.get(next(page+1)).fail(function() {
          clicked
            .parent()
            .hide();
        });
      });
    });

  });
}(jQuery));
