<?php

get_header(); ?>
<section class="error-404 not-found" id="content">
	<div class="section secounter nobottommargin" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/page-bg.jpg'); background-position: center 20%; background-repeat: no-repeat;  padding: 0; margin: 0;">
		<div class="slider-caption slider-caption-center" style="opacity: 1; top: 8px; transform: translateY(0px);">
			<h1><?php _e( 'Błąd 404', 'icfwood' ); ?></h1>
		</div>
	</div>

	<div class="container clearfix boxed-slider center">
		<p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or use search.', 'icfwood' ); ?></p>
		<?php get_search_form(); ?>
	</div>

</section>

<?php get_footer(); ?>