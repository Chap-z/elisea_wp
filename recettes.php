<?php
/**
 * Theme recettes Section for our theme.
 *
 * @package ThemeGrill
 * @subpackage Ample
 * @since Ample 0.1
 * 
 * Template name: Recettes
 */

get_header();

do_action('ample_before_body_content');?>

   <div class="single-page liste-recettes clearfix">
        <div class="inner-wrap">
            <div class="container">
                <div class="row">
					<?php $loop = new WP_Query(array('post_type' => 'recettes', 'posts_per_page' => 10, 'paged' => $paged));?>
                    <?php while ($loop->have_posts()): $loop->the_post();?>
		                        <article class="recettes col-12 col-sm-3">

									<?php
										$value = get_field('image');
										$fichier = get_field('fichier');
										$video = get_field('video');
										if (!empty($value)) {
											echo '<figure class="recette"><a href="' . get_field('image') . '"><img class="photo" src="' . get_field('image') . '"><figcaption>' . get_field('nom_de_image') . '</figcaption></figure>';
										} elseif (!empty($fichier)) {
										echo '<figure class="recette"><a href="' . get_field('fichier') . '"><img class="vignette" src="' . get_stylesheet_directory_uri() . '/images/pdf_logo.png"><figcaption>' . get_field('nom_du_fichier') . '</figcaption></figure>';
									} elseif (!empty($video)) {
										echo '<figure class="recette"><a href="' . get_field('video') . '"><video class="video" controls><source src="' . get_field('video') . '"></video><figcaption>' . get_field('nom_de_video') . '</figcaption></figure>';
									}
									?>

	                            <div class="entry-content">
	                                <?php the_content();?>
	                            </div>
	                        </article>
		                <?php endwhile;?>
                </div>
            </div>
        </div><!-- .inner-wrap -->
    </div><!-- .single-page -->

   <?php do_action('ample_after_body_content');
get_footer();?>