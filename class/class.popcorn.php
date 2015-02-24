<?php

class popcorn{
    private static $initiated = false;

    public static function init() {
        if ( ! self::$initiated ) {
          self::init_hooks();
        }
    }
    /**
    * Initializes WordPress hooks
    */
    private static function init_hooks() {
        self::$initiated = true;
        add_action( 'admin_menu', array('popcorn','pop_up_plugin_page') );
        add_action( 'admin_enqueue_scripts',array('popcorn','pop_up_admin_scripts_backend'));
        add_action( 'wp_enqueue_scripts', array('popcorn','pop_up_scripts_frontend'));
        add_action('wp_footer', array('popcorn','is_home_only_show'));
        add_shortcode('popcorn', array('popcorn','pop_up_plugin_home_page'));
        add_action( 'wp_ajax_send_email_action',array('popcorn','so_wp_ajax_function'));
        add_action('wp_ajax_nopriv_send_email_action', array('popcorn','so_wp_ajax_function'));
        /* Internationalize the text strings used. */
		add_action( 'plugins_loaded', array('popcorn','popcorn_language'));

        
    }

    /**
	 * Internationalize the text strings used.
	 *
	 * @since 1.0
	 */
	public static function popcorn_language() {
		load_plugin_textdomain( 'popcorn', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}


    public static function so_wp_ajax_function(){
        ob_clean();
        if (isset($_POST)){ 
            if($_POST['formtype'] == 'question'){

                global $wpdb; 
                $thetable = $wpdb->prefix."popcorn_plugin";
                $selData = $wpdb->get_row("SELECT `question`,`email` from $thetable");
                $for_question = $selData->question;
                $send_to = (empty($selData->email) ? get_option( 'admin_email' ) : $selData->email) ;
                $name = $_POST['uname'];
                $answer = stripcslashes($_POST['answer']);
                $to  = $send_to; 
                $subject = 'Congratulations.!!!! You have a new reply from '.$name;
                $message = '
                <html>
                <head>
                  <title>You have a mail from Enquiry Form</title>
                </head>
                <body>
                    <p><b>From : '.$name.'</b></p>
                    <p>Kindly see the following reply for your question below:</p>
                  <p><b>'.$for_question.'</b></p>
                  <p>Answer :</p>
                  <p><b>'.$answer.'</b></p>
                </body>
                </html>
                ';     
                
                $headers.="Content-type: text/html"."\r\n";
                if(wp_mail($to, $subject, $message, $headers)){
                  echo 'success';
                }
            }
        }

        if (isset($_POST)){ 
            if($_POST['formtype'] == 'contactform'){
                global $wpdb; 
                $thetable = $wpdb->prefix."popcorn_plugin";
                $selDataEmail = $wpdb->get_row("SELECT * from $thetable");
                $send_to = (empty($selData->email) ? get_option( 'admin_email' ) : $selData->email) ;
                $name  = $_POST['a_name'];
                $mobile = $_POST['a_mobile'];
                $email = $_POST['a_email'];
                $comment = stripcslashes($_POST['a_comment']);
                $to  = $send_to; 
                $subject = 'You have a mail from Enquiry From';
                $message = '
                <html>
                <head>
                  <title>Customer Reply</title>
                </head>
                <body>
                    <p>Kindly see the following details of the user:</p>
                  <p><b>Name : '.$name.'</b></p>
                  <p><b>Mobile : '.$mobile.'</b></p>
                  <p><b>Email : '.$email.'</b></p>
                  <p><b>Comment : '.$comment.'</b></p>
                </body>
                </html>
                ';
                $headers = "Content-type: text/html"."\r\n";
                if(wp_mail($to, $subject, $message, $headers)){
                  echo 'success';
                }
            }
        }
        wp_die(); // ajax call must die to avoid trailing 0 in your response
    }

    public static function is_home_only_show(){

        /* following code checks if only home page or On all Pages you want the popup and adds hook */
        
        $disp_opt_sel = get_option('POPCORN_sel_dis_opt'); 
        switch ($display) {
            case '1':
                $disp_home = get_option('IOPD_display');
                break;

            case '2':
                $disp_home = get_option('AQPD_display');
                break;

            case '3':
                $disp_home = get_option('TOPD_display');
                break;

            case '4':
                $disp_home = get_option('CFPD_display');
                break;
            
            default:
                $disp_home = get_option('AQPD_display');
                break;
        }

        if($disp_home==0){
            if(is_home() || is_front_page()){
                do_shortcode('[popcorn]');
            }  
        }else if($disp_home){
            do_shortcode('[popcorn]'); 
        }
        /* ends*/  
    }
        
    public static function pop_up_plugin_install() {
       
      

        /*POPCORN General Setting Data*/
        $POPoption = get_option('POPCORN_enable');

        if(empty($POPoption)){
            
            $IOPDimageLink =  POPCORN__PLUGIN_URL.'assets/images/wordpress.png';

            add_option('POPCORN_enable','0','','yes');

            add_option( 'POPCORN_sel_dis_opt', '2', '', 'yes' );
            /******************************/

            /*Image Only Popup Data (IOPD)*/
            add_option( 'IOPD_heading', 'Image heading Demo', '', 'no' );
            add_option( 'IOPD_heading_text_color', '#ffffff', '', 'no' );
            add_option( 'IOPD_heading_background_color', '#000000', '', 'no' );
            add_option( 'IOPD_body_background_color', '#dddddd', '', 'no' );
            add_option( 'IOPD_image_src', $IOPDimageLink, '', 'no' );
            add_option( 'IOPD_image_href', 'http://www.google.com', '', 'no' );
            add_option( 'IOPD_display', '1', '', 'no' );
            /*********************/

            /*Ask a Question Popup Data (AQPD)*/
            add_option( 'AQPD_heading', 'Question heading Demo', '', 'no' );
            add_option( 'AQPD_heading_text_color', '#ffffff', '', 'no' );
            add_option( 'AQPD_heading_background_color', '#000000', '', 'no' );
            add_option( 'AQPD_body_background_color', '#dddddd', '', 'no' );
            add_option( 'AQPD_question', 'What would you like to check today ?', '', 'no' );
            add_option( 'AQPD_question_text_color', '#000000', '', 'no' );
            add_option( 'AQPD_email', '', '', 'no' );
            add_option( 'AQPD_display', '1', '', 'no' );
            add_option( 'AQPD_button_text', 'Submit', '', 'no' );
            add_option( 'AQPD_button_text_color', '#ffffff', '', 'no' );
            add_option( 'AQPD_button_bgcolor', '#000000', '', 'no' );
            /************************************/

            /*Text Only Popup Data (TOPD)*/
            add_option( 'TOPD_heading', 'Text heading Demo', '', 'no' );
            add_option( 'TOPD_heading_text_color', '#ffffff', '', 'no' );
            add_option( 'TOPD_heading_background_color', '#000000', '', 'no' );
            add_option( 'TOPD_body_background_color', '#dddddd', '', 'no' );
            add_option( 'TOPD_static_data', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum<span> <a href="#">Click Here !</a></span>', '', 'no' );
            add_option( 'TOPD_static_data_color', '#000000', '', 'no' );
            add_option( 'TOPD_display', '1', '', 'no' );
            /*********************/

            /*Custom Form Popup Data (CFPD)*/
            add_option( 'CFPD_heading', 'Custom-form heading Demo', '', 'no' );
            add_option( 'CFPD_heading_text_color', '#ffffff', '', 'no' );
            add_option( 'CFPD_heading_background_color', '#000000', '', 'no' );
            add_option( 'CFPD_body_background_color', '#dddddd', '', 'no' );
            add_option( 'CFPD_form_sel', '0', '', 'no' ); // O is for Custom form & 1 is for Contact form 7
            add_option( 'CFPD_contactForm7_shortcode', '', '', 'no' ); // O is for Custom form & 1 is for Contact form 7
            add_option( 'CFPD_email', '', '', 'no' );
            add_option( 'CFPD_display', '1', '', 'no' ); // 0 is for on all pages  & 1 is for Only on home page.
            add_option( 'CFPD_button_text', 'Submit', '', 'no' );
            add_option( 'CFPD_button_text_color', '#ffffff', '', 'no' );
            add_option( 'CFPD_button_bgcolor', '#000000', '', 'no' ); 

        }     
    }

    public static function pop_up_plugin_page(){
        add_menu_page( 'Popcorn', 'Popcorn', 'manage_options', 'Popcorn', array('popcorn','pop_up_plugin_admin'), POPCORN__PLUGIN_URL.'assets/images/pop_icon.png' , 59 );
    }

    public static function pop_up_plugin_admin(){
     
        if(isset($_POST['popcorn_selected']) || isset($_POST['POPCORN_enable'])){
            if(!empty($_POST['POPCORN_enable']) || $_POST['POPCORN_enable']!='' ){
                    update_option('POPCORN_enable',$_POST['POPCORN_enable']); 
            }
            update_option('POPCORN_sel_dis_opt',$_POST['popcorn_selected']);
            echo '<div id="message" class="updated"><p><b>Changes Saved</b></p></div>';
        }


      /*This section gets excuted when admin submits the Image only panel Form*/
      if(isset($_POST["image_selected"])){
        
            update_option( 'IOPD_heading', stripslashes($_POST['IOPD_heading']));
            update_option( 'IOPD_heading_text_color', $_POST['IOPD_heading_text_color'] );
            update_option( 'IOPD_heading_background_color', $_POST['IOPD_heading_background_color'] );
            update_option( 'IOPD_body_background_color', $_POST['IOPD_body_background_color'] );
            update_option( 'IOPD_image_src', $_POST['IOPD_image_src']);
            update_option( 'IOPD_image_href', stripslashes($_POST['IOPD_image_href']));
            update_option( 'IOPD_display', $_POST['IOPD_display'] );       
            echo   '<div id="message" class="updated"><p><b>Popcorn Saved</b></p></div>';
           
        }
        /**/

        /*This section gets excuted when admin submits the Ask a Question panel Form*/
        if(isset($_POST["question_selected"])){

            update_option( 'AQPD_heading', stripslashes($_POST["AQPD_heading"]));
            update_option( 'AQPD_heading_text_color', $_POST["AQPD_heading_text_color"] );
            update_option( 'AQPD_heading_background_color', $_POST["AQPD_heading_background_color"]);
            update_option( 'AQPD_body_background_color', $_POST["AQPD_body_background_color"]);
            update_option( 'AQPD_question', stripslashes($_POST["AQPD_question"]));
            update_option( 'AQPD_question_text_color', $_POST["AQPD_question_text_color"]);
            update_option( 'AQPD_email', $_POST["AQPD_email"]);
            update_option( 'AQPD_display', $_POST["AQPD_display"]);
            update_option( 'AQPD_button_text', stripslashes($_POST["AQPD_button_text"]));
            update_option( 'AQPD_button_text_color', $_POST["AQPD_button_text_color"]);
            update_option( 'AQPD_button_bgcolor', $_POST["AQPD_button_bgcolor"]);
            echo '<div id="message" class="updated"><p><b>Popcorn Saved</b></p></div>';         
        }
        /**/

        /*This section gets excuted when admin submits the Text Only panel Form*/
        if(isset($_POST["static_info_selected"])){

            update_option( 'TOPD_heading', stripslashes($_POST["TOPD_heading"]));
            update_option( 'TOPD_heading_text_color', $_POST["TOPD_heading_text_color"] );
            update_option( 'TOPD_heading_background_color', $_POST["TOPD_heading_background_color"]);
            update_option( 'TOPD_body_background_color', $_POST["TOPD_body_background_color"] );
            update_option( 'TOPD_static_data', stripcslashes($_POST["TOPD_static_data"]));
            update_option( 'TOPD_static_data_color', $_POST["TOPD_static_data_color"] );
            echo '<div id="message" class="updated"><p><b>Popcorn Saved</b></p></div>';    
        }

        if(isset($_POST["enquiry_form_selected"])){

            update_option( 'CFPD_heading', stripcslashes($_POST["CFPD_heading"] ));
            update_option( 'CFPD_heading_text_color', $_POST["CFPD_heading_text_color"]  );
            update_option( 'CFPD_heading_background_color', $_POST["CFPD_heading_background_color"]  );
            update_option( 'CFPD_body_background_color', $_POST["CFPD_body_background_color"] );
            update_option( 'CFPD_form_sel',  $_POST["CFPD_form_sel"] ); // O is for Custom form & 1 is for Contact form 7
            update_option( 'CFPD_contactForm7_shortcode', stripcslashes($_POST["CFPD_contactForm7_shortcode"]));
            update_option( 'CFPD_email', stripcslashes($_POST["CFPD_email"]));
            update_option( 'CFPD_display', $_POST["CFPD_display"]); // 0 is for on all pages  & 1 is for Only on home page.
            update_option( 'CFPD_button_text', $_POST["CFPD_button_text"]);
            update_option( 'CFPD_button_text_color', $_POST["CFPD_button_text_color"]);
            update_option( 'CFPD_button_bgcolor', $_POST["CFPD_button_bgcolor"]);
            echo '<div id="message" class="updated"><p><b>Popcorn Saved</b></p></div>';    
        }
     ?>
       
        <div class="wrap">      
            <div id='icon-options-general' class='icon32'><br /></div>
            <h2 class="nav-tab-wrapper">
                <!--Here you can change all 4 tabs heading
                Here you can see the default value for all the tabs
                1 is for Image Only
                2 is for Ask a Qustion
                3 is for Text only
                4 is for Custom Form -->
                <a href="#dashboard" id="em-menu-dashboard" class="nav-tab nav-tab-active hidemsg">Dashboard</a>
                <a href="#image-only" id="em-menu-image-only" class="nav-tab hidemsg">Image Only</a>
                <a href="#ask-a-question" id="em-menu-ask-a-question" class="nav-tab hidemsg">Ask a Question</a>
                <a href="#text-only" id="em-menu-text-only" class="nav-tab hidemsg">Text Only</a>
                <a href="#custom-form" id="em-menu-custom-form" class="nav-tab hidemsg">Custom Form</a>
            </h2>
            
            <div class="metabox-holder" data-ng-app="my-admin">         
            <!-- // TODO Move style in css -->
                <div class='postbox-container' style='width: 99.5%'>

                    <!-- Dashboard OPTIONS -->
                    <div class="em-menu-dashboard em-menu-group">
                        <div class="postbox" style="padding : 15px !important;">
                            <?php if(!include_once(POPCORN__PLUGIN_DIR.'/views/admin/dashboard.php')){echo '<div id="message" class="error">Due to some reason page could not be loaded. Please contact the <a href="mailto:sumitkumarnayak0049@gmail.com">maker</a> of this plugin</div>';} ?>                
                        </div>  
                    </div>
                    <div class="clear"></div>
                     <!-- Dashboard OPTIONS -->

                    <div class="em-menu-image-only em-menu-group" style="display:none;">
                    <!-- Lnguage OPTIONS -->
                        <div class="postbox" style="padding : 15px !important; ">
                            <?php if(!include_once(POPCORN__PLUGIN_DIR.'/views/admin/image_only.php')){echo '<div id="message" class="error">Due to some reason page could not be loaded. Please open a ticket at the support form of plugin</div>';} ?>                                                  
                        </div>
                    </div> 
                    <div class="clear"></div>
                    <!-- Lnguage OPTIONS -->

                    <!-- Sector OPTIONS -->
                    <div class="em-menu-ask-a-question em-menu-group" style="display:none;">
                        <div class="postbox" style="padding : 15px !important; ">
                                <?php if(!include_once(POPCORN__PLUGIN_DIR.'/views/admin/question.php')){echo '<div id="message" class="error">Due to some reason page could not be loaded. Please open a ticket at the support form of plugin</div>';} ?>                                    
                        </div>
                    </div> 
                    <div class="clear"></div>
                    <!-- Sector OPTIONS -->

                    <!-- Certificate OPTIONS -->
                    <div class="em-menu-text-only em-menu-group" style="display:none;">
                        <div class="postbox" style="padding : 15px !important; ">
                                <?php if(!include_once(POPCORN__PLUGIN_DIR.'/views/admin/text_only.php')){echo '<div id="message" class="error">Due to some reason page could not be loaded. Please open a ticket at the support form of plugin</div>';} ?>  
                        </div>
                    </div> 
                    <div class="clear"></div>

                    <div class="em-menu-custom-form em-menu-group" style="display:none;">
                        <div class="postbox" style="padding : 15px !important; ">
                                <?php if(!include_once(POPCORN__PLUGIN_DIR.'/views/admin/custom_form.php')){echo '<div id="message" class="error">Due to some reason page could not be loaded. Please open a ticket at the support form of plugin</div>';} ?> 
                        </div>
                    </div> 
                    <div class="clear"></div>      
        
                </div> 
                <p><b>Note: </b>To display this plugin on individual page please copy the shortcode <b>[popcorn]</b> in your page.</p> 
                <p>The plugin has been developed by <a href="http://capsicummediaworks.com/">Capsicum Mediaworks</a></p>      
            </div>
            <div class="clear"></div>
        </div>  
      
    <?php
    }

    public static function pop_up_plugin_home_page(){
        $POPCORN_sel_dis_opt = get_option('POPCORN_sel_dis_opt');
        $POPCORN_enable =  get_option('POPCORN_enable');
        /*This pop-up gets displayed when option 1 is selected */

        if($POPCORN_enable == '1' && $POPCORN_sel_dis_opt == '1')
            if(!include_once(POPCORN__PLUGIN_DIR.'/views/home/image_only.php')){echo '<div id="message" class="updated">Due to some reason page could not be loaded. Please open a ticket at the support form of plugin</div>';} 

        /*This pop-up gets displayed when option 2 is selected */
        if($POPCORN_enable == '1' && $POPCORN_sel_dis_opt == '2')
            if(!include_once(POPCORN__PLUGIN_DIR.'/views/home/question.php')){echo '<div id="message" class="updated">Due to some reason page could not be loaded. Please open a ticket at the support form of plugin</div>';}

        /*This pop-up gets displayed when option 3 is selected */
        if($POPCORN_enable == '1' && $POPCORN_sel_dis_opt == '3')
            if(!include_once(POPCORN__PLUGIN_DIR.'/views/home/text_only.php')){echo '<div id="message" class="updated">Due to some reason page could not be loaded. Please open a ticket at the support form of plugin</div>';} 

        /* This pop-up gets displayed when option 4 is selected*/
        if($POPCORN_enable == '1' && $POPCORN_sel_dis_opt == '4')
            if(!include_once(POPCORN__PLUGIN_DIR.'/views/home/custom_form.php')){echo '<div id="message" class="updated">Due to some reason page could not be loaded. Please open a ticket at the support form of plugin</div>';} 
    }

    public static function pop_up_scripts_frontend(){
        wp_enqueue_style( 'popcorn_stylesheet', POPCORN__PLUGIN_URL.'assets/css/stylesheet.css');
        wp_enqueue_script( 'popcorn_light', POPCORN__PLUGIN_URL.'assets/js/light.js' );
        wp_enqueue_script('jquery-effects-bounce');
        wp_register_script( 'ajaxHandle', POPCORN__PLUGIN_URL.'assets/js/ajax-form-submit.js', array(), false, true );
        wp_enqueue_script( 'ajaxHandle' );
        wp_localize_script( 'ajaxHandle', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
    }

    public static function pop_up_admin_scripts_backend(){
        wp_enqueue_script( 'magnific-popup', POPCORN__PLUGIN_URL.'assets/js/magnificpopup.js');
        wp_enqueue_script( 'popcorn_admin_js', POPCORN__PLUGIN_URL.'assets/js/admin_js.js');
        wp_enqueue_style( 'magnific-popup', POPCORN__PLUGIN_URL.'assets/css/magnific-popup.css');
        wp_enqueue_style( 'admin-css', POPCORN__PLUGIN_URL.'assets/css/admin-css.css');

        wp_enqueue_style( 'popcorn_stylesheet', POPCORN__PLUGIN_URL.'assets/css/stylesheet.css');
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('wp-color-picker');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
        wp_enqueue_script('my-upload');
        wp_enqueue_style('thickbox');
    
    }

}
/* Custom code ends here*/

?>
