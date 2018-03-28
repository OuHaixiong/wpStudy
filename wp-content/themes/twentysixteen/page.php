<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the page content template.
			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// End of the loop.
		endwhile;
		?>

	</main><!-- .site-main -->

	<?php get_sidebar( 'content-bottom' ); 
	
    /* $terms = get_terms('color'); // 获取color下的所有分类，这里仅返回有文章的分类
    $count = count($terms);
    if ($count > 0) {
        foreach ($terms as $term) { // 获取分类名、分类链接和分类描述
            echo '<p><a href="' . get_term_link($term) . '" title="' . $term->description . '">' . $term->name . '</a></p>';
        }
    } */

    $taxonomy = 'color'; // 自定义分类法名称
    $terms = get_terms($taxonomy); // 获取自定义分类列表
    foreach ($terms as $cat) { // 循环自定义分类
        $catid = $cat->term_id;
        $args = array(
                'showposts' => 10, //输出文章的数量
                'tax_query' => array(array('taxonomy'=>$taxonomy, 'terms'=>$catid))
        );
        $query = new WP_Query($args);
        while ($query->have_posts()) {
            $query->the_post();
            print_r(the_permalink()); // 文章链接
            $post = get_post();
            var_dump($post->post_title); // 文章标题
        }
        wp_reset_query(); // 重置query查询
    }

	?>

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
