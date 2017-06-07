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
$related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 4, 'post__not_in' => array($post->ID), 'post_type'=> 'portfolio' ) );
if( $related ){?>
<div class="row">   
	<div class="vc_col-sm-12 wpb_column vc_column_container">
		<div class="wpb_wrapper">   
			<h2 class="vc_custom_heading style-1"><?php esc_html_e('Related Project', 'lucian');?></h2>
			<div id="zo-grid" class="zo-grid-wrapper template-zo_grid--portfolio no-padding">
				<div class="row zo-grid zo-grid-masonry shuffle">
					<?php foreach( $related as $post ) {
					setup_postdata($post); ?>  
						<div class="zo-portfolio-item zo-grid-item col-lg-3 col-md-3 col-sm-6 col-xs-12 shuffle-item filtered" >
							<div class="zo-portfolio-inner">
								<?php if(has_post_thumbnail()) echo zo_post_thumbnail(480, 365, true); ?>
								<div class="zo-portfolio-overlay">
									<div class="zo-portfolio-overlay-inner">
										<h2 class="zo-portfolio-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h2>
										<div class="zo-portfolio-categories">
										   <?php echo get_the_term_list( get_the_ID(), 'portfolio-category', '', ' / ', '' ); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
}
wp_reset_postdata();?>
