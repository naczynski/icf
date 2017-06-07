<?php
/**
 * Template Name: Kontakt
 */
get_header(); ?>
<section id="content">
	<div class="section secounter nobottommargin" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/page-bg.jpg'); background-position: center 20%; background-repeat: no-repeat;  padding: 0; margin: 0;">
		<div class="slider-caption slider-caption-center" style="opacity: 1; top: 8px; transform: translateY(0px);">
			<h1><?php the_title(); ?></h1>
		</div>
	</div>

	<div class="container clearfix boxed-slider">
		<div class="col_half">
			<?php echo do_shortcode( '[contact-form-7 id="38" title="Formularz kontaktowy"]' ); ?>
		</div>
		<div class="col_half col_last">
			<h3 class="contacth3"><?php the_field('podtytul_kontakt'); ?></h3>
			<p><?php the_field('opis_strony_kontakt'); ?></p>
			<a href="mailto:<?php the_field('adres_e-mail_kontakt'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/contact.png" />&nbsp;&nbsp;<?php the_field('adres_e-mail_kontakt'); ?></a>
			<p class="address"><?php the_field('adres_firmy'); ?></p>
		</div>
	</div>
</section>
<?php get_footer(); ?>