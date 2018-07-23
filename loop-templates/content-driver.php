<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">
		<div class="entry-meta">

			<?php //understrap_posted_on(); ?>
			<?php understrap_category_for_post(); ?>

		</div><!-- .entry-meta -->
			
		<?php 
			$number = get_field('nummer_field');
			the_title( '<h1 class="entry-title">', ' - <span class="driver-number">' . $number . '</span></h1>' ); 
		?>
		
		<div class="row">
			<div class="col-md-7">
				<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
			</div>
			<div class="col-md-5">
				<table class="table table-bordered table-sm">
					<tr>
						<td>Ålder</td>
						<td><?php the_field('fodelsedatum_field'); ?></td>
					</tr>
					<tr>
						<td>Stad</td>
						<td><?php the_field('stad_field'); ?></td>
					</tr>
					<tr>
						<td>Team</td>
						<td><?php the_field('team_field'); ?></td>
					</tr>
					<tr>
					<tr>
						<td>Körda race</td>
						<td><?php the_field('korda_race_field'); ?></td>
					</tr>
						<td>Vinster</td>
						<td><?php the_field('vinster_field'); ?></td>
					</tr>
					<tr>
						<td>Pallplatser</td>
						<td><?php the_field('pallplatser_field'); ?></td>
					</tr>
					<tr>
						<td>Karriärpoäng</td>
						<td><?php the_field('karriarpoang_field'); ?></td>
					</tr>
					<tr>
						<td>Mästerskapstitlar</td>
						<td><?php the_field('masterskapstitlar_field'); ?></td>
					</tr>
					<tr>
						<td>Bästa placering</td>
						<td><?php the_field('basta_placering_field'); ?></td>
					</tr>
				</table>
			</div>
		</div>
		



	</header><!-- .entry-header -->

	<div class="entry-content">

		<h2>Biografi</h2>
		<?php the_content(); ?>

		<?php
		/*wp_link_pages( array(
			'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
			'after'  => '</div>',
		) );*/
		?>

	</div><!-- .entry-content -->

	<!--<footer class="entry-footer"> -->

		<?php //understrap_entry_footer(); ?>

	</footer> <!-- .entry-footer -->

</article><!-- #post-## -->
