<?php

class HNM_Setup {

    public function __construct() {

		if ( ! is_admin() ) {

			return;

		}

		$menus = get_theme_mod( 'nav_menu_locations' );

		$this->theme = wp_get_theme();

		$has_contents = new WP_Query( array( 'post_type' => 'services', 'fields' => 'ids', 'posts_per_page' => 1 ) );

		$this->steps = array(

			'install-plugins' => array(
				'title' => __( 'Install Required &amp; Recommended Plugins', 'health-plus' ),
				'completed' => class_exists( 'RW_Meta_Box' ) && class_exists( 'ReduxFramework' ) && class_exists( 'Pixar_Features' ) && class_exists( 'Pixar_Teams' ) && class_exists( 'Pixar_Accordions' ) && class_exists( 'Pixar_Services' ),
				'description' => 
					'<p>
						Before you can use Health Plus you must first install required plugins <strong>Redux Framework</strong>,
						<strong>Meta Box</strong>, <strong>Visual Composer</strong>, <strong>Pixar Features</strong>,
						<strong>Pixar Teams</strong>, <strong>Pixar Services</strong>, <strong>Pixar Accordions</strong>
						and <strong>Pixar Testimonials</strong>.
						<br>
						 There are some more plugin that are recommended for some extra features of the theme but not mandatory.
						 <strong>Widgets Import Export & Contact Form 7</strong>.
					</p> 
					<p><strong>Note:</strong></strong>
					<ul>
						<li>It is recommended that you install and activate all the required and recommended plugins before importing
						any XML content.</li>
						<li><strong>Once your plugins are installed</strong> and content is imported please review all plugin
						settings pages to make sure everything has been properly set up.</li>
					</ul>
					<p>' . sprintf( '<a href="%s" class="button button-primary button-large">%s</a>', admin_url( 'themes.php?page=hnm-install-plugins' ), __( 'Install Plugins', 'health-plus' ) ) . '</p>'
			),
			'import-content' => array(
				'title' 		=> __( 'Import Demo Content', 'health-plus' ),
				'completed' 	=> $has_contents->have_posts(),
				'description' 	=>
					'<p>' . __( 'Installing the demo content is not required to use this theme. It is simply meant to provide a way to get a feel for the theme without having to manually set up all of your own content. <strong>If you choose not to import the demo content you need to make sure you manually create all necessary page templates for your website.</strong>', 'health-plus' ). '</p>' .
					'<ul>
						<li><strong>Import Demo Contents</strong> Click on the button to begin importing all the contents to same as Health Plus live demo.</li>
						<li><strong>Import Theme Options</strong> Click on the button to begin importing all the theme options settings. You need to upload the file <em><strong>health-plus-options.json</strong></em> in the import section.<br>This is not required and you can manage the settings manually.</li>
					</ul>' .
					'<p>' . sprintf( '<a href="%s" class="button button-primary button-large">%s</a>', admin_url( 'themes.php?page=hnm-import' ), __( 'Import Demo Contents', 'health-plus' ) ) . ' ' . sprintf( '<a href="%s" class="button button-primary button-large">%s</a>', admin_url( 'themes.php?page=hnm-options' ), __( 'Importing Options', 'health-plus' ) ) . '</p>'
			),
			'setup-widgets' => array(
				'title' 		=> __( 'Import Widgets', 'health-plus' ),
				'completed' 	=> is_active_sidebar( 'sidebar-footer' ) && is_active_sidebar( 'sidebar-blog' ),
				'description' 	=>
					'<p>' . __( 'Manage your widgets to control what displays in the Sidebars, Bottom and Footer section of the site. Click the button, select and upload the <em><strong>health-plus-widgets.wie</strong></em> file in the import section to import all the demo widgets.', 'health-plus' ). '</p>' .
					'<p>' . sprintf( '<a href="%s" class="button button-primary button-large">%s</a>', admin_url( 'tools.php?page=widget-importer-exporter' ), __( 'Import Widgets', 'health-plus' ) ) . ' ' . sprintf( '<a href="%s" class="button button-primary button-large">%s</a>', admin_url( 'widgets.php' ), __( 'Manage Widgets', 'health-plus' ) ) . '</p>',
			),
			'setup-menus' => array(
				'title' 		=> __( 'Setup Menus', 'health-plus' ),
				'description' 	=>
					'<p>' . __( 'Make sure you create and assign your menus to the menu locations found in the theme.', 'health-plus' ) . '</p>' .
					'<p>' . sprintf( '<a href="%s" class="button button-primary button-large">%s</a>', admin_url( 'nav-menus.php' ), __( 'Manage Menus', 'health-plus' ) ) . '</p>' ,
				'completed' 	=> isset( $menus[ 'primary' ] )
			),
			'setup-homepage' => array(
				'title' 		=> __( 'Setup Homepage', 'health-plus' ),
				'description' 	=>
					'<p>' . __( 'In order to display homepage template as your site\'s main front page, you must first assign your static
					page in the WordPress settings. You can also set which page will display your blog posts. If you have
					imported the theme demo content you&#39;ll want to set the page called "Home" as your homepage.', 'health-plus' ) . '</p>' .
					'<p>' . sprintf( '<a href="%s" class="button button-primary button-large">%s</a>', admin_url( 'options-reading.php' ), __( 'Reading Settings', 'health-plus' ) ) . '</p>', 
				'completed' 	=> get_option( 'page_on_front' )
			),
			'support-us' => array(
				'title' 		=> __( 'Get Involved', 'health-plus' ),
				'description' 	=> __( '<p>Help us to improve Health Plus to make it the best theme by submitting feedback and rating.
					You can get in touch with us via social media.</p><p><strong>Request a new Feature or need customisation of this theme, just shot me an email at info@pixarwpthemes.com</strong></p>', 'health-plus' ),
				'completed' 	=> 'n/a',
				'documentation' => array(
					'Leave a Positive Review' 		=> '#',
					'Rate Health Plus 5 Star' 		=> 'http://themeforest.net/downloads',
					'Like on Facebook' 				=> 'https://www.facebook.com/pixarwpthemes',
					'Follow on Twitter' 			=> 'http://twitter.com/pixarwpthemes'
				)
			)
		);

		add_action( 'admin_menu', array( $this, 'add_page' ), 100 );
		add_action( 'admin_menu', array( $this, 'add_meta_boxes' ) );
		add_action( 'admin_head', array( $this, 'admin_css' ) );

    }

    public function add_page() {

		add_theme_page( __( 'Health Plus Setup Guide', 'health-plus' ), __( 'Health+ Setup', 'health-plus' ), 'manage_options', 'hnm-setup', array( $this, 'output' ) );

	}

    public function admin_css() {

		$screen = get_current_screen();

		if ( 'appearance_page_hnm-setup' != $screen->id ) {
			return;
		}
		?>

		<style>
		.accordion-container {
			border: 1px solid #dfdfdf;
			border-width: 1px 1px 0;
		}
		.accordion-section-title:before {
			font-family: 'dashicons';
			display: inline-block;
			font-size: 18px;
			vertical-align: middle;
			margin-top: -1px;
		}
		.install-plugins .accordion-section-title:before {
			content: "\f106";
		}
		.import-content .accordion-section-title:before {
			content: "\f109";
		}
		.import-widgets .accordion-section-title:before {
			content: "\f116";
		}
		.setup-menus .accordion-section-title:before {
			content: "\f333";
		}
		.setup-homepage .accordion-section-title:before {
			content: "\f102";
		}
		.setup-widgets .accordion-section-title:before {
			content: "\f180";
		}
		.customize-theme .accordion-section-title:before {
			content: "\f108";
		}
		.support-us .accordion-section-title:before {
			content: "\f155";
		}
		.is-completed,
		.not-completed {
			color: green;
			font-size: 24px;
			margin: 0.5em 0 1em;
		}
		.is-completed:before,
		.not-completed:before {
			margin: -4px 10px 0 0;
			font-family: 'dashicons';
			content: "\f328";
			border: 3px solid green;
			width: 30px;
			height: 30px;
			border-radius: 50%;
			text-align: center;
			line-height: 30px;
			display: inline-block;
			vertical-align: middle;
		}
		.not-completed {
			color: red;
		}
		.not-completed:before {
			content: "\f158";
			border-color: red;
		}
		.welcome-banner {
			position: absolute;
			top: 0;
			right: 0;
			border-radius: 4px;
			box-shadow: 0 1px 3px rgba(0,0,0,.2);
			overflow: hidden;
		}
		.accordion-section-content ul {
			margin-bottom: 20px;
		}
		.accordion-section-content li {
			list-style: disc;
			list-style-position: inside;
			margin-left: 15px;
		}
		</style>

    	<?php
    }

    public function add_meta_boxes() {
		foreach ( $this->steps as $step => $info ) {
			add_meta_box( $step , $info[ 'title' ], array( $this, 'step_box' ), 'hnm_setup_steps', 'normal', 'high', $info );
		}
    }

    public function step_box( $object, $metabox ) {
		$args = $metabox[ 'args' ];
		?>

		<?php if ( $args[ 'completed' ] == true  ) { ?>
			<div class="is-completed"><?php _e( 'Completed!', 'health-plus' ); ?></div>
		<?php } elseif ( $args[ 'completed' ] == false && 'n/a' != $args[ 'completed' ] ) { ?>
			<div class="not-completed"><?php _e( 'Incomplete', 'health-plus' ); ?></div>
		<?php } ?>

		<p><?php echo $args[ 'description' ]; ?></p>

		<?php if ( 'Get Involved' != $args[ 'title' ] ) : ?>

			<?php /*
			<hr />
			<p><?php _e( 'You can read more and watch helpful video tutorials below:', 'health-plus' ); ?></p>
			*/ ?>

		<?php endif; ?>

		<?php if( !empty($args[ 'documentation' ]) ) : ?>

			<p>
				<?php foreach ( $args[ 'documentation' ] as $title => $url ) { ?>
				<a href="<?php echo esc_url( $url ); ?>" class="button button-secondary" target="_blank"><?php echo esc_attr( $title ); ?></a>&nbsp;
				<?php } ?>
			</p>

		<?php endif; ?>

		<?php
    }

    public function output() {
		?>

		<div class="wrap about-wrap pixar-setup">
			<?php $this->welcome(); ?>
			<?php $this->links(); ?>
		</div>
		<div id="poststuff" class="wrap pixar-steps" style="margin: 25px 40px 0 20px">
			<?php $this->steps(); ?>
		</div>

		<?php
    }

    public function welcome() {
		?>

		<h1><?php printf( __( 'Welcome to Health Plus %s', 'health-plus' ), $this->theme->Version ); ?></h1>
		<p class="about-text"><?php printf( __( 'Health & Medical is a fully dynamic, well structured and beautiful wordpress theme which is specifically designed for hospitals, health clinics, dentists and everyone else involved in health services. If you have more questions please <a href="%s" target="_blank">review the documentation</a>.', 'health-plus' ), 'http://docs.pixarwpthemes.com/healthplus' ); ?></p>
		<div class="welcome-banner"><a href="http://www.pixarwpthemes.com" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/pixar.png" width="140" alt="" /></a></div>

		<?php
    }

    public function links() {
		?>

		<p class="helpful-links">
			<a href="http://docs.pixarwpthemes.com/healthplus" class="button button-primary" target="_blank"><?php _e( 'Documentation', 'health-plus' ); ?></a>&nbsp;
			<a href="http://support.pixarwpthemes.com" class="button button-secondary" target="_blank"><?php _e( 'Submit a Support Ticket', 'health-plus' ); ?></a>&nbsp;
		</p>

		<?php
    }

    public function steps() {

		do_accordion_sections( 'hnm_setup_steps', 'normal', null );

    }
}

$GLOBALS[ 'hnm_setup' ] = new HNM_Setup;
