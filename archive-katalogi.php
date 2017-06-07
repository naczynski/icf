<?php
get_header(); ?>

<section id="content">
	<div class="section secounter nobottommargin" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/page-bg.jpg'); background-position: center 20%; background-repeat: no-repeat;  padding: 0; margin: 0;">
		<div class="slider-caption slider-caption-center" style="opacity: 1; top: 8px; transform: translateY(0px);">
			<h1>Katalogi</h1>
		</div>
	</div>

	<div class="container clearfix">
		<div class="heading-block center nobottomborder topmargin">
			<h4>Elementy do pobrania</h4>
			<p>Szanowni Państwo, poniżej znajdują się katalogi PDF która można przeglądać. Lorem ipsum</p>
		</div>
	</div>
</section>

	<section id="content" class="section-portfolio" style="background-color: #F1F2F2;">
		<div class="container clearfix">
		<div id="portfolio" class="portfolio grid-container portfolio-4 clearfix">
	        <?php query_posts( array_merge( $wp_query->query, array( 'posts_per_page' => 40 ) ) ); if ( have_posts() ): while (have_posts()): the_post(); ?>
				<article class="portfolio-item the<?php the_ID(); ?>">
					<div class="portfolio-image">
						<img src="<?php echo get_field('obrazek_katalogu'); ?>" alt="<?php the_title(); ?>">
						<div class="portfolio-overlay">
							<a href="<?php echo get_field('plik_pdf_katalogu'); ?>" class="button button-reveal button-small button-border button-rounded button-light tright"><i class="icon-cloud-upload"></i><span>Pobierz katalog</span></a>
						</div>
					</div>
					<div class="portfolio-desc">
						<h3><a href="<?php echo get_field('plik_pdf_katalogu'); ?>"><?php the_title(); ?></a></h3>
						<span><?php echo get_field('opis_katalogu'); ?></span>
					</div>
				</article>
			<?php endwhile; endif; wp_reset_query(); ?>
		</div>
		</div>
	</section>


<?php get_footer(); ?>