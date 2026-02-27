<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ci-uikit
 */

get_header();
?>

<div id="content" class="site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<?php
			while ( have_posts() ) : the_post();

			include('template-parts/hero.php');

			endwhile; // End of the loop. ?>

		<section class="about-us has-bgr">
				<div class="container">
					<div class="uk-grid uk-flex uk-flex-middle" data-uk-grid>
						<div class="uk-width-1-2@m">
							<div class="uk-overflow-hidden image-holder-left">
								<?php if (get_field( 'section_image_about')):
									$image_alt = get_post_meta(get_field( 'section_image_about'), '_wp_attachment_image_alt', TRUE);
								?>
									<?php echo wp_get_attachment_image( get_field( 'section_image_about'), 'large', false, array( "class" => "back-img", 'alt' => $image_alt, "uk-scrollspy" => "cls: uk-animation-kenburns; repeat: true") );?>
								<?php endif; ?>
							</div>
						</div>
						<div class="uk-width-1-2@m">
							<?php if (get_field( 'section_title_about')):?>
								<h2><?php echo get_field('section_title_about'); ?></h2>
							<?php endif; ?>
							<?php if (get_field( 'section_copy_about')):?>
								<div>
									<?php echo get_field('section_copy_about'); ?>
								</div>
							<?php endif; ?>
							<div class="button-wrapper">
								<?php
									$link = get_field('section_cta_about');
									if( $link ):
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
								?>
									<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
								<?php endif;?>
							</div>
						</div>
					</div>
				</div>
				<img class="vawe" src="<?php echo get_stylesheet_directory_uri(); ?>/images/talasi-plavi.svg" uk-parallax="y: -50, 30">
		</section>

		<section class="coaches has-bgr">
			<div class="container">
				<?php if (get_field( 'section_title_coaches')):?>
					<h2><?php echo get_field('section_title_coaches'); ?></h2>
				<?php endif; ?>
				<div class="uk-grid" data-uk-grid>
					<div class="uk-width-1-1 first-mobile">
						<?php if (get_field( 'section_intro_coaches')):?>
							<div>
								<?php echo get_field('section_intro_coaches'); ?>
							</div>
						<?php endif; ?>
					</div>
					<div class="uk-width-1-1 uk-margin-top second-mobile">
						<?php
						$args = array(
							'post_type' => 'treneri',
							'orderby'          => 'post_date',
							'post_status' => 'publish',
							'posts_per_page' => -1,
							// 'post__not_in' => [96, 94, 789],
							'order'            => 'DESC',
						);
						$the_query = new WP_Query( $args );
						?>

							<div class="swiper testimonialSwiper">
								<?php	if ( $the_query->have_posts() ) :?>
									<div class="swiper-wrapper">
										<?php	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
											<?php $excerpt = get_the_excerpt();
												if ($excerpt):
											?>
												<div class="swiper-slide">
													<div class="uk-grid uk-flex-middle" data-uk-grid>
														<div class="uk-width-1-3@m">
															<?php if(get_the_post_thumbnail()): ?>
															<div class="person-img">
																<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'large'); ?>">
															</div>
															<?php endif; ?>
														</div>
															<?php if( get_the_title() ): ?>
															<div class="uk-width-2-3@m">
																<blockquote class="testimonial"><?php echo $excerpt; ?>
																<h3 class="h6"><?php the_title(); ?></h3>
																</blockquote>
															</div>
														<?php endif; ?>
													</div>
												</div>
											<?php endif; ?>
										<?php endwhile; 	?>
									</div>
								<?php endif; ?>
								<div class="swiper-pagination"></div>
							</div>

						<?php	wp_reset_postdata(); ?>
					</div>
				</div>
			</div>
		</section>

		<section class="swimers has-bgr">
			<div class="container">
				<div class="uk-grid uk-flex uk-flex-middle" data-uk-grid>
					<div class="uk-width-1-2@m">
						<div class="uk-overflow-hidden image-holder-left">
							<?php if (get_field( 'section_image_swimmers')):
								$image_alt = get_post_meta(get_field( 'section_image_swimmers'), '_wp_attachment_image_alt', TRUE);
							?>
								<?php echo wp_get_attachment_image( get_field( 'section_image_swimmers'), 'large', false, array( "class" => "back-img", 'alt' => $image_alt, "uk-scrollspy" => "cls: uk-animation-kenburns; repeat: true") );?>
							<?php endif; ?>
						</div>
					</div>
					<div class="uk-width-1-2@m">
						<?php if (get_field( 'section_title_swimmers')):?>
							<h2><?php echo get_field('section_title_swimmers'); ?></h2>
						<?php endif; ?>
						<?php if (get_field( 'section_copy_swimmers')):?>
							<div>
								<?php echo get_field('section_copy_swimmers'); ?>
							</div>
						<?php endif; ?>
						<div class="button-wrapper">
							<?php
								$link = get_field('section_cta_swimmers');
								if( $link ):
								$link_url = $link['url'];
								$link_title = $link['title'];
								$link_target = $link['target'] ? $link['target'] : '_self';
							?>
								<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							<?php endif;?>
						</div>
					</div>
				</div>
			</div>
			<img class="vawe" src="<?php echo get_stylesheet_directory_uri(); ?>/images/talasi-plavi.svg" uk-parallax="y: -50, 30">
		</section>

		<section class="latest-posts has-bgr">
				<div class="container">
				<h2>Vesti</h2>
					<?php
					$args = array(
						'post_type' => 'post',
						'orderby'          => 'post_date',
						'post_status' => 'publish',
						'posts_per_page' => 12,
						'order'            => 'DESC',
					);
					$the_query = new WP_Query( $args );
					?>

					<div class="swiper mySwiper">
						<?php	if ( $the_query->have_posts() ) :?>
							<div class="swiper-wrapper">
								<?php	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
									<div class="swiper-slide">
										<div class="uk-card uk-flex uk-flex-column">
											<?php if(get_the_post_thumbnail()): ?>
												<div class="poster-img">
													<a href="<?php the_permalink(); ?>">
														<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>">
													</a>
												</div>
											<?php else: ?>
												<div class="placeholder-img">
													<a href="<?php the_permalink(); ?>">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svetinikolamichroma-black-text.svg">
													</a>
												</div>
											<?php endif; ?>
												<?php if( get_the_title() ): ?>
												<div class="uk-card-body">
													<div class="date"><?php echo get_the_date('F d, Y') ;?></div>
													<h3 class="h5"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
													<a class="read-more-btn" href="<?php the_permalink(); ?>">Pročitaj Više</a>
												</div>
											<?php endif; ?>
										</div>
									</div>
								<?php endwhile; 	?>
							</div>
						<?php endif; ?>
					</div>
					<div class="swiper-button-next"></div>
					<div class="swiper-button-prev"></div>
					<div class="button-wrapper">
						<a class="button" href="/blog">Pogledaj Sve Vesti</a>
					</div>
				<?php	wp_reset_postdata();
					 ?>
				</div>
		</section>

		<section class="contact has-bgr">
			<div class="container">
				<div class="uk-grid" data-uk-grid>
					<div class="uk-width-1-1">
						<div class="contact-intro">
							<?php if (get_field( 'contact_section_title')):?>
								<h2><?php echo get_field('contact_section_title'); ?></h2>
							<?php endif; ?>
								<?php if (get_field( 'contact_section_copy')):?>
									<div>
										<?php echo get_field('contact_section_copy'); ?>
									</div>
								<?php endif; ?>
								<div class="button-wrapper uk-text-center">
									<?php
										$link = get_field('contact_section_cta');
										if( $link ):
										$link_url = $link['url'];
										$link_title = $link['title'];
										$link_target = $link['target'] ? $link['target'] : '_self';
									?>
										<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
									<?php endif;?>
								</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="friends has-bgr">
			<div class="container">
				<?php if (get_field( 'friends_section_title')):?>
					<h2><?php echo get_field('friends_section_title'); ?></h2>
				<?php endif; ?>
				<?php if( have_rows('group') ): ?>
					<div class="uk-grid uk-margin-top" data-uk-grid uk-scrollspy="cls: uk-animation-fade; target: .logo-wrp; delay: 500;">
						<?php while( have_rows('group') ): the_row(); ?>
							<div class="uk-width-1-2 uk-width-1-3@s uk-width-1-4@m">
								<div class="logo-wrp">
									<?php
										$link = get_sub_field('friend_link');
										if( $link ):
									?>
										<a class="logo-link" href="<?php echo $link ; ?>" target="_blank">
											<?php if (get_sub_field( 'friend_logo')):
												$image_alt = get_post_meta(get_sub_field( 'friend_logo'), '_wp_attachment_image_alt', TRUE);
											?>
												<?php echo wp_get_attachment_image( get_sub_field( 'friend_logo'), 'large', false, array( "class" => "logo-friends", 'alt' => $image_alt ) ); ?>
											<?php endif; ?>
										</a>
										<?php if (get_sub_field( 'friend_title')):?>
											<div class="logo-title"><?php echo get_sub_field('friend_title'); ?></div>
										<?php endif; ?>
									<?php else:?>
										<?php if (get_sub_field( 'friend_logo')):
											$image_alt = get_post_meta(get_sub_field( 'friend_logo'), '_wp_attachment_image_alt', TRUE);
										?>
											<?php echo wp_get_attachment_image( get_sub_field( 'friend_logo'), 'large', false, array( "class" => "logo-friends", 'alt' => $image_alt ) ); ?>
										<?php endif; ?>
										<?php if (get_sub_field( 'friend_title')):?>
											<div class="logo-title"><?php echo get_sub_field('friend_title'); ?></div>
										<?php endif; ?>
									<?php endif; ?>
								</div>
							</div>
						<?php endwhile;?>
					</div>
				<?php endif;?>
			</div>
		</section>


		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- #content -->

<?php
get_footer();
