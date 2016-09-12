<?PHP
  $myplugin['shortname']  = "lbe";
  $myplugin['type']       = "Plugin";
  $myplugin['options']    = 
  array(

    array( "type" => "subpage", "name" => "General", "tabs" => array(

      array( "type" => "tab", "name" => "Main", "options" => array(
        
        array( "type" => "html", "value" => "<p><strong>Lightbox Evolution</strong> is a tool for displaying images, html content, maps, and videos in a lightbox style that floats overtop of web page. Using Lightbox Evolution, website authors can showcase a wide assortment of media in all major browsers without navigating users away from the linking page.</p>"),

        array( "type" => "section", "name" => "Background Overlay", "options" => array(
          array(
            "id"      => "background",
            "label"   => "Background",
            "type"    => "select",
            "options" => array("White"=>"#FFFFFF", "Black"=>"#000000"),
            "default" => "#000000",
            "help"    => ""
          ),
          
          array(
            "id"      => "background_custom",
            "label"   => "Custom Color (optional)",
            "type"    => "text",
            "default" => "",
            "maxsize" => 6,
            "help"    => ""
          ),

          array(
            "id"      => "modal",
            "label"   => "Modal",
            "type"    => "select",
            "options" => array("Yes"=>1, "No"=>0),
            "default" => false,
            "help"    => ''
          ),
          
          array(
            "id"      => "background_opacity",
            "label"   => "Opacity (From 0 to 1)",
            "type"    => "text",
            "default" => "0.6",
            "help"    => ""
          ),

        )),
        
        array( "type" => "section", "name" => "Display Options", "options" => array(
          array(
            "id"      => "emergefrom",
            "label"   => "Emerge from",
            "type"    => "select",
            "options" => array("Top"=>"top", "Bottom"=>"bottom"),
            "default" => "top",
            "help"    => ''
          ),
          array(
            "id"      => "moveduration",
            "label"   => "Move Duration (ms)",
            "type"    => "text",
            "default" => "800",
            "help"    => ""
          ),
          array(
            "id"      => "animationeasing",
            "label"   => "Animation",
            "type"    => "select",
            "options" => array("Yes"=>1, "No"=>0),
            "default" => true,
            "help"    => ""
          ),
          array(
            "id"      => "autoresize",
            "label"   => "Auto Resize Images",
            "type"    => "select",
            "options" => array("Yes"=>1, "No"=>0),
            "default" => true,
            "help"    => ''
          ),
        )),

        array( "type" => "section", "name" => "Auto Lightboxing", "options" => array(
          array(
            "id"      => "autolightboxing",
            "label"   => "Automatically add the lightbox to images and videos linked in a post",
            "type"    => "select",
            "options" => array("Both"=>3, "Images Only"=>2, "Videos Only"=>1, "None"=>0),
            "default" => 3,
            "help"    => ""
          ),

          array(
            "id"      => "autogroup",
            "label"   => "Auto group images in the same post",
            "type"    => "select",
            "options" => array("Yes"=>1, "No"=>0),
            "default" => false,
            "help"    => ''
          ),

        )),


      )),

      array( "type" => "tab", "name" => "Themes", "options" => array(

        array( "type" => "section", "name" => "Themes Availables", "options" => array(
          array(
            "id"      => "theme",
            "label"   => "Select Theme",
            "type"    => "select",
            "options" => array("Default"=>"default", "White-Green"=>"white-green", "Carbono"=>"carbono", "Classic"=>"classic", "Classic-Dark"=>"classic-dark", "Minimalist"=>"minimalist", "Minimalist-Dark"=>"minimalist-dark", "Evolution"=>"evolution", "Evolution-Dark"=>"evolution-dark", "Facebook"=>"facebook"),
            "default" => "default",
            "help"    => ''
          ),
        )),
        array( "type" => "section", "name" => "Theme Preview", "options" => array(
          array( "type" => "html", "value" => '<p>
            <img class="theme_preview theme_default" src="'.lbe_plugin_aeropanel::path(__FILE__).'/images/theme_default.jpg" alt=""/>
            <img class="theme_preview theme_white-green" src="'.lbe_plugin_aeropanel::path(__FILE__).'/images/theme_white-green.jpg" alt=""/>
            <img class="theme_preview theme_carbono" src="'.lbe_plugin_aeropanel::path(__FILE__).'/images/theme_carbono.jpg" alt=""/>
            <img class="theme_preview theme_classic" src="'.lbe_plugin_aeropanel::path(__FILE__).'/images/theme_classic.jpg" alt=""/>
            <img class="theme_preview theme_classic-dark" src="'.lbe_plugin_aeropanel::path(__FILE__).'/images/theme_classic-dark.jpg" alt=""/>
            <img class="theme_preview theme_minimalist" src="'.lbe_plugin_aeropanel::path(__FILE__).'/images/theme_minimalist.jpg" alt=""/>
            <img class="theme_preview theme_minimalist-dark" src="'.lbe_plugin_aeropanel::path(__FILE__).'/images/theme_minimalist-dark.jpg" alt=""/>
            <img class="theme_preview theme_evolution" src="'.lbe_plugin_aeropanel::path(__FILE__).'/images/theme_evolution.jpg" alt=""/>
            <img class="theme_preview theme_evolution-dark" src="'.lbe_plugin_aeropanel::path(__FILE__).'/images/theme_evolution-dark.jpg" alt=""/>
            <img class="theme_preview theme_facebook" src="'.lbe_plugin_aeropanel::path(__FILE__).'/images/theme_facebook.jpg" alt=""/>
          </p>'),
        )),
      
      )),


      array( "type" => "tab", "name" => "Advanced Options", "options" => array(

        array( "type" => "html", "value" => "<p>Changing these advanced settings can be harmful to the stability and performance of this plugin. You should only continue if you are sure of what you are doing.</p>"),

        array( "type" => "section", "name" => "Default Video Size", "options" => array(
          array(
            "id"      => "default_width",
            "label"   => "Width (px)",
            "type"    => "text",
            "default" => "",
            "help"    => ""
          ),
          array(
            "id"      => "default_height",
            "label"   => "Height (px)",
            "type"    => "text",
            "default" => "",
            "help"    => ""
          ),
        )),

        array( "type" => "section", "name" => "Exec", "options" => array(
          array(
            "id"      => "exec",
            "label"   => "Code",
            "type"    => "textarea",
            "default" => "",
            "help"    => ""
          ),
          array(
            "id"      => "adv_options",
            "label"   => "Advanced Options",
            "type"    => "textarea",
            "default" => "",
            "help"    => ""
          ),
        )),

        array( "type" => "section", "name" => "WordPress Options", "options" => array(

          array(
            "id"      => "autogallery",
            "label"   => "Overwrite WordPress Gallery",
            "type"    => "select",
            "options" => array("Yes"=>1, "No"=>0),
            "default" => 1,
            "help"    => ''
          ),

          array(
            "id"      => "default_class",
            "label"   => "Default Class Name",
            "type"    => "text",
            "default" => ".lightbox, .evolution",
            "help"    => ""
          ),

          array(
            "id"      => "shortcode",
            "label"   => "Active Shortcode",
            "type"    => "select",
            "options" => array("[lightbox]"=>"lightbox", "[evolution]"=>"evolution"),
            "default" => "lightbox",
            "help"    => ''
          ),

          array(
            "id"      => "jquery",
            "label"   => "jQuery version to load:",
            "type"    => "select",
            "options" => array("WordPress"=>0, "1.6.4"=>"1.6.4", "1.7.2"=>"1.7.2", "1.8.3"=>"1.8.3", "1.9.1"=>"1.9.1", "1.10.2"=>"1.10.2"),
            "default" => "1.8.3",
            "help"    => ''
          ),

        )),



      
      ))


    )),
    array( "type" => "subpage", "name" => "Help", "dontsave" => true, "tabs" => array(
      array( "type" => "tab", "name" => "Main", "options" => array(
          array( "type" => "help", "value" => "help/index.html" ),
      )),

      array( "type" => "tab", "name" => "Shortcodes", "options" => array(
          array( "type" => "help", "value" => "help/shortcodes.html" ),
      )),
    )) 
  );

  $lbe_panel = new lbe_plugin_aeropanel($myplugin);

?>