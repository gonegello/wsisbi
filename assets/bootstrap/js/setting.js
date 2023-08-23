$(document).ready(function() {
  $(".dropdowntitle").click(function(i) {
    
    var thisEle = $(this).parent().find(".dropdowncontent");
    var oriVisible = false;  
    if (thisEle.is(":visible")) {
      oriVisible = true;
    }
    
    // Reset
    $(".dropdowncontent").hide();
    $(".bx-chevron-right").show();
    $(".bx-chevron-down").hide();
      
    if (oriVisible) {
    // do nothing
    } else {

      thisEle.show();
      $(this).find(".bx-chevron-right").hide();
      $(this).find(".bx-chevron-down").show();
    }
    
  });
  
});