
  //when approved btn is clicked
  const approved3 = document.getElementById("approved");

  //change to grey btn
 
  const pending3 = document.getElementById("pending");


  //divs to hide
 
  const pendingDive3 = document.getElementById("pending-div"); //un read div

  //divs to show
  const approvedDiv3 = document.getElementById("approved-div"); //recent div

  approved3.onclick = function(){
   //divs
   
    pendingDive3.style.display="none";
    approvedDiv3.style.display = "block";

    //buttons
    approved3.style.color = "#3fd672";
    approved3.style.borderBottom="3px solid #3fd672";
    
    pending3.style.color="grey";
    pending3.style.borderBottom = "none";
    
  };





//Show pending div and hide the rest -->

  //when pending btn is clicked
  const pending2 = document.getElementById("pending");

  //change to grey btn
 
  const approved2 = document.getElementById("approved");


  //divs to hide

  const approvedDiv2 = document.getElementById("approved-div"); //un read div

  //divs to show
  const pendingDiv2 = document.getElementById("pending-div"); //recent div

  approvedDiv2.style.display="none";
  pending2.onclick = function(){
   //divs
   
    approvedDiv2.style.display="none";
    pendingDiv2.style.display = "block";

    //buttons
    pending2.style.color = "#e05a00";
    pending2.style.borderBottom="3px solid #e05a00";
   
    approved2.style.color="grey";
    approved2.style.borderBottom = "none";
    
  };





  const colr = document.getElementById("pending");
  const div = document.getElementById("pending-div");

  if(div.style.display = "block"){
    colr.style.color="#e05a00";
    colr.style.borderBottom="3px solid #e05a00 ";
  };

