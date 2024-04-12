<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

        // Swiper.js library CSS
        wp_enqueue_style('child-theme-style', get_stylesheet_directory_uri() . '/assets/css/swiper-bundle.min.css');
        // Swiper.js library JavaScript
        wp_enqueue_script('child-theme-script', get_stylesheet_directory_uri() . '/assets/js/swiper-bundle.min.js', array('jquery'), '1.0', true);
        
}

// Get customizer options form parent theme
if ( get_stylesheet() !== get_template() ) {
    add_filter( 'pre_update_option_theme_mods_' . get_stylesheet(), function ( $value, $old_value ) {
        update_option( 'theme_mods_' . get_template(), $value );
        return $old_value; // prevent update to child theme mods
    }, 10, 2 );
    add_filter( 'pre_option_theme_mods_' . get_stylesheet(), function ( $default ) {
        return get_option( 'theme_mods_' . get_template(), $default );
    } );
}

