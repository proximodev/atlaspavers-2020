<?php

/*
* Add your own functions here. You can also copy some of the theme functions into this file. 
* Wordpress will use those functions instead of the original functions then.
*/

add_action( 'wp_enqueue_scripts', 'av_dequeue_child_stylecss', 20 );
function av_dequeue_child_stylecss() {
    if(is_child_theme()){
        wp_dequeue_style( 'avia-style' );
    }
}

add_action( 'wp_enqueue_scripts', 'av_reenqueue_child_stylecss', 9999999 );
function av_reenqueue_child_stylecss() 
{
    if (is_child_theme()){
        wp_enqueue_style( 'avia-style', get_stylesheet_uri(), true, filemtime( get_stylesheet_directory() . '/style.css' ), 'all');
    }
}

add_action( 'init', 'enfold_customization_swtich_fonts' );
function enfold_customization_swtich_fonts() {
    global $avia;
    $avia->style->print_extra_output = false;
}

function add_customjs() {
   wp_enqueue_script( 'customjs', get_stylesheet_directory_uri().'/custom.js', array('jquery'), '2.2.6', true );
}
add_action( 'wp_enqueue_scripts', 'add_customjs', 100 );

function av_breadcrumbs_shortcode( $atts ) {
    return avia_breadcrumbs(array('separator' => '/', 'richsnippet' => true));
}

function myshortcode_title( ){
   return get_the_title();
}
add_shortcode( 'page_title', 'myshortcode_title' );

add_action( 'avia_before_footer_columns', function(){ dynamic_sidebar('footer_top'); });