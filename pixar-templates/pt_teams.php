
    <div class="doctor">

        <figure>

            <?php the_post_thumbnail(); ?>

            <?php
            $timetable = get_post_meta( get_the_ID(), 'doc_timetable', true );
            if( !empty( $timetable ) )
            {
                echo '<span class="doc-time">' . $timetable . '</span>';
            }
            ?>

        </figure>

        <div class="social-net">
            <?php
            $icons = array( 'facebook', 'twitter', 'google-plus', 'pinterest', 'linkedin', 'youtube-play', 'foursquare',
                'instagram', 'skype', 'tumblr', 'flickr', 'dribbble' );
            foreach( $icons as $icon )
            {
                $icon_url = get_post_meta( get_the_ID(), 'pt_team_' . $icon, true );
                if( !empty( $icon_url ) )
                {
                    echo '<a href="' . esc_url( $icon_url ) . '" class="fa fa-' . $icon . '" target="_blank"></a>';
                }
            }
            ?>
        </div>

        <h2>

            <?php the_title(); ?>

            <?php
            $designation = get_post_meta( get_the_ID(), 'doc_designation', true );
            if( !empty( $designation ) )
            {
                echo '<span>' . $designation . '</span>';
            }
            ?>

        </h2>

    </div>