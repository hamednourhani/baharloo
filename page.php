<?php get_header(); ?><div class="first-section p82-topbot">    <div class="container">        <div class="row">            <?php $subtitle = get_post_meta( get_the_ID(), 'page_subtitle', true ); ?>            <?php if( !empty( $subtitle ) ): ?>                <div class="col-sm-12">                    <h2 class="title-grp extra"><?php echo $subtitle; ?></h2>                </div>            <?php endif; ?>            <?php $layout = get_post_meta( get_the_ID(), 'page_layout', true ); ?>            <?php if( $layout == 'left' ) get_sidebar( 'page' ); ?>            <?php if( ( $layout == 'left' ) || ( $layout == 'right' ) ): ?>            <div class="col-md-8 col-sm-7 about">            <?php else: ?>            <div class="col-sm-12 about">            <?php endif; ?>                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>                    <?php the_content (); ?>                    <?php                    wp_link_pages(                        array(                            'before'           => '<div class="link-pages pager-section">',                            'after'            => '</div>',                            'link_before'      => '<span>',                            'link_after'       => '</span>',                        )                    );                    ?>                <?php endwhile; endif; ?>            </div>            <?php if( $layout == 'right' ) get_sidebar( 'page' ); ?>        </div>    </div></div><?php get_footer(); ?> 