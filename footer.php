<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package getnoticed
 */

?>

</div><!-- .site-content -->

<footer id="colophon" class="site-footer" role="contentinfo">

	<div class="footer-identity">
		<a href="<?php echo home_url( '/' ); ?>" title="Web design, Hosting and SEO for Professional Photographers" >
			<?php require( 'images/flauntsiteslogo.svg' ); ?>
		</a>
		<p>Photography Websites, Simplified <br />+ Much Much More!</p>
	</div>

	<div class="footer-widgets">
		<div class="widget" id="widget-1"> 

			<?php if ( is_active_sidebar( 'footer_col_1' ) ) : ?>

					<?php dynamic_sidebar( 'footer_col_1' ); ?>

			<?php endif; ?>

		</div>

		<div class="widget" id="widget-2"> 

			<?php if ( is_active_sidebar( 'footer_col_2' ) ) : ?>

					<?php dynamic_sidebar( 'footer_col_2' ); ?>

			<?php endif; ?>

		</div>

		<div class="widget" id="widget-3"> 

			<?php if ( is_active_sidebar( 'footer_col_3' ) ) : ?>

					<?php dynamic_sidebar( 'footer_col_3' ); ?>

			<?php endif; ?>

		</div>

		<div class="widget" id="widget-4"> 

			<?php if ( is_active_sidebar( 'footer_col_4' ) ) : ?>

					<?php dynamic_sidebar( 'footer_col_4' ); ?>

			<?php endif; ?>

		</div>
	</div>
</footer><!-- #colophon -->

<div class="site-info">
	
	<p class="copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.
	<?php if ( ! is_admin() ) : ?>
	<a href="/privacy-policy" class="privacy">Privacy Policy</a>
	<?php endif; ?>
</p>

<p class="site-credit">Home grown in sunny San Diego, CA</p>

</div><!-- .site-info -->
</div><!-- #page -->

<?php if ( ! is_user_logged_in() ){ ?>
	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	(function(){
	var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
	s1.async=true;
	s1.src='https://embed.tawk.to/5c2d28e57a79fc1bddf30552/default';
	s1.charset='UTF-8';
	s1.setAttribute('crossorigin','*');
	s0.parentNode.insertBefore(s1,s0);
	})();
	</script>
	<!--End of Tawk.to Script-->
<?php } ?>

<?php wp_footer(); ?>

</body>

</html>
