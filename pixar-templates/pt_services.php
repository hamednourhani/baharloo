
    <div class="service">
        <div class="service-box">

            <?php the_post_thumbnail( 'full' ); ?>

            <div class="lib">

                <h2><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h2>

                <?php the_content(); ?>

            </div>

        </div>
    </div>