
	<div id="img_coupon_div" >

    	<h2><?php _e('Image Only Customisation Panel' ,'popcorn');?></h2><br>

	    <form action="" method="post">
	       
			<label><em><?php _e('Upload Image' ,'popcorn');?> :</em></label>

			<input id="upload_image1" type="text" name="IOPD_image_src" value="<?php echo get_option('IOPD_image_src'); ?>" />

			<input class="upload_image_button button-secondary" type="button" value="Upload image" /><br/>
			<i><?php _e('Preferred dimension : 300 x 255 ' ,'popcorn');?><i> :

			<div id="output"><img src="<?php echo get_option('IOPD_image_src'); ?>"></div>			
	    
	      	<input type="hidden" name="image_selected" value="1">

	      	<p><em><?php _e('Heading Text' ,'popcorn');?>:</em><input type="text" name="IOPD_heading" value="<?php echo get_option('IOPD_heading'); ?>" class="pop_up_heading" maxlength="25"> <i>Max Length : 25 characters</i></p>

	      	<!-- Here we have used color picker so that admin can edit the color of the Popcorn-->
	        <p><em><?php _e('Heading Text color' ,'popcorn');?>:</em><input type="text" class="picker" name="IOPD_heading_text_color" value="<?php echo get_option('IOPD_heading_text_color'); ?>" ></p>
	

	      	<p><em><?php _e('Heading background color' ,'popcorn');?> :</em><input type="text" class="picker" name="IOPD_heading_background_color" value="<?php echo get_option('IOPD_heading_background_color'); ?>" ></p>

	      	<p><em><?php _e('Popup body background color' ,'popcorn');?> :</em><input type="text" class="picker" name="IOPD_body_background_color" value="<?php echo get_option('IOPD_body_background_color'); ?>" ></p>

	    
	      	<p><em><?php _e('Display Option' ,'popcorn');?> :</em><label class="disp_opt"><input type='radio' <?php if(get_option('IOPD_display')==1) echo 'checked'; ?> name='IOPD_display' id="sel_case" value="1" /><?php _e('Only on Home Page' ,'popcorn');?> </label> &nbsp;&nbsp;&nbsp;&nbsp;<label><input type='radio' <?php if(get_option('IOPD_display')==0) echo 'checked'; ?> name='IOPD_display' value="0" id="" /><?php _e('On all pages' ,'popcorn');?> </label></p>

	      
	      	<p><em><?php _e('Image hyper-link' ,'popcorn');?> :</em><input type="text" name="IOPD_image_href" value="<?php echo get_option('IOPD_image_href'); ?>" placeholder="http://www.google.com or /POST-NAME"></p>
	     
	      	<p>
	      		<a href="#image-only-popup" class="button-secondary image-only"><?php _e('Preview Popup','popcorn'); ?>
      			</a>
	      		
      			<input type="submit" class="button-secondary" value="<?php esc_attr_e('Save Changes'); ?>">
	      
	      	</p>

	    </form>


	    <!-- This is for Preview DEMO  -->
		<div id="image-only-popup" class="white-popup mfp-hide admin-image-popup">			
			<div class="mainbox fleft slideup_plg">
				<div class="header buttontab" id="IOPD_header_div" >
					<span class="heading-text" id="IOPD_header_span" ></span>
					<a href="#">
						<img src="<?php echo POPCORN__PLUGIN_URL.'assets/images/close.png'; ?>" class="close-icon">
					</a>
				</div>
				<div class="midarea conts" id="IOPD_body_div">
					<p>
						<a href=""><img src="" /></a>
					</p>
				</div>
			</div>
		</div>

  </div>