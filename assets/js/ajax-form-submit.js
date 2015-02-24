jQuery(document).ready(function(){

/*This is the code when customer submits the Ask a Question form*/
  jQuery('#Submit_clicked').click(function(){
    //
    var ans = jQuery('#answer').val();
    var username = jQuery('#username').val();
    
    if(username == ''){
      jQuery('#username').css('border','1px solid red');
      return false;
    }else{
      jQuery('#username').css('border','0px');
    }

    if(ans==''){
      jQuery('#answer').css('border','1px solid red');
      return false;
    }else{
      jQuery('.ajax-loader-img .loader-image').show();
      jQuery('#answer').css('border','0px');
      var dataString = { action : 'send_email_action', formtype : 'question' , uname : username, answer : ans }  
      jQuery.ajax({
        url: ajax_object.ajaxurl, // this is the object instantiated in wp_localize_script function
        type: 'POST',
        data: dataString,
        success:function(result){
          var data = result; 
          if(data=='success'){
            jQuery('.ajax-loader-img .loader-image').hide();
            jQuery('.ajax-loader-img .pop-suc').show();
          }else{
            jQuery('.ajax-loader-img .loader-image').hide();
            jQuery('.ajax-loader-img .pop-err').show();
          }
        }
      });
    }
  });

  /*This is the code when customer submits the Contact Us form*/
  jQuery('#enq_form_submit').click(function(){
     jQuery('.ajax-loader-img .loader-image').show();
    var count =0;
    jQuery('#user_name,#user_email,#enq_form').each(function(){
      var f_id = jQuery(this).attr('id');
      if(jQuery(this).val()==''){
        jQuery("#"+f_id).css('border','1px solid red');
        count++;
      }else{
        jQuery("#"+f_id).css('border','0px');
      }
    });

      if(count>0){
        return false;
      }
      var enq_name = jQuery('#user_name').val();
      var enq_mobile = jQuery('#user_mobile').val();
      var enq_email = jQuery('#user_email').val();
      var enq_comment = jQuery('#enq_form').val();
      jQuery('.ajax-loader-img .loader-image').show();
      jQuery.ajax({
        type: 'POST',
         url: ajax_object.ajaxurl, // this is the object instantiated in wp_localize_script function
        data: {action : 'send_email_action', formtype : 'contactform' , a_name : enq_name, a_mobile : enq_mobile, a_email : enq_email, a_comment : enq_comment},
        success:function(data){
           var result = data;
          if(result=='success'){
            jQuery('.ajax-loader-img .loader-image').hide();
            jQuery('.ajax-loader-img .pop-suc').show();
            
          }else{
            jQuery('.ajax-loader-img .loader-image').hide();
            jQuery('.ajax-loader-img .pop-suc').show();
            
          }
        }
      });
  });
});
