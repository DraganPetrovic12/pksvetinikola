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
			<?php include('inc/flexible-content-layouts.php'); ?>

			<?php
			while ( have_posts() ) :
				the_post();

			endwhile; // End of the loop.
			?>
			<section class="club-map-section has-bgr">
				<div class="container">
					<div class="uk-grid" data-uk-grid>
						<div class="uk-width-1-2@m site-info">
							<h2 class="h4">Nalazimo se u srcu<br>Niškog parka Čair</h2>
							<h5>PK „Sveti Nikola“ Niš </h5>
							<?php if( get_field('location','options') ): ?>
								<div class="contact-fields"><img uk-svg src="<?php echo get_stylesheet_directory_uri(); ?>/images/location.svg"/><?php the_field('location','options'); ?></div>
							<?php endif;?>
							<?php if( get_field('email','options') ): ?>
								<div class="contact-fields"><img uk-svg src="<?php echo get_stylesheet_directory_uri(); ?>/images/email.svg"/><a href="mailto:<?php the_field('email','options'); ?>"><?php the_field('email','options'); ?></a></div>
							<?php endif;?>
							<?php if( get_field('phone','options') ): ?>
								<div class="contact-fields"><img uk-svg src="<?php echo get_stylesheet_directory_uri(); ?>/images/phone.svg"/>
									<div class="contact-phones">
										<a href="tel:<?php the_field('phone','options'); ?>"><?php the_field('phone','options'); ?></a>
										<a href="tel:<?php the_field('mobile_phone','options'); ?>"><?php the_field('mobile_phone','options'); ?></a>
									</div>
								</div>
							<?php endif;?>
						</div>
						<div class="uk-width-1-2@m club-map">
							<div class="club-map-wrp">
							<iframe src="https://snazzymaps.com/embed/549269" width="100%" height="600px" style="border:none;"></iframe>
							<!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2902.998082490163!2d21.905536677495924!3d43.3142995711203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4755b10af5212593%3A0x5109269ec603dae0!2sPliva%C4%8Dki%20klub%20%22Sveti%20Nikola%22!5e0!3m2!1sen!2srs!4v1700832483017!5m2!1sen!2srs" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="contact has-bgr">
				<div class="container">
					<div class="uk-grid" data-uk-grid>
						<div class="uk-width-1-2@s message-form">
							<h2><?php the_field('contact_form_title'); ?></h2>
							<?php if( get_field('subscribe_form') ): ?>
							<div><?php the_field('subscribe_form'); ?></div>
							<?php endif;?>
						</div>
						<div class="uk-width-1-2@s uk-flex uk-flex-column documents">
							<?php if( have_rows('files_group') ): ?>
								<?php while( have_rows('files_group') ): the_row(); ?>
								<h2><?php echo get_sub_field('data_title'); ?></h2>
									<?php if( have_rows('data') ): ?>
										<?php while( have_rows('data') ): the_row(); ?>
											<?php if (get_sub_field('choose_data_type') == 'document') {
												$file = get_sub_field('data_file');
												if( $file ): ?>
													<a class="uk-margin-small-bottom" href="<?php echo $file['url']; ?>" target="_blank"><?php echo $file['title']; ?></a>
												<?php endif;
											} elseif (get_sub_field('choose_data_type') == 'data_link') {
													$link = get_sub_field('data_file_link');
													if( $link ):
													$link_url = $link['url'];
													$link_title = $link['title'];
													$link_target = $link['target'] ? $link['target'] : '_self';
												?>
													<a class="documents" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
												<?php endif;
											} else {
												if( get_sub_field('data_form_submission') ): ?>
												<a href="#modal-form" uk-toggle><?php echo get_sub_field('data_form_headline'); ?></a>
												<div id="modal-form" uk-modal>
													<div class="uk-modal-dialog uk-modal-body">
														<button class="uk-modal-close-default" type="button" uk-close></button>
														<div><?php echo get_sub_field('data_form_submission'); ?></div>
													</div>
												</div>
												<?php endif;
											}
											?>
										<?php endwhile;?>
									<?php endif;?>
								<?php endwhile;?>
							<?php endif;?>
						</div>
					</div>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- #content -->

<?php
get_footer();
