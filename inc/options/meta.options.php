<?php
/**
 * Meta options
 * 
 * @author ZoTheme
 * @since 1.0.0
 */
class ZOMetaOptions
{
    public function __construct()
    {
        add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
        add_action('admin_enqueue_scripts', array($this, 'admin_script_loader'));
    }
    /* add script */
    function admin_script_loader()
    {
        global $pagenow;
        if (is_admin() && ($pagenow == 'post-new.php' || $pagenow == 'post.php')) {
            wp_enqueue_style('metabox', get_template_directory_uri() . '/inc/options/css/metabox.css');
            
            wp_enqueue_script('easytabs', get_template_directory_uri() . '/inc/options/js/jquery.easytabs.min.js');
            wp_enqueue_script('metabox', get_template_directory_uri() . '/inc/options/js/metabox.js');
        }
    }
    /* add meta boxs */
    public function add_meta_boxes()
    {
        $this->add_meta_box('template_page_options', esc_html__('Setting', 'lucian'), 'page');
        $this->add_meta_box('testimonial_options', esc_html__('Testimonial about', 'lucian'), 'testimonial');
        $this->add_meta_box('pricing_options', esc_html__('Pricing Option', 'lucian'), 'pricing');
        $this->add_meta_box('team_options', esc_html__('Team About', 'lucian'), 'team');
        $this->add_meta_box('portfolio_options', esc_html__('Portfolio About', 'lucian'), 'portfolio');
    }
    
    public function add_meta_box($id, $label, $post_type, $context = 'advanced', $priority = 'default')
    {
        add_meta_box('_zo_' . $id, $label, array($this, $id), $post_type, $context, $priority);
    }
    /* --------------------- PAGE ---------------------- */
    function template_page_options() {
        ?>
        <div class="tab-container clearfix">
	        <ul class='etabs clearfix'>
	           <li class="tab"><a href="#tabs-general"><i class="fa fa-server"></i><?php esc_html_e('General', 'lucian'); ?></a></li>
	           <li class="tab"><a href="#tabs-header"><i class="fa fa-diamond"></i><?php esc_html_e('Header', 'lucian'); ?></a></li>
	           <li class="tab"><a href="#tabs-page-title"><i class="fa fa-connectdevelop"></i><?php esc_html_e('Page Title', 'lucian'); ?></a></li>
	        </ul>
	        <div class='panel-container'>
                <div id="tabs-general">
                <?php
                zo_options(array(
                    'id' => 'full_width',
                    'label' => esc_html__('Full Width','lucian'),
                    'type' => 'switch',
                    'options' => array('on'=>'1','off'=>''),
                ));
                ?>
                </div>
                <div id="tabs-header">
                <?php
                /* header. */
                zo_options(array(
                    'id' => 'header',
                    'label' => esc_html__('Header','lucian'),
                    'type' => 'switch',
                    'options' => array('on'=>'1','off'=>''),
                    'follow' => array('1'=>array('#page_header_enable'))
                ));
                ?>  <div id="page_header_enable"><?php
                zo_options(array(
                    'id' => 'header_layout',
                    'label' => esc_html__('Layout','lucian'),
                    'type' => 'imegesselect',
                    'options' => array(
                        '' => get_template_directory_uri().'/inc/options/images/header/default.png',
                        '1' => get_template_directory_uri().'/inc/options/images/header/header-1.png',
                        '2' => get_template_directory_uri().'/inc/options/images/header/header-2.png',
                    )
                ));
                zo_options(array(
                    'id' => 'header_margin',
                    'label' => esc_html__('Header Margin','lucian'),
                    'type' => 'text',
                ));
                zo_options(array(
                    'id' => 'header_padding',
                    'label' => esc_html__('Header Padding','lucian'),
                    'type' => 'text',
                ));
				zo_options(array(
					'id' => 'header_logo',
					'label' => esc_html__('Logo','lucian'),
					'type' => 'image'
				));
                zo_options(array(
	                'id' => 'sticky_logo_enable',
	                'label' => esc_html__('Custom Sticky Logo','lucian'),
	                'type' => 'switch',
	                'options' => array('on'=>'1','off'=>''),
	                'follow' => array('1'=>array('#page_header_sticky_logo'))
                ));
                ?><div id="page_header_sticky_logo"><?php
                zo_options(array(
	                'id' => 'sticky_logo',
	                'label' => esc_html__('Sticky Logo','lucian'),
	                'type' => 'image'
                ));
                ?> </div> <?php
                /*
                 * Custom main menu color
                 */
                zo_options(array(
                    'id' => 'enable_header_menu',
                    'label' => esc_html__('Custom Header Menu Color','lucian'),
                    'type' => 'switch',
                    'options' => array('on'=>'1','off'=>''),
                    'follow' => array('1'=>array('#page_header_menu_enable'))
                ));
                ?> <div id="page_header_menu_enable"><?php
                zo_options(array(
                    'id' => 'header_menu_color',
                    'label' => esc_html__('Menu Color - First Level','lucian'),
                    'type' => 'color',
                    'default' => ''
                ));
                zo_options(array(
                    'id' => 'header_menu_color_hover',
                    'label' => esc_html__('Menu Hover - First Level','lucian'),
                    'type' => 'color',
                    'default' => ''
                ));
                zo_options(array(
                    'id' => 'header_menu_color_active',
                    'label' => esc_html__('Menu Active - First Level','lucian'),
                    'type' => 'color',
                    'default' => ''
                ));
                ?> </div><?php
                /*
                 * Custom menu color for header fixed
                 */
                zo_options(array(
                    'id' => 'enable_header_fixed',
                    'label' => esc_html__('Header Fixed','lucian'),
                    'type' => 'switch',
                    'options' => array('on'=>'1','off'=>''),
                    'follow' => array('1'=>array('#page_header_fixed_enable'))
                ));
                ?> <div id="page_header_fixed_enable"><?php
                zo_options(array(
                    'id' => 'header_fixed_bg_color',
                    'label' => esc_html__('Header Fixed - Background Color','lucian'),
                    'type' => 'color',
                    'default' => '#fff',
                    'rgba' => true
                ));
                zo_options(array(
                    'id' => 'header_fixed_menu_color',
                    'label' => esc_html__('Header Fixed - Menu Color - First Level','lucian'),
                    'type' => 'color',
                    'default' => ''
                ));
                zo_options(array(
                    'id' => 'header_fixed_menu_color_hover',
                    'label' => esc_html__('Header Fixed - Menu Hover Color - First Level','lucian'),
                    'type' => 'color',
                    'default' => ''
                ));
                zo_options(array(
                    'id' => 'header_fixed_menu_color_active',
                    'label' => esc_html__('Header Fixed - Menu Active Color - First Level','lucian'),
                    'type' => 'color',
                    'default' => ''
                ));
                ?> </div><?php
                $menus = array();
                $menus[''] = 'Default';
                $obj_menus = wp_get_nav_menus();
                foreach ($obj_menus as $obj_menu){
                    $menus[$obj_menu->term_id] = $obj_menu->name;
                }
                $navs = get_registered_nav_menus();
                foreach ($navs as $key => $mav){
                    zo_options(array(
                    'id' => $key,
                    'label' => $mav,
                    'type' => 'select',
                    'options' => $menus
                    ));
                }
                ?>
                </div>
                </div>
                <div id="tabs-page-title">
                <?php
                /* page title. */
                zo_options(array(
                    'id' => 'page_title',
                    'label' => esc_html__('Page Title','lucian'),
                    'type' => 'switch',
                    'options' => array('on'=>'1','off'=>''),
                    'follow' => array('1'=>array('#page_title_enable'))
                ));
                ?>  <div id="page_title_enable"><?php
                zo_options(array(
                    'id' => 'page_title_text',
                    'label' => esc_html__('Title','lucian'),
                    'type' => 'text',
                ));
                zo_options(array(
                    'id' => 'page_title_sub_text',
                    'label' => esc_html__('Sub Title','lucian'),
                    'type' => 'text',
                ));
                zo_options(array(
                    'id' => 'page_title_margin',
                    'label' => esc_html__('Page Title Margin','lucian'),
                    'type' => 'text',
                ));
                zo_options(array(
                    'id' => 'page_title_background',
                    'label' => esc_html__('Page Title Background','lucian'),
                    'type' => 'image',
                ));
                zo_options(array(
                    'id' => 'page_title_type',
                    'label' => esc_html__('Layout','lucian'),
                    'type' => 'imegesselect',
                    'options' => array(
                        '' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-0.png',
                        '1' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-1.png',
                        '2' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-2.png',
                        '3' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-3.png',
                        '4' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-4.png',
                        '5' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-5.png',
                        '6' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-6.png',
                    )
                ));
                ?>
                </div>
                </div>
            </div>
        </div>
        <?php
    }
    /* --------------------- RATING TESTIMONIAL ---------------------- */
    function testimonial_options(){
        ?>
        <div class="testimonial-rating">
            <?php
                zo_options(array(
                    'id' => 'testimonial_position',
                    'label' => esc_html__('Client Position','lucian'),
                    'type' => 'text',
                ));
            ?>
        </div>
        <?php
    }
    /* --------------------- PRICING ---------------------- */

    function pricing_options() {
        ?>
        <div class="pricing-option-wrap">
            <table class="wp-list-table widefat fixed">
                <tr>
                    <td>
                        <?php
                        zo_options(array(
                            'id' => 'price',
                            'label' => esc_html__('Price','lucian'),
                            'type' => 'text',
                        ));
						
                        zo_options(array(
                            'id' => 'value',
                            'label' => esc_html__('Value','lucian'),
                            'type' => 'select',
                            'options' => array(
                                'Monthly' => 'Monthly',
                                'Year' => 'Year'
                            )
                        ));

                        zo_options(array(
                            'id' => 'color',
                            'label' => esc_html__('Header Color','lucian'),
                            'type' => 'color',
                            'default' => ''
                        ));

                        ?>
                    </td>
                    <td>
                        <?php
                        zo_options(array(
                            'id' => 'is_feature',
                            'label' => esc_html__('Is feature','lucian'),
                            'type' => 'switch',
                            'options' => array('on'=>'1','off'=>''),
                        ));

                        zo_options(array(
                            'id' => 'button_url',
                            'label' => esc_html__('Button Url','lucian'),
                            'type' => 'text',
                        ));

                        zo_options(array(
                            'id' => 'button_text',
                            'label' => esc_html__('Button Text','lucian'),
                            'type' => 'text',
                        ));
                        ?>
                    </td>
                </tr>
            </table>
        </div>
    <?php
    }
    /* --------------------- PRICING ---------------------- */

    /*-----------------------TEAM-------------------------*/
    function team_options() {
        ?>

            <div class="tab-container clearfix">
                <ul class='etabs clearfix'>
                    <li class="tab"><a href="#tabs-position"><i class="fa fa-server"></i><?php esc_html_e('Position', 'lucian'); ?></a></li>
                </ul>
                <div class='panel-container'>
                    <div id="tabs-position">
                        <?php
                        zo_options(array(
                            'id' => 'team_position',
                            'label' => esc_html__('Position', 'lucian'),
                            'type' => 'text',
                            'placeholder' => '',
                        ));
                        ?>
                        <?php
                        zo_options(array(
                            'id' => 'socials',
                            'label' => esc_html__('Socials of team','lucian'),
                            'type' => 'social',
                        ));
                        ?>
                    </div>
                </div>
            </div>
        <?php
    }
    /*-----------------------Portfolio-------------------------*/
    function portfolio_options() {
        ?>
        <div class="tab-container clearfix">
            <ul class='etabs clearfix'>
                <li class="tab"><a href="#tabs-about"><i class="fa fa-server"></i><?php esc_html_e('About', 'lucian'); ?></a></li>
                <li class="tab"><a href="#tabs-layout"><i class="fa fa-server"></i><?php esc_html_e('Layout', 'lucian'); ?></a></li>
            </ul>
            <div class='panel-container'>
                <div id="tabs-about">
                    <?php
                    zo_options(array(
                        'id' => 'portfolio_client',
                        'label' => esc_html__('Client', 'lucian'),
                        'type' => 'text',
                        'placeholder' => '',
                    ));
                    zo_options(array(
                        'id' => 'portfolio_date',
                        'label' => esc_html__('Date', 'lucian'),
                        'type' => 'date',
                        'placeholder' => '',
                    ));
                    zo_options(array(
                        'id' => 'portfolio_skills',
                        'label' => esc_html__('Skills', 'lucian'),
                        'type' => 'text',
                        'placeholder' => '',
                    ));
                    zo_options(array(
                        'id' => 'portfolio_url',
                        'label' => esc_html__('URL', 'lucian'),
                        'type' => 'text',
                        'value' => '#',
                    ));
                    zo_options(array(
                        'id' => 'portfolio_images',
                        'label' => esc_html__('Gallery', 'lucian'),
                        'type' => 'images',
                    ));
                    ?>
                </div>
                <div id="tabs-layout">
                    <?php
                    zo_options(array(
                        'id' => 'portfolio_layout',
                        'label' => esc_html__('Layout', 'lucian'),
                        'type' => 'select',
                        'options' => array(
                            '' => 'Full',
                            'sidebar' => 'Sidebar',
                            'noimage' => 'No image'
                        )
                    ));
                    ?>
                </div>
            </div>
        </div>


        <?php
    }
}

new ZOMetaOptions();