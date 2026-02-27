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

<div id="content" class="site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">

				<?php
				while ( have_posts() ) :
					the_post(); ?>
					<section>
						<div class="container">
							<div class="uk-grid" data-uk-grid>
									<div class="uk-width-2-3">
										<h3><?php the_title(); ?></h3>
										<?php if(get_the_post_thumbnail()): ?>
										<div class="single-blog-image" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>)">
										</div>
										<?php endif; ?>

										<div class=""><?php the_content(); ?></div>
									</div>
										<div class="uk-width-1-3">

										</div>
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
