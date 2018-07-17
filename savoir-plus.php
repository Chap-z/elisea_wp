<?php
/**
 * Theme liste partenaires Section for our theme.
 *
 * @package ThemeGrill
 * @subpackage Ample
 * @since Ample 0.1
 *
 * Template name: En savoirs plus
 */

get_header();

do_action('ample_before_body_content');?>

   <div class="single-page liste-en-savoir-plus clearfix">
        <div class="inner-wrap">
            <div class="container">
                <?php $pages = get_pages(array('child_of' => get_the_ID()));?>
                <ul class="row justify-content-center">
                    <?php foreach ($pages as $page): ?>
                        <li class="col-3">
                            <a href="<?php echo get_permalink($page->ID); ?>" title="<?php echo esc_attr($page->post_title); ?>">
                                <?php echo get_the_post_thumbnail($page->ID, 'thumbnail'); ?>

                                    <?php echo $page->post_title; ?>
                                </a>

                        </li>
                    <?php endforeach;?>
                </ul>
            </div>
        </div><!-- .inner-wrap -->
    </div><!-- .single-page -->

   <?php do_action('ample_after_body_content');
get_footer();?>


