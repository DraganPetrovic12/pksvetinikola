<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package ci-uikit
 */

get_header();
?>

<div id="content" class="site-content">
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="hero-wrapper">
				<div class="hero">
					<img class="hero-img" src="<?php echo get_stylesheet_directory_uri();?>/images/swimming-pool.jpg"/>
					<div class="container">
						<div class="hero-headline">
							<h1>Pretraga</h1>
						</div>
					</div>
				</div>
			</div><!-- .hero-wrapper -->
			<section>
				<div class="container">
				<?php if ( have_posts() ) : ?>
					<header class="page-header">
						<h2 class="page-title">
							<?php
							/* translators: %s: search query. */
							printf( esc_html__( 'Rezultati pretrage za: %s', 'ci-uikit' ), '<span>' . get_search_query() . '</span>' );
							?>
						</h2>
					</header><!-- .page-header -->

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/**
						 * Run the loop for the search to output the results.
						 * If you want to overload this in a child theme then include a file
						 * called content-search.php and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'search' );

					endwhile;

					the_posts_navigation();

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
				</div>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- #content -->

<?php
get_footer();
