<?php global $hnmOpt; ?>

<div id="banner-a" class="banner-wrapper">

    <div class="banner">
        <?php
        $banner = get_post_meta( get_the_ID(), 'banner_options', true );
        if( isset( $banner ) && ( $banner == 'fimage' ) )
        {
            the_post_thumbnail( 'full' );
        }
        elseif ( isset( $banner ) && ( $banner == 'slider' ) )
        {
            $slider = get_post_meta( get_the_ID(), 'banner_slider', true );
            echo do_shortcode( $slider );
        }
        else
        {
            echo '<img src="' . esc_url( $hnmOpt['page_img']['url'] ) . '" alt="" />';
        }
        ?>
    </div>

    <div class="magnet">
        <div class="container">
            <div class="row row-eq-height">

                <div class="col-sm-6 main-form">

                    <?php
                    if( !empty( $hnmOpt['appt_form_title'] ) )
                    {
                        echo '<h2 class="h24">' . $hnmOpt['appt_form_title'] . '</h2>';
                    }
                    ?>

                    <?php
                    if( !empty( $hnmOpt['appt_form'] ) )
                    {
                        echo do_shortcode( $hnmOpt['appt_form'] );
                    }
                    ?>

                </div>

                <div class="col-sm-6 working-times">

                    <?php
                    if( !empty( $hnmOpt['banner_title'] ) )
                    {
                        echo '<h2 class="h24">' . $hnmOpt['banner_title'] . '</h2>';
                    }
                    ?>

                    <?php
                    if( !empty( $hnmOpt['banner_times'] ) )
                    {
                        echo '<div class="details">' . $hnmOpt['banner_times'] . '</div>';
                    }
                    ?>

                    <?php
                    if( !empty( $hnmOpt['banner_contents'] ) )
                    {
                        echo '<div class="discription"><p>' . $hnmOpt['banner_contents'] . '</p></div>';
                    }
                    ?>


                </div>

            </div>
        </div>
    </div>

</div>