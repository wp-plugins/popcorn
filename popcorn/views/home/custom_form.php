
    <div class="mainbox fleft slideup_plg">
     
        <div class="header buttontab" style="background-color: <?php echo get_option('CFPD_heading_background_color'); ?>;">

            <span class="heading-text" style="color: <?php echo get_option('CFPD_heading_text_color'); ?>; ">

                <?php _e(get_option('CFPD_heading') ,'popcorn');?>

            </span>

            <a href="#">
                <img src="<?php echo POPCORN__PLUGIN_URL.'assets/images/close.png'; ?>" class="close-icon">
            </a>

        </div>

        <div class="midarea conts" id="btn-1" style="background-color : <?php echo get_option('CFPD_body_background_color'); ?>; ">
            <?php 
            if(get_option('CFPD_form_sel')==0){
                echo do_shortcode(get_option('CFPD_contactForm7_shortcode'));
            }else{ ?>

            <form method="post" action="" onsubmit="return false;">

                <p>
                    <input type="text" name="user_name" id="user_name" class="enq_class" value="" placeholder="Name" />
                </p>
                <p>
                    <input type="text" name="user_mobile" id="user_mobile" class="enq_class" value="" placeholder="Mobile" />
                </p>
                <p>
                    <input type="text" name="user_email" id="user_email" class="enq_class" value="" placeholder="Email" />
                </p>
                <p>
                    <textarea name="Message" id="enq_form" class="enq_class" placeholder="Message"></textarea>
                </p>
                <p>
                    <input name="Submit" id='enq_form_submit' type="submit" class="sendbut" value="<?php  _e(get_option('CFPD_button_text'),'popcorn'); ?>" style="background-color: <?php echo get_option('CFPD_button_bgcolor'); ?>; color : <?php echo get_option('CFPD_button_text_color'); ?>; " />
                </p>

            </form>

            <span class="ajax-loader-img">

                <img class="loader-image" src="<?php echo POPCORN__PLUGIN_URL.'/images/ajax-loader.gif'; ?>" width="16px" height="16">
                <em class="pop-suc"><?php _e('Sent Successfully','popcorn'); ?></em>
                <em class="pop-err"><?php _e('Something went wrong','popcorn'); ?></em>
                
            </span>
            <?php } ?>
        </div>

    </div>