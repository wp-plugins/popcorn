	<div id="dashboard_id">
		
		<?php $POPCORN_sel_dis_opt = get_option('POPCORN_sel_dis_opt'); ?>
	    <form action="" method="post">

		<p>
			<label>
				<input type="radio" name="POPCORN_enable" value="1" <?php if(get_option('POPCORN_enable')==1){echo "checked";} ?>><?php _e('Activate Popup' ,'popcorn');?>&nbsp;&nbsp;&nbsp;
			</lable>
			<label>
				<input type="radio" name="POPCORN_enable" value="0" <?php if(get_option('POPCORN_enable')==0){echo "checked";} ?>><?php _e('Deactivate Popup' ,'popcorn');?>
			</lable>

		</p>

	    <h2><?php _e('Which Popup would you like to show on your page(s) ?' ,'popcorn');?></h2><br><br>
	   
	    <span style="float:left; width : 35%;">
	      

		      <input type="hidden" value="<?php echo POPCORN__PLUGIN_URL.'assets/images/';?>" id="plug_url" >
		      <label><input type="radio" value="1" name="popcorn_selected" <?php if($POPCORN_sel_dis_opt=='1'){echo "checked";} ?> ><?php _e('Image Only' ,'popcorn');?></label><br><br>
		      <label><input type="radio" value="2" name="popcorn_selected" <?php if($POPCORN_sel_dis_opt=='2'){echo "checked";} ?> ><?php _e('Ask a Question' ,'popcorn');?></label><br><br>
		      <label><input type="radio" value="3" name="popcorn_selected" <?php if($POPCORN_sel_dis_opt=='3'){echo "checked";} ?> ><?php _e('Text Only' ,'popcorn');?></label><br><br>
		      <label><input type="radio" value="4" name="popcorn_selected" <?php if($POPCORN_sel_dis_opt=='4'){echo "checked";} ?> ><?php _e('Contact Us' ,'popcorn');?></label><br><br>

		   <!--     <a href="#wp_subscribe_popup" class="button-secondary wp-subscribe-preview-popup ifpopup" data-animatein="<?php //echo $options['popup_animation_in']; ?>" data-animateout="<?php //echo $options['popup_animation_out']; ?>"<?php //echo !$options['enable_popup'] ? ' style="display: none;"' : ''; ?>><?php //_e('Preview Popup') ?></a> -->
		      <?php submit_button('Save Changes'); ?>
		    </form>
	    </span>

	    <span style="margin-left : 8%"><b><?php _e('Demo Image' ,'popcorn');?></b></span><br><br>

	    <span  id="image_div">

	    <?php 
	      $img_folder_url =  POPCORN__PLUGIN_URL.'assets/images/';
	      if($POPCORN_sel_dis_opt=='1'){
	        echo '<img src="'.$img_folder_url.'image-only.jpg">';
	      }
	      if($POPCORN_sel_dis_opt=='2'){
	        echo '<img src="'.$img_folder_url.'feedback.jpg">';
	      }
	      if($POPCORN_sel_dis_opt=='3'){
	        echo '<img src="'.$img_folder_url.'only-text.jpg">';
	      }
	      if($POPCORN_sel_dis_opt=='4'){
	        echo '<img src="'.$img_folder_url.'contact-us.jpg">';
	      } 
	    ?>

	    </span>
	        
	</div>
