$('#addlogo').click(function(){
    $('#imgLog').click();
 })
 
 
 function readURL(input) {
         if (input.files && input.files[0]) {
             var reader = new FileReader();
             
             reader.onload = function (e) {
                 $('#addlogo').attr('src', e.target.result);
             }
             
             reader.readAsDataURL(input.files[0]);
         }
     }
     
     $("#imgLog").change(function(){
         readURL(this);
     });



     