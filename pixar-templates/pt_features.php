
    <div class="element-lft lft-bottom">

        <?php the_post_thumbnail(); ?>

        <div class="text-needleft">
            <h2><?php the_title(); ?></h2>
            <?php the_excerpt(); ?>
        </div>

        <a class="var2-bt" href="<?php echo esc_url( get_permalink() ); ?>"></a>

    </div>