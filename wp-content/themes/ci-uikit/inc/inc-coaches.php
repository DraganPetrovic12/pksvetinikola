<section class="coaches-section has-bgr">
	<div class="container">

		<?php if ( $intro = get_sub_field('coaches_intro') ) : ?>
			<div class="coaches-intro">
				<?= apply_filters( 'the_content', $intro ); ?>
			</div>
		<?php endif; ?>

		<?php if ( have_rows( 'coaches_group' ) ) : ?>
			<?php while ( have_rows( 'coaches_group' ) ) : the_row(); ?>

				<?php
					$group_intro      = get_sub_field( 'coaches_group_intro' );
					$number_of_members = get_sub_field( 'number_of_members' );

					// column width based on radio button
					$column_class = ( $number_of_members === 'four_members' )
						? 'uk-width-1-4@m'
						: 'uk-width-1-3@m';
				?>
				<div class="coaches-group-wrp">
					<?php if ( $group_intro ) : ?>
						<div class="coaches-group-intro">
							<?= apply_filters( 'the_content', $group_intro ); ?>
						</div>
					<?php endif; ?>

					<?php if ( have_rows( 'team_members' ) ) : ?>
						<div class="uk-grid coaches-grid" data-uk-grid>

							<?php while ( have_rows( 'team_members' ) ) : the_row(); ?>

								<?php
									$image_id = get_sub_field( 'member_image' );
									$name     = get_sub_field( 'name' );
									$title    = get_sub_field( 'title' );
									$link     = get_sub_field( 'link' );
									$mail     = get_sub_field( 'mail' );
								?>

								<div class="<?= esc_attr( $column_class ); ?>">
									<div class="ci-member">

										<?php if ( $image_id ) : ?>
											<div class="ci-member__image">
												<?php if ( $link ) : ?>
													<a
														class="ci-member-link"
														href="<?= esc_url( $link['url'] ); ?>"
														target="<?= esc_attr( $link['target'] ?: '_self' ); ?>"
														rel="noopener"
													>
														<?= wp_get_attachment_image( $image_id, 'large' ); ?>
													</a>
												<?php else : ?>
													<?= wp_get_attachment_image( $image_id, 'large' ); ?>
												<?php endif; ?>
											</div>
										<?php endif; ?>

										<?php if ( $name || $title ) : ?>
											<div class="ci-member__content uk-text-center">

												<?php if ( $name ) : ?>
													<h5 class="ci-member__name">
														<?= esc_html( $name ); ?>
													</h5>
												<?php endif; ?>

												<?php if ( $title ) : ?>
													<div class="ci-member__title">
														<?= esc_html( $title ); ?>
													</div>
												<?php endif; ?>

												<?php if ( $mail ) : ?>
													<div class="ci-member__mail">
														<a href="mailto:<?php echo antispambot( esc_attr( $mail ) ); ?>">
															<?php echo antispambot( esc_html( $mail ) ); ?>
														</a>
													</div>
												<?php endif; ?>


											</div>
										<?php endif; ?>

									</div>
								</div>

							<?php endwhile; ?>

						</div>
					<?php endif; ?>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>

	</div>
</section>
