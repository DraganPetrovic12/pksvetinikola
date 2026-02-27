<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ci-uikit
 */

get_header();
?>

<div id="content" class="site-content single-post">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="hero-wrapper">
				<div class="hero">
					<?php if (get_field( 'single_hero_single_image')):
						$image_alt = get_post_meta(get_field( 'single_hero_single_image'), '_wp_attachment_image_alt', TRUE);
					?>
						<?php echo wp_get_attachment_image( get_field( 'single_hero_single_image'), 'full-hero-size', false, array( "class" => "hero-img", 'alt' => $image_alt ) ); ?>
					<?php else: ?>
						<img src="<?php echo get_stylesheet_directory_uri();?>/images/swimming-pool.jpg"/>
					<?php endif; ?>
					<div class="container">
						<div class="hero-headline">
							<h1>Vesti</h1>
						</div>
					</div>
				</div>
			</div>
				<?php while ( have_posts() ) : the_post(); ?>
					<section>
						<div class="container">
							<div class="uk-grid" data-uk-grid>
								<div class="uk-width-3-4@m">
									<h2><?php the_title(); ?></h2>
									<?php if(get_the_post_thumbnail()): ?>
									<div class="single-blog-image">
										<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full-hd'); ?>">
									</div>
									<?php else: ?>
									<div class="placeholder-img uk-margin-bottom">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svetinikolamichroma-black-text.svg">
									</div>
									<?php endif; ?>
									<div class=""><?php the_content(); ?></div>
								</div>
								<div class="uk-width-1-4@m sidebar-news-wrp">
									<div class="sidebar-news blog-sidebar sticky-sidebar" uk-scrollspy="cls: uk-animation-fade; target: .uk-card; delay: 300;">
										<h3>Poslednje Vesti</h3>
											<?php $args = array(
													'post_type' => 'post',
													'orderby'          => 'post_date',
													'post_status' => 'publish',
													'posts_per_page' => 3,
													'post__not_in' => array( get_the_ID() ),
													'order'            => 'DESC',
												);
												$the_query = new WP_Query( $args ); ?>
												<?php	if ( $the_query->have_posts() ) :?>
													<?php	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
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
																		<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-latinica.png">
																	</a>
																</div>
															<?php endif; ?>
															<?php if( get_the_title() ): ?>
																<div class="uk-card-body">
																	<div class="date"><?php echo get_the_date('F d, Y') ;?></div>
																	<h4 class="h5"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
																</div>
															<?php endif; ?>
														</div>
													<?php endwhile; 	?>
												<?php endif; ?>
											<?php	wp_reset_postdata(); ?>
										</div>
									</div>
								</div>
						</div>
					</section>
				<?php endwhile; ?>
				<?php include('inc/flexible-content-layouts.php'); ?>
				<div class="container">
					<div class="sidebar-news blog-sidebar-mobile">
						<h3>Poslednje Vesti</h3>
							<?php $args = array(
									'post_type' => 'post',
									'orderby'          => 'post_date',
									'post_status' => 'publish',
									'posts_per_page' => 3,
									'post__not_in' => array( get_the_ID() ),
									'order'            => 'DESC',
								);
								$the_query = new WP_Query( $args ); ?>
								<?php	if ( $the_query->have_posts() ) :?>
									<?php	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
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
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-latinica.png">
													</a>
												</div>
											<?php endif; ?>
											<?php if( get_the_title() ): ?>
												<div class="uk-card-body">
													<div class="date"><?php echo get_the_date('F d, Y') ;?></div>
													<h4 class="h5"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
												</div>
											<?php endif; ?>
										</div>
									<?php endwhile; 	?>
								<?php endif; ?>
							<?php	wp_reset_postdata(); ?>
						</div>
					</div>
				</div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- #content -->

<?php
get_footer();
