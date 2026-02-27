<?php if (get_sub_field('column_1') || get_sub_field('column_2')): ?>
	<section class="two-columns-section">
		<div class="container">
			<?php if (get_sub_field('section_intro')): ?>
				<div><?php echo get_sub_field('section_intro'); ?></div>
			<?php endif; ?>
			<div class="uk-grid" data-uk-grid>
				<?php if (get_sub_field('column_1')): ?>
					<div class="uk-width-1-2@m columns"><?php the_sub_field( 'column_1' ); ?></div>
				<?php endif ?>
				<?php if (get_sub_field('column_2')): ?>
					<div class="uk-width-1-2@m columns"><?php the_sub_field( 'column_2' ); ?></div>
				<?php endif ?>
			</div>
		</div>
	</section>
<?php endif ?>



