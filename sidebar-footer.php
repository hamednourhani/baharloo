
<footer class="footer">
    <div class="container">
        <div class="row">

            <?php get_template_part( 'footer', 'subscription' ); ?>

            <?php if ( ! dynamic_sidebar( 'sidebar-footer' ) ) : ?>

            <?php endif; ?>

        </div>
    </div>
</footer>