<div id="top-bar">
    <div class="container clearfix">
        <div class="col_half fright col_last clearfix nobottommargin">
            <div class="top-links">
                <div id="flags_language_selector"><?php language_selector_flags(); ?></div>
            </div>
        </div>
    </div>
</div>

<header id="header">
    <div id="header-wrap">
        <div class="container clearfix">
            <div id="logo">
                <a href="<?php echo home_url(); ?>" class="standard-logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php bloginfo(); ?>"></a>
                <a href="<?php echo home_url(); ?>" class="retina-logo"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo@2x.png" alt="<?php bloginfo(); ?>"></a>
            </div>
            <nav id="primary-menu" class="style-6">
                <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
             
                <?php if ( has_nav_menu( 'primary' ) ) : ?>
                                <?php
                                    wp_nav_menu( array(
                                        'theme_location' => 'primary',
                                        'menu_class'     => 'primary-menu',
                                        'link_before' => '<div>' , 
                                        'link_after' => '</div>',
                                        'container' => false, 
                                     ) );
                                ?>
                        <?php endif; ?>
               
                <div id="top-search">
                    <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                    <form action="search.html" method="get">
                        <input type="text" name="q" class="form-control" value="" placeholder="Wpisz i naciśnij Enter...">
                    </form>
                </div>
            </nav>
        </div>
    </div>
</header>