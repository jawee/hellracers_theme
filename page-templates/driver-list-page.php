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

		<div class="row driver-list no-gutters">
				<?php
				$driverpages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_title', 'sort_order' => 'desc' ) );

				// print_r($driverpages);

				  $count = 0;
				  foreach($driverpages as $driverpage) {
						$thumbnail_url = get_the_post_thumbnail_url($driverpage->ID);
				    ?>
						<div class="col-md-3 col-sm-6 col-6 driver-cell">
							<div class="driver-content">
								<div class="image-container" style="background-image: url(<?php echo $thumbnail_url; ?>)">
								</div>
					    	<!-- <img src="<?php echo $thumbnail_url; ?>" class="img-fluid"> -->
					      <!-- <div class="carousel-caption d-none d-md-block"> -->
				        
					        
					        	<?php
					        		$driverNumber = get_field('nummer_field', $driverpage);
					        		
					        	?>
					        	<h2><?php echo '#' . $driverNumber; ?></h2>
					        	<h3>
					        		<a href="<?php echo get_permalink($driverpage->ID); ?>">
					        			<?php echo $driverpage->post_title; ?>
					        			</a>
					        		</h3>
					        	<h4><?php echo get_field('team_field', $driverpage); ?></h4>
					        
						</div>
				    </div>
				    <?php
				  //   $count++;
						// if($count%4 == 0) {
						// 	echo '</div>';
						// 	echo '<div class="row driver-list">';
						// }
				  }

					$remaining = $count%3;
					for($i = 1; $i < $remaining; $i++) {
						echo '<div class="col-md-3 col-sm-4 col-6"></div>';
					}

				?>
	</div><!-- .row -->

		<?php
			

			foreach( $mypages as $page ) {		
				$content = $page->post_name;
				if ( ! $content ) // Check for empty page
					continue;

				$content = apply_filters( 'the_content', $content );
			?>
				<h2><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></h2>
				<div class="entry"><?php echo $content; ?></div>
			<?php
			}	
		?>

	</div><!-- Container end -->
</div><!-- Wrapper end -->

<?php get_footer(); ?>
