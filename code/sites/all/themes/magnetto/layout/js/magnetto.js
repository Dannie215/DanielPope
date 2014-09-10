(function($) {
  Drupal.behaviors.magnetto = {
    attach: function(context, settings) {
      /*$('.example', context).click(function() {
       $(this).next('ul').toggle('show');
       });*/
      $('.blog-grid').ajaxSuccess(function() {
       
        
        // recall to html5 player
        jQuery('audio').mediaelementplayer({
          audioWidth: '100%',
          audioHeight: 30,
          features: ['playpause', 'current', 'progress', 'duration', 'volume']
        });

        // recall to flexslider 
        $('.flexslider').flexslider({
          animation: 'slide',
          controlNav: false,
          directionNav: true,
          animationLoop: true,
          slideshow: false,
          useCSS: true
        });
        
         init_blog();
        
      });
    }
  };

})(jQuery);