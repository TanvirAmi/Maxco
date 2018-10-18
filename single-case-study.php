<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Maxco
 */

get_header();
?>

<section class="recog-sec">
	<div id="filter-content" class="mt-70">


		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
		?>

	</div><!-- #main -->
</section><!-- #primary -->
<div class="container">
  <div class="row">
  <div class="col-lg-6">
    <div class="float-left">

      <?php
      $next_post = get_next_post();
          if($next_post) {
             echo "\t" . '<a class="prev-case" href="' . get_permalink($next_post->ID) . '" ><i class="fas fa-chevron-left"></i>Previous Case Study</a>' . "\n";
          }
      ?>
    </div>
  </div>
  <div class="col-lg-6">
    <div class="float-right">
      <?php
      $prev_post = get_previous_post();
      if($prev_post) {
         echo "\t" . '<a class="next-case" href="' . get_permalink($prev_post->ID) . '">Next Case Study<i class="fas fa-chevron-right"></i></a>' . "\n";
      }
      ?>

    </div>
  </div>
  </div>
</div>

<?php
get_footer();
