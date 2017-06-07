<?php
/**
 * The default template for displaying content
 *
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
?>

<?php
$meta_data = zo_post_meta_data();
$images = !empty($meta_data->_zo_portfolio_images) ? $meta_data->_zo_portfolio_images : '';
$image_ids = explode(',', $images);
?>
<article id="portfolio-<?php the_ID(); ?>" <?php post_class('portfolio-full'); ?>>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
            <?php if(has_post_thumbnail()) : ?>
                <div class="zo-portfolio-image">
                    <?php the_post_thumbnail( 'full' ); ?>
                </div>
            <?php endif ?>

            <div class="zo-portfolio-galleries">
                <?php foreach ($image_ids as $image_id): ?>
                    <?php
                    $attachment_image = wp_get_attachment_image_src($image_id, 'full', false);
                    if($attachment_image[0] != ''):
					?>
					<img src="<?php echo esc_url($attachment_image[0]);?>" alt="" />
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
			<div class="zo-portfolio-detail">
                <h2 class="zo-portfolio-title"><?php the_title(); ?></h2>
				<div class="zo-portfolio-categories">
					<?php echo get_the_term_list( get_the_ID(), 'portfolio-category', '', ' / ', '' ); ?>
				</div>
                <div class="zo-portfolio-content">
                    <?php the_content();
                    wp_link_pages( array(
	                    'before'      => '<p class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'lucian' ) . '</span>',
	                    'after'       => '</p>',
	                    'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'lucian' ) . ' %</span>',
	                    'separator'   => '<span class="separator">, </span>',
                    ) );
                    ?>
                </div>
            </div>
        </div>
		<div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-3 col-lg-8 col-lg-offset-3">
			<div class="zo-portfolio-info">
				<?php if($meta_data->_zo_portfolio_client){?>
					<div class="portfolio-item">
						<label><?php esc_html_e('Client', 'lucian'); ?></label>
						<span><?php echo esc_attr($meta_data->_zo_portfolio_client) ?></span>
					</div>
				<?php }?>
				<?php if($meta_data->_zo_portfolio_skills){?>
					<div class="portfolio-item">
						<label><?php esc_html_e('Skills', 'lucian'); ?></label>
						<span><?php echo esc_attr($meta_data->_zo_portfolio_skills) ?></span>
					</div>
				<?php }?>
				<?php if(get_the_term_list( get_the_ID(), 'portfolio-category', '', ' / ', '' )){?>
					<div class="portfolio-item">
						<label><?php esc_html_e('Categories', 'lucian'); ?></label>
						<span><?php echo get_the_term_list( get_the_ID(), 'portfolio-category', '', ' / ', '' ); ?></span>
					</div> 
				<?php }?>
				<?php if($meta_data->_zo_portfolio_date){?>
					<div class="portfolio-item">
						<label><?php esc_html_e('Date', 'lucian'); ?></label>
						<span><?php echo mysql2date('F , Y', $meta_data->_zo_portfolio_date) ?></span>
					</div>
				<?php }?>
            </div>
         </div>
		<div class="zo-portfolio-socials col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2">
			 <?php zo_social_share();?>
		</div>
    </div>
	<div class="zo-portfolio-pagination row">
		<div class="launch-project col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<a href="<?php echo !empty($meta_data->_zo_portfolio_url) ? $meta_data->_zo_portfolio_url : '#'; ?>" class="btn btn-primary"><?php esc_html_e('Launch to Project', 'lucian'); ?></a>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?php zo_post_nav(esc_html__("Prev Project", 'lucian'), esc_html__("Next Project", 'lucian')); ?><!-- pagination -->
		</div>
	</div>
</article>
