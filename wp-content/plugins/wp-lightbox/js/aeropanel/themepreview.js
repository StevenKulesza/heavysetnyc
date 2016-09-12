jQuery(document).ready(function($){
  
  $("select[name=lbe_theme]").change(function() {
    $(".theme_preview").hide();
    $(".theme_" + $(this).val()).fadeIn();
  }).each(function() {
    $(".theme_preview").hide();
    $(".theme_" + $(this).val()).fadeIn();
  });
  
});