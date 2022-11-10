jQuery(function($) {
    // Bootstrap menu magic
    $(window).resize(function() {
      if ($(window).width() < 768) {
        $(".dropdown-toggle").attr('data-toggle', 'dropdown');
      } else {
        $(".dropdown-toggle").removeAttr('data-toggle dropdown');
      }
    });
  });

/*
  var counter = 0;
  jQuery(function($) {
    $(window).scroll(function() {
      console.log($(this).scrollTop());
      counter += $(this).scrollTop();
   // if ($(this).scrollTop() > 100) {
    if (counter < 99) {
       $('nav').stop().fadeOut(800); 
   } else {$('nav').stop().fadeIn(800);
    };
  });
});


*/

