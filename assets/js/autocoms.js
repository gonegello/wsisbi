
  $(function() {
     $( "#gen" ).autocomplete({
       source: 'autocomplete.php',
       response: function(event,ui){
         if(ui.content.length == 0){
           //$("#gen_result").text("No results found.");
           $("#gen_result").replaceWith('<a href="#addgenModal" data-toggle="modal" data-target="#addgenModal">If no result, click here to add.</a>');
           //document.getElementById("addgen").style.display = "block";
          }                 
        }
    
     });
  });


  $(function() {
     $( "#brand" ).autocomplete({
       source: 'brandcomplete.php',
     });
  });



  $(function() {
    $( "#member" ).autocomplete({
      source: 'peoplecomplete.php',
    });
 });


  $(function() {
    $( "#item" ).autocomplete({
      source: 'itemcomplete.php',
    });
 });




  $(function() {
     $( "#unit" ).autocomplete({
       source: 'unitcomplete.php',
     });
  });



  $(function() {
     $( "#description" ).autocomplete({
       source: 'descom.php',
     });
  });

  $(function() {
    $( "#category" ).autocomplete({
      source: 'category.php',
      response: function(event,ui){
        if(ui.content.length == 0){
          $("#cat_result").replaceWith('<a href="#addcatModal" data-toggle="modal" data-target="#addcatModal">If no result, click here to add.</a><br>');
          //document.getElementById("addgen").style.display = "block";
         }  

        }
    });
 });



$("#quantity,#unit_price").keyup(function () {
    $('#total_cost').val($('#quantity').val() * $('#unit_price').val());
});
 
