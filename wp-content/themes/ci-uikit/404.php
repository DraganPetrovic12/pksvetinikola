<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
							<h1>404</h1>
						</div>
					</div>
				</div>
			</div><!-- .hero-wrapper -->
			<div class="container">
				<section class="error-404 not-found">
					<header class="page-header">
						<h2 class="page-title"><?php esc_html_e( 'Oops! Ova strana ne postoji.', 'ci-uikit' ); ?></h2>
					</header><!-- .page-header -->
					<div class="page-content">
						<p><?php esc_html_e( 'Vratite se na ', 'ci-uikit' ); ?>
							<a class="color-link" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Naslovnu stranu', 'ci-uikit' ); ?></a>
						</p>
						<?php
						the_widget( 'WP_Widget_Recent_Posts' );
						?>
					</div><!-- .page-content -->
				</section><!-- .error-404 -->
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- #content -->

<?php
get_footer();
