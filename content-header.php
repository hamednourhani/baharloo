<?php global $hnmOpt; ?>

<div class="top-strip">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 lang-container">
                <?php do_action('wpml_add_language_selector'); ?>
            </div>
            <div class="col-sm-6">
                <?php
                if( $hnmOpt['phone'] )
                {
                    echo '<h2 class="delt-bord">' . $hnmOpt['phone'] . '</h2>';
                }
                if( $hnmOpt['email'] )
                {
                    echo '<h2>' . $hnmOpt['email'] . '</h2>';
                }
                ?>
            </div>
            

        </div>
    </div>
</div>

<header>
    <div class="container">
        <div class="row">

            <div class="col-sm-12 bottom-strip p-both">

                <div class="col-sm-12 col-xs-12 logo">
                    <?php
                    if( !empty( $hnmOpt['logo']['url'] ) )
                    {




                        if(ICL_LANGUAGE_CODE == 'en'){?>
                            <a class="logo-wrapper" href="<?php echo esc_url( get_home_url('/') ); ?>" rel="home">
                                <img src="<?php echo get_template_directory_uri().'/images/baharloo-logo-en.png';?>"/>
                            </a>
                        <?php } else{ ?>
                            <a class="logo-wrapper" href="<?php echo esc_url( get_home_url('/') ); ?>" rel="home">
                                <img src="<?php echo esc_url( $hnmOpt['logo']['url'] ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" />
                            </a>
                            <div class="baharloo-desc">
                                <img src="<?php echo get_template_directory_uri().'/images/baharloo.png';?>"/>
                            </div>
                        <?php }
                    } else {
                        ?>
                        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php
                    }
                    ?>
                </div>

                <div class="col-sm-12 col-xs-12 navigation">
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">

                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                    <span class="sr-only"><?php _e( 'Toggle navigation', 'health-plus' ); ?></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>

                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <?php
                                if ( has_nav_menu( 'primary' ) ) {
                                    $args = array(
                                        'theme_location'  => 'primary',
                                        'container'       => '',
                                        'menu_class'      => 'nav navbar-nav',
                                        'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
                                        'walker'          => new HNM_walker_nav_menu()
                                    );
                                    wp_nav_menu( $args );
                                }
                                ?>
                            </div>

                        </div>
                    </nav>
                </div>

            </div>

        </div>
    </div>
</header>