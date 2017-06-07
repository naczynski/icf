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
<article id="post-<?php the_ID(); ?>" <?php post_class('post-teaser'); ?>>
    <div class="zo-blog-image zo-blog-video">
        <?php echo zo_archive_video(); ?>
    </div>

    <div class="zo-blog-detail">
	    <h2 class="zo-blog-title"><?php the_title(); ?></h2>
	    <?php if(has_category()): ?>
		    <div class="zo-blog-category"><?php the_terms( get_the_ID(), 'category', '', ' / ' ); ?></div>
	    <?php endif; ?>
	    <?php zo_archive_detail(); ?>
        <div class="zo-blog-content">
            <?php
            if(zo_archive_video()) {
                echo apply_filters('the_content', preg_replace(array('/\[embed(.*)](.*)\[\/embed\]/', '/\[video(.*)](.*)\[\/video\]/'), '', get_the_content(), 1));
            } else {
                the_content();
            }
            wp_link_pages( array(
	            'before'      => '<p class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'lucian' ) . '</span>',
	            'after'       => '</p>',
	            'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'lucian' ) . ' %</span>',
	            'separator'   => '<span class="separator">, </span>',
            ) );
            ?>
        </div>
    </div>
</article>
