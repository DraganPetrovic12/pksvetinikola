<?php if ( have_rows( 'image_gallery') ) : ?>
	<section class="gallery-section">
		<div class="container">
			<?php if (get_sub_field('gallery_intro')): ?>
				<div><?php echo get_sub_field('gallery_intro'); ?></div>
			<?php endif; ?>
			<div class="uk-grid uk-grid-small uk-flex-middle" data-uk-grid data-uk-lightbox="animation: fade">
				<?php while ( have_rows('image_gallery') ) : the_row(); ?>
					<div class="uk-width-1-2@s uk-width-1-4@m" >
						<?php
							$image = get_sub_field('image');
							if ($image):
							$url = $image['url'];
							$caption = $image['caption'];
						?>
							<a class="uk-button uk-button-default light-wrp" href="<?php echo esc_url($url); ?>" data-caption="<?php echo esc_html($caption); ?>">
								<img src="<?php echo $image['sizes']['large']; ?>" />
							</a>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
<?php endif; ?>
