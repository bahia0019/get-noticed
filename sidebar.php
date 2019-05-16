<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package getnoticed
 */
?>

<aside id="secondary" class="sidebar">

<h3 class="lesson-title">Sections</h3>
	<?php 

	$terms = get_terms( array(
	'taxonomy' => 'sections',
	'hide_empty' => false,
	) );
	
		foreach ( $terms as $term ) {

			// the query
			$the_query = new WP_Query( 
				array(
					'post_type'      => 'lessons',
					'orderby'        => 'title',
					'order'          => 'ASC',
					'posts_per_page' => -1,
					'tax_query'      => array(
						array(
							'taxonomy' => 'sections',
							'field'    => 'name',
							'terms'    => $term->name,
						),
					),
				)
			); ?>
			
			<?php if ( $the_query->have_posts() ) : ?>

				<!-- pagination here -->
				<a href="#" class="section-title"><h4><?php echo esc_html( $term->name ); ?></h4></a>
				<div class="section-list">
					<!-- the loop -->
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<a class="lesson-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a><br />
					<?php endwhile; ?>
					<!-- end of the loop -->
				</div>
				<!-- pagination here -->

				<?php wp_reset_postdata(); ?>

			<?php else : ?>
			<?php endif; ?>


		<?php } ?>	

</aside><!-- #secondary -->
