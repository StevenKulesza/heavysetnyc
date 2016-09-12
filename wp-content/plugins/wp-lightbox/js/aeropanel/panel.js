jQuery(document).ready(function($){

  $("ul.aeropaneltabs li").click(function(ev){
    $("ul.aeropaneltabs li").removeClass('active');
    $(this).toggleClass('active');
  
    $('.container .aerotab').hide();
    $('#tab_' + $("a", this).attr('href').replace("#", "").replace(" ","_")).fadeIn();

    ev.preventDefault();
  });

  $('form a.submit').click(function(evt){
    var href = $(this).attr('href');
    if ('#' != href) {
      $(this).parents('form').attr('action', href);
    }
    $(this).parents('form').get(0).submit();
    evt.preventDefault();
  });
  
});