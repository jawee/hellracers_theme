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

		<div class="row news-frontpage">
				<?php
				$args = array( 'numberposts' => 6, 'offset' => 3 );
				$recent_posts = wp_get_recent_posts($args);
				wp_reset_query();

				?>
				<?php
				  $count = 0;
				  foreach($recent_posts as $recent) {
				    ?>
						<div class="col-md">
							<div class="news-content">
								<div class="image-container" style="background-image: url(<?php echo get_the_post_thumbnail_url($recent["ID"]); ?>)">
								</div>
					    	<!-- <img src="<?php echo get_the_post_thumbnail_url($recent["ID"]); ?>" class="img-fluid"> -->
					      <!-- <div class="carousel-caption d-none d-md-block"> -->
				        <h3><?php echo $recent["post_title"]; ?></h3>
				        <a href="<?php echo get_permalink($recent["ID"]); ?>" class="btn btn-primary">Läs mer</a>
							</div>
				    </div>
				    <?php
				    $count++;
						if($count%3 == 0) {
							echo '</div>';
							echo '<div class="row news-frontpage">';
						}
				  }

					$remaining = $count%3;
					for($i = 1; $i < $remaining; $i++) {
						echo '<div class="col-sm"></div>';
					}

				?>
	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
