<?php global $hnmOpt; ?>

<div id="banner-b" class="banner-wrapper">

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

    <div class="relative">
        <div class="container">
            <div class="row">

                <div class="col-sm-5 banner-caption">

                    <?php
                    if( !empty( $hnmOpt['banner_title_b'] ) )
                    {
                        echo '<h2>' . $hnmOpt['banner_title_b'] . '</h2>';
                    }
                    ?>

                    <?php

                    if( !empty( $hnmOpt['banner_contents_b'] ) )
                    {
                        echo '<p>' . $hnmOpt['banner_contents_b'] . '</p>';
                    }
                    ?>

                </div>

                <div class="col-sm-5 col-lg-4 need-right">
                    <div class="form-section">

                        <?php
                        if( !empty( $hnmOpt['appt_form_title'] ) )
                        {
                            echo '<h2>' . $hnmOpt['appt_form_title'] . '</h2>';
                        }
                        ?>

                        <?php
                        if( !empty( $hnmOpt['appt_form'] ) )
                        {
                            echo do_shortcode( $hnmOpt['appt_form'] );
                        }
                        ?>

                    </div>
                </div>

            </div>
        </div>
    </div>

</div>