<?php
//
// Recommended way to include parent theme styles.
//  (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
//  
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
    
    if(
        ( $extra_theme = get_option( 'theme_mods_' . get_template() ) )
        && isset( $extra_theme[ 'nav_menu_locations' ] )
        && get_theme_mod('nav_menu_locations') != $extra_theme[ 'nav_menu_locations' ] )
    {
       set_theme_mod('nav_menu_locations', $extra_theme[ 'nav_menu_locations' ]);
    }
    
}
//
// Your code goes below
//