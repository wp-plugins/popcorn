
    <div class="mainbox fleft slideup_plg">

        <div class="header buttontab" style="background-color: <?php echo get_option('AQPD_heading_background_color'); ?>;">

            <span class="heading-text" style="color: <?php echo get_option('AQPD_heading_text_color'); ?>; "><?php _e(get_option('AQPD_heading'),'popcorn'); ?></span><a href="#"><img src="<?php echo POPCORN__PLUGIN_URL.'assets/images/close.png'; ?>" class="close-icon"></a>
        </div>

        <div class="midarea conts" id="btn-1" style="background-color : <?php echo get_option('AQPD_body_background_color'); ?>; ">

            <h2 id="final_msg" style="color : <?php echo get_option('AQPD_question_text_color'); ?>;"><?php _e(get_option('AQPD_question'),'popcorn'); ?></h2>
              
            <form method="post" id='form_slide' onsubmit="return false">
                <p><input type="text" id="username" value="" placeholder="Name" maxlength="30"/></p>

                <p><textarea id='answer' name="feedback_option_text" placeholder="Message" class="box2" maxlength="200"></textarea></p>

                <p>
                    <input name="Submit" id='Submit_clicked' type="submit" class="sendbut" value="<?php _e(get_option('AQPD_button_text'),'popcorn'); ?>" style="background-color: <?php echo get_option('AQPD_button_bgcolor'); ?>; color : <?php echo get_option('AQPD_button_text_color'); ?>; " />
                </p>
               
            </form>
            <span class="ajax-loader-img">
                <img class="loader-image" src="<?php echo POPCORN__PLUGIN_URL.'assets/images/ajax-loader.gif'; ?>" width="16px" height="16">
                <em class="pop-suc"><?php _e('Sent Successfully','popcorn'); ?></em>
                <em class="pop-err"><?php _e('Something went wrong','popcorn'); ?></em>
            </span>
        </div>
    </div>

