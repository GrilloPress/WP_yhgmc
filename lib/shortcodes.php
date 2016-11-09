<?php
//
// Shortcodes
//
// This file includes all of the shortcodes for the STHFT Theme



// Bootstrap media shortcodes
// 
// http://getbootstrap.com/components/#media


// Outer container for the media object and media body shortcodes
// 
// [media class="class_you_want_to_add"] other shortcodes in here [/media]
function boostrap_media( $atts, $content = null ) {
    $a = shortcode_atts( array(
      'class' => '',
      'id' => '',
    ), $atts );

    return "<div id='" . get_the_ID() . " " . esc_attr($a['id']) .  "' class='media " . esc_attr($a['class']) . "'>" . do_shortcode( wp_kses_post($content) ) ."</div>";
}
add_shortcode( 'media', 'boostrap_media' );


// Inner container for the image. Should replicate its own alignment. So if right aligned should be last element within media container
// 
// [media-object class="whatever" alignment="left right" valignment=" top middle bottom"][/media-object]
function boostrap_media_object( $atts, $content = null ) {
    $a = shortcode_atts( array(
      'class' => '',
      'alignment' => 'left',
      'valignment' => '',
      'id' => '',
    ), $atts );

    return "<div id='" . esc_attr($a['id']) .  "' class='media-" . esc_attr($a['alignment']) . " media-" . esc_attr($a['valignment']) .  " " . esc_attr($a['class']) . "'>" . wp_kses_post($content) ."</div>";
}
add_shortcode( 'media-object', 'boostrap_media_object' );


// Inner container for the title and body part of the media container.
//
// [media-body class="call_you_want_extra" title="this will be a header four media"][/media-body]
function boostrap_media_body( $atts, $content = null ) {
    $a = shortcode_atts( array(
      'class' => '',
      'title' => '',
      'id' => '',
    ), $atts );
  
  $bootstrap_media_body  = "<div ";
  $bootstrap_media_body .= "id='" . esc_attr($a['id']) . "' ";
  $bootstrap_media_body .= "class='media-body " . esc_attr($a['class']) . "'";
  $bootstrap_media_body .= ">"; // This closes the opening <div class="media-body"> div
  
  !empty( $a['title'] ) ? $bootstrap_media_body .= "<h4 class='media-heading'>" . esc_html( $a['title'] ) . "</h4>" :  $bootstrap_media_body .= "";
  
  $bootstrap_media_body .= wp_kses_post($content);
  $bootstrap_media_body .= " </div>";
  
  return $bootstrap_media_body;

  //   return "<div class='media-body " . esc_attr($a['class']) . "'>" . "<h4 class='media-heading'>" . esc_html( $a['title'] ) . "</h4>" . wp_kses_post($content) ."</div>";
}
add_shortcode( 'media-body', 'boostrap_media_body' );