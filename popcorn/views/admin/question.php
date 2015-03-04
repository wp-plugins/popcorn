<?php  $admin_email = get_option( 'admin_email' ); ?> 
<div id="question_div" >

	<h2><?php _e('Ask a Question Customisation Panel' ,'popcorn');?></h2>

	<form id="form_2" action="" method="post">
	
		<input type="hidden" name="question_selected" value="2">

		<p>
			<em><?php _e('Heading' ,'popcorn');?> :</em>
			<input type="text" name="AQPD_heading" maxlength="25" value="<?php echo get_option('AQPD_heading'); ?>" class="pop_up_heading">
			<i>Max Length : 25 characters</i>
		</p>

		<p>
			<em><?php _e('Heading Text color' ,'popcorn');?> :</em>
			<input type="text" class="picker" name="AQPD_heading_text_color" value="<?php echo get_option('AQPD_heading_text_color'); ?>" >
		</p>

		<p>
			<em><?php _e('Heading background color' ,'popcorn');?> :</em>
			<input type="text" class="picker" name="AQPD_heading_background_color" value="<?php echo get_option('AQPD_heading_background_color'); ?>" >
		</p>

		<p>
			<em><?php _e('Popup body background color' ,'popcorn');?> :</em>
			<input type="text" class="picker" name="AQPD_body_background_color" value="<?php echo get_option('AQPD_body_background_color'); ?>" >
		</p>

		<p>
			<em><?php _e('Submit button Text' ,'popcorn');?> :</em>
			<input type="text" name="AQPD_button_text" value="<?php echo get_option('AQPD_button_text'); ?>" >
		</p>

		<p>
			<em><?php _e('Submit button text color' ,'popcorn');?> :</em>
			<input type="text" class="picker" name="AQPD_button_text_color" value="<?php echo get_option('AQPD_button_text_color'); ?>" >
		</p>

		<p>
			<em><?php _e('Submit button background color' ,'popcorn');?> :</em>
			<input type="text" class="picker" name="AQPD_button_bgcolor" value="<?php echo get_option('AQPD_button_bgcolor'); ?>" >
		</p>
		
		<p>
			<em><?php _e('Question want to ask' ,'popcorn');?> :</em>
			<input type="text" size='50' name="AQPD_question" value="<?php echo get_option('AQPD_question'); ?>">
		</p>

		<p>
			<em><?php _e('Question Text Color' ,'popcorn');?> :</em>
			<input type="text" class="picker" name="AQPD_question_text_color" value="<?php echo get_option('AQPD_question_text_color'); ?>" >
		</p>

		<p>
			<em><?php _e('Display Option' ,'popcorn');?>  :</em>

			<label class="disp_opt">

				<input type='radio' <?php if(get_option('AQPD_display')==1) echo 'checked'; ?> name='AQPD_display' value="1" />

				<?php _e('Only on Home Page' ,'popcorn');?>

			</label> &nbsp;&nbsp;&nbsp;&nbsp;

			<label>
				<input type='radio' <?php if(get_option('AQPD_display')==0) echo 'checked'; ?> name='AQPD_display' value="0" />

				<?php _e('On all pages' ,'popcorn');?>

			</label>
		</p>

		<p>
			<em><?php _e('Send E-mail to' ,'popcorn');?> :</em>
			
			<input type="text" placeholder='somename@domain.com' name="AQPD_email" value="<?php if(get_option('AQPD_email') == ''){ echo $admin_email;}else{echo get_option('AQPD_email');}?>"/>
		</p>

		<p class="submit"> 
			<a href="#question-only-popup" class="button-secondary question-only">
				<?php _e('Preview Popup','popcorn'); ?>
  			</a> 
			<input type="submit" class="button-secondary" value="<?php esc_attr_e('Save Changes'); ?>">
		</p>

	</form>

	<div id="question-only-popup" class="white-popup mfp-hide admin-image-popup">
		<div class="mainbox fleft slideup_plg">
	        <div class="header buttontab" id="AQPD_header_div">
	            <span class="heading-text" id="AQPD_header_span"></span>
	            <a href="#">
	            	<img src="<?php echo POPCORN__PLUGIN_URL.'assets/images/close.png'; ?>" class="close-icon">
	        	</a>
	        </div>
	        <div class="midarea conts" id="AQPD_body_div">
	            <h2 id="final_msg"></h2>	              
	                <p><input type="text" id="qname" value="" placeholder="Name" /></p>
	                <p><textarea id='answer' name="feedback_option_text" placeholder="Message" class="box2"></textarea></p>
	                <p>
	                    <input name="Submit" id='question_submit_btn' type="submit" class="sendbut" />
	                </p>	               	           
	        </div>
    	</div>
	</div>
	
</div>

