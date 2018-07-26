<?php
/**
 * Template Name: Driver list page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */
$container = get_theme_mod( 'understrap_container_type' );
get_header();
?>

<div class="wrapper" id="driver-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">
		<?php get_template_part( 'loop-templates/content', 'page-no-featured' ); ?>

		<div class="row driver-list no-gutters">
				<?php
				$driverpages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_title', 'sort_order' => 'asc' ) );

				// print_r($driverpages);

				  $count = 0;
				  foreach($driverpages as $driverpage) {
						$thumbnail_url = get_the_post_thumbnail_url($driverpage->ID);
						$driverNumber = get_field('nummer_field', $driverpage);
		        		if(strlen($driverNumber) == 0) {
		        			$driverNumber = "&nbsp;";
		        		}
				    ?>
						<div class="col-md-3 col-sm-6 col-6 driver-cell">
							<a href="<?php echo get_permalink($driverpage->ID); ?>">
								<div class="driver-content">
									<div class="image-container-outer">
										<div class="image-container" style="background-image: url(<?php echo $thumbnail_url; ?>)">
										</div>
									</div>
						        	<h2><?php echo $driverNumber; ?></h2>
						        	<h3>
					        			<?php echo $driverpage->post_title; ?>
					        		</h3>
						        	<h4><?php echo get_field('team_field', $driverpage); ?></h4>
						        
								</div>
							</a>	
				    	</div>
				    <?php
				  }

				?>
		</div><!-- .row -->
	</div><!-- Container end -->
</div><!-- Wrapper end -->

<?php get_footer(); ?>
