<section class="data-section">
	<div class="container">
		<?php if (get_sub_field('data_intro')): ?>
			<div><?php echo get_sub_field('data_intro'); ?></div>
		<?php endif; ?>
		<?php if( have_rows('docs_group') ): ?>
		<div class="uk-grid uk-grid-small" data-uk-grid>
			<?php while( have_rows('docs_group') ): the_row(); ?>
				<div class="uk-width-1-2@m">
					<h2><?php echo get_sub_field('data_title'); ?></h2>
					<?php if( have_rows('data') ): ?>
							<div class="uk-flex uk-flex-column">
						<?php while( have_rows('data') ): the_row(); ?>
							<?php if (get_sub_field('choose_data_file') == 'document') {
								$file = get_sub_field('data_file');
								if( $file ): ?>
									<a class="uk-margin-small-bottom file-document" href="<?php echo $file['url']; ?>" target="_blank"><?php echo $file['title']; ?></a>
								<?php endif;
							} elseif (get_sub_field('choose_data_file') == 'data_link') {
									$link = get_sub_field('data_file_link');
									if( $link ):
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
								?>
									<a class="file-document" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
								<?php endif;
							} else {
								if( get_sub_field('data_content') ): ?>
										<div><?php echo get_sub_field('data_content'); ?></div>
								<?php endif;
							}
							?>
						<?php endwhile;?>
							</div>
					<?php endif;?>
				</div>
			<?php endwhile; ?>
		</div>
		<?php endif; ?>
	</div>
</section>