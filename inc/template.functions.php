<?php
/**
 * Page title template
 * @since 1.0.0
 * @author ZoTheme
 */
/* Set Variable For Scss */
function zo_setvariablescss($var, $output, $var_default, $var_empty = null) {
	if(trim($var_empty) == null || trim($var_empty) == '') $var_empty = $var_default;
    $var = isset($var) ? (empty($var) ? $var_empty : esc_attr($var)) : $var_default;
    echo do_shortcode($output . ':' . $var . ';'). "\n";
}
function zo_page_title(){
    global $smof_data, $zo_meta;
    if(is_page() && isset($zo_meta->_zo_page_title) && $zo_meta->_zo_page_title){
        if(isset($zo_meta->_zo_page_title_type)){
			/* Page title for page */
			zo_page_title_content($zo_meta->_zo_page_title_type);
        }
    } else {
		/* Page title content */
		zo_page_title_content($smof_data['page_title_layout']);
	}
}

function zo_page_title_content($page_title_layout){
	global $zo_base, $smof_data;
	if($page_title_layout){
        $page_title_before = '<div id="page-title" class="page-title">
            <div class="container">
            <div class="row">';
        $page_title_after = '</div></div></div><!-- #page-title -->';

        $breadcrumb_before = '<div id="breadcrumb" class="breadcrumb">
            <div class="container-fluid">
            <div class="row">';
        $breadcrumb_after = '</div></div></div><!-- #breadcrumb -->';
        $pa_class = '';
        $pa_style = '';
        if( isset($smof_data['page_title_parallax']) && (int)$smof_data['page_title_parallax'] == 1) {
            $pa_class = "zo_header_parallax";
            $pa_style = 'style="background-position: 50% 0;background-attachment:fixed;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;"';
        }
        ?>
        <div id="zo-page-element-wrap"
             class="<?php echo esc_attr($pa_class); ?>" <?php echo do_shortcode($pa_style); ?>>
        <?php switch ($page_title_layout){
            case '1':
                ?>
                <?php echo wp_kses_post($page_title_before); ?><div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h1><?php $zo_base->getPageTitle(); ?></h1><?php zo_page_sub_title(); ?></div><?php echo wp_kses_post($page_title_after); ?>
                <?php echo wp_kses_post($breadcrumb_before); ?><div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php $zo_base->getBreadCrumb(); ?></div><?php echo wp_kses_post($breadcrumb_after); ?>
                <?php
                break;
            case '2':
                ?>
                <?php echo wp_kses_post($breadcrumb_before); ?><div id="breadcrumb-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><?php $zo_base->getBreadCrumb(); ?></div><?php echo wp_kses_post($breadcrumb_after); ?>
                <?php echo wp_kses_post($page_title_before); ?><div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h1><?php $zo_base->getPageTitle(); ?></h1><?php zo_page_sub_title(); ?></div><?php echo wp_kses_post($page_title_after); ?>
                <?php
                break;
            case '3':
                ?>
                <?php echo wp_kses_post($page_title_before); ?><div id="page-title-text" class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><h1><?php $zo_base->getPageTitle(); ?></h1><?php zo_page_sub_title(); ?></div><?php echo wp_kses_post($page_title_after); ?>
                <?php echo wp_kses_post($breadcrumb_before); ?><div id="breadcrumb-text" class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><?php $zo_base->getBreadCrumb(); ?></div><?php echo wp_kses_post($breadcrumb_after); ?>
                <?php
                break;
            case '4':
                ?>
                <?php echo wp_kses_post($breadcrumb_before); ?><div id="breadcrumb-text" class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><?php $zo_base->getBreadCrumb(); ?></div><?php echo wp_kses_post($breadcrumb_after); ?>
                <?php echo wp_kses_post($page_title_before); ?><div id="page-title-text" class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><h1><?php $zo_base->getPageTitle(); ?></h1><?php zo_page_sub_title(); ?></div><?php echo wp_kses_post($page_title_after); ?>
                <?php
                break;
            case '5':
                ?>
                <?php echo wp_kses_post($page_title_before); ?><div id="page-title-text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><h1><?php $zo_base->getPageTitle(); ?></h1><?php zo_page_sub_title(); ?></div><?php echo wp_kses_post($page_title_after); ?>
                <?php
                break;
            case '6':
                ?>
                <?php echo wp_kses_post($breadcrumb_before); ?><div id="breadcrumb-text" class="col-xs-12 col-sm-6 col-md-6 col-lg-6"><?php $zo_base->getBreadCrumb(); ?></div><?php echo wp_kses_post($breadcrumb_after); ?>
                <?php
                break;
        } ?>
        </div><!-- #zo-page-element-wrap-->
    <?php
    }
}

/**
 * Get sub page title.
 *
 * @author ZoTheme
 */
function zo_page_sub_title(){
    global $zo_meta, $post;

    if(!empty($zo_meta->_zo_page_title_sub_text)){
        echo '<div class="page-sub-title">'.esc_attr($zo_meta->_zo_page_title_sub_text).'</div>';
    } elseif (!empty($post->ID) && get_post_meta($post->ID, 'post_subtitle', true)){
        echo '<div class="page-sub-title">'.esc_attr(get_post_meta($post->ID, 'post_subtitle', true)).'</div>';
    }
}

/**
 * Get Header Layout.
 *
 * @author ZoTheme
 */
function zo_header(){
    global $smof_data, $zo_meta;
    /* header for page */
    if(isset($zo_meta->_zo_header) && $zo_meta->_zo_header){
        if(isset($zo_meta->_zo_header_layout)){
            $smof_data['header_layout'] = $zo_meta->_zo_header_layout;
        }
    }
    /* load template. */
    get_template_part('inc/header/header', $smof_data['header_layout']);
}

if (!function_exists('zo_page_header_logo')) {
	/**
	 * Header Logo
	 * @return false|string
	 */
	function zo_page_header_logo()
    {
        global $smof_data, $zo_meta;
        $logo = isset($smof_data['main_logo']['url']) ? $smof_data['main_logo']['url'] : get_template_directory() . '/assets/logo.png';
        if (isset($zo_meta->_zo_header) && $zo_meta->_zo_header) {
            if (isset($zo_meta->_zo_header_logo)) {
                $logo = !empty($zo_meta->_zo_header_logo) ? wp_get_attachment_url($zo_meta->_zo_header_logo) : $logo;
            }
        }
        return $logo;
    }
}
if (!function_exists('zo_page_header_sticky_logo')) {
	/**
	 * Header Logo
	 * @return false|string
	 */
	function zo_page_header_sticky_logo()
    {
        global $smof_data, $zo_meta;
        $logo = isset($smof_data['sticky_logo']['url']) ? $smof_data['sticky_logo']['url'] : get_template_directory() . '/assets/logo.png';
        if (isset($zo_meta->_zo_header) && $zo_meta->_zo_header) {
            if (isset($zo_meta->_zo_sticky_logo_enable)) {
                $logo = !empty($zo_meta->_zo_sticky_logo) ? wp_get_attachment_url($zo_meta->_zo_sticky_logo) : $logo;
            }
        }
        return $logo;
    }
}

/**
 * Get menu location ID.
 *
 * @param string $option
 * @return NULL
 */
function zo_menu_location($option = '_zo_primary'){
    global $zo_meta;
    /* get menu id from page setting */
    return (isset($zo_meta->$option) && $zo_meta->$option) ? $zo_meta->$option : null ;
}

function zo_get_page_loading() {
    global $smof_data;

    if($smof_data['enable_page_loadding']){
        echo '<div id="zo-loadding">';
        switch ($smof_data['page_loadding_style']){
            case '2':
                echo '<div class="ball"></div>';
                break;
            default:
                echo '<div class="loader"></div>';
                break;
        }
        echo '</div>';
    }
}

/**
 * Add page class
 *
 * @author ZoTheme
 * @since 1.0.0
 */
function zo_page_class(){
    global $smof_data;

    /* check boxed layout */
    if($smof_data['body_layout']){
	    $page_class = $smof_data['body_layout'];
    } else {
        $page_class = 'zo-wide';
    }

    echo apply_filters('zo_page_class', $page_class);
}

/**
 * Add main class
 *
 * @author ZoTheme
 * @since 1.0.0
 */
function zo_main_class(){
    global $zo_meta;

    $main_class = '';
    /* chect content full width */
    if(is_page() && isset($zo_meta->_zo_full_width) && $zo_meta->_zo_full_width){
        /* full width */
        $main_class = "container-fluid";
    } else {
        /* boxed */
        $main_class = "container";
    }

    echo apply_filters('zo_main_class', $main_class);
}

/**
 * Show post like.
 *
 * @since 1.0.0
 */
function zo_get_post_like(){

    $likes = get_post_meta(get_the_ID() , '_zo_post_likes', true);

    if(!$likes) $likes = 0;

    ?>
    <span class="zo-post-like" data-id="<?php the_ID(); ?>"><i class="<?php echo !isset($_COOKIE['zo_post_like_'. get_the_ID()]) ? 'fa fa-heart-o' : 'fa fa-heart' ; ?>"></i><span><?php echo esc_attr($likes); ?></span></span>
<?php
}

/**
 * Archive detail
 *
 * @author ZoTheme
 * @since 1.0.0
 */
function zo_archive_detail(){
    ?>
	<div class="zo-blog-meta">
		<span class="zo-blog-user author vcard"><?php esc_html_e('Posted by', 'lucian'); ?> <?php the_author_posts_link(); ?> - </span>
		<span class="zo-blog-date"><?php the_time("M d, Y"); ?>  / </span>
		<span class="zo-blog-comment"><a href="<?php the_permalink(); ?>"><?php echo comments_number('0','1','%'); ?></a> <?php esc_html_e('comments', 'lucian'); ?></span>
	</div>
<?php
}

/**
 * Archive readmore
 *
 * @author ZoTheme
 * @since 1.0.0
 */
function zo_archive_readmore(){
    echo '<a class="btn btn-default" href="'.get_the_permalink().'" title="'.get_the_title().'" >'.esc_html__('Continue Reading', 'lucian').'</a>';
}

/**
 * Media Audio.
 *
 * @return bool|string
 */
function zo_archive_audio() {
    global $zo_base, $smof_data;
    /* get shortcode audio. */
    $shortcode = $zo_base->getShortcodeFromContent('audio', get_the_content());

    if($shortcode){
        return do_shortcode($shortcode);
    }
    return false;
}

/**
 * Media Video.
 * @return bool|string
 */
function zo_archive_video() {

    global $wp_embed, $zo_base, $smof_data;
    /* Get Local Video */
    $local_video = $zo_base->getShortcodeFromContent('video', get_the_content());

    /* Get Youtobe or Vimeo */
    $remote_video = $zo_base->getShortcodeFromContent('embed', get_the_content());

    if($local_video){
        /* view local. */
        return do_shortcode($local_video);

    } elseif ($remote_video) {
        /* view youtobe or vimeo. */
        return do_shortcode($wp_embed->run_shortcode($remote_video));;

    }
    return false;
}

/**
 * Gallerry Images
 *
 * @author ZoTheme
 * @since 1.0.0
 * @param string $image_size
 * @return bool|string
 */
function zo_archive_gallery($image_size = 'full'){
    global $zo_base, $smof_data;
    /* get shortcode gallery. */
    $shortcode = $zo_base->getShortcodeFromContent('gallery', get_the_content());
    if($shortcode != ''){
        preg_match('/\[gallery.*ids=.(.*).\]/', $shortcode, $ids);

        if(!empty($ids)){

            $array_id = explode(",", $ids[1]);
            ob_start();
            ?>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php $i = 0; ?>
                    <?php foreach ($array_id as $image_id): ?>
                        <?php
                        $attachment_image = wp_get_attachment_image_src($image_id, $image_size, false);
                        if($attachment_image[0] != ''):?>
                            <div class="item <?php if( $i == 0 ){ echo 'active'; } ?>">
                                <img style="width:100%;" data-src="holder.js" src="<?php echo esc_url($attachment_image[0]);?>" alt="" />
                            </div>
                            <?php $i++; endif; ?>
                    <?php endforeach; ?>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="fa fa-angle-right"></span>
                </a>
            </div>
            <?php

            return ob_get_clean();

        } else {
            return false;
        }
    }elseif( has_post_thumbnail()) {
        return get_the_post_thumbnail($image_size);
    }
    return false;
}

/**
 * Quote Text.
 *
 * @author ZoTheme
 * @since 1.0.0
 */
function zo_archive_quote() {
    global $smof_data;
    /* get text. */
    preg_match('/\<blockquote\>(.*)\<\/blockquote\>/', get_the_content(), $blockquote);

    if(!empty($blockquote[0])){
        return do_shortcode($blockquote[0]);
    }
    return false;
}

/**
 * Post link
 *
 * @author Zacky
 * @since 1.0.0
 */
function zo_archive_link() {
    /* get text. */
    preg_match("/<a(.*)href=\"(.*)\"(.*)<\/a>/", get_the_content(), $link);
    if(!empty($link[0])){
        return do_shortcode($link[0]);
    }
    return false;
}

/**
 * Get icon from post format.
 *
 * @return multitype:string Ambigous <string, mixed>
 * @author ZoTheme
 * @since 1.0.0
 */
function zo_archive_post_icon() {
    $post_icon = array('icon'=>'fa fa-file-text-o','text'=>esc_html__('STANDARD', 'lucian'));
    switch (get_post_format()) {
        case 'gallery':
            $post_icon['icon'] = 'fa fa-camera-retro';
            $post_icon['text'] = esc_html__('GALLERY', 'lucian');
            break;
        case 'link':
            $post_icon['icon'] = 'fa fa-external-link';
            $post_icon['text'] = esc_html__('LINK', 'lucian');
            break;
        case 'quote':
            $post_icon['icon'] = 'fa fa-quote-left';
            $post_icon['text'] = esc_html__('QUOTE', 'lucian');
            break;
        case 'video':
            $post_icon['icon'] = 'fa fa-youtube-play';
            $post_icon['text'] = esc_html__('VIDEO', 'lucian');
            break;
        case 'audio':
            $post_icon['icon'] = 'fa fa-volume-up';
            $post_icon['text'] = esc_html__('AUDIO', 'lucian');
            break;
        default:
            $post_icon['icon'] = 'fa fa-image';
            $post_icon['text'] = esc_html__('STANDARD', 'lucian');
            break;
    }
    echo do_shortcode('<i class="'.$post_icon['icon'].'"></i>');
}

/**
 * Get social share link
 *
 * @return string
 * @author Zacky
 * @since 1.0.0
 */

function zo_social_share() {
    ?>
    <ul class="social-list">
        <li><a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;" title="Share to Facebook"><i class="fa fa-facebook"></i></a></li>
	    <li><a class="pinterest" href="http://pinterest.com/pin/create/button?url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;" title="Share to Pinterest"><i class="fa fa-pinterest"></i></a></li>
	    <li><a class="twitter" href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?>&url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;" title="Share to Twitter"><i class="fa fa-twitter"></i></a></li>
	    <li><a class="google" href="https://plus.google.com/share?url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;" title="Share to Google Plus"><i class="fa fa-google-plus"></i></a></li>
	    <li><a class="linedin" href="https://www.linkedin.com/cws/share?url=<?php echo get_the_permalink(); ?>" onclick="javascript:void window.open(this.href,'','width=600,height=300,resizable=true,left=200px,top=200px');return false;" title="Share to Linkedin"><i class="fa fa-linkedin"></i></a></li>
    </ul>
<?php
}

/**
 * Comment Navigation
 */
function zo_comment_nav() {
    // Are there comments to navigate through?
    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    ?>
	<nav class="navigation comment-navigation" role="navigation">
		<div class="nav-links">
			<?php
				if ( $prev_link = get_previous_comments_link( esc_html__( 'Older Comments', 'lucian' ) ) ) :
					printf( '<div class="nav-previous">%s</div>', $prev_link );
				endif;

				if ( $next_link = get_next_comments_link( esc_html__( 'Newer Comments', 'lucian' ) ) ) :
					printf( '<div class="nav-next">%s</div>', $next_link );
				endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .comment-navigation -->
	<?php
	endif;
}

/**
 * Add Favicon
 *
 * @author ZoTheme
 * @since 1.0.0
 */
function zo_favicon(){
	global $smof_data;
	$favicon = isset($smof_data['favicon']['url']) ? $smof_data['favicon']['url'] : get_template_directory() . '/favicon.ico';
	?>
	<link rel="shortcut icon" href="<?php echo esc_url($favicon);?>" type="image/x-icon">
<?php
}
add_action('wp_head', 'zo_favicon');

if( !function_exists('zo_get_post_thumbnail') ) {
	/**
	 * Zo Get Post Thumbnail
	 * @param string $size
	 *
	 */
	function zo_get_post_thumbnail($size = 'full') {
		switch($size) {
			case 'thumbnail' :
				the_post_thumbnail('thumbnail');
				break;
			case 'medium' :
				echo zo_post_thumbnail(570, 390, true);
				break;
			case 'large' :
				the_post_thumbnail('large');
				break;
			default :
				the_post_thumbnail('full');
		}
	}
}


if( !function_exists('zo_get_smof_data')) {
	function zo_get_smof_data($key) {
		global $smof_data;
		return isset($smof_data[$key]) ? $smof_data[$key] : NULL;
	}
}

