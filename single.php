<?php

get_header(); ?>
<section id="content">

				<div class="section secounter nobottommargin" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/page-bg.jpg'); background-position: center 20%; background-repeat: no-repeat;  padding: 0; margin: 0;">
					<div class="slider-caption slider-caption-center" style="opacity: 1; top: 8px; transform: translateY(0px);">
							<h1><?php the_title(); ?></h1>
						</div>
				</div>

				<div class="container clearfix boxed-slider">
				<?php the_content(); ?>

				</div>

		</section>
<?php get_footer(); ?>