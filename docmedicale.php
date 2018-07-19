<?php
/**
 * Theme Documentation médicale Section for our theme.
 *
 * @package ThemeGrill
 * @subpackage Ample
 * @since Ample 0.1
 * 
 * Template name: Doc Médicale
 */

get_header();

do_action('ample_before_body_content');?>

   <div class="single-page liste-docmedicale clearfix">
        <div class="inner-wrap">
            <div class="container">
                <div class="row">
					<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;?>
					<?php $loop = new WP_Query(array('post_type' => 'calendrier', 'posts_per_page' => 12, 'paged' => $paged));?>
                    <?php while ($loop->have_posts()): $loop->the_post();?>
						<article class="docmedicale col-12 col-sm-3">
							<?php 
							$value = get_field('image');
							$fichier = get_field('fichier');
							$video = get_field('video');
							if (!empty($value)) {
								echo '<figure class="med"><a href="' . get_field('image') . '"><img class="photo" src="' . get_field('image') . '"><figcaption>' . get_field('nom_de_image') . '</figcaption></a></figure>';
							} elseif (!empty($fichier)) {
								echo '<figure class="med"><a href="' . get_field('fichier') . '"><img class="vignette" src="' . get_stylesheet_directory_uri() . '/images/pdf_logo.png"><figcaption>' . get_field('nom_du_fichier') . '</figcaption></a></figure>';
							} elseif (!empty($video)) {
								echo '<figure class="med"><a href="' . get_field('video') . '"><video class="video" controls><source src="' . get_field('video') . '"></video><figcaption>' . get_field('nom_de_video') .  '</figcaption></a></figure>';
							}
							?>
						</article>
					<?php endwhile;?>
				</div>
			</div>
			<?php get_template_part('navigation', 'page');?>
        </div><!-- .inner-wrap -->
    </div><!-- .single-page -->

   <?php do_action('ample_after_body_content');
get_footer();?>