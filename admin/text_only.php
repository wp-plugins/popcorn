<div id="text_only_div" >

	<form id="form_3" action="" method="post" >
		<h2><?php _e('Text Only Customization Panel' ,'popcorn');?></h2>

		<input type="hidden" name="static_info_selected" value="3">

		<p>
			<em><?php _e('Heading Text:' ,'popcorn');?></em>
			<input type="text" maxlength="25" name="TOPD_heading" value="<?php echo get_option('TOPD_heading'); ?>" class="pop_up_heading">
			<i>Max Length : 25 characters</i>
		</p>

		<!-- Here we have used color picker so that admin can edit the color of the Popcorn-->
		<p>
			<em><?php _e('Heading Text color' ,'popcorn');?> :</em>
			<input type="text" class="picker" name="TOPD_heading_text_color" value="<?php echo get_option('TOPD_heading_text_color'); ?>" >
		</p>


		<p>
			<em><?php _e('Heading background color' ,'popcorn');?> :</em>
			<input type="text" class="picker" name="TOPD_heading_background_color" value="<?php echo get_option('TOPD_heading_background_color'); ?>" >
		</p>

		<p>
			<em><?php _e('Popup body background color' ,'popcorn');?> :</em>
			<input type="text" class="picker" name="TOPD_body_background_color" value="<?php echo get_option('TOPD_body_background_color'); ?>" >
		</p>

		<p>
			<em><?php _e('Enter your Static information Here' ,'popcorn');?> :</em>
		</p>

		<textarea rows="4" cols="29" name="TOPD_static_data" id="static_textarea"><?php echo get_option('TOPD_static_data'); ?>
		</textarea><br>
		
		<p>
			<em><?php _e('Static data text color' ,'popcorn');?> :</em>
			<input type="text" class="picker" name="TOPD_static_data_color" value="<?php echo get_option('TOPD_static_data_color'); ?>" >
		</p>

		<p>
			<em><?php _e('Display Option' ,'popcorn');?> :</em>

			<label class="disp_opt">

				<input type='radio' <?php if(get_option('TOPD_display')==1) echo 'checked'; ?> name='TOPD_display' id="TOPD_display" value="1" />
				
				<?php _e('Only on Home Page' ,'popcorn');?>

			</label> &nbsp;&nbsp;&nbsp;&nbsp;

			<label>

				<input type='radio' <?php if(get_option('TOPD_display')==0) echo 'checked'; ?> name='TOPD_display' value="0" id="" />

				<?php _e('On all pages' ,'popcorn');?>

			</label>
		</p>

		<p class="submit">  
			<a href="#text-only-popup" class="button-secondary text-only">
				<?php _e('Preview Popup','popcorn'); ?>
  			</a>       
			<input name="Submit" type="submit" class="button-secondary" value="<?php esc_attr_e('Save Changes'); ?>" />
		</p>
	</form>

	<div id="text-only-popup" class="white-popup mfp-hide admin-image-popup">
		<div class="mainbox fleft slideup_plg">
		  	<div class="header buttontab" id="TOPD_header_div">
		  		<span class="heading-text" id="TOPD_header_span"></span>
		  		<a href="#">
		  			<img src="<?php echo POPCORN__PLUGIN_URL.'assets/images/close.png'; ?>" class="close-icon">
		  		</a>
		  	</div>
		  	<div class="midarea conts" id="TOPD_body_div">
		  		<p class="textonly" id="static_text"></p>
		  	</div>
  		</div>
	</div>

</div>