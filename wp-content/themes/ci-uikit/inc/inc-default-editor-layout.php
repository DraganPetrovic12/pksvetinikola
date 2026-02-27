<?php if (get_sub_field('background_color') || get_sub_field('background_image')): ?>
	<?php if (get_sub_field('background_color')): ?>
		<section class="default-editor-layout has-bgr" style="background-color: <?php the_sub_field('background_color'); ?>;">
	<?php else: ?>
		<section class="default-editor-layout has-bgr has-bgr-img">
			<?php if (get_sub_field( 'background_image' )):
				$image_alt = get_post_meta(get_sub_field( 'background_image' ), '_wp_attachment_image_alt', TRUE);
			?>
				<?php echo wp_get_attachment_image( get_sub_field( 'background_image' ), 'full-hero-size', false, array( "class" => "bgr-img", 'alt' => $image_alt ) ); ?>
			<?php endif; ?>
	<?php endif; ?>
<?php else: ?>
	<section class="default-editor-layout">
<?php endif; ?>
	<div class="container">
		<?php if (get_sub_field('content')): ?>
			<div class="editor"><?php the_sub_field( 'content' ); ?></div>
		<?php endif ?>
	</div>
</section>




