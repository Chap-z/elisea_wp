<?php
/**
 * The template part for displaying navigation.
 *
 * @package ThemeGrill
 * @subpackage Ample
 * @since Ample 0.1
 */
?>

<?php
        
        global $loop;
        global $current;
        global $paged;
        global $wp_rewrite;

        assert($loop->max_num_pages > 1);

        $pagination = array(
            'base' => @add_query_arg('page', '%#%'),
            'format' => '',
            'total' => $loop->max_num_pages,
            'current' => $paged,
            'show_all' => false,
            'end_size' => 1,
            'mid_size' => 2,
            'type' => 'list',
            'next_text' => '>',
            'prev_text' => '<',
        );



        if ($loop->max_num_pages > 1):


            if ($wp_rewrite->using_permalinks()) {
                $pagination['base'] = user_trailingslashit(trailingslashit(remove_query_arg('s', get_pagenum_link(1))) . 'page/%#%/', 'paged');
            }

            if (!empty($wp_query->query_vars['s'])) {
                $pagination['add_args'] = array('s' => str_replace(' ', '+', get_query_var('s')));
            }

            echo str_replace('page/1/', '', paginate_links($pagination));



        ?>
        

	      <?php
endif;




?>