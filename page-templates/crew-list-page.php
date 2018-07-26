<?php
/**
 * Template Name: Crew list page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */
$container = get_theme_mod( 'understrap_container_type' );
get_header();
?>

<div class="wrapper" id="crew-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<?php get_template_part( 'loop-templates/content', 'page-no-featured' ); ?>

		<?php
			$crewParentPages = get_pages( array( 'child_of' => $post->ID, 'parent' => $post->ID ));
			foreach($crewParentPages as $crewParentPage) {
		?>
				<h4><a href="<?php echo get_permalink($crewParentPage->ID); ?>"><?php echo $crewParentPage->post_title; ?></a></h4>
				<div class="row crew-page-list no-gutters">
		<?php 
				$crewPages = get_pages(array('child_of' => $crewParentPage->ID));

				foreach($crewPages as $crewPage) {
					$thumbnail_url = get_the_post_thumbnail_url($crewPage->ID);
			?>
					<div class="col-md-3 col-sm-6 col-6 crew-cell">
						<a href="<?php echo get_permalink($crewPage->ID); ?>">
							<div class="crew-content">
								<div class="image-container-outer">
									<div class="image-container" style="background-image: url(<?php echo $thumbnail_url; ?>)">
									</div>
								</div>					        

					        	<h5>
				        			<?php echo $crewPage->post_title; ?>
				        		</h5>
							</div>
						</a>
					</div>
			<?php
				}
		?>
					
				</div><!--- row end -->	
		<?php

			}
		?>
				

	</div><!-- Container end -->
</div><!-- Wrapper end -->

<?php get_footer(); ?>
