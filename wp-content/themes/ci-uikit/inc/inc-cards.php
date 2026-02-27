	<section class="cards-section">
		<div class="container">
			<?php if (get_sub_field('cards_intro')): ?>
				<div><?php echo get_sub_field('cards_intro'); ?></div>
			<?php endif; ?>
<?php if ( have_rows( 'cards_group') ) : ?>
			<div class="uk-grid uk-grid-small cards-grid" data-uk-grid data-uk-lightbox="animation: fade">
				<?php while ( have_rows('cards_group') ) : the_row(); ?>
					<div class="uk-width-1-3@m" >
						<div class="ci-card">
							<div class="title-wrp">
								<?php if (get_sub_field('cards_title')): ?>
									<h4 class="uk-text-center"><?php echo get_sub_field('cards_title'); ?></h4>
								<?php endif; ?>
							</div>
							<?php if (get_sub_field('cards_content')): ?>
								<div class="uk-text-center card-content"><?php echo get_sub_field('cards_content'); ?></div>
							<?php endif; ?>
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
					</div>
				<?php endwhile; ?>
			</div>
<?php endif; ?>
		</div>
	</section>
