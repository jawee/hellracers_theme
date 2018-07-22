<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package understrap
 */

$container   = get_theme_mod( 'understrap_container_type' );


	get_header();
	get_template_part('inc/featured-slider');
?>
<!-- <?php get_template_part( 'global-templates/hero' ); ?> -->
<div class="wrapper" id="start-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<h1 class="front-page-heading"><?php the_field('titel_field'); ?></h1>
		<div class="row news-frontpage">
				<?php
				$args = array( 'numberposts' => 6, 'offset' => 3 );
				$recent_posts = wp_get_recent_posts($args);
				wp_reset_query();
				?>
				<?php
				  $count = 0;
				  foreach($recent_posts as $recent) {
						$thumbnail_url = get_the_post_thumbnail_url($recent["ID"]);

						$the_date = $post_date = get_the_date( 'j F Y', $recent);
				    ?>
					<div class="col-md-4">
						<div class="news-content">
							<div class="image-container" style="background-image: url(<?php echo $thumbnail_url; ?>)"></div>
							<div class="inner-content">
								<span class="post-date"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo $the_date; ?></span>
				        		<a href="<?php echo get_permalink($recent["ID"]); ?>"><h5><?php echo $recent["post_title"]; ?></h5></a>	
							</div>
						</div>
				    </div>
				    <?php
				    
				  }

					$remaining = $count%3;
					for($i = 1; $i < $remaining; $i++) {
						echo '<div class="col-sm"></div>';
					}

				?>
		</div><!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper front-page end -->

<?php get_footer(); ?>
