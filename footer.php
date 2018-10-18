<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Maxco
 */

?>

<!-- Start Contact Area -->

		<?php
		$args = array('post_type' => 'custom_content', 'p' => 7676, 'posts_per_page' => 1);
		$query = new WP_Query($args);
    if ( $query->have_posts() ) : ?>
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<?php the_content(); ?>
					<?php endwhile; wp_reset_postdata(); ?>
	 	<?php
		endif;
		?>



<?php wp_footer(); ?>

</body>
</html>
