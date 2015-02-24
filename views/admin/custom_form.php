<?php  $admin_email = get_option( 'admin_email' ); ?> 
    <div id="enguiry_div">
    	<h2><?php _e('Custom form Customisation Panel','popcorn');?></h2><br>

        <form id="form_4" action="" method="post">

            <input type="hidden" name="enquiry_form_selected" value="4">

            <p>
                <em><?php _e('Heading Text' ,'popcorn');?>:</em>
                <input type="text" name="CFPD_heading"  value="<?php _e(get_option('CFPD_heading'),'popcorn'); ?>" class="pop_up_heading"  maxlength="25">
            </p>

                <!-- Here we have used color picker so that admin can edit the color of the Popcorn-->
            <p>
                <em><?php _e('Heading Text color' ,'popcorn');?> :</em>
                <input type="text" class="picker" name="CFPD_heading_text_color" value="<?php echo get_option('CFPD_heading_text_color'); ?>" >
            </p>

            <p>
                <em><?php _e('Heading background color' ,'popcorn');?> :</em>
                <input type="text" class="picker" name="CFPD_heading_background_color" value="<?php echo get_option('CFPD_heading_background_color'); ?>" >
            </p>

            <p>
                <em><?php _e('Popup body background color' ,'popcorn');?> :</em>
                <input type="text" class="picker" name="CFPD_body_background_color" value="<?php echo get_option('CFPD_body_background_color'); ?>" >
            </p>


            <p>
                <em><?php _e('Display Form' ,'popcorn');?> :</em>
                <label class="disp_opt">
                    <input type='radio' name='CFPD_form_sel' id="sel_form_default" value="1" <?php if(get_option('CFPD_form_sel')==0) echo 'checked'; ?> />
                   <?php _e('Default Form' ,'popcorn');?>
                </label> &nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                    <input type='radio' name='CFPD_form_sel' value="0" id="sel_form_custom" <?php if(get_option('CFPD_form_sel')==1) echo 'checked'; ?>/>
                   <?php _e(' Contact form 7' ,'popcorn');?>  <i>&nbsp;&nbsp;[ Click <a href="https://wordpress.org/plugins/contact-form-7/" target="_blank">here</a> to get the plugin ]</i>
                </label>
            </p>
            
            <p id="cf7_sc_l" style="<?php if(get_option('CFPD_form_sel')==0){echo 'display : none';} ?>">
                <label>
                    <em><?php _e('Paste shortcode here' ,'popcorn');?> :</em>
                </label>
                    <input type="text" name="CFPD_contactForm7_shortcode" value='<?php echo get_option('CFPD_contactForm7_shortcode'); ?>'>
            </p>

            <p>
                <em><?php _e('Send E-mail to' ,'popcorn');?>:</em>
                <input type="text" placeholder='somename@domain.com' value="<?php if(get_option('CFPD_email') == ''){ echo $admin_email;}else{echo get_option('CFPD_email');}?>" name="CFPD_email" value="<?php echo get_option('CFPD_email'); ?>" id="ques_email_inp"/>
            </p>
             
            <p>
                <em><?php _e('Submit button Text' ,'popcorn');?> :</em>
                <input type="text" name="CFPD_button_text" value="<?php _e(get_option('CFPD_button_text'),'popcorn'); ?>" >
            </p>

            <p>
                <em><?php _e('Submit button text color' ,'popcorn');?> :</em>
                <input type="text" class="picker" name="CFPD_button_text_color" value="<?php echo get_option('CFPD_button_text_color'); ?>" >
            </p>

            <p>
                <em><?php _e('Submit button background color' ,'popcorn');?> :</em>
                <input type="text" class="picker" name="CFPD_button_bgcolor" value="<?php echo get_option('CFPD_button_bgcolor'); ?>" >
            </p>

            <p>
                <em><?php _e('Display Option' ,'popcorn');?> :</em>
                <label class="disp_opt">

                    <input type='radio' <?php if(get_option('CFPD_display')==1) echo 'checked'; ?> name='CFPD_display' id="sel_case" value="1" />

                    <?php _e('Only on Home Page' ,'popcorn');?>

                </label> &nbsp;&nbsp;&nbsp;&nbsp;

                <label>

                    <input type='radio' <?php if(get_option('CFPD_display')==0) echo 'checked'; ?> name='CFPD_display' value="0" id="" />

                    <?php _e('On all pages' ,'popcorn');?>
                    
                </label>
            </p>
            
            <p class="submit"> 
                <a href="#custom-form-popup" class="button-secondary custom-form">
                    <?php _e('Preview Popup','popcorn'); ?>
                </a>        
                <input name="Submit" type="submit" class="button-secondary" value="<?php esc_attr_e('Save Changes'); ?>" />
            </p>
        </form>


        <!-- This is for Custom form Preview -->
        <div id="custom-form-popup" class="white-popup mfp-hide">    
             <div class="mainbox fleft slideup_plg">
                <div class="header buttontab" id="CFPD_header_div">
                    <span class="heading-text" id="CFPD_header_span"></span>
                    <a href="#">
                        <img src="<?php echo POPCORN__PLUGIN_URL.'assets/images/close.png'; ?>" class="close-icon">
                    </a>
                </div>
                <div class="midarea conts" id="CFPD_body_div">
                    <p>
                        <input type="text" name="user_name" class="enq_class" placeholder="Name" />
                    </p>
                    <p>
                        <input type="text" name="user_mobile" class="enq_class" placeholder="Mobile" />
                    </p>
                    <p>
                        <input type="text" name="user_email"  class="enq_class" placeholder="Email" />
                    </p>
                    <p>
                        <textarea name="Message" class="enq_class" placeholder="Message"></textarea>
                    </p>
                    <p>
                        <input name="Submit" id='enq_form_submit' type="submit" class="sendbut"/>
                    </p>
                </div>
            </div>
        </div>

    </div>