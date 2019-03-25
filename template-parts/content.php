<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package getnoticed
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );

		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				getnoticed_posted_on();
				getnoticed_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php 
					if ( is_singular( 'lessons' )){

					the_post_navigation(
						array(
						'prev_text'          => '< Prev Lesson',
						'next_text'          => 'Next Lesson >',
						)
					);

			}
			?>

	</header><!-- .entry-header -->

	<?php getnoticed_post_thumbnail(); ?>
	<?php 
		if ( is_singular( 'lessons' )){
	echo '<div class="lesson-body">';
		} ?>
		<div class="entry-content">
			<?php
			the_content( sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'getnoticed' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'getnoticed' ),
				'after'  => '</div>',
			) );
			?>
		</div><!-- .entry-content -->

		<?php 
		if ( is_singular( 'lessons' )){
				get_sidebar();
			}
		echo '</div><!-- .lesson-body -->';
			?>

	<footer class="entry-footer">
		<?php getnoticed_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
