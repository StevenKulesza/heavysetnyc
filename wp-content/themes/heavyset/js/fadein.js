var sticky = jQuery('.sticky'),
    stickyHeight = jQuery(sticky).outerHeight(),
    stickyTop = jQuery(sticky).offset().top,
    stickyBottom = stickyTop + stickyHeight;
    
jQuery(window).scroll(function(){
  var scrollTop = jQuery(window).scrollTop();
  
  if(scrollTop > stickyBottom){
    if(jQuery(sticky).is(':hidden')){
      jQuery(sticky).slideDown('slow');
    }
  }else{
    if(jQuery(sticky).is(':visible')){
      jQuery(sticky).fadeOut('fast');
    }
  }
});

jQuery(sticky).on('click', '.logo', function(){
  jQuery('html, body').animate({scrollTop: 0} ,'slow');
});