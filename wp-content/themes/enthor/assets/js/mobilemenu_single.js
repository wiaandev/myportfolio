(function($) {
    
    $('.back-menu-wrap-offcanvas a').each(function(){
        var href = $(this).attr("href");
        if(href == "#"){
            $(this).addClass('hash');
        }else{
            $(this).removeClass('hash');
        }
    });

    $.fn.menumaker = function(options) {
      
      var back_mobile_menu_here_single = $(this), settings = $.extend({
        format: "dropdown",
        sticky: false
      }, options);

         return this.each(function() {
         back_mobile_menu_here_single.find('li ul').parent().addClass('has-sub');
         var multiTg = function() {
             back_mobile_menu_here_single.find(".has-sub").prepend('<span class="submenu-button"></span>');
             back_mobile_menu_here_single.find(".hash").parent().addClass('hash-has-sub');
             back_mobile_menu_here_single.find('.submenu-button').on('click', function() {
                 $(this).toggleClass('submenu-opened');
                 if ($(this).siblings('ul').hasClass('open-sub')) {
                     $(this).siblings('ul').removeClass('open-sub').hide('fadeIn');
                     $(this).siblings('ul').hide('fadeIn');                                     
                 }
                 else {
                     $(this).siblings('ul').addClass('open-sub').hide('fadeIn');
                     $(this).siblings('ul').slideToggle().show('fadeIn');
                 }
             });
         };

         if (settings.format === 'multitoggle') multiTg();
         else back_mobile_menu_here_single.addClass('dropdown');
         if (settings.sticky === true) back_mobile_menu_here_single.css('position', 'fixed');
        var resizeFix = function() {
             if ($( window ).width() > 991) {
                 back_mobile_menu_here_single.find('ul').show('fadeIn');
                 back_mobile_menu_here_single.find('ul.sub-menu').hide('fadeIn');
             }          
         };
         resizeFix();
         return $(window).on('resize', resizeFix);
         });
    };
})(jQuery);

(function($){
$(document).ready(function(){

$("#back_mobile_menu_here_single").menumaker({
   format: "multitoggle"
});

});
})(jQuery);
