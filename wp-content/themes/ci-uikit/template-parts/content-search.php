<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ci-uikit
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>
	</header><!-- .entry-header -->
<div class="uk-grid uk-flex uk-flex-middle" data-uk-grid>
	<div class="uk-width-1-3@s">
		<?php if(has_post_thumbnail()): ?>
			<div class="poster-img">
				<?php ci_uikit_post_thumbnail(); ?>
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
		<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
		<a class="read-more-btn" href="<?php the_permalink(); ?>">Pročitaj Više</a>
	</div>
</div>


</article><!-- #post-<?php the_ID(); ?> -->
