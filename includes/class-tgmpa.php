<?phprequire_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';add_action( 'tgmpa_register', 'hnm_required_plugins' );function hnm_required_plugins() {    $plugins = array(        array(            'name'                  => 'Redux Framework',            'slug'                  => 'redux-framework',            'required'              => true        ),        array(            'name'                  => 'Meta Box',            'slug'                  => 'meta-box',            'required'              => true        ),        array(            'name'                  => 'Pixar: Features',            'slug'                  => 'pixar-features',            'required'              => true,            'source'                => 'http://plugins.pixarwpthemes.com/pixar-features.zip'        ),        array(            'name'                  => 'Pixar: Accordions',            'slug'                  => 'pixar-accordions',            'required'              => true,            'source'                => 'http://plugins.pixarwpthemes.com/pixar-accordions.zip'        ),        array(            'name'                  => 'Pixar: Services',            'slug'                  => 'pixar-services',            'required'              => true,            'source'                => 'http://plugins.pixarwpthemes.com/pixar-services.zip'        ),        array(            'name'                  => 'Pixar: Teams',            'slug'                  => 'pixar-teams',            'required'              => true,            'source'                => 'http://plugins.pixarwpthemes.com/pixar-teams.zip'        ),        array(            'name'                  => 'Pixar: Testimonials',            'slug'                  => 'pixar-testimonials',            'required'              => true,            'source'                => 'http://plugins.pixarwpthemes.com/pixar-testimonials.zip'        ),        array(            'name'                  => 'Visual Composer',            'slug'                  => 'js_composer',            'required'              => true,            'source'                => 'http://plugins.pixarwpthemes.com/js_composer.zip'        ),        array(            'name'                  => 'Slider Revolution',            'slug'                  => 'revslider',            'required'              => true,            'source'                => 'http://plugins.pixarwpthemes.com/revslider.zip'        ),        array(            'name'                  => 'MailChimp for Wordpress',            'slug'                  => 'mailchimp-for-wp',            'required'              => false        ),        array(            'name'                  => 'Contact Form 7',            'slug'                  => 'contact-form-7',            'required'              => false        ),        array(            'name'                  => 'Widget Importer & Exporter',            'slug'                  => 'widget-importer-exporter',            'required'              => false        )    );    $config = array(        'id'            => 'hnm_tgmpa',        'has_notices'   => true,        'is_automatic'  => true,        'menu'          => 'hnm-install-plugins',        'strings'       => array(            'page_title'    => __( 'Install Required Plugins', 'health-plus' ),            'menu_title'    => 'Health+ Plugins'        )    );    tgmpa( $plugins, $config );}