<?php
/**
 * The template part for displaying Swiper on Home page
 */ ?>

<div class="hero-wrapper">

	<?php if (get_field('single_image_or_swiper') == 'single image') { ?>

		<?php if (get_field('single_image')): ?>
			<div class="hero">
				<?php if (get_field( 'single_image')):
					$image_alt = get_post_meta(get_field( 'single_image'), '_wp_attachment_image_alt', TRUE);
				?>
					<?php echo wp_get_attachment_image( get_field( 'single_image'), 'full-hero-size', false, array( "class" => "hero-img", 'alt' => $image_alt ) ); ?>
				<?php endif; ?>
				<div class="container">
					<div class="hero-headline">
						<?php the_field('hero_content');?>
					</div>
				</div>
			</div>
		<?php endif; ?>

	<?php } else { ?>

		<?php if( have_rows('swiper_images') ): ?>
			<div class="swiper hero-swiper">
				<div class="swiper-wrapper">
					<?php while( have_rows('swiper_images') ): the_row(); ?>
						<div class="swiper-slide">
							<div class="hero">
								<?php if (get_sub_field( 'image_slide')):
									$image_alt = get_post_meta(get_sub_field( 'image_slide'), '_wp_attachment_image_alt', TRUE);
								?>
									<?php echo wp_get_attachment_image( get_sub_field( 'image_slide'), 'full-hero-size', false, array( "class" => "hero-slide", 'alt' => $image_alt ) ); ?>
								<?php endif; ?>
								<div class="container">
									<div class="hero-headline">
										<?php the_sub_field('hero_content');?>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
				<!-- Add Pagination -->
				<div class="swiper-pagination"></div>
			</div>
		<?php endif; ?>

	<?php } ?>

</div><!-- .hero-wrapper -->



