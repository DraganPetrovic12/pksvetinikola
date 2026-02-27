<?php if( have_rows('flexible_layouts') ): ?>
	<div class="flexible-layouts-wrp">
		<?php while( have_rows('flexible_layouts') ) : the_row();

			if( get_row_layout() == 'default_editor_layout' ):
				include('inc-default-editor-layout.php');

			elseif( get_row_layout() == 'two_columns_layout' ):
				include('inc-two-columns-layout.php');

			elseif( get_row_layout() == 'gallery_layout' ):
				include('inc-gallery-layout.php');

			elseif( get_row_layout() == 'cards_layout' ):
				include('inc-cards.php');

			elseif( get_row_layout() == 'coaches_layout' ):
				include('inc-coaches.php');

			elseif( get_row_layout() == 'docs_layout' ):
				include('inc-docs.php');

			endif;

		endwhile; ?>
	</div>
<?php endif; ?>