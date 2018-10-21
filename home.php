<?php
/**
 * The template for displaying maxco home page
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

<!-- Start Banner Area -->
<section class="banner-area relative">
  <div class="overlay overlay-bg"></div>

    <?php layerslider(1) ?>

  </div>
</section>

<!-- Start About Area -->
<section class="section-full gray-bg" id="about-maxco">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="section-title text-center wow bounceInUp" data-wow-duration="3s" data-wow-delay="0.2s">

          <?php
          $args = array('post_type' => 'custom_content', 'p' => 7677, 'posts_per_page' => 1);
          $query = new WP_Query($args);
          if ( $query->have_posts() ) : ?>
              <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <?php the_content(); ?>
                <?php endwhile; wp_reset_postdata(); ?>
          <?php
          endif;
          ?>

        </div>
      </div>
    </div>

  </div>
</section>


<section>
  <div id="filter-content" class="row no-gutters">
    <?php
		$args = array('post_type' => 'portfolio', 'posts_per_page' => 9);
		$query = new WP_Query($args);
    if ( $query->have_posts() ) : ?>


				<?php /* Start the Loop */
        $i = 1;
        ?>
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>
          <?php
          //$delay = '0.' . $GLOBALS[ 'var' ] . 's';
          //$delay = 0.5s;
          //$GLOBALS[ 'var' ] = $GLOBALS[ 'var' ] + 0.5;
          $image_src       = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
          $image_src       = (!empty($image_src) && is_array($image_src)) ? $image_src[0]:'';
          $class           = ($i == 1 || $i == 4 || $i == 7 || $i == 10) ? 'col-lg-12' : 'col-lg-6';

          ?>
          <div class="mix category-1 <?php echo esc_attr($class); ?> col-md-4 col-sm-6 single-filter-content content-1 wow fadeInUp" data-wow-delay="0.2s" style="background-image:url(<?php echo esc_url($image_src); ?>);">
            <a href="<?php the_permalink(); ?>">
            <div class="overlay overlay-bg-content d-flex align-items-center justify-content-center flex-column">
              <div class="left-bottom">
              <p class="text-black">
                <?php

                $terms = wp_get_post_terms($post->ID, 'type');
                $x = 0;
                foreach ($terms as $term) {
                  $x++;
                  if($x > 1){ echo ', '; }
                    echo $term->name;
                }
                ?>
              </p>

              <h5 class="text-white"><?php the_title(); ?></h5>
              </div>
            </div></a>
          </div>
        <?php $i++; endwhile; wp_reset_postdata(); ?>
        <?php endif; ?>


  </div>
</section>

<!-- Case study Area -->

<section class="section-full gray-bg">
  <div class="container">
    <p class="case-study">CASE STUDY</p>
    <div class="active-case-carousel">

      <?php
  		$args = array('post_type' => 'case-study');
  		$query = new WP_Query($args);
      if ( $query->have_posts() ) : ?>
      <?php while ( $query->have_posts() ) : $query->the_post(); ?>
      <div class="single-case">
        <div class="case-type">
        <p>  <?php

          $terms = wp_get_post_terms($post->ID, 'type');
          $y = 0;
          foreach ($terms as $term) {
            $y++;
            if($y > 1){ echo ', '; }
              echo $term->name;
          }
          ?></p>
        </div>
        <div class="author">
          <span class="m-border"></span>
          <p class="case-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>

        </div>
      </div>
      <?php endwhile; wp_reset_postdata(); ?>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>
