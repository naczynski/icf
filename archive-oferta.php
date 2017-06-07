<?php

get_header(); ?>


<section id="content">
	<div class="section secounter nobottommargin" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/page-bg.jpg'); background-position: center 20%; background-repeat: no-repeat;  padding: 0; margin: 0;">
		<div class="slider-caption slider-caption-center" style="opacity: 1; top: 8px; transform: translateY(0px);">
			<h1>Oferta</h1>
		</div>
	</div>
</section>
<section id="content" class="section-portfolio" style="background-color: #F1F2F2;">
	<div class="container clearfix boxed-slider">
		<div id="portfolio" class="portfolio grid-container portfolio-3 clearfix">
	
					<?php //start by fetching the terms for the animal_cat taxonomy
					$terms = get_terms( 'kategorie', array(
					    'orderby'    => 'count',
					    'hide_empty' => 0
					) );
					?>

					<?php
					// now run a query for each animal family
					foreach( $terms as $term ) {
					 
					    // Define the query
					    $args = array(
					        'post_type' => 'oferta',
					        'kategorie' => $term->slug
					    );
					    $query = new WP_Query( $args );
					    $term_link = get_term_link( $term );
					    ?>
					    <article class="portfolio-item">
							<div class="portfolio-image">
								<img src="<?php echo get_field('glowne_zdjecie', $term); ?>" alt="<?php echo $term->name; ?>">
								<div class="portfolio-overlay">
									<a href="<?php echo esc_url( $term_link ); ?>" class="center-icon"></a>
								</div>
							</div>
							<div class="portfolio-desc">
								<h3><a href="<?php echo esc_url( $term_link ); ?>"><?php echo $term->name; ?></a></h3>
								<span><?php echo $term->description; ?></span>
							</div>
						</article>
					    <?php
					   
					    wp_reset_postdata();
					 
					} ?>

				</div>
	</div>
</section>
<?php get_footer(); ?>