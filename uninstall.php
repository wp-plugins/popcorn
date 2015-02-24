<?php 
 //if uninstall not called from WordPress exit
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) 
    exit();

        delete_option('POPCORN_enable');
        delete_option( 'POPCORN_sel_dis_opt');
        /******************************/

        /*Image Only Popup Data (IOPD)*/
        delete_option( 'IOPD_heading');
        delete_option( 'IOPD_heading_text_color');
        delete_option( 'IOPD_heading_background_color');
        delete_option( 'IOPD_body_background_color');
        delete_option( 'IOPD_image_src');
        delete_option( 'IOPD_image_href');
        delete_option( 'IOPD_display');
        /*********************/

        /*Ask a Question Popup Data (AQPD)*/
        delete_option( 'AQPD_heading');
        delete_option( 'AQPD_heading_text_color');
        delete_option( 'AQPD_heading_background_color');
        delete_option( 'AQPD_body_background_color');
        delete_option( 'AQPD_question');
        delete_option( 'AQPD_question_text_color' );
        delete_option( 'AQPD_email');
        delete_option( 'AQPD_display');
        delete_option( 'AQPD_button_text' );
        delete_option( 'AQPD_button_text_color');
        delete_option( 'AQPD_button_bgcolor');
        /************************************/

        /*Text Only Popup Data (TOPD)*/
        delete_option( 'TOPD_heading');
        delete_option( 'TOPD_heading_text_color');
        delete_option( 'TOPD_heading_background_color');
        delete_option( 'TOPD_body_background_color');
        delete_option( 'TOPD_static_data');
        delete_option( 'TOPD_static_data_color');
        delete_option( 'TOPD_display');
        /*********************/

        /*Custom Form Popup Data (CFPD)*/
        delete_option( 'CFPD_heading');
        delete_option( 'CFPD_heading_text_color');
        delete_option( 'CFPD_heading_background_color');
        delete_option( 'CFPD_body_background_color');
        delete_option( 'CFPD_form_sel'); 
        delete_option( 'CFPD_contactForm7_shortcode'); 
        delete_option( 'CFPD_email');
        delete_option( 'CFPD_display'); 
        delete_option( 'CFPD_button_text');
        delete_option( 'CFPD_button_text_color');
        delete_option( 'CFPD_button_bgcolor');    
?>