<?php
/**
 ** activation theme
 **/

/* Add bootstrap support to the Wordpress theme*/
// Load translation files from your child theme instead of the parent theme
function my_child_theme_locale()
{
    load_child_theme_textdomain('ample', get_stylesheet_directory() . '/languages');
}
add_action('after_setup_theme', 'my_child_theme_locale');

function theme_add_bootstrap()
{
    wp_enqueue_style('bootstrap-css', get_stylesheet_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '4.0.0', true);
}

add_action('wp_enqueue_scripts', 'theme_add_bootstrap');

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}

function posts_intervenants_function()
{
    query_posts(array('orderby' => 'date', 'order' => 'DESC', 'showposts' => 1));
    if (have_posts()):
        while (have_posts()): the_post();
            $return_string = '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
        endwhile;
    endif;
    wp_reset_query();
    return $return_string;
}

function recent_posts_function()
{
    query_posts(array('orderby' => 'date', 'order' => 'DESC', 'showposts' => 1));
    if (have_posts()):
        while (have_posts()): the_post();
            $return_string = '<a href="' . get_permalink() . '">' . get_the_title() . '</a>';
        endwhile;
    endif;
    wp_reset_query();
    return $return_string;
}
