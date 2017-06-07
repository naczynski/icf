<?php
global $zo_base;
/* get local fonts. */
//$local_fonts = is_admin() ? $zo_base->getListLocalFontsName() : array() ;
/**
 * Home Options
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Main Options', 'lucian'),
    'icon' => 'el-icon-dashboard',
    'fields' => array(
        array(
            'id' => 'intro_product',
            'type' => 'intro_product',
        )
    )
);
/**
 * Header Options
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Header', 'lucian'),
    'icon' => 'el-icon-credit-card',
    'fields' => array(
        array(
            'id' => 'header_layout',
            'title' => esc_html__('Layouts', 'lucian'),
            'subtitle' => esc_html__('select a layout for header', 'lucian'),
            'default' => '',
            'type' => 'image_select',
            'options' => array(
                '' => get_template_directory_uri().'/inc/options/images/header/default.png',
                '1' => get_template_directory_uri().'/inc/options/images/header/header-1.png',
                '2' => get_template_directory_uri().'/inc/options/images/header/header-2.png',
            )
        ),
        array(
            'id'       => 'header_height',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => esc_html__('Header Height', 'lucian'),
            'output' => array('#zo-header'),
            'width' => false,
            'default'  => array(
                'height'  => '60px'
            ),
        ),
        array(
            'id' => 'header_margin',
            'title' => esc_html__('Margin', 'lucian'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('body #zo-header'),
            'default' => array(
                'margin-top'     => '100px',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'header_padding',
            'title' => esc_html__('Padding', 'lucian'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('body #zo-header'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'subtitle' => esc_html__('enable sticky mode for menu.', 'lucian'),
            'id' => 'menu_sticky',
            'type' => 'switch',
            'title' => esc_html__('Sticky Header', 'lucian'),
            'default' => false,
        ),
        array(
            'id'       => 'menu_sticky_height',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => esc_html__('Sticky Header Height', 'lucian'),
            'width' => false,
            'default'  => array(
                'height'  => '80px'
            ),
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'menu_sticky_header_margin',
            'title' => esc_html__('Sticky Header Margin', 'lucian'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('body #zo-header.header-fixed'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'menu_sticky_header_padding',
            'title' => esc_html__('Sticky Header Padding', 'lucian'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('body #zo-header.header-fixed'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => esc_html__('enable sticky mode for menu Tablets.', 'lucian'),
            'id' => 'menu_sticky_tablets',
            'type' => 'switch',
            'title' => esc_html__('Sticky Tablets', 'lucian'),
            'default' => false,
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => esc_html__('enable sticky mode for menu Mobile.', 'lucian'),
            'id' => 'menu_sticky_mobile',
            'type' => 'switch',
            'title' => esc_html__('Sticky Mobile', 'lucian'),
            'default' => false,
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        )
    )
);

/* Header Top */

$this->sections[] = array(
    'title' => esc_html__('Header Top', 'lucian'),
    'icon' => 'el-icon-minus',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Enable header top.', 'lucian'),
            'id' => 'enable_header_top',
            'type' => 'switch',
            'title' => esc_html__('Enable Header Top', 'lucian'),
            'default' => false,
        ),
        array(
            'id' => 'header_top_margin',
            'title' => esc_html__('Margin', 'lucian'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('body #zo-header-top'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'enable_header_top', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'header_top_padding',
            'title' => esc_html__('Padding', 'lucian'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('body #zo-header-top'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'enable_header_top', 1 => '=', 2 => 1 )
        ),
    )
);

/* Logo */
$this->sections[] = array(
    'title' => esc_html__('Logo', 'lucian'),
    'icon' => 'el-icon-picture',
    'subsection' => true,
    'fields' => array(
        array(
            'title' => esc_html__('Select Logo', 'lucian'),
            'subtitle' => esc_html__('Select an image file for your logo.', 'lucian'),
            'id' => 'main_logo',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/logo.png'
            )
        ),
        array(
            'id'       => 'main_logo_height',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => esc_html__('Logo Height', 'lucian'),
            'width' => false,
            'default'  => array(
                'height'  => '60px'
            ),
        ),
        array(
            'id'       => 'sticky_logo_height',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => esc_html__('Sticky Logo Height', 'lucian'),
            'width' => false,
            'default'  => array(
                'height'  => '80px'
            ),
        ),
	    array(
		    'subtitle' => esc_html__('Change Sticky Logo.', 'lucian'),
		    'id' => 'sticky_logo_enable',
		    'type' => 'switch',
		    'title' => esc_html__('Enable Sticky Logo ', 'lucian'),
		    'default' => false,
	    ),
	    array(
		    'title' => esc_html__('Select Logo', 'lucian'),
		    'subtitle' => esc_html__('Select an image file for your logo.', 'lucian'),
		    'id' => 'sticky_logo',
		    'type' => 'media',
		    'url' => true,
		    'default' => array(
			    'url'=>get_template_directory_uri().'/logo.png'
		    ),
		    'required' => array( 0 => 'sticky_logo_enable', 1 => '=', 2 => 1 )
	    ),
    )
);

/* Menu */
$this->sections[] = array(
    'title' => esc_html__('Menu', 'lucian'),
    'icon' => 'el-icon-tasks',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => 'Menu position.',
            'id' => 'menu_position',
            'options' => array(
                '' => 'Initial',
                'left' => 'Menu Left',
                'right' => 'Menu Right',
                'center' => 'Menu Center',
            ),
            'type' => 'select',
            'title' => esc_html__('Menu Position', 'lucian'),
            'default' => 'right'
        ),
        array(
            'id' => 'menu_margin_first_level',
            'title' => esc_html__('Menu Margin - First Level', 'lucian'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('#zo-header-navigation .main-navigation .menu-main-menu > li > a',
                '#zo-header-navigation .main-navigation .menu-main-menu > ul > li > a'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '55px',
                'margin-bottom'  => '40px',
                'margin-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'menu_padding_first_level',
            'title' => esc_html__('Menu Padding - First Level', 'lucian'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('#zo-header-navigation .main-navigation .menu-main-menu > li > a',
                '#zo-header-navigation .main-navigation .menu-main-menu > ul > li > a'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '30px',
                'padding-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'menu_fontsize_first_level',
            'type' => 'typography',
            'title' => esc_html__('Menu Font Size - First Level', 'lucian'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'font-weight' => false,
            'font-family' => false,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('#zo-header-navigation .main-navigation .menu-main-menu > li > a',
                '#zo-header-navigation .main-navigation .menu-main-menu > ul > li > a'),
            'units' => 'px',
            'default' => array(
                'font-size' => '14px',
            )
        ),
        array(
            'id' => 'menu_fontsize_sub_level',
            'type' => 'typography',
            'title' => esc_html__('Menu Font Size - Sub Level', 'lucian'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'font-weight' => false,
            'font-family' => false,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('#zo-header-navigation .main-navigation .menu-main-menu > li ul a',
                '#zo-header-navigation .main-navigation .menu-main-menu > ul > li ul a'),
            'units' => 'px',
            'default' => array(
                'font-size' => '13px',
            )
        ),
        array(
            'subtitle' => esc_html__('enable sub menu border bottom.', 'lucian'),
            'id' => 'menu_border_color_bottom',
            'type' => 'switch',
            'title' => esc_html__('Border Bottom Menu Item Sub Level', 'lucian'),
            'default' => false,
        ),
        array(
            'subtitle' => esc_html__('Enable mega menu.', 'lucian'),
            'id' => 'menu_mega',
            'type' => 'switch',
            'title' => esc_html__('Mega Menu', 'lucian'),
            'default' => true,
        ),
        array(
            'subtitle' => esc_html__('Enable menu first level uppercase.', 'lucian'),
            'id' => 'menu_first_level_uppercase',
            'type' => 'switch',
            'title' => esc_html__('Menu First Level Uppercase', 'lucian'),
            'default' => false,
        ),
        array(
            'id' => 'menu_icon_font_size',
            'type' => 'typography',
            'title' => esc_html__('Menu Icon Font Size', 'lucian'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'font-weight' => false,
            'font-family' => false,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('#zo-header.zo-main-header .menu-main-menu > li > a i'),
            'units' => 'px',
            'default' => array(
                'font-size' => '13px',
            )
        ),
	    array(
		    'id' => 'menu_sticky_margin',
		    'title' => esc_html__('Menu Sticky Margin', 'lucian'),
		    'type' => 'spacing',
		    'units' => 'px',
		    'mode' => 'margin',
		    'output' => array('body #zo-header.header-fixed #zo-header-navigation .main-navigation .menu-main-menu > li > a',
			    'body #zo-header.header-fixed #zo-header-navigation .main-navigation .menu-main-menu > ul > li > a'),
		    'default' => array(
			    'margin-top'     => '0',
			    'margin-right'   => '55px',
			    'margin-bottom'  => '0',
			    'margin-left'    => '0',
			    'units'          => 'px',
		    ),
		    'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
	    ),
	    array(
		    'id' => 'menu_sticky_padding',
		    'title' => esc_html__('Menu Sticky Padding', 'lucian'),
		    'type' => 'spacing',
		    'units' => 'px',
		    'mode' => 'padding',
		    'output' => array('body #zo-header.header-fixed #zo-header-navigation .main-navigation .menu-main-menu > li > a',
			    'body #zo-header.header-fixed #zo-header-navigation .main-navigation .menu-main-menu > ul > li > a'),
		    'default' => array(
			    'padding-top'     => '0',
			    'padding-right'   => '0',
			    'padding-bottom'  => '28px',
			    'padding-left'    => '0',
			    'units'          => 'px',
		    ),
		    'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
	    ),
    )
);

/* Stick Menu */
$this->sections[] = array(
    'title' => esc_html__('Stick Menu', 'lucian'),
    'icon' => 'el-icon-tasks',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'stick_menu_fontsize_first_level',
            'type' => 'typography',
            'title' => esc_html__('Stick Menu Font Size - First Level', 'lucian'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'font-weight' => false,
            'font-family' => false,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('#zo-header.header-fixed #zo-header-navigation .main-navigation .menu-main-menu > li > a',
                '#zo-header.header-fixed #zo-header-navigation .main-navigation .menu-main-menu > ul > li > a'),
            'units' => 'px',
            'default' => array(
                'font-size' => '14px',
            )
        ),
        array(
            'id' => 'sticky_menu_fontsize_sub_level',
            'type' => 'typography',
            'title' => esc_html__('Sticky Menu Font Size - Sub Level', 'lucian'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'font-weight' => false,
            'font-family' => false,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('#zo-header.header-fixed #zo-header-navigation .main-navigation .menu-main-menu > li ul li a',
                '#zo-header.header-fixed #zo-header-navigation .main-navigation .menu-main-menu > ul > li ul li a '),
            'units' => 'px',
            'default' => array(
                'font-size' => '13px',
            )
        ),
        array(
            'id' => 'sticky_menu_icon_font_size',
            'type' => 'typography',
            'title' => esc_html__('Sticky Menu Icon Font Size', 'lucian'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'font-weight' => false,
            'font-family' => false,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('#zo-header.zo-main-header.header-fixed .menu-main-menu > li > a i'),
            'units' => 'px',
            'default' => array(
                'font-size' => '13px',
            )
        ),

    )
);

/**
 * Page Title
 *
 * @author ZoTheme
 */

/**
 * Page title settings
 *
 */
$page_title = array(
    array(
        'id' => 'page_title_layout',
        'title' => esc_html__('Layouts', 'lucian'),
        'subtitle' => esc_html__('select a layout for page title', 'lucian'),
        'default' => '5',
        'type' => 'image_select',
        'options' => array(
            '' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-0.png',
            '1' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-1.png',
            '2' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-2.png',
            '3' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-3.png',
            '4' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-4.png',
            '5' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-5.png',
            '6' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-6.png',
        )
    ),
    array(
        'id'       => 'page_title_background',
        'type'     => 'background',
        'title'    => esc_html__( 'Background', 'lucian' ),
        'subtitle' => esc_html__( 'page title background with image, color, etc.', 'lucian' ),
        'output'   => array('#zo-page-element-wrap'),
        'default'   => array(
            'background-color'=>'#ffffff',
            'background-image'=> get_template_directory_uri().'/assets/images/pagetitle.jpg',
            'background-repeat'=>'',
            'background-size'=>'cover',
            'background-attachment'=>'',
            'background-position'=>'center center'
        )
    ),
    array(
        'id' => 'page_title_margin',
        'title' => esc_html__('Margin', 'lucian'),
        'type' => 'spacing',
        'units' => 'px',
        'mode' => 'margin',
        'output' => array('#zo-page-element-wrap'),
        'default' => array(
            'margin-top'     => '0',
            'margin-right'   => '0',
            'margin-bottom'  => '80px',
            'margin-left'    => '0',
            'units'          => 'px',
        )
    ),
    array(
        'id' => 'page_title_padding',
        'title' => esc_html__('Padding', 'lucian'),
        'type' => 'spacing',
        'units' => 'px',
        'mode' => 'padding',
        'output' => array('#zo-page-element-wrap'),
        'default' => array(
            'padding-top'     => '320px',
            'padding-right'   => '0',
            'padding-bottom'  => '305px',
            'padding-left'    => '0',
            'units'          => 'px',
        )
    ),
    array(
        'id' => 'page_title_parallax',
        'title' => esc_html__('Enable Header Parallax', 'lucian'),
        'type' => 'switch',
        'default' => false
    ),
    array(
        'id' => 'page_title_custom_post',
        'title' => esc_html__('Custom Background For Post Type', 'lucian'),
        'type' => 'switch',
        'default' => false
    ),
);
/**
 * add custom background for post type
 */

/**
 * Section settings
 */
$this->sections[] = array(
    'title' => esc_html__('Page Title & BC', 'lucian'),
    'icon' => 'el-icon-map-marker',
    'fields' => $page_title
);

/* Page Title */
$this->sections[] = array(
    'icon' => 'el-icon-podcast',
    'title' => esc_html__('Page Title', 'lucian'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'page_title_typography',
            'type' => 'typography',
            'title' => esc_html__('Typography', 'lucian'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('.page-title #page-title-text h1'),
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with title text.', 'lucian'),
            'default' => array(
                'color' => '#fff',
                'font-style' => 'normal',
                'font-weight' => '300',
                'font-family' => 'Open Sans',
                'google' => true,
                'font-size' => '72px',
                'line-height' => '72px',
                'text-align' => 'center'
            )
        ),
        array(
            'id' => 'page_sub_title_typography',
            'type' => 'typography',
            'title' => esc_html__('Sub Title', 'lucian'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('.page-title #page-title-text .page-sub-title'),
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with sub title text.', 'lucian'),
            'default' => array(
                'color' => '#fff',
                'font-style' => 'normal',
                'font-weight' => '400',
                'font-family' => 'Damion',
                'google' => true,
                'font-size' => '36px',
                'line-height' => '60px',
                'text-align' => 'center'
            )
        ),
    )
);
/* Breadcrumb */
$this->sections[] = array(
    'icon' => 'el-icon-random',
    'title' => esc_html__('Breadcrumb', 'lucian'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('The text before the breadcrumb home.', 'lucian'),
            'id' => 'breacrumb_home_prefix',
            'type' => 'text',
            'title' => esc_html__('Breadcrumb Home Prefix', 'lucian'),
            'default' => 'Home'
        ),
        array(
            'id' => 'breacrumb_typography',
            'type' => 'typography',
            'title' => esc_html__('Typography', 'lucian'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('#breadcrumb #breadcrumb-text .breadcrumbs','#breadcrumb #breadcrumb-text ul li a'),
            'units' => 'px',
            'subtitle' => esc_html__('Typography option with title text.', 'lucian'),
            'default' => array(
                'color' => '',
                'font-style' => 'normal',
                'font-weight' => '400',
                'font-family' => 'Open Sans',
                'google' => true,
                'font-size' => '13px',
                'line-height' => '13px',
                'text-align' => 'center'
            )
        ),
    )
);

/**
 * Body
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Body', 'lucian'),
    'icon' => 'el-icon-website',
    'fields' => array(
	    array(
		    'id' => 'body_layout',
		    'type' => 'select',
		    'options' => array(
			    'zo-wide' => 'Wide',
			    'zo-boxed' => 'Boxed',
		    ),
		    'title' => __('Layout', 'lucian'),
		    'subtitle' => esc_html__( 'Set layout.', 'lucian' ),
		    'default' => 'zo-wide',
	    ),
        array(
            'id'       => 'body_background',
            'type'     => 'background',
            'title'    => esc_html__( 'Background', 'lucian' ),
            'subtitle' => esc_html__( 'body background with image, color, etc.', 'lucian' ),
            'output'   => array('body'),
        ),
        array(
            'id' => 'body_margin',
            'title' => esc_html__('Margin', 'lucian'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('body #page'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'body_padding',
            'title' => esc_html__('Padding', 'lucian'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('body #page'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '0',
                'units'          => 'px',
            )
        ),
    )
);

/**
 * Content
 *
 * Archive, Pages, Single, 404, Search, Category, Tags ....
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Content', 'lucian'),
    'icon' => 'el-icon-compass',
    'subsection' => true,
    'fields' => array(
        array(
            'id'       => 'container_background',
            'type'     => 'background',
            'title'    => esc_html__( 'Background', 'lucian' ),
            'subtitle' => esc_html__( 'Container background with image, color, etc.', 'lucian' ),
            'output'   => array('#main'),
        ),
        array(
            'id' => 'container_margin',
            'title' => esc_html__('Margin', 'lucian'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('body #page #main'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'container_padding',
            'title' => esc_html__('Padding', 'lucian'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('body #page #main'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '0',
                'units'          => 'px',
            )
        )
    )
);

/**
 * Page Loadding
 *
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Page Loadding', 'lucian'),
    'icon' => 'el-icon-compass',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Enable page loadding.', 'lucian'),
            'id' => 'enable_page_loadding',
            'type' => 'switch',
            'title' => esc_html__('Enable Page Loadding', 'lucian'),
            'default' => false,
        ),
        array(
            'subtitle' => esc_html__('Select Style Page Loadding.', 'lucian'),
            'id' => 'page_loadding_style',
            'type' => 'select',
            'options' => array(
                '1' => 'Style 1',
                '2' => 'Style 2'
            ),
            'title' => esc_html__('Page Loadding Style', 'lucian'),
            'default' => 'style-1',
            'required' => array( 0 => 'enable_page_loadding', 1 => '=', 2 => 1 )
        )
    )
);

/**
 * Footer
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Footer', 'lucian'),
    'icon' => 'el-icon-credit-card',
);

/* Footer top */
$this->sections[] = array(
    'title' => esc_html__('Footer Top', 'lucian'),
    'icon' => 'el-icon-fork',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Enable footer top.', 'lucian'),
            'id' => 'enable_footer_top',
            'type' => 'switch',
            'title' => esc_html__('Enable Footer Top', 'lucian'),
            'default' => true,
        ),
        array(
            'id'       => 'footer_background',
            'type'     => 'background',
            'title'    => esc_html__( 'Background', 'lucian' ),
            'subtitle' => esc_html__( 'footer background with image, color, etc.', 'lucian' ),
            'output'   => array('footer #zo-footer-top'),
            'default'   => array(
                'background-color'=>'#212121'
            ),
            'required' => array( 0 => 'enable_footer_top', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'footer_margin',
            'title' => esc_html__('Margin', 'lucian'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('footer #zo-footer-top'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'enable_footer_top', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'footer_padding',
            'title' => esc_html__('Padding', 'lucian'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('footer #zo-footer-top'),
            'default' => array(
                'padding-top'     => '60px',
                'padding-right'   => '0',
                'padding-bottom'  => '70px',
                'padding-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'enable_footer_top', 1 => '=', 2 => 1 )
        ),
    )
);

/* footer botton */
$this->sections[] = array(
    'title' => esc_html__('Footer Bottom', 'lucian'),
    'icon' => 'el-icon-bookmark',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Enable footer bottom.', 'lucian'),
            'id' => 'enable_footer_bottom',
            'type' => 'switch',
            'title' => esc_html__('Enable Footer Bottom', 'lucian'),
            'default' => true,
        ),
        array(
            'id'       => 'footer_botton_background',
            'type'     => 'background',
            'title'    => esc_html__( 'Background', 'lucian' ),
            'subtitle' => esc_html__( 'background with image, color, etc.', 'lucian' ),
            'output'   => array('footer #zo-footer-bottom'),
            'default'   => array(
                'background-color'=>'#181818'
            ),
            'required' => array( 0 => 'enable_footer_bottom', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'footer_bottom_margin',
            'title' => esc_html__('Margin', 'lucian'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('footer #zo-footer-bottom'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'enable_footer_bottom', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'footer_bottom_padding',
            'title' => esc_html__('Padding', 'lucian'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('footer #zo-footer-bottom'),
            'default' => array(
                'padding-top'     => '20px',
                'padding-right'   => '0',
                'padding-bottom'  => '20px',
                'padding-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'enable_footer_bottom', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => esc_html__('enable button back to top.', 'lucian'),
            'id' => 'footer_botton_back_to_top',
            'type' => 'switch',
            'title' => esc_html__('Back To Top', 'lucian'),
            'default' => true,
        )
    )
);

/**
 * Button Option
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Button', 'lucian'),
    'icon' => 'el el-bold',
    'fields' => array(
        array(
            'id' => 'button_font_size',
            'type' => 'typography',
            'title' => esc_html__('Button Font Size', 'lucian'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'font-weight' => false,
            'font-family' => false,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('.vc_general.vc_btn3.btn , button.vc_general.vc_btn3, a.vc_general.vc_btn3 , .button, .btn, input[type="submit"]'),
            'units' => 'px',
            'default' => array(
                'font-size' => '12px',
            )
        ),
        array(
            'subtitle' => esc_html__('Enable button uppercase.', 'lucian'),
            'id' => 'button_text_uppercase',
            'type' => 'switch',
            'title' => esc_html__('Button Text Uppercase', 'lucian'),
            'default' => true,
        ),
    )
);

/* Button Default */
$this->sections[] = array(
    'icon' => 'el el-minus',
    'title' => esc_html__('Button Default', 'lucian'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'btn_default_padding',
            'title' => esc_html__('Button Default - Padding', 'lucian'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('.btn, .vc_general.vc_btn3.btn , button.vc_general.vc_btn3, a.vc_general.vc_btn3, .button, .btn, input[type="submit"]'),
            'default' => array(
                'padding-top'     => '18px',
                'padding-right'   => '25px',
                'padding-bottom'  => '18px',
                'padding-left'    => '25px',
                'units'          => 'px',
            ),
        ),
        array(
            'id'       => 'btn_default_border',
            'type'     => 'border',
            'title'    => esc_html__('Button Default - Border', 'lucian'),
            'output'   => array('.btn, .vc_general.vc_btn3.btn , button.vc_general.vc_btn3, a.vc_general.vc_btn3, .button, .btn, input[type="submit"]'),
            'default'  => array(
                'border-style'  => 'solid',
                'border-color'  => '#ffffff',
                'border-top'    => '1px',
                'border-right'  => '1px',
                'border-bottom' => '1px',
                'border-left'   => '1px'
            )
        ),
        array(
            'id'       => 'btn_default_border_hover',
            'type'     => 'border',
            'title'    => esc_html__('Button Default - Border Hover', 'lucian'),
            'output'   => array('.btn, .vc_general.vc_btn3.btn:hover, button.vc_general.vc_btn3:hover, a.vc_general.vc_btn3:hover, .button:hover, .btn:hover, input[type="submit"]:hover, .vc_general.vc_btn3.btn:focus, button.vc_general.vc_btn3:focus, a.vc_general.vc_btn3:focus, .button:focus, .btn:focus, input[type="submit"]:focus'),
            'default'  => array(
                'border-style'  => 'solid',
                'border-color'  => '#ffffff',
                'border-top'    => '1px',
                'border-right'  => '1px',
                'border-bottom' => '1px',
                'border-left'   => '1px'
            )
        ),
        array(
            'id'       => 'btn_default_border_radius',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => esc_html__('Button Default - Border Radius', 'lucian'),
            'width' => false,
            'default'  => array(
                'height'  => '0'
            ),
        ),
    )
);

/* Button Primary */
$this->sections[] = array(
    'icon' => 'el el-minus',
    'title' => esc_html__('Button Primary', 'lucian'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'btn_primary_padding',
            'title' => esc_html__('Button Primary - Padding', 'lucian'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('.btn.btn-primary, .vc_general.btn.btn-primary'),
            'default' => array(
                'padding-top'     => '18px',
                'padding-right'   => '25px',
                'padding-bottom'  => '18px',
                'padding-left'    => '25px',
                'units'          => 'px',
            ),
        ),
        array(
            'id'       => 'btn_primary_border',
            'type'     => 'border',
            'title'    => esc_html__('Button Primary - Border', 'lucian'),
            'output'   => array('.btn.btn-primary, .vc_general.vc_btn3.btn.btn-primary'),
            'default'  => array(
                'border-style'  => 'solid',
                'border-color'  => '#ff83a6',
                'border-top'    => '1px',
                'border-right'  => '1px',
                'border-bottom' => '1px',
                'border-left'   => '1px'
            )
        ),
        array(
            'id'       => 'btn_primary_border_hover',
            'type'     => 'border',
            'title'    => esc_html__('Button Primary - Border Hover', 'lucian'),
            'output'   => array('.btn.btn-primary, .vc_general.vc_btn3.btn.btn-primary:hover, .vc_general.vc_btn3.btn.btn-primary:focus'),
            'default'  => array(
                'border-style'  => 'solid',
                'border-color'  => '#ff83a6',
                'border-top'    => '1px',
                'border-right'  => '1px',
                'border-bottom' => '1px',
                'border-left'   => '1px'
            )
        ),
        array(
            'id'       => 'btn_primary_border_radius',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => esc_html__('Button Primary - Border Radius', 'lucian'),
            'width' => false,
            'default'  => array(
                'height'  => '0'
            ),
        ),
    )
);
/**
 * Styling
 *
 * css color.
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Styling', 'lucian'),
    'icon' => 'el-icon-adjust',
    'fields' => array(
        array(
            'subtitle' => esc_html__('set color main color.', 'lucian'),
            'id' => 'primary_color',
            'type' => 'color',
            'title' => esc_html__('Primary Color', 'lucian'),
            'default' => '#ff83a6'
        ),
        array(
            'id' => 'secondary_color',
            'type' => 'color',
            'title' => esc_html__('Secondary Color', 'lucian'),
            'default' => '#ff83a6'
        ),
        array(
            'subtitle' => esc_html__('set color for tags <a></a>.', 'lucian'),
            'id' => 'link_color',
            'type' => 'link_color',
            'title' => esc_html__('Link Color', 'lucian'),
            'output'  => array('a'),
            'default' => array(
				'regular'  => '#3c3c3c',
				'hover'    => '#ff83a6',
			)
        ),
    )
);

/** Header Top Color **/
$this->sections[] = array(
    'title' => esc_html__('Header Top Color', 'lucian'),
    'icon' => 'el-icon-minus',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Set background color header top.', 'lucian'),
            'id' => 'bg_header_top_color',
            'type' => 'background',
            'output'  => array('body #zo-header-top'),
            'title' => esc_html__('Background Color', 'lucian'),
            'default' => array(
				'background-color' => '#ececec',
			)
        ),
        array(
            'subtitle' => esc_html__('Set color header top.', 'lucian'),
            'id' => 'header_top_color',
            'type' => 'color',
            'output'  => array('body #zo-header-top'),
            'title' => esc_html__('Font Color', 'lucian'),
            'default' => ''
        )
    )
);

/** Header Main Color **/
$this->sections[] = array(
    'title' => esc_html__('Header Main Color', 'lucian'),
    'icon' => 'el-icon-minus',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('set color for header background color.', 'lucian'),
            'id' => 'bg_header',
            'type' => 'color_rgba',
            'title' => esc_html__('Header Background Color', 'lucian'),
            'default'   => array(
	            'color' => '#FFF',
                'alpha'     => 0
            )
        )
    )
);

/** Sticky Header Color **/
$this->sections[] = array(
    'title' => esc_html__('Sticky Header', 'lucian'),
    'icon' => 'el-icon-minus',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('set color for sticky header.', 'lucian'),
            'id' => 'bg_sticky_header',
            'type' => 'color_rgba',
            'title' => esc_html__('Sticky Background Color', 'lucian'),
            'default'   => array(
                'alpha'     => 0
            ),
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        )
    )
);

/** Menu Color **/

$this->sections[] = array(
    'title' => esc_html__('Menu Color', 'lucian'),
    'icon' => 'el-icon-minus',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Controls the text color of first level menu items.', 'lucian'),
            'id' => 'menu_color_first_level',
            'type' => 'color',
            'title' => esc_html__('Menu Font Color - First Level', 'lucian'),
            'default' => '#fff'
        ),
        array(
            'subtitle' => esc_html__('Controls the text hover color of first level menu items.', 'lucian'),
            'id' => 'menu_color_hover_first_level',
            'type' => 'color',
            'title' => esc_html__('Menu Font Color Hover - First Level', 'lucian'),
            'default' => '#fff'
        ),
        array(
            'subtitle' => esc_html__('Controls the text hover color of first level menu items.', 'lucian'),
            'id' => 'menu_color_active_first_level',
            'type' => 'color',
            'title' => esc_html__('Menu Font Color Active - First Level', 'lucian'),
            'default' => '#fff'
        ),
        array(
            'subtitle' => esc_html__('Controls the text color of sub level menu items.', 'lucian'),
            'id' => 'menu_color_sub_level',
            'type' => 'color',
            'title' => esc_html__('Menu Font Color - Sub Level', 'lucian'),
            'default' => '#909090'
        ),
        array(
            'subtitle' => esc_html__('Controls the text hover color of sub level menu items.', 'lucian'),
            'id' => 'menu_color_hover_sub_level',
            'type' => 'color',
            'title' => esc_html__('Menu Font Color Hover - Sub Level', 'lucian'),
            'default' => '#ff83a6'
        ),
        array(
            'subtitle' => esc_html__('Controls the border color of sub level menu items.', 'lucian'),
            'id' => 'menu_item_border_color',
            'type' => 'color',
            'title' => esc_html__('Border Color - Sub Level', 'lucian'),
            'default' => '',
            'required' => array( 0 => 'menu_border_color_bottom', 1 => '=', 2 => 1 )
        )
    )
);

/** Button Color **/

$this->sections[] = array(
    'title' => esc_html__('Button Color', 'lucian'),
    'icon' => 'el el-bold',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Controls the button text color.', 'lucian'),
            'id' => 'btn_default_color',
            'type' => 'color',
            'title' => esc_html__('Button Default - Font Color', 'lucian'),
            'default' => '#242424'
        ),
        array(
            'subtitle' => esc_html__('Controls the button text hover color.', 'lucian'),
            'id' => 'btn_default_color_hover',
            'type' => 'color',
            'title' => esc_html__('Button Default - Font Color Hover', 'lucian'),
            'default' => '#ff83a6'
        ),
        array(
            'subtitle' => esc_html__('Controls the button background color.', 'lucian'),
            'id' => 'btn_default_bg_color',
            'type' => 'color',
            'title' => esc_html__('Button Default - Background Color', 'lucian'),
            'default' => '#ffffff'
        ),
        array(
            'subtitle' => esc_html__('Controls the button background color.', 'lucian'),
            'id' => 'btn_default_bg_color_hover',
            'type' => 'color',
            'title' => esc_html__('Button Default - Background Color Hover', 'lucian'),
            'default' => '#ffffff'
        ),
        array(
            'subtitle' => esc_html__('Controls the button text color.', 'lucian'),
            'id' => 'btn_primary_color',
            'type' => 'color',
            'title' => esc_html__('Button Primary - Font Color', 'lucian'),
            'default' => '#ffffff'
        ),
        array(
            'subtitle' => esc_html__('Controls the button text hover color.', 'lucian'),
            'id' => 'btn_primary_color_hover',
            'type' => 'color',
            'title' => esc_html__('Button Primary - Font Color Hover', 'lucian'),
            'default' => '#242424'
        ),
        array(
            'subtitle' => esc_html__('Controls the button background color.', 'lucian'),
            'id' => 'btn_primary_bg_color',
            'type' => 'color',
            'title' => esc_html__('Button Primary - Background Color', 'lucian'),
            'default' => '#ff83a6'
        ),
        array(
            'subtitle' => esc_html__('Controls the button background color.', 'lucian'),
            'id' => 'btn_primary_bg_color_hover',
            'type' => 'color',
            'title' => esc_html__('Button Primary - Background Color Hover', 'lucian'),
            'default' => '#ff83a6'
        ),
    )
);

/** Footer Top Color **/
$this->sections[] = array(
    'title' => esc_html__('Footer Top Color', 'lucian'),
    'icon' => 'el-icon-chevron-up',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Set color footer top.', 'lucian'),
            'id' => 'footer_top_color',
            'type' => 'color',
            'output' => array('#zo-footer-top'),
            'title' => esc_html__('Footer Top Color', 'lucian'),
            'default' => '#676767'
        ),
        array(
            'subtitle' => esc_html__('Set title color footer top.', 'lucian'),
            'id' => 'footer_heading_color',
            'type' => 'color',
            'output' => array('#zo-footer-top h1,#zo-footer-top h2,#zo-footer-top h3,#zo-footer-top h4,#zo-footer-top h5,#zo-footer-top h6'),
            'title' => esc_html__('Footer Heading Color', 'lucian'),
            'default' => '#ffffff'
        ),
        array(
            'subtitle' => esc_html__('Set title link color footer top.', 'lucian'),
            'id' => 'footer_top_link_color',
            'type' => 'link_color',
            'output' => array('#zo-footer-top a'),
            'title' => esc_html__('Footer Link Color', 'lucian'),
            'default' => array(
				'regular'  => '#676767',
				'hover'    => '#ff83a6',
			)
        ),
    )
);

/** Footer Bottom Color **/
$this->sections[] = array(
    'title' => esc_html__('Footer Bottom Color', 'lucian'),
    'icon' => 'el-icon-chevron-down',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => esc_html__('Set color footer top.', 'lucian'),
            'id' => 'footer_bottom_color',
            'type' => 'color',
            'output' => array('#zo-footer-bottom'),
            'title' => esc_html__('Footer Bottom Color', 'lucian'),
            'default' => '#3a3a3a'
        )
    )
);

/**
 * Typography
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Typography', 'lucian'),
    'icon' => 'el-icon-text-width',
    'fields' => array(
        array(
            'id' => 'font_body',
            'type' => 'typography',
            'title' => esc_html__('Body Font', 'lucian'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body'),
            'units' => 'px',
            'default' => array(
                'color' => '#676767',
                'font-style' => 'normal',
                'font-weight' => '400',
                'font-family' => 'Open Sans',
                'google' => true,
                'font-size' => '14px',
                'line-height' => '30px',
                'text-align' => ''
            ),
            'subtitle' => esc_html__('Typography option with each property can be called individually.', 'lucian'),
        ),
        array(
            'id' => 'font_h1',
            'type' => 'typography',
            'title' => esc_html__('H1', 'lucian'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h1'),
            'units' => 'px',
            'default' => array(
                'color' => '#3c3c3c',
                'font-style' => 'normal',
                'font-weight' => '300',
                'font-family' => 'Open Sans',
                'google' => true,
                'font-size' => '36px',
                'line-height' => '40px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h2',
            'type' => 'typography',
            'title' => esc_html__('H2', 'lucian'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h2'),
            'units' => 'px',
            'default' => array(
                'color' => '#3c3c3c',
                'font-style' => 'normal',
                'font-weight' => '300',
                'font-family' => 'Open Sans',
                'google' => true,
                'font-size' => '30px',
                'line-height' => '36px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h3',
            'type' => 'typography',
            'title' => esc_html__('H3', 'lucian'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h3'),
            'units' => 'px',
            'default' => array(
                'color' => '#3c3c3c',
                'font-style' => 'normal',
                'font-weight' => '300',
                'font-family' => 'Open Sans',
                'google' => true,
                'font-size' => '24px',
                'line-height' => '28px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h4',
            'type' => 'typography',
            'title' => esc_html__('H4', 'lucian'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h4'),
            'units' => 'px',
            'default' => array(
                'color' => '#3c3c3c',
                'font-style' => 'normal',
                'font-weight' => '300',
                'font-family' => 'Open Sans',
                'google' => true,
                'font-size' => '20px',
                'line-height' => '24px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h5',
            'type' => 'typography',
            'title' => esc_html__('H5', 'lucian'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h5'),
            'units' => 'px',
            'default' => array(
                'color' => '#3c3c3c',
                'font-style' => 'normal',
                'font-weight' => '300',
                'font-family' => 'Open Sans',
                'google' => true,
                'font-size' => '18px',
                'line-height' => '24px',
                'text-align' => ''
            )
        ),
        array(
            'id' => 'font_h6',
            'type' => 'typography',
            'title' => esc_html__('H6', 'lucian'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h6'),
            'units' => 'px',
            'default' => array(
                'color' => '#3c3c3c',
                'font-style' => 'normal',
                'font-weight' => '300',
                'font-family' => 'Open Sans',
                'google' => true,
                'font-size' => '14px',
                'line-height' => '24px',
                'text-align' => ''
            )
        )
    )
);

/* extra font. */
$this->sections[] = array(
    'title' => esc_html__('Extra Fonts', 'lucian'),
    'icon' => 'el el-fontsize',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'google-font-1',
            'type' => 'typography',
            'title' => esc_html__('Font 1', 'lucian'),
            'subtitle' => esc_html__('extend class "zo_extra_font1" to using this font', 'lucian'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
            'subsets'=> false,
            'default' => array(
                'font-weight' => '400',
                'font-family' => 'Damion'
            )
        ),
        array(
            'id' => 'google-font-2',
            'type' => 'typography',
            'title' => esc_html__('Font 2', 'lucian'),
            'subtitle' => esc_html__('extend class "zo_extra_font2" to using this font', 'lucian'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
            'subsets'=> false,
            'default' => array(
                'font-weight' => '400',
                'font-family' => 'Crimson Text'
            )
        ),
        array(
            'id' => 'google-font-3',
            'type' => 'typography',
            'title' => esc_html__('Font 3', 'lucian'),
            'subtitle' => esc_html__('extend class "zo_extra_font3" to using this font', 'lucian'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
            'subsets'=> false,
            'default' => array(
                'font-weight' => '400italic',
                'font-family' => 'Crimson Text'
            )
        ),
    )
);

/* local fonts. */
$this->sections[] = array(
    'title' => esc_html__('Local Fonts', 'lucian'),
    'icon' => 'el-icon-bookmark',
    'subsection' => true,
    'fields' => array(
        array(
            'id'       => 'local-fonts-1',
            'type'     => 'select',
            'title'    => esc_html__( 'Fonts 1', 'lucian' ),
            'options'  => $local_fonts,
            'default'  => '',
        ),
        array(
            'id' => 'local-fonts-selector-1',
            'type' => 'textarea',
            'title' => esc_html__('Selector 1', 'lucian'),
            'subtitle' => esc_html__('add html tags ID or class (body,a,.class,#id)', 'lucian'),
            'validate' => 'no_html',
            'default' => '',
            'required' => array(
                0 => 'local-fonts-1',
                1 => '!=',
                2 => ''
            )
        ),
        array(
            'id'       => 'local-fonts-2',
            'type'     => 'select',
            'title'    => esc_html__( 'Fonts 2', 'lucian' ),
            'options'  => $local_fonts,
            'default'  => '',
        ),
        array(
            'id' => 'local-fonts-selector-2',
            'type' => 'textarea',
            'title' => esc_html__('Selector 2', 'lucian'),
            'subtitle' => esc_html__('add html tags ID or class (body,a,.class,#id)', 'lucian'),
            'validate' => 'no_html',
            'default' => '',
            'required' => array(
                0 => 'local-fonts-2',
                1 => '!=',
                2 => ''
            )
        )
    )
);

/**
 * Custom CSS
 *
 * extra css for customer.
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Custom CSS', 'lucian'),
    'icon' => 'el-icon-bulb',
    'fields' => array(
        array(
            'id' => 'custom_css',
            'type' => 'ace_editor',
            'title' => esc_html__('CSS Code', 'lucian'),
            'subtitle' => esc_html__('create your css code here.', 'lucian'),
            'mode' => 'css',
            'theme' => 'monokai',
        )
    )
);
/**
 * Animations
 *
 * Animations options for theme. libs css, js.
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Animations', 'lucian'),
    'icon' => 'el-icon-magic',
    'fields' => array(
        array(
            'subtitle' => esc_html__('Enable animation parallax for images...', 'lucian'),
            'id' => 'parallax',
            'type' => 'switch',
            'title' => esc_html__('Images Paralax', 'lucian'),
            'default' => true
        ),
    )
);
/**
 * Optimal Core
 *
 * Optimal options for theme. optimal speed
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Optimal Core', 'lucian'),
    'icon' => 'el-icon-idea',
    'fields' => array(
        array(
            'subtitle' => esc_html__('no minimize , generate css over time...', 'lucian'),
            'id' => 'dev_mode',
            'type' => 'switch',
            'title' => esc_html__('Dev Mode (not recommended)', 'lucian'),
            'default' => false
        )
    )
);
/**
 * Favicon
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => esc_html__('Favicon', 'lucian'),
    'icon' => 'el-icon-idea',
    'fields' => array(
	    array(
		    'title' => esc_html__('Select Favicon', 'lucian'),
		    'subtitle' => esc_html__('Select an image file for your favicon.', 'lucian'),
		    'id' => 'favicon',
		    'type' => 'media',
		    'url' => true,
		    'default' => array(
			    'url'=> get_template_directory_uri().'/favicon.ico'
		    )
	    ),
    )
);