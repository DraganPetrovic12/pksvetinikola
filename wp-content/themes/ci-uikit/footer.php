<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ci-uikit
 */

?>



<footer id="colophon" class="site-footer">
	<div class="container">
		<div class="uk-grid" data-uk-grid>
			<div class=" uk-width-1-2@s site-info">
				<h4>PK „Sveti Nikola“ Niš </h4>
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
			</div><!-- .site-info -->
			<div class="uk-width-1-2@s">
				<div class="uk-grid" data-uk-grid>
					<div class="uk-width-1-2@s">
						<h4>Korisni linkovi</h4>
						<div class="footer-links uk-flex uk-flex-column">
						<?php if( have_rows('external_links','options') ): ?>
							<?php while( have_rows('external_links','options') ): the_row(); ?>
								<?php
									$link = get_sub_field('external_link','options');
									if( $link ):
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
								?>
									<a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
									<?php endif;?>
							<?php endwhile;?>
						<?php endif;?>
						</div><!-- footer-links -->
					</div>
					<div class="uk-width-1-2@s">
						<h4>Pratite nas</h4>
						<div class="social-media">
							<?php if( have_rows('social_media','options') ): ?>
								<?php while( have_rows('social_media','options') ): the_row(); ?>
								<?php if (get_sub_field('link','options')): ?>
									<a href="<?php echo get_sub_field('link','options'); ?>" target="_blank" rel="noopener">
									<?php
									$media_icon = get_sub_field('icon','options');
									if( $media_icon):
									?>
									<img uk-svg src="<?php echo $media_icon['sizes']['thumbnail']; ?>" alt="<?php echo $media_icon['description']; ?>"/>
									<?php endif; ?>
								</a>
								<?php endif; ?>
								<?php endwhile;?>
							<?php endif;?>
						</div>
					</div>
				</div>
			</div>
		</div><!-- uk-grid -->
		<div class="uk-flex uk-flex-between uk-margin-bottom uk-position-relative">
		<p class="copyright">Copyright &copy; <?php echo date('Y'); ?> Plivački klub Sveti Nikola Niš. All Rights Reserved.</p>
		<a href="#" uk-totop uk-scroll>
		</a>
		</div>
		<p class="copyright">This site is protected by reCAPTCHA and the Google <a href="https://policies.google.com/privacy" target="_blank" style="color: #ffffff">Privacy Policy</a> and <a href="https://policies.google.com/terms" target="_blank" style="color: #ffffff">Terms of Service</a> apply.</p>
	</div><!-- container -->
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
