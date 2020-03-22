	<div>
		<?php 
		// the query
		$the_query = new WP_Query( 
			array(
				'post_type' => 'testimonials'
			) 
		); 
		?>

		<?php if ( $the_query->have_posts() ) : ?>
			<!-- pagination here -->
				<h2>What people are saying.</h2>
				<div class="testimonials swiper-container">
					<div class="swiper-wrapper">
					<!-- the loop -->
					<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<div class="swiper-slide">
							<div class="testimonial">
								<div class="testimonial-image">
									<?php the_post_thumbnail( 'medium_square', array('class' => 'round-img-sm') ); ?>
								</div>
								<div class="testimonial-content">
									<?php the_content(); ?>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
					<!-- end of the loop -->
					</div>
			</div>
			<!-- pagination here -->

			<?php wp_reset_postdata(); ?>

		<?php else : ?>
			<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>
	</div>