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

<div id="content" class="site-content default-page">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php include('template-parts/hero.php'); ?>
			<section class="blog-landing">
			<div class="container">
				<div class="uk-grid" data-uk-grid>
					<div class="uk-width-4-5@m">
						<div class="news-section cpts-wrp">
						<?php
							$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
							$args = array(
								'post_type'      => 'post',
								'orderby'        => 'post_date',
								'post_status'    => 'publish',
								'posts_per_page' => 10,
								'paged'          => $paged,
								'order'          => 'DESC',
							);
							if ( isset($_GET['archive_year']) && is_numeric($_GET['archive_year']) ) {
								$args['year'] = $_GET['archive_year'];
							}
							$the_query = new WP_Query( $args );
							?>

							<?php	if ( $the_query->have_posts() ) :?>
								<?php	while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
									<div class="uk-grid uk-flex uk-flex-middle" data-uk-grid>
										<div class="uk-width-1-3@s">
											<?php if(get_the_post_thumbnail()): ?>
												<div class="poster-img">
													<a href="<?php the_permalink(); ?>">
														<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full-hd'); ?>">
													</a>
												</div>
											<?php else: ?>
												<div class="placeholder-img">
													<a href="<?php the_permalink(); ?>">
														<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/svetinikolamichroma-black-text.svg">
													</a>
												</div>
											<?php endif; ?>
										</div>
										<div class="uk-width-2-3@s">
											<div class="date"><?php echo get_the_date('F d, Y') ;?></div>
											<h3 class="h5"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											<div class="excerpt">
												<?php echo wp_trim_words(get_the_excerpt(), 20); ?>
											</div>
											<a class="read-more-btn" href="<?php the_permalink(); ?>">Pročitaj Više</a>
										</div>
									</div>
									<hr>

								<?php endwhile; 	?>
							<?php else: ?>
								<p>Trenutno nema vesti za odabranu godinu.</p>
							<?php endif; ?>
						<?php	wp_reset_postdata(); ?>
						</div>
						<div class="pagination-wrapper uk-flex uk-flex-center uk-margin-large-top">
							<?php
							$big = 999999999;
							$pagination_args = array(
								'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format'    => '?paged=%#%',
								'current'   => max( 1, $paged ),
								'total'     => $the_query->max_num_pages,
								'type'      => 'array',
								'prev_text' => '<span uk-pagination-previous></span>',
								'next_text' => '<span uk-pagination-next></span>',
							);
							if ( isset($_GET['archive_year']) ) {
								$pagination_args['add_args'] = array( 'archive_year' => $_GET['archive_year'] );
							}
							$pagination = paginate_links( $pagination_args );

							if ( is_array( $pagination ) ) {
								echo '<ul class="uk-pagination ci-pagination">';
								foreach ( $pagination as $page ) {
									if ( strpos( $page, 'current' ) !== false ) {
										echo '<li class="uk-active"><span>' . strip_tags( $page ) . '</span></li>';
									} elseif ( strpos( $page, 'dots' ) !== false ) {
										echo '<li class="uk-disabled"><span>' . $page . '</span></li>';
									} else {
										// Ensure string is correctly handled even if it's already a link
										echo '<li>' . $page . '</li>';
									}
								}
								echo '</ul>';
							}
							?>
						</div>
					</div>
					<div class="uk-width-1-5@m">
						<aside class="blog-sidebar">
							<div class="uk-card ci-sidebar-blog">
								<h3 class="widget-title h5 uk-margin-bottom">Arhiva Vesti</h3>
								<ul class="uk-list uk-list-large uk-list-divider archive-list">
									<?php
									$current_year = isset($_GET['archive_year']) ? $_GET['archive_year'] : '';
									$all_active = empty($current_year) ? 'uk-text-bold uk-text-primary' : '';
									echo '<li><a class="' . esc_attr($all_active) . '" href="' . esc_url(remove_query_arg('archive_year', get_permalink())) . '">Sve vesti</a></li>';
									
									global $wpdb;
									$years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' ORDER BY post_date DESC");
									
									if ( ! empty($years) ) {
										foreach($years as $year) {
											$active_class = ($current_year == $year) ? 'uk-text-bold uk-text-primary' : '';
											$link = add_query_arg('archive_year', $year, get_permalink());
											echo '<li><a class="' . esc_attr($active_class) . '" href="' . esc_url($link) . '">' . esc_html($year) . '</a></li>';
										}
									}
									?>
								</ul>
							</div>
						</aside>
					</div>
				</div>

				<?php
				while ( have_posts() ) :
					the_post();


				endwhile; // End of the loop.
				?>

			</div><!-- .container -->
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- #content -->

<?php
get_footer();
