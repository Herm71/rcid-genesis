$(window).load(function(){
      $('.flexslider').flexslider({
        maxItems: 1,
        animation: "slide",
        slideshowSpeed: 7000,
        animationSpeed: 2600,
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
