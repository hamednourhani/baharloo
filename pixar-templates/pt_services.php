
    <div class="service">
        <div class="service-box">

            <?php the_post_thumbnail( 'full' ); ?>

            <div class="lib">

                <h2><?php the_title(); ?></h2>
<!--                <a href="--><?php ////echo esc_url( get_post_permalink() ); ?><!--"></a>-->

                <?php the_content(); ?>

            </div>

        </div>
    </div>