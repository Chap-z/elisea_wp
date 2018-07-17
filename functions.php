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
function register_shortcodes()
{
    add_shortcode('recent-posts', 'recent_posts_function');
}
add_action('init', 'register_shortcodes');

add_shortcode('elisea_fichier', 'display_custom_post_type');

function display_custom_post_type()
{
    $args = array(
        'post_type' => 'doc_medicale',
        'post_status' => 'publish',
        'orderby' => 'post_title',
        'order' => 'ASC',
        // 'posts_per_page' => '3'
    );

    $string = '';
    // $format_in = 'Ymd';
    // $format_out = 'd/m/Y';

    $query = new WP_Query($args);
    if ($query->have_posts()) {

        while ($query->have_posts()) {
            $query->the_post();
            $string .= '<div class="list">';
            $string .= '<figure class="DocPdf"><a href="' . get_field('fichier') . '"><img class="vignette" src="http://localhost/elisea/wp-content/uploads/2018/07/pdf_logo.png"><figcaption>' . get_field('nom_du_fichier') . '</figcaption></a></figure>';
            $string .= '</div>';
        }
    }
    wp_reset_postdata();
    return $string;
}

add_shortcode('elisea_soins', 'display_custom_post_type_soins');

function display_custom_post_type_soins()
{
    $args = array(
        'post_type' => 'soins',
        'post_status' => 'publish',
        'orderby' => 'post_title',
        'order' => 'ASC',
        // 'posts_per_page' => '3'
    );

    $string = '';
    // $format_in = 'Ymd';
    // $format_out = 'd/m/Y';

    $query = new WP_Query($args);
    if ($query->have_posts()) {

        while ($query->have_posts()) {
            $query->the_post();
            $string .= '<div class="list">';
            $value = get_field('image');
            $fichier = get_field('fichier');
            $video = get_field('video');
            if (!empty($value)) {
                echo '<figure class="soins"><a href="' . get_field('image') . '"><img class="photo" src="' . get_field('image') . '"><figcaption>' . get_field('nom_de_image') . '</figcaption></figure>';
            } elseif (!empty($fichier)) {
                echo '<figure class="soins"><a href="' . get_field('fichier') . '"><img class="vignette" src="http://localhost/elisea/wp-content/uploads/2018/07/pdf_logo.png"><figcaption>' . get_field('nom_du_fichier') . '</figcaption></figure>';
            } elseif (!empty($video)) {
                echo '<figure class="soins"><a href="' . get_field('video') . '"><video class="video" src="' . get_field('video') . '"></video><figcaption>' . get_field('nom_de_video') . '</figcaption></figure>';

            }
            $string .= '</div>';

        }
    }
    wp_reset_postdata();
    return $string;
}
add_shortcode('elisea_recettes', 'display_custom_post_type_recettes');

function display_custom_post_type_recettes()
{
    $args = array(
        'post_type' => 'recettes',
        'post_status' => 'publish',
        'orderby' => 'date',
        // 'posts_per_page' => '3'
    );

    $string = '';
    // $format_in = 'Ymd';
    // $format_out = 'd/m/Y';

    $query = new WP_Query($args);
    if ($query->have_posts()) {

        while ($query->have_posts()) {
            $query->the_post();
            $string .= '<div class="list">';

            $string .= '<figure class="recettes"><img src=""><figcaption>' . get_field('nom') . '</figcaption></figure>';
            $string .= '</div>';
        }
    }
    wp_reset_postdata();
    return $string;
}
