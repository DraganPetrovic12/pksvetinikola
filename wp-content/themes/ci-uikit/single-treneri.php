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

<div id="content" class="site-content single-coaches">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="hero-wrapper">
				<div class="hero">
					<?php if (get_field( 'single_hero_single_image')):
						$image_alt = get_post_meta(get_field( 'single_hero_single_image'), '_wp_attachment_image_alt', TRUE);
					?>
						<?php echo wp_get_attachment_image( get_field( 'single_hero_single_image'), 'full-hero-size', false, array( "class" => "hero-img", 'alt' => $image_alt ) ); ?>
					<?php else: ?>
						<img src="<?php echo get_stylesheet_directory_uri();?>/images/nas-tim.jpg"/>
					<?php endif; ?>
					<div class="container">
						<div class="hero-headline">
							<h1>Plivački Klub Sveti Nikola</h1>
						</div>
					</div>
				</div>
			</div><!-- .hero-wrapper -->
			<?php
			while ( have_posts() ) :
				the_post(); ?>
				<section>
					<div class="container">
						<div class="uk-grid" data-uk-grid>
								<div class="uk-width-1-3@s">
									<?php if(get_the_post_thumbnail()): ?>
									<div class="person-img">
										<img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'large'); ?>">
									</div>
									<?php endif; ?>
								</div>
									<?php if( get_the_title() ): ?>
									<div class="uk-width-2-3@s">
										<h3><?php the_title(); ?></h3>
										<div class="biography"><?php the_content(); ?></div>
									</div>
								<?php endif; ?>
							</div>
					</div>
				</section>
			<?php
			endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- #content -->

<?php
get_footer();
