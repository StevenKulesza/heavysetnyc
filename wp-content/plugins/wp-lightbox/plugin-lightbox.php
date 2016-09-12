<?PHP
/*
  Plugin Name: Lightbox Evolution
  Plugin URI: http://codecanyon.net/item/lightbox-evolution-for-wordpress/119478
  Description: <strong>Lightbox Evolution</strong> is a tool for displaying images, html content, maps, and videos in a "lightbox" style that floats overtop of web page. Using Lightbox Evolution, website authors can showcase a wide assortment of media in all major browsers without navigating users away from the linking page.
  Version: 1.8.0
  Author: Eduardo Daniel Sada
  Author URI: http://codecanyon.net/user/aeroalquimia/portfolio
*/

$myplugin = array();  
$myplugin['file'] = __FILE__;

include("classes/aeropanel.php");
include("panel-config.php");    

$lbe_panel->queue($lbe_panel->path() . "/js/aeropanel/themepreview.js", "script");

function lbe_myplugin_lightbox($content)
{
  global $post, $lbe_panel;

  $shortcode       = $lbe_panel->get_option('shortcode');
  $autolightboxing = (int) $lbe_panel->get_option('autolightboxing');
  $autogroup       = (bool) $lbe_panel->get_option('autogroup') ? 'rel=\"gallery-'.$post->ID.'\"' : '';

  if ($autolightboxing==3 || $autolightboxing==2)
  {
/*
    $pattern['search']  = '/(<a(.*?)href="([^"]*.)(jpg|jpeg|png|gif|tiff|bmp|swf)"(.*?)>)/ie';
*/
    $pattern['search']  = '/(?><a([^>]*?)href=)[\"\\\']((?:[^>]*?)\.(?:jpg|jpeg|png|gif|bmp|swf)+?)[\"\\\']([^>]*)>/ie';

/*
    $pattern['replace'] = 'stripslashes(strstr("\2\5","class=") ? "\1" : "<a\2href=\"\3\4\"\5 class=\"lightbox\" '.$autogroup.'>")';
*/
    $pattern['replace'] = 'stripslashes(strstr("\1\3", "class=") ? "\0" : "<a\1href=\"\2\"\3 class=\"'.$shortcode.'\" '.$autogroup.'>")';
    
    $content = preg_replace($pattern['search'], $pattern['replace'], $content);
  }

  if ($autolightboxing==3 || $autolightboxing==1)
  {
    $videoregs['yoube']         = "youtu\.be\/";
    $videoregs['youtube']       = "youtube\.com\/watch";
    $videoregs['vimeo']         = "vimeo\.com\/";
    $videoregs['metacafe']      = "metacafe\.com\/watch";
    $videoregs['dailymotion']   = "dailymotion\.com\/video";
    $videoregs['collegehumor']  = "collegehumor\.com\/video";
    $videoregs['ustream']       = "ustream\.tv";
    $videoregs['twitvid']       = "twitvid\.com\/";
    $videoregs['wordpress']     = "v\.wordpress\.com";
    $videoregs['vzaar']         = "vzaar\.com\/videos";

    $video_options = implode("|", $videoregs);

    $pattern['search']  = '/(?><a([^>]*?)href=)[\\"\\\']((?:http[s]?:\\/\\/(?:w{3}\\.)?(?:'.$video_options.')+?[^>]*?))[\\"\\\']([^>]*)>/ie';

    // $pattern['replace'] = 'stripslashes(strstr("\1\3","class=") ? "\0" : "<a\1href=\"\2\"\3 class=\"lightbox\">")';
    $pattern['replace'] = 'strstr("\1\3", "class=") ? "\0" : "<a\1href=\"\2\"\3 class=\"'.$shortcode.'\">"';

    $content = preg_replace($pattern['search'], $pattern['replace'], $content);
  }
  
  return $content;
}
add_filter('the_content', 'lbe_myplugin_lightbox', 12);


function lbe_myplugin_lightbox_wp_print_styles()
{
  global $lbe_panel;
  echo '

<link rel="stylesheet" href="'.$lbe_panel->path().'/js/lightbox/themes/'.$lbe_panel->get_option('theme').'/jquery.lightbox.css" type="text/css" media="all"/>
<!--[if IE 6]>
<link rel="stylesheet" href="'.$lbe_panel->path().'/js/lightbox/themes/'.$lbe_panel->get_option('theme').'/jquery.lightbox.ie6.css" type="text/css" media="all"/>
<![endif]-->

<style type="text/css">
.jquery-lightbox-overlay
{
  background: '.($lbe_panel->get_option('background_custom') ? '#'.$lbe_panel->get_option('background_custom') : $lbe_panel->get_option('background')).';
}
</style>

';
}
add_action('wp_print_styles', 'lbe_myplugin_lightbox_wp_print_styles', 1);

function lbe_myplugin_lightbox_wp_enqueue_script()
{
  global $lbe_panel;

  $jqueryVersion = $lbe_panel->get_option('jquery');

  if ($jqueryVersion)
  {
    wp_deregister_script('jquery');
    wp_register_script('jquery', $lbe_panel->path().'/js/jquery-'.$jqueryVersion.'.min.js', false, $jqueryVersion);
  }

  wp_enqueue_script('jquery');
}
add_action('wp_head', 'lbe_myplugin_lightbox_wp_enqueue_script', 1);



function lbe_myplugin_lightbox_footer()
{
  global $lbe_panel;

  $exec = trim($lbe_panel->get_option('exec'));
  $adv_options = trim($lbe_panel->get_option('adv_options'));

  $flash = '';
  if ($lbe_panel->get_option('default_width') || $lbe_panel->get_option('default_height'))
  {
    $flash = '$.lightbox().options.iframe = $.extend($.lightbox().options.flash, {';
    
    if ($lbe_panel->get_option('default_width'))
    {
      $flash .= 'width: '.(int)$lbe_panel->get_option('default_width').',';
    }
    if ($lbe_panel->get_option('default_height'))
    {
      $flash .= 'height: '.(int)$lbe_panel->get_option('default_height').',';
    }
    $flash .= 'custom: 1';

    $flash .= '});';
  }

  echo '
<script type="text/javascript" src="'.$lbe_panel->path().'/js/lightbox/jquery.lightbox.min.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function($){
    '.$flash.'
    $.lightbox().overlay.options.style.opacity = '.(float)$lbe_panel->get_option('background_opacity').';
    $.extend(true, $.lightbox().options, {
      emergefrom : "'.$lbe_panel->get_option('emergefrom').'",
      animation  : {
        move: {
          duration: '.(int)$lbe_panel->get_option('moveduration').
          ((bool)$lbe_panel->get_option('animationeasing')?'':',easing: "swing"').'
        }
      }
    });

    '.$exec.'
    
    $("'.($lbe_panel->get_option('default_class') ? $lbe_panel->get_option('default_class') : ".lightbox, .evolution").'").lightbox({
      '.$adv_options.'
      modal       : '.(int)$lbe_panel->get_option('modal').',
      autoresize  : '.(int)$lbe_panel->get_option('autoresize').'
    });
  });
</script>
';
}
add_action('wp_footer', 'lbe_myplugin_lightbox_footer');



/*!
 * Gallery Shortcode
 * wp-includes/media.php
 */

function lbe_gallery_shortcode($output, $attr)
{
  $post = get_post();

  static $instance = 0;
  $instance++;

  // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
  if ( isset( $attr['orderby'] ) ) {
    $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
    if ( !$attr['orderby'] )
      unset( $attr['orderby'] );
  }
  
  extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'thumbnail',
		'include'    => '',
		'exclude'    => ''
  ), $attr));

  $id = intval($id);
  if ( 'RAND' == $order )
    $orderby = 'none';

  if ( !empty($include) ) {
    $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

    $attachments = array();
    foreach ( $_attachments as $key => $val ) {
      $attachments[$val->ID] = $_attachments[$key];
    }
  } elseif ( !empty($exclude) ) {
    $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
  } else {
    $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
  }

  if ( empty($attachments) )
    return '';

  if ( is_feed() ) {
    $output = "\n";
    foreach ( $attachments as $att_id => $attachment )
      $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
    return $output;
  }

  $itemtag    = tag_escape($itemtag);
  $captiontag = tag_escape($captiontag);
  $columns    = intval($columns);
  $itemwidth  = $columns > 0 ? floor(100/$columns) : 100;
	$float      = is_rtl() ? 'right' : 'left';

	$selector = "gallery-{$instance}";

  $gallery_style = $gallery_div = '';
  if ( apply_filters( 'use_default_gallery_style', true ) )
    $gallery_style = "
    <style type='text/css'>
      #{$selector} {
        margin: auto;
      }
      #{$selector} .gallery-item {
        float: {$float};
        margin-top: 10px;
        text-align: center;
        width: {$itemwidth}%;
      }
      #{$selector} img {
        border: 2px solid #cfcfcf;
      }
      #{$selector} .gallery-caption {
        margin-left: 0;
      }
    </style>
    <!-- see lbe_gallery_shortcode() in wp-content/plugins/wp-lightbox/plugin-lightbox.php -->";
  $size_class = sanitize_html_class( $size );
  $gallery_div = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
  $output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

	$i = 0;
  foreach ( $attachments as $id => $attachment ) {
    //$link = wp_get_attachment_link($id);
    
    $attachment_meta = get_post_meta($id, '_lbe-image-link', true);
    $a_img = ($attachment_meta) ? $attachment_meta : wp_get_attachment_url($id);

    // Attachment page ID
    // $att_page = get_attachment_link($id);

    // Returns array
    $img = wp_get_attachment_image_src($id, $size);    
    
    $title = trim($attachment->post_excerpt) ? wptexturize($attachment->post_excerpt) : $attachment->post_title;

    $output .= "<{$itemtag} class='gallery-item'>";
    $output .= "
      <{$icontag} class='gallery-icon'>
          <a href=\"{$a_img}\" title=\"{$title}\" rel=\"{$selector}\" class=\"lightbox evolution\">
          <img src=\"{$img[0]}\" width=\"{$img[1]}\" height=\"{$img[2]}\" alt=\"{$title}\" />
          </a>
      </{$icontag}>";
		if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= "
				<{$captiontag} class='wp-caption-text gallery-caption'>
				" . wptexturize($attachment->post_excerpt) . "
				</{$captiontag}>";
		}
    
    $output .= "</{$itemtag}>";
    if ( $columns > 0 && ++$i % $columns == 0 )
      $output .= '<br style="clear: both" />';
  }

  $output .= "
      <br style='clear: both;' />
    </div>\n";

  return $output;
}

function lbe_image_attachment_fields_to_edit($form_fields, $post)
{
  $form_fields["lbe-image-link"] = array(
    "label" => __("Custom Link"),
    "input" => "text", // default
    "value" => get_post_meta($post->ID, "_lbe-image-link", true),
    "helps" => "Note: This only works in the gallery mode. Lightbox Evolution is configured to overwrite this gallery."
  );
  return $form_fields;
}

function lbe_image_attachment_fields_to_save($post, $attachment)
{
  if ( isset($attachment['lbe-image-link']) )
  {
    update_post_meta($post['ID'], '_lbe-image-link', $attachment['lbe-image-link']);
  }

  return $post;
}

if ((bool) $lbe_panel->get_option('autogallery'))
{
  add_filter("post_gallery", "lbe_gallery_shortcode", 1, 2);
  add_filter("attachment_fields_to_edit", "lbe_image_attachment_fields_to_edit", 10, 2);
  add_filter("attachment_fields_to_save", "lbe_image_attachment_fields_to_save", 10, 2);
}

function lbe_lightbox_shortcode($atts, $content = null)
{
  $options    = array();
  $prop_rel   = "";
  $prop_class = "";
  $prop_href  = "";
  
  foreach ((array)$atts as $key=>$option)
  {
    if ($key != 'href' && $key != 'rel')
    {
      $options["lightbox[$key]"] = $option;
    }
  }

  if (isset($atts['rel']))
  {
    $prop_rel = ' rel="'.$atts['rel'].'" ';
  }

  if (isset($atts['href']))
  {
    $prop_href = ' href="'.add_query_arg($options, do_shortcode($atts['href'])).'" ';
  }

  $prop_class = ' class="lightbox evolution" ';
  
  $content = do_shortcode($content);
  
  return '<a '.$prop_href.$prop_class.$prop_rel.'>'.$content.'</a>';
}
add_shortcode($lbe_panel->get_option('shortcode'), "lbe_lightbox_shortcode");
?>