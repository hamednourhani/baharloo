<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="im-blog">

        <?php the_post_thumbnail(); ?>

        <h2><?php echo get_the_date(); ?></h2>

    </div>

    <div class="col-sm-11 step-right">

        <h2>

            <a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>

            <span>
                <em class="admin"><?php the_author_posts_link(); ?></em><span class="bk">|</span><em class="health"><?php the_tags( '', ', ', '' ); ?></em>
            </span>

        </h2>

        <?php if( is_single() ) : ?>

            <?php the_content(); ?>

        <?php else: ?>

            <?php the_excerpt(); ?>

            <a href="<?php echo esc_url( get_permalink() ); ?>" class="bg"><?php _e( 'Read more', 'health-plus' );?></a>

        <?php endif; ?>

        <div class="bord100"></div>

    </div>

</article>