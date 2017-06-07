<?php
get_header(); 
$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );  ?>

<section id="content">
	<div class="section secounter nobottommargin" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/page-bg.jpg'); background-position: center 20%; background-repeat: no-repeat;  padding: 0; margin: 0;">
		<div class="slider-caption slider-caption-center" style="opacity: 1; top: 8px; transform: translateY(0px);">
			<h1><?php echo esc_html($term->name); ?></h1>
		</div>
	</div>

	<div class="container clearfix">
		<div class="heading-block center nobottomborder topmargin">
			<h4><?php echo get_field('podtytul_kategorii', $term); ?></h4>
			<p><?php echo get_field('opis_kategorii', $term); ?></p>
		</div>
	</div>
</section>

	<section id="content" class="section-portfolio" style="background-color: #F1F2F2;">
		<div class="container clearfix">
		<div id="portfolio" class="portfolio grid-container portfolio-3 clearfix">
	        <?php query_posts( array_merge( $wp_query->query, array( 'posts_per_page' => 40 ) ) ); if ( have_posts() ): while (have_posts()): the_post(); ?>
				<article class="portfolio-item the<?php the_ID(); ?>">
					<div class="portfolio-image">
						<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
						<img src="<?php echo $url; ?>" alt="<?php the_title(); ?>">
						<div class="portfolio-overlay">
							<a href="<?php the_permalink(); ?>" class="center-icon"></a>
						</div>
					</div>
					<div class="portfolio-desc">
						<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<span><?php echo substr(get_the_excerpt(), 0,60); ?>...</span>
					</div>
				</article>
			<?php endwhile; endif; wp_reset_query(); ?>
		</div>
		</div>
	</section>


<?php get_footer(); ?>