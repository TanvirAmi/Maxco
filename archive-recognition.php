<?php
/**
 * Template Name: Recognization
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Maxco
*/
get_header();
?>

<section class="recog-sec">
			<div id="filter-content" class="row no-gutters mt-70">
        <?php
        $args = array('post_type' => 'recognition', 'posts_per_page' => 4);
        $query = new WP_Query($args);
        if ( $query->have_posts() ) : ?>


            <?php /* Start the Loop */
             while ( $query->have_posts() ) : $query->the_post(); ?>
              <?php
              $image_src       = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
              $image_src       = (!empty($image_src) && is_array($image_src)) ? $image_src[0]:'';
              ?>
      				<div class="mix category-1 category-5 category-3 category-5 col-lg-6 col-md-4 col-sm-6 single-filter-content wow fadeInDown"
              style="background-image:url(<?php echo esc_url($image_src); ?>);" data-wow-delay="0.5s">
      				<!-- <a href="#"> -->
      					<div class="overlay overlay-bg-content d-flex align-items-center justify-content-center flex-column">
      						<span id="tag" class="text-white"><?php the_title(); ?></span>
      						<p class="text-white"><?php the_excerpt(); ?></p>
      					</div>
      			<!--	</a> -->
      				</div>
              <?php endwhile; wp_reset_postdata(); ?>
              <?php endif; ?>
            </div>

				<!--4 col grid start -->
				<!--less>2 pattern -->
        <div id="filter-content" class="row no-gutters mt-70">
        <?php
        $args = array('post_type' => 'recognition', 'posts_per_page' => 4, 'offset'=> 4);
        $query = new WP_Query($args);
        if ( $query->have_posts() ) : ?>

        <?php /* Start the Loop */
        $i = 1;
         while ( $query->have_posts() ) : $query->the_post(); ?>
          <?php
          $image_src       = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
          $image_src       = (!empty($image_src) && is_array($image_src)) ? $image_src[0]:'';
          ?>
          <?php
          if ($i == 1 || $i == 2 || $i == 5 || $i == 6 || $i == 9 || $i == 10){?>
            <div class="mix category-1 category-5 col-lg-3 col-md-4 col-sm-6 single-filter-content"  style="background-image:url(<?php echo esc_url($image_src); ?>);">

    				</div>

    				<div class="mix category-1 category-5 col-lg-3 col-md-4 col-sm-6 wow zoomIn" data-wow-delay="0.5s">
            <!--  <a href="#"> -->
    					<span id="tag" class="text-black"><?php the_title(); ?></span>
              <div class="d-flex align-items-center justify-content-center h-100" id="rec-ex">
                    <?php the_excerpt(); ?>
              </div>
            <!--  </a> -->
    				</div>

            <?php
          }
          else{?>
            <div class="mix category-1 category-5 col-lg-3 col-md-4 col-sm-6 wow zoomIn" data-wow-delay="0.5s">
              <!-- <a href="#"> -->
              <span id="tag" class="text-black"><?php the_title(); ?></span>
              <div class="d-flex align-items-center justify-content-center h-100" id="rec-ex">
                    <?php the_excerpt(); ?>
              </div>
              <!-- </a> -->
            </div>
            <div class="mix category-1 category-5 col-lg-3 col-md-4 col-sm-6 single-filter-content" data-myorder="3" style="background-image:url(<?php echo esc_url($image_src); ?>);">

    				</div>
          <?php
          }
          ?>

      <?php $i++; endwhile; wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>



</section>

<?php get_footer(); ?>
