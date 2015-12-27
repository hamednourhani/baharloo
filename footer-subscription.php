
<?php global $hnmOpt; ?>

<?php if( $hnmOpt['footer_subscription'] == true ) : ?>

<div class="col-sm-12">

	<div class="subscription-form">

		<?php if( !empty( $hnmOpt['footer_subscription_title'] ) ) : ?>
		<h2 class="title-grp"><?php echo $hnmOpt['footer_subscription_title']; ?></h2>
		<?php endif; ?>

		<?php echo do_shortcode( '[mc4wp_form]' ); ?>

	</div>

</div>

<?php endif; ?>