<?php
/**
 * Template Name: Race Page
 *
 * Template for the Race Page
 *
 * @package understrap
 */

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>
	<?php 

		$image = get_field('race_header');
		$size = 'full';
		if( $image ) {
			echo wp_get_attachment_image( $image['id'], $size );
		}

	?>

<div class="wrapper" id="race-page-wrapper">
	
	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'loop-templates/content-race', 'page' ); ?>

						<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :

							comments_template();

						endif;
						?>

					<?php endwhile; // end of the loop. ?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
