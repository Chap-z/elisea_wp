<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * @package ThemeGrill
 * @subpackage Ample
 * @since Ample 0.1
 */
?>

<section class="no-results not-found">

   <div class="page-content">
      <?php if (is_home() && current_user_can('publish_posts')): ?>

         <p><?php printf(__('Prêt à publier votre premier article ? <a href="%1$s">Commençons ici</a>.', ''), esc_url(admin_url('post-new.php')));?></p>

      <?php elseif (is_search()): ?>

         <p><?php _e('Désolé, votre recherche n\'a donné aucun résulat . Vous pouvez réessayer en utilisant d\'autres termes.', '');?></p>
         <?php get_search_form();?>

      <?php else: ?>

         <p><?php _e('Il semblerait que nous ne trouvions pas ce que vous cherchez.', '');?></p>
         <?php get_search_form();?>

      <?php endif;?>
   </div><!-- .page-content -->
</section><!-- .no-results -->