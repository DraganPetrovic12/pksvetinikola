<?php
/**
 * The template for displaying all pages
 *
 * Template name: Landing Treneri
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
			<?php include('inc/flexible-content-layouts.php'); ?>

			<?php
			while ( have_posts() ) :
				the_post();

			endwhile; // End of the loop.
			?>

			<section class="zig-zag-section has-bgr">
				<div class="container">
					<div class="cpts-wrp">
						<?php
						$args = array(
							'post_type' => 'treneri',
							'posts_per_page' => -1,
							'post_status'  => 'publish',
							'orderby' => 'date',
							'order' => 'DESC',
						);
						$query = new WP_Query( $args );
						$counter = $query->found_posts;
						if ( $query->have_posts() ) : ?>
							<div class="uk-grid" data-uk-grid>
								<?php while ( $query->have_posts() ): $query->the_post(); ?>
									<div class="uk-grid zig-zag-grid" data-uk-grid uk-scrollspy="cls: uk-animation-fade; target: .fade-element; delay: 500;">
										<div class="uk-width-1-3@l img-column fade-element">
											<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'large'); ?>">
										</div>
										<div class="uk-width-2-3@l text-column-wrp">
											<div class="text-column fade-element">
												<h5><?php the_title(); ?></h5>
												<p><?php echo the_content(); ?></p>
											</div>
										</div>
									</div>
								<?php endwhile; ?>
							</div>
						<?php
						endif;
						wp_reset_postdata();
						?>
					</div>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- #content -->

<?php
get_footer();
