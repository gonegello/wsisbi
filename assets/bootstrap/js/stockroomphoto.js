$('#addpho').click(function(){
    $('#imgInp').click();
 })
 
 
 function readURL(input) {
         if (input.files && input.files[0]) {
             var reader = new FileReader();
             
             reader.onload = function (e) {
                 $('#addpho').attr('src', e.target.result);
             }
             
             reader.readAsDataURL(input.files[0]);
         }
     }
     
     $("#imgInp").change(function(){
         readURL(this);
     });



     