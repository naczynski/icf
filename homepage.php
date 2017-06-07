<?php
/**
 * Template Name: Strona główna
 */

get_header(); ?>
<section id="slider" class="slider-parallax nobottommargin noborder ohidden slider-parallax-visible" style="height: 370px;">

				<div class="full-screen force-full-screen section nopadding nomargin noborder ohidden" style="height: 370px;">

					<div class="container clearfix">
						<div class="slider-caption slider-caption-center">
							<h1><?php the_field('tytul_naglowka'); ?></h1>
						</div>
					</div>
					<div class="video-wrap">
						<video id="slide-video" poster="<?php echo get_template_directory_uri(); ?>/assets/videos/1.jpg" preload="auto" loop autoplay muted>
							<source src='<?php echo get_template_directory_uri(); ?>/assets/videos/video.webm' type='video/webm' />
							<source src='<?php echo get_template_directory_uri(); ?>/assets/videos/video.mp4' type='video/mp4' />
						</video>
						<div class="video-overlay" style="background-color: rgba(21,71,92,0.8);"></div>
					</div>

				</div>

		</section>

		<section id="content">

			<div class="content-wrap2">

				<div class="container clearfix">

					<div class="col_one_third nobottommargin visible-lg">
						<div class="feature-box media-box">
							<div class="fbox-media">
								<img src="<?php the_field('photo_po_lewej'); ?>" alt="Produkty w 100% z drewna litego">
							</div>
						</div>
					</div>

					<div class="col_two_fifth nobottommargin">
						<div class="feature-box media-box">
							<div class="fbox-desc">
								<h3><?php the_field('tytul_modulu'); ?></h3>
								<p><?php the_field('krotki_tekst_modulu'); ?></p>
							</div>
							<div class="fbox-media">
								<img src="<?php the_field('photo_pod_tekstem'); ?>" alt="Produkty w 100% z drewna litego">
							</div>
						</div>
					</div>

					<div class="col_small_fifth col_one_third nobottommargin col_last">
						<div class="feature-box media-box">
							<h3>Aktualności</h3>

							<?php
								$i = 1;
								$args = array( 'numberposts' => '3',
								) ;
								query_posts('showposts=3');
								while (have_posts()): the_post(); ?>
								<article class="post type-post">
									<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
									<?php if ($i == 1): ?><div class="fbox-media">
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<img src="<?php echo $url; ?>" alt="<?php the_title(); ?>">
										</a>
									</div>
									<?php endif; ?>
									<?php $i++; ?>
									<div class="fbox-desc">
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<h4><?php the_title(); ?></h4>
											<p><?php echo substr(get_the_excerpt(), 0,65); ?>...</p>
										</a>
									</div>
								</article>
							<?php endwhile; wp_reset_query();?>
							<a href="#"><span class="more">Zobacz wszystkie</span></a>
						</div>
					</div>

				</div>

				<div class="section secounter nobottommargin" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/counter-bg.jpg'); background-position: center 20%; background-repeat: no-repeat;  padding: 40px 0;">
					<div class="container clearfix">
						<div class="col-md-4 col-sm-6 center bounceIn animated" data-animate="bounceIn" style="z-index: 2;">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/pracownicy.png" />
							<div class="counter counter-large">
								<span data-from="50" data-to="350" data-refresh-interval="50" data-speed="2000"><?php the_field('ilosc_pracownikow'); ?></span>+
							</div>
							<h5>pracowników</h5>
						</div>

						<div class="col-md-4 col-sm-6 center bounceIn animated" data-animate="bounceIn" style="z-index: 2;">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/powierzchnia.png" />
							<div class="counter counter-large">
								<span data-from="1" data-to="60" data-refresh-interval="50" data-speed="2000"><?php the_field('powierzchnia'); ?></span> tys. m<sup>2</sup>
							</div>
							<h5>powierzchni produkcyjnej i magazynowej</h5>
						</div>

						<div class="col-md-4 col-sm-6 center bounceIn animated" data-animate="bounceIn" style="z-index: 2;">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/drewno.png" />
							<div class="counter counter-large">
								<span data-from="100" data-to="2000" data-refresh-interval="50" data-speed="2000"><?php the_field('ilosc_drewna'); ?></span> m<sup>3</sup>
							</div>
							<h5>drewna przecieramy każdego dnia</h5>
						</div>
					</div>

				</div>
			</div>
		</section>
		<section id="content" class="section-portfolio" style="background-color: #F1F2F2;">
			<div class="container clearfix">
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

		<section id="content">
			
			<div class="promo promo-dark promo-full">
				<div class="container clearfix">
					<h1>Zobacz wszystkie nasze produkty</h1>
					<a href="#" class="button button-large button-border button-light">Pobierz katalogi</a>
				</div>
			</div>
				<div class="container clearfix">

					<div class="clear-bottommargin">
						<div class="row common-height clearfix">
							<div class="heading-block center nobottomborder topmargin">
								<h1>O nas</h1>
								<?php the_field('pelny_opis_o_nas'); ?>
							</div>
							<div class="col-md-4 col-sm-6 bottommargin">
								<div class="feature-box fbox-center fbox-light fbox-plain">
									<div class="fbox-icon">
										<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/doswiadczenie.png" alt="Doświadczenie"></a>
									</div>
									<h3>Doświadczenie</h3>
									<?php the_field('opis_doswiadczenie'); ?>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 bottommargin">
								<div class="feature-box fbox-center fbox-light fbox-plain">
									<div class="fbox-icon">
										<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/pasja.png" alt="Pasja"></a>
									</div>
									<h3>Pasja</h3>
									<?php the_field('opis_pasja'); ?>
								</div>
							</div>
							<div class="col-md-4 col-sm-6 bottommargin">
								<div class="feature-box fbox-center fbox-light fbox-plain">
									<div class="fbox-icon">
										<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/jakosc.png" alt="Jakość"></a>
									</div>
									<h3>Jakość</h3>
									<?php the_field('opis_jakosc'); ?>
								</div>
							</div>
						</div>
					</div>

				</div>

				<div id="headquarters-map" style="height: 500px;" class="gmap"></div>


				<div class="section notopmargin nopadding footer-stick" style="background-color: #f1f2f2;">
					<div class="container clearfix certifications bottommargin">
						<div class="heading-block center nobottomborder topmargin">
							<h1>Certyfikaty</h1>
							<?php the_field('opis_w_certyfikatach'); ?>
						</div>
						<div class="row">
							<div class="col-md-3">
								<img src="<?php the_field('obrazek_certyfikatu'); ?>" alt="<?php the_field('tytul_certyfikatu'); ?>">
							</div>
							<div class="col-md-3">
								<div class="heading-block nobottomborder">
									<h2><?php the_field('tytul_certyfikatu'); ?></h2>
									<p><?php the_field('opis_certyfikatu'); ?></p>
								</div>
							</div>
							<div class="col-md-3">
								<img src="<?php the_field('obrazek_certyfikatu2'); ?>" alt="<?php the_field('tytul_certyfikatu2'); ?>">
							</div>
							<div class="col-md-3">
								<div class="heading-block nobottomborder">
									<h2><?php the_field('tytul_certyfikatu2'); ?></h2>
									<p><?php the_field('opis_certyfikatu2'); ?></p>
								</div>
							</div>
						</div>

					</div>
				</div>


		</section>
<?php get_footer(); ?>