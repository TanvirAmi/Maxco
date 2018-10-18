<?php
/**
 * The template for displaying single portfolio page
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
 			the_post(); ?>

      <div class="entry-content">
    		<?php
    		the_content();
    		?>
    	</div><!-- .entry-content -->
<?php
 		endwhile; // End of the loop.
 		?>

 	</div><!-- #main -->
 </section><!-- #primary -->
 <div class="container wow fadeInUp" data-wow-duration="3s" data-wow-delay="0.2s">
   <div class="row">
   <div class="col-lg-6">
     <div class="float-left">

       <?php
       $next_post = get_next_post();
           if($next_post) {
              echo "\t" . '<a class="prev-case" href="' . get_permalink($next_post->ID) . '" ><i class="fas fa-chevron-left"></i>Previous Project</a>' . "\n";
           }
       ?>
     </div>
   </div>
   <div class="col-lg-6">
     <div class="float-right">
       <?php
       $prev_post = get_previous_post();
       if($prev_post) {
          echo "\t" . '<a class="next-case" href="' . get_permalink($prev_post->ID) . '">Next Project<i class="fas fa-chevron-right"></i></a>' . "\n";
       }
       ?>

     </div>
   </div>
   </div>
 </div>
 <?php
 get_footer();
