<?php
/**
 * Created by PhpStorm.
 * User: itstar
 * Date: 2016/01/04
 * Time: 06:12 PM
 */

/*------------------Widgets------------------------------------*/

class contact_info_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
        // Base ID of your widget
            'contact_info_widget',

            // Widget name will appear in UI
            __('Contact Informaion Widget', 'health-plus'),

            // Widget description
            array( 'description' => __( 'Display Contact Information', 'health-plus' ), )
        );
    }

    // Creating widget front-end
    // This is where the action happens
    public function widget( $args, $instance ) {
        global $wp_query;

        $title = apply_filters( 'widget_title', $instance['title'] );
        $address = $instance['address'];
        $phone = $instance['phone'];
        $fax = $instance['fax'];
        $email = $instance['email'];


        $content = '<main class="widgetbody">';
        $content .='<p><i class="fa fa-map-marker"></i>'.$address.'</p>';
        $content .='<p><i class="fa fa-phone"></i>'.$phone.'</p>';
        $content .='<p><i class="fa fa-fax"></i>'.$fax.'</p>';
        $content .='<p><i class="fa fa-envelope"></i>'.$email.'</p>';
        $content .= '</main>';

        // before and after widget arguments are defined by themes
        echo $args['before_widget'];

        if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
        echo $content;
        // This is where you run the code and display the output
        echo $args['after_widget'];
    }

    // Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }else {
            $title = __( 'Last Posts', 'health-plus' );
        }

        if ( isset( $instance[ 'address' ] ) ) {
            $address = $instance[ 'address' ];
        }else {
            $address = "No. ----";
        }

        if ( isset( $instance[ 'phone' ] ) ) {
            $phone = $instance[ 'phone' ];
        }else {
            $phone = "+98 ----";
        }

        if ( isset( $instance[ 'fax' ] ) ) {
            $fax = $instance[ 'fax' ];
        }else {
            $fax = "+98 ----";
        }

        if ( isset( $instance[ 'email' ] ) ) {
            $email = $instance[ 'email' ];
        }else {
            $email = "info@email.com";
        }


        // Widget admin form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'address' ); ?>"><?php _e( 'Address :','health-plus' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'address' ); ?>" name="<?php echo $this->get_field_name( 'address' ); ?>" type="text" value="<?php echo esc_attr( $address ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id( 'phone' ); ?>"><?php _e( 'Phone :','health-plus' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'phone' ); ?>" name="<?php echo $this->get_field_name( 'phone' ); ?>" type="text" value="<?php echo esc_attr( $phone ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id( 'fax' ); ?>"><?php _e( 'Fax :','health-plus' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'fax' ); ?>" name="<?php echo $this->get_field_name( 'fax' ); ?>" type="text" value="<?php echo esc_attr( $fax ); ?>" />
        </p>



        <p>
            <label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Email Address :','health-plus' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" type="text" value="<?php echo esc_attr( $email ); ?>" />
        </p>

        <?php
    }

    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['address'] = ( ! empty( $new_instance['address'] ) ) ? strip_tags( $new_instance['address'] ) : '';
        $instance['phone'] = ( ! empty( $new_instance['phone'] ) ) ? strip_tags( $new_instance['phone'] ) : '';
        $instance['fax'] = ( ! empty( $new_instance['fax'] ) ) ? strip_tags( $new_instance['fax'] ) : '';
        $instance['email'] = ( ! empty( $new_instance['email'] ) ) ? strip_tags( $new_instance['email'] ) : '';
        return $instance;
    }
} // Class wpb_widget ends here


// Register and load the widget
function health_plus_widget() {
//  register_widget( 'last_products_widget' );
    register_widget( 'contact_info_widget' );
}
add_action( 'widgets_init', 'health_plus_widget' );


/*----------------------Appoitments action hooks-----------------------*/
add_action('app_new_appointment','sms_new_appointment');
add_action('wp_ajax_cancel_app','sms_cancel_appointment');
function sms_new_appointment($app_id){
    global $wpdb,$sms;
    $app_table = $wpdb->prefix . "app_appointments";
    $r = $wpdb->get_row( $wpdb->prepare("SELECT * FROM {$app_table} WHERE ID=%d", $app_id) );

    if ( $r != null ) {
//        var_dump($r);
//        exit;

//        if (empty($r->email) && !empty($r->user) && (int)$r->user) {
//        $wp_user = get_user_by('id', (int)$r->user);
//        if ($wp_user && !empty($wp_user->user_email)) $r->email = $wp_user->user_email;
//    }
//
//    $body = apply_filters( 'app_confirmation_message', $this->add_cancel_link( $this->_replace( $this->options["confirmation_message"],
//        $r->name, $this->get_service_name( $r->service), $this->get_worker_name( $r->worker), $r->start, $r->price,
//        $this->get_deposit($r->price), $r->phone, $r->note, $r->address, $r->email, $r->city ), $app_id ), $r, $app_id );
//
//    $mail_result = wp_mail(
//        $r->email,
//        $this->_replace( $this->options["confirmation_subject"], $r->name,
//            $this->get_service_name( $r->service), $this->get_worker_name( $r->worker),
//            $r->start, $r->price, $this->get_deposit($r->price), $r->phone, $r->note, $r->address, $r->email, $r->city ),
//        $body,
//        $this->message_headers( ),
//        apply_filters( 'app_confirmation_email_attachments', '' )
//    );

//        if (class_exists($sms)) {
//            $sms->to = array('09000000000');
//            $sms->msg = "Hello World!";
//            $sms->SendSMS();
//        }
    }

}
function sms_cancel_appointment(){

}

function app_service_select_form(){
    global $wpdb;
    $form_desc = __("Please Select Your Service : ","health-plus");
    $button_text =  __("Select The Service","health-plus");

    $services_table = $wpdb->prefix ."app_services";
    $services = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$services_table}"));

    if($services) {
        $form = '';
        $form .= '<form class="home_service_selector" action="' . get_bloginfo("wpurl") . '/appointment-table" method="get">';
        $form .='<label class="appointment_form_desc">'.$form_desc.'</label>';
        $form .= '<select name="app_service_id">';
        foreach ($services as $service) {
            $form .= '<option value="' . $service->ID . '">' . $service->name . '</option>';
        }
        $form .= '</select>';
        $form .= '<button name="submit" type="submit">' .$button_text. '</button>';
        $form .= '</form>';

        echo $form;
    }else{
        return true;
    }


}
add_shortcode('service_selector_form','app_service_select_form');

?>