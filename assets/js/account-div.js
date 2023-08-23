//when user account btn is clicked
    const useracc_d = document.getElementById("useracc-div");
    const admin_d = document.getElementById("admin-div");
    const sk_d = document.getElementById("sk-div");
    const client_d = document.getElementById("clients-div");

    const i_useracc = document.getElementById("iuseracc");
    const i_admin = document.getElementById("iadmin");
    const i_sk = document.getElementById("isk");
    const i_clients = document.getElementById("iclients");

    const useracc = document.getElementById("useracc");

    const admin = document.getElementById("admin");
    const sk = document.getElementById("sk");
    const clients = document.getElementById("clients");




    admin_d.style.display="none";
    sk_d.style.display="none";
    client_d.style.display="none";

    useracc.onclick = function(){
        admin_d.style.display="none";
        sk_d.style.display="none";
        client_d.style.display="none";
        useracc_d.style.display="block";

        i_useracc.style.fontSize="40px";
        i_admin.style.fontSize="30px";
        i_sk.style.fontSize="30px";
        i_clients.style.fontSize="30px";

        useracc.style.color="#ccae90";
        admin.style.color="grey";
        sk.style.color="grey";
        clients.style.color="grey";

        
        

  
    }


//when admin account btn is clicked
    const useracc_d1 = document.getElementById("useracc-div");
    const admin_d1 = document.getElementById("admin-div");
    const sk_d1 = document.getElementById("sk-div");
    const client_d1 = document.getElementById("clients-div");

    const i_useracc1 = document.getElementById("iuseracc");
    const i_admin1 = document.getElementById("iadmin");
    const i_sk1 = document.getElementById("isk");
    const i_clients1 = document.getElementById("iclients");

    const admin1 = document.getElementById("admin");

    const useracc1 = document.getElementById("useracc");
    const sk1 = document.getElementById("sk");
    const clients1 = document.getElementById("clients");

   

    admin1.onclick = function(){
        useracc_d1.style.display="none";
        sk_d1.style.display="none";
        client_d1.style.display="none";
        admin_d1.style.display="block";

        i_useracc1.style.fontSize="30px";
        i_admin1.style.fontSize="40px";
        i_sk1.style.fontSize="30px";
        i_clients1.style.fontSize="30px";

        useracc1.style.color="grey";
        admin1.style.color="#ccae90";
        sk1.style.color="grey";
        clients1.style.color="grey";
  
    }

 //when storekeper account btn is clicked
    const useracc_d2 = document.getElementById("useracc-div");
    const admin_d2 = document.getElementById("admin-div");
    const sk_d2 = document.getElementById("sk-div");
    const client_d2 = document.getElementById("clients-div");

    const i_useracc2 = document.getElementById("iuseracc");
    const i_admin2 = document.getElementById("iadmin");
    const i_sk2 = document.getElementById("isk");
    const i_clients2 = document.getElementById("iclients");

    const sk2 = document.getElementById("sk");

    const admin2 = document.getElementById("admin");
    const useracc2 = document.getElementById("useracc");
    const clients2 = document.getElementById("clients");

    

    sk2.onclick = function(){
        admin_d2.style.display="none";
        useracc_d2.style.display="none";
        client_d2.style.display="none";
        sk_d2.style.display="block";

        i_useracc2.style.fontSize="30px";
        i_admin2.style.fontSize="30px";
        i_sk2.style.fontSize="40px";
        i_clients2.style.fontSize="30px";

        useracc2.style.color="grey";
        admin2.style.color="grey";
        sk2.style.color="#ccae90";
        clients2.style.color="grey";
  
    }



 //when clients account btn is clicked
    const useracc_d3 = document.getElementById("useracc-div");
    const admin_d3 = document.getElementById("admin-div");
    const sk_d3 = document.getElementById("sk-div");
    const client_d3 = document.getElementById("clients-div");

    const i_useracc3 = document.getElementById("iuseracc");
    const i_admin3 = document.getElementById("iadmin");
    const i_sk3 = document.getElementById("isk");
    const i_clients3 = document.getElementById("iclients");

    const clients3 = document.getElementById("clients");

    const admin3 = document.getElementById("admin");
    const sk3 = document.getElementById("sk");
    const useracc3 = document.getElementById("useracc");


    clients3.onclick = function(){
        admin_d3.style.display="none";
        sk_d3.style.display="none";
        useracc_d3.style.display="none";
        client_d3.style.display="block";

        i_useracc3.style.fontSize="30px";
        i_admin3.style.fontSize="30px";
        i_sk3.style.fontSize="30px";
        i_clients3.style.fontSize="40px";

        useracc3.style.color="grey";
        admin3.style.color="grey";
        sk3.style.color="grey";
        clients3.style.color="#ccae90";
  
    }


    //default load
    const div = document.getElementById("useracc-div");
    const btn = document.getElementById("useracc");
    const icon = document.getElementById("iuseracc");

    if(div.style.display = "block"){
        icon.style.fontSize = "40px";
        btn.style.color = "#ccae90";
        
    }
    //show adduser div
    const addacc = document.getElementById("addacc");
    const puserdiv = document.getElementById("adduser-div");
    puserdiv.style.display = "none";
    addacc.onclick = function(){
        puserdiv.style.display = "block";
    }

    //close add user div
    const closeadduserdiv = document.getElementById("closeadduserdiv");
    const puserdiv1 = document.getElementById("adduser-div");

    closeadduserdiv.onclick = function(){
        puserdiv1.style.display = "none";
    }
