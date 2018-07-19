<?php
/**
 * Page Section for our theme.
 *
 * @package ThemeGrill
 * @subpackage Ample
 * @since Ample 0.1
 *
 * * Template name: Mois
 */

get_header();

do_action('ample_before_body_content');?>

   <div class="single-page month clearfix">
      <div class="inner-wrap">
         <div id="primary">
            <div id="content">
                <div class="container">
                    <div class="row">
	                    <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;?>
                        <?php $loop = new WP_Query(array('post_type' => 'calendrier', 'posts_per_page' => 12, 'paged' => $paged));?>
                        <?php while ($loop->have_posts()): $loop->the_post();?>
                            <article class="month col-12 col-sm-3">
                                <?php
                                    $fichier = get_field('calendrier');
                                    if (!empty($fichier)) {
                                        echo '<figure class="month"><a href="' . get_field('calendrier') . '"><img class="vignette" src="' . get_stylesheet_directory_uri() . '/images/pdf_logo.png"><figcaption>' . get_field('nom_du_calendrier') . '</figcaption></a></figure>';
                                    }
                                    ?>
                            </article>
                        <?php endwhile;?>
                    </div>
                </div>
                <?php get_template_part('navigation', 'page');?>
            </div>
         </div>
      </div><!-- .inner-wrap -->
   </div><!-- .single-page -->
<?php

do_action('ample_after_post_content');

get_footer();?>

