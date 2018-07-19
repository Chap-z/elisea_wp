<?php
/**
 * Theme liste partenaires Section for our theme.
 *
 * @package ThemeGrill
 * @subpackage Ample
 * @since Ample 0.1
 *
 * Template name: Partenaires
 */

get_header();

do_action('ample_before_body_content');?>

   <div class="single-page liste-partenaires clearfix">
        <div class="inner-wrap">
            <div class="container">
                <div class="row">
					<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;?>
					<?php $loop = new WP_Query(array('post_type' => 'calendrier', 'posts_per_page' => 12, 'paged' => $paged));?>
                    <?php while ($loop->have_posts()): $loop->the_post();?>
                        <article class="partenaire col-12 col-sm-3">
                            <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail();
                                } else {
                                    echo '<img src="' . get_stylesheet_directory_uri() . '/images/icone_img.png" alt="" />';
                                }?>
                            <?php the_title('<h2 class="entry-title">'.the_title_attribute('echo=0').'</a></h2>');?>

                            <div class="entry-content">
                                <?php the_content();?>
                            </div>
                        </article>
                    <?php endwhile;?>
                </div>
            </div>      
            <?php get_template_part('navigation', 'page');?>

        </div><!-- .inner-wrap -->
    </div><!-- .single-page -->

   <?php do_action('ample_after_body_content');
get_footer();?>


