jQuery(document).ready(function(){
	/*This code is for color picker on Popcorn panel*/
	var myOptions = {
    // you can declare a default color here,
    // or in the data-default-color attribute on the input
    defaultColor: false,
    // a callback to fire whenever the color changes to a valid color
    change: function(event, ui){},
    // a callback to fire when the input is emptied or an invalid color
    clear: function() {},
    // hide the color picker controls on load
    hide: true,
    // show a group of common colors beneath the square
    // or, supply an array of colors to customize further
    palettes: true
	};
	jQuery('.picker').wpColorPicker(myOptions);
	/**/

    /*This code is for the Popcorn radio button selected on Popcorn Dashboard*/
    jQuery("input[name=popcorn_selected]:radio").change(function(){
	    var plug_url = jQuery('#plug_url').val();
	   
	    if(jQuery(this).val()==1){
	     
	      jQuery('#image_div').html('<img src="'+plug_url+'image-only.jpg" alt="image-only">');
	    }
	    if(jQuery(this).val()==2){

	      jQuery('#image_div').html('<img src="'+plug_url+'feedback.jpg" alt="feedback">');
	    }
	    if(jQuery(this).val()==3){
	     
	      jQuery('#image_div').html('<img src="'+plug_url+'only-text.jpg" alt="only-text">');
	    }
	    if(jQuery(this).val()==4){
	     
	      jQuery('#image_div').html('<img src="'+plug_url+'contact-us.jpg" alt="contact-us">');
	    }
  	});
    /**/

    /*This code is executed when user clicks the Contact Form 7 radio button*/
    jQuery("input[name=CFPD_form_sel]:radio").change(function(){
	    if(jQuery(this).val()==0){
	     
	      jQuery('#cf7_sc_l').fadeIn(500);;
	    }else{
	      jQuery('#cf7_sc_l').fadeOut(500);;

	    }
	   
  	});

    /*This code is for the tabs section. When user clicks particular tab the respective tab content is shown*/
	jQuery('.nav-tab-wrapper .nav-tab').click(function(){
		
		jQuery('.nav-tab-wrapper .nav-tab').removeClass('nav-tab-active');
		var el = jQuery(this);
		var elid = el.attr('id');
		
		jQuery('.em-menu-group').hide(); 
		jQuery('.'+elid).show();
		el.addClass('nav-tab-active');	
	});

	var navUrl = document.location.toString();
	
	if (navUrl.match('#')) { //anchor-based navigation
		var nav_tab = navUrl.split('#')[1].split(':');
		var current_tab = 'a#em-menu-' + nav_tab[0];
		jQuery(current_tab).trigger('click');
		if( nav_tab.length > 1 ){
			section = jQuery("#em-opt-"+nav_tab[1]);
			if( section.length > 0 ){
				section.children('h3').trigger('click');
			}
		}
	}else{
		//set to general tab by default, so we can also add clicked subsections
		//document.location = navUrl;
	}
	/***********************************************************************************/


	/*CODE FOR WORDPRESS MEDIA UPLOAD FUNCTIONALITY*/
	var upload_image_button=false;

    jQuery('.upload_image_button').click(function() {
    upload_image_button =true;
    formfieldID=jQuery(this).prev().attr("id");
	formfield = jQuery("#"+formfieldID).attr('name');
 	tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
        if(upload_image_button==true){

                var oldFunc = window.send_to_editor;
                window.send_to_editor = function(html) {

                imgurl = jQuery('img', html).attr('src');
                jQuery("#"+formfieldID).val(imgurl);
                 tb_remove();
                window.send_to_editor = oldFunc;
                }
        }
        upload_image_button=false;
    });


/*This code is for the Preview of the popup in admin panel*/

	jQuery('.slideup_plg').hide();

	jQuery(window).load(function () {
		jQuery('.slideup_plg').show(100);
	});

	jQuery(".header").click(function () {
		jQuery('.midarea').slideToggle(400);
		return false;
	});


    jQuery('.image-only').click(function(){	
    	jQuery('#IOPD_header_div').css('background-color', jQuery('input:text[name=IOPD_heading_background_color]').val());
    	jQuery('#IOPD_header_span').css('color', jQuery('input:text[name=IOPD_heading_text_color]').val());
    	jQuery('#IOPD_header_span').text(jQuery('input:text[name=IOPD_heading]').val());
    	jQuery('#IOPD_body_div').css('background-color', jQuery('input:text[name=IOPD_body_background_color]').val());
    	jQuery('#IOPD_body_div p img').attr('src',jQuery('input:text[name=IOPD_image_src]').val());
    	jQuery('#IOPD_body_div p a').attr('href',jQuery('input:text[name=IOPD_image_href]').val());
	});	   		

    jQuery('.question-only').click(function(){	
    	jQuery('#AQPD_header_div').css('background-color', jQuery('input:text[name=AQPD_heading_background_color]').val());
    	jQuery('#AQPD_header_span').css('color', jQuery('input:text[name=AQPD_heading_text_color]').val());
    	jQuery('#AQPD_header_span').text(jQuery('input:text[name=AQPD_heading]').val());
    	jQuery('#AQPD_body_div').css('background-color', jQuery('input:text[name=AQPD_body_background_color]').val());
    	jQuery('#final_msg').css('color', jQuery('input:text[name=AQPD_question_text_color]').val());
    	jQuery('#final_msg').text(jQuery('input:text[name=AQPD_question]').val());
    	jQuery('#question_submit_btn').val(jQuery('input:text[name=AQPD_button_text]').val());
    	jQuery('#question_submit_btn').css({'background-color' : jQuery('input:text[name=AQPD_button_bgcolor]').val(),'color' : jQuery('input:text[name=AQPD_button_text_color]').val()});
    });

 	jQuery('.text-only').click(function(){	
    	jQuery('#TOPD_header_div').css('background-color', jQuery('input:text[name=TOPD_heading_background_color]').val());
    	jQuery('#TOPD_header_span').css('color', jQuery('input:text[name=TOPD_heading_text_color]').val());
    	jQuery('#TOPD_header_span').text(jQuery('input:text[name=TOPD_heading]').val());
    	jQuery('#TOPD_body_div').css('background-color', jQuery('input:text[name=TOPD_body_background_color]').val());
  		jQuery('#static_text').css('color', jQuery('input:text[name=TOPD_static_data_color]').val());
  		jQuery('#static_text').text(jQuery('#static_textarea').val());

    	 	
    });

    jQuery('.custom-form').click(function(){	
    	jQuery('#CFPD_header_div').css('background-color', jQuery('input:text[name=CFPD_heading_background_color]').val());
    	jQuery('#CFPD_header_span').css('color', jQuery('input:text[name=CFPD_heading_text_color]').val());
    	jQuery('#CFPD_header_span').text(jQuery('input:text[name=CFPD_heading]').val());
    	jQuery('#CFPD_body_div').css('background-color', jQuery('input:text[name=CFPD_body_background_color]').val());
  		jQuery('#enq_form_submit').val(jQuery('input:text[name=CFPD_button_text]').val());
    	jQuery('#enq_form_submit').css({'background-color' : jQuery('input:text[name=CFPD_button_bgcolor]').val(),'color' : jQuery('input:text[name=CFPD_button_text_color]').val()});

    	 	
    });



	jQuery('.image-only').magnificPopup({
		type:'inline',
		midClick: true
	});
	jQuery('.question-only').magnificPopup({
		type:'inline',
		midClick: true
	});
	jQuery('.text-only').magnificPopup({
		type:'inline',
		midClick: true
	});
	jQuery('.custom-form').magnificPopup({
		type:'inline',
		midClick: true
	});
/*****************************************************/

});