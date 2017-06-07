<?php
get_header(); ?>

	<?php if( !is_front_page() && is_home() ) : ?>
		<div class="container-fluid blog-footer">
			<div class="row">
				<div class="col-md-12">
					<?php dynamic_sidebar( 'blog-footer' ); ?>
				</div>
			</div>
		</div>
	<?php endif; ?>

<?php get_footer(); ?>