<?php
/**
 * The default template for displaying content
 *
 *
 * @package ZoTheme
 * @subpackage Zo Theme
 * @since 1.0.0
 */
$zo_image_style = get_query_var('zo_image_style', 'full');
$zo_content_style = get_query_var('zo_content_style', 'full');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-teaser'); ?>>
    <div class="zo-blog-image zo-blog-gallery">
        <?php echo zo_archive_gallery($zo_image_style); ?>
    </div>
	<h2 class="zo-blog-title"><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php the_title(); ?></a></h2>
	<?php if(has_category()): ?>
		<div class="zo-blog-category"><?php the_terms( get_the_ID(), 'category', '', ' / ' ); ?></div>
	<?php endif; ?>
	<?php if( $zo_content_style == 'full' ) : ?>
		<div class="zo-blog-detail">
		    <?php zo_archive_detail(); ?>
	        <div class="zo-blog-content">
	            <?php the_excerpt();
	            wp_link_pages( array(
		            'before'      => '<p class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'lucian' ) . '</span>',
		            'after'       => '</p>',
		            'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'lucian' ) . ' %</span>',
		            'separator'   => '<span class="separator">, </span>',
	            ) );
	            ?>
	        </div>
	    </div>
		<div class="zo-blog-footer">
			<a class="btn-readmore" title="<?php the_title(); ?>" href="<?php the_permalink() ?>" rel=""><?php esc_html_e('Read More ', 'lucian') ?></a>
			<?php zo_social_share(); ?>
		</div>
	<?php endif; ?>
</article>
