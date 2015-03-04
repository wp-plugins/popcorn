jQuery(document).ready(function(e) {

  jQuery('.slideup_plg').hide();

  jQuery(window).load(function () {
    jQuery('.slideup_plg').show(100);
    jQuery('.buttontab').effect("bounce",{time : 8} ,1000);
  });

  jQuery('.close-icon').click(function(){
    jQuery('.mainbox').hide();
  });

  jQuery(".header").click(function () {
    jQuery('.midarea').slideToggle(400);
    return false;
  });
  
});
 