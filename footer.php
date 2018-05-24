<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */
$the_theme = wp_get_theme();
// $container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>
<div class="wrapper" id="wrapper-footer-top">
	<div class="container">
		<div class="row top-footer">
			<div class="col-md-8">
				<?php wp_nav_menu(
							array(
								'theme_location'  => 'footerSocial',
								'container_class' => 'footer-nav',
								'container_id'    => 'footer-nav-container',
								'menu_class'      => 'footer-nav',
								'fallback_cb'     => '',
								'menu_id'         => 'footer-sub-menu',
								'depth'           => 2,
							)
						); ?>
			</div>
			<div class="col-md-4">
				<ul class="calendar-menu">
					<li><a href="#"><i class="fa fa-calendar"></i>Ladda ner 2018 kalendern</a></li>
				</ul>
				
			</div>
		</div>
	</div>
</div>
<div class="wrapper" id="wrapper-footer-bottom">

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<footer class="site-footer" id="colophon">
						<?php wp_nav_menu(
							array(
								'theme_location'  => 'footerSub',
								'container_class' => 'footer-nav',
								'container_id'    => 'footer-nav-container',
								'menu_class'      => 'footer-nav',
								'fallback_cb'     => '',
								'menu_id'         => 'footer-sub-menu',
								'depth'           => 2,
							)
						); ?>
				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->
	</div><!-- container end -->

	<div class="container footer-bottom">
		<div class="row">
			<div class="col-md-12">
				<div class="divider border-top"></div>
			</div>
			<div class="col-md-12">
				<?php wp_nav_menu(
							array(
								'theme_location'  => 'footerMain',
								'container_class' => 'footer-nav',
								'container_id'    => 'footer-nav-container',
								'menu_class'      => 'footer-nav',
								'fallback_cb'     => '',
								'menu_id'         => 'footer-main-menu',
								'depth'           => 1,
							)
						); ?>
			</div>
			<div class="col-md-9">
				<?php the_custom_logo(); ?>
			</div>
			<div class="col-md-3 copyright">
				<div class="copyright-outer">
					<div class="copyright-inner">
						<p>&copy; <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> <?php echo date("Y"); ?></p>	
					</div>
				</div>
			</div>
		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>