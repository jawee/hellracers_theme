<?php
/**
 * Single post partial template.
 *
 * @package understrap
 */

?>
<?php //echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">
		<div class="entry-meta">

			<?php //understrap_posted_on(); ?>
			<?php //understrap_category_for_post(); ?>

		</div><!-- .entry-meta -->

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">

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
