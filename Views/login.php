<?php 
session_start();
//include("../Controllers/logincontroller.php"); 

include '../Models/Auth.php';  
include '../Models/Agent.php';  
include '../Models/Login.php';  
include '../Models/Register.php';       


  // create of object of the user class
$authInstance= new Auth($conn);
$AgentInstance= new Agent($conn);
$loginInstance= new Login($conn);
$registerInstance= new Register($conn);

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
     $authInstance->redirect('dashboard.php');
}        

?> 
        <!DOCTYPE html>
        <html>
        <head>
        <title>Agent sign in</title>

        <?php include '../Includes/metatags.php' ; ?>
        
        <link rel="stylesheet" href="../Resources/css/login.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="../Resources/css/loader.css">
      
        </head>
        
        <body id="body" onload="load()">
  <div id="lds-facebook">
    <div></div>
    <div></div>
    <div></div>
</div>
      <main>
        <div class="container">
        
        <div class="sub-container">
        
        <div class="logobox">
          <div class="sub-logo">
             <img src="../Images/assets/AfrimamaLogo2.png" style="height: 30px; width: 30px;" alt="">
          </div>
        </div>
        
        <div class="login-details">
          <form action="#">
             <div class="error"><p></p></div><br>
                
                <div class="password-details">
                  <label for="email">Agent Email</label>
                     <input type="email" name="email" placeholder="Email Address" autofocus required>
                </div>
                
                <div class="password-details">
                    <span  id="show" onclick="check()">
                    <i class="fa fa-eye"></i>
                    </span>
                    <label for="password"> Agent Password </label>
                    <input type="password" id="pass" name="password" placeholder="Password"     required autocomplete="off">
                </div>
                
                <button class="submit" name="login">
                  <img src='../Images/assets/afrilogo2.png' style=" width: 90px; height: 25px;  " />
                  Log In
                </button>
                
                <div class="forgetbox">   
                    <a href="#" class="forget">Forgot password?</a>
                </div>
                
                <div class="before">
                     <p class="or">  or  </p>
                </div>
        
                <div class="create">
                   <a href ="register.php" class="createbut"> Create New  Account </a>
              </div>
        
            </form>  
         </div>
        </div>
        </div>
      </main> 
        
        
        <script src="../Resources/js/loader.js"></script> 
        
        
  <script type="text/javascript">
      
     
  function check(){
           var d=document.getElementById("pass");
           var eye=document.getElementById("show");
            
            
           if(d.type==="password"){
                           d.type="text";
                           eye.innerHTML='<i class="fa fa-eye-slash"></i>';
                                     }
           else{
                d.type="password";
               eye.innerHTML='<i class="fa fa-eye"></i>';
                 }
      }
      
      
 
      
      //const form=document.querySelector("");
      
      const form=document.querySelector("form");
      const btn=document.querySelector("button");
      const error=document.querySelector(".error");
      
      form.onsubmit=(e)=>{
      e.preventDefault();
      }
      
      btn.onclick=()=>{
        
      let xhr="";
          if(window.XMLHttpRequest){
             xhr=new XMLHttpRequest();
                }
           else{
                 xhr=new ActiveXObject("Microsoft.XMLHTTP");
               }
        xhr.onreadystatechange=()=>{
          if(xhr.readyState===XMLHttpRequest.DONE){
               if(xhr.status===200){
        
      	      	let data=xhr.responseText;
      	     	if(data == "success"){
      				location.href="dashboard.php";
     	       	 }
         	 	else{
            	 error.textContent=data;
                 error.style.display="block";
                 btn.innerHTML="Login again";
                 btn.style.fontSize="15px";
          		}
         	  }    //STATUS ===200
           }
       else{
          btn.innerHTML='<i class="fa fa-spinner fa-pulse"></i>';
           btn.style.color="white";
          btn.style.fontSize="1.2em";
          
              }//DONE
      }
      
      xhr.open("POST","../Controllers/logincontroller.php",true);
      let formdata=new FormData(form);
      xhr.send(formdata);     
    }
      
      
      
      
  </script>
  
  </body>
  
 
  </html>