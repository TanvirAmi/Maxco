<?php
/**
 * Template Name: Case Study
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Maxco
*/
get_header();
?>

<section class="recog-sec">
  <div id="filter-content" class="mt-70">
  <?php
  $args = array('post_type' => 'case-study');
  $query = new WP_Query($args);
  if ( $query->have_posts() ) : ?>


    <?php /* Start the Loop */
    $i = 1;
    ?>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
    <?php
    $image_src       = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
    $image_src       = (!empty($image_src) && is_array($image_src)) ? $image_src[0]:'';
    $class1           = ($i%2 == 0) ? 'absolute-bg-left' : ' ';
    $class2           = ($i%2 == 0) ? 'absolute-bg2' : ' ';
    $class3           = ($i%2 == 0) ? 'ml-auto' : ' ';

    ?>
      <a href="<?php the_permalink(); ?>">
      <div class="section-padding wow slideInUp <?php echo esc_attr($class1); ?>">
        <div class="section-absolute-bg <?php echo esc_attr($class2); ?>" data-wow-delay="0.5s" style="background-image:url(<?php echo esc_url($image_src); ?>);"></div>


            <div class="col-md-6 <?php echo esc_attr($class3); ?>">
              <span class="case-title">
                <?php
                $terms = wp_get_post_terms($post->ID, 'type');
                $y = 0;
                foreach ($terms as $term) {
                  $y++;
                  if($y > 1){ echo ', '; }
                    echo $term->name;
                }
                ?>
              </span>
              <div class="boxed-content">
                <h2><?php //the_title(); ?></h2>
                <p><?php the_excerpt(); ?></p>
              </div>
            </div>

      </div>
      </a>
      <?php $i++; endwhile; wp_reset_postdata(); ?>
      <?php endif; ?>
  </div>
</section>
<?php get_footer(); ?>
