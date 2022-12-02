<?php 
include('../Controllers/signupcontroller.php');



?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Register as an Agent</title>

<?php include '../Includes/metatags.php' ; ?>
   
<link rel="stylesheet" href="../Resources/css/signup.css" type="text/css">
<link rel="stylesheet" type="text/css" href="../Resources/css/loader.css">
</head>
<body id="body" onload="load()">
  <div id="lds-facebook">
    <div></div>
    <div></div>
    <div></div>
</div>
      <main>
     <div class="newpostheader">
     <span onclick="history.back()"><i class="fa fa-arrow-left"></i></a></span>
     <h> Agent Registration </h>
     </div>

        <div class="container">


           


           <div class="sub-container">

           <div class="logobox">
              <div class="sub-logo">
                 <p class="logoo">Agent Registration</p>
              </div>
           </div> 
            
             
             <div class="login-details">
          				<form action="#">
                <div class="error"></div><br>
             
		        <div class="name-details">
		              <div class="fields">
                        <label for="firstname">Firstname</label>
		                  <input type="text" name="fname" placeholder="Firstname" value="<?php echo $firstname; ?>" >
		               </div>
		        
		               <div class="fields">
                          <label for="lastname">Lastname</label>
		                    <input type="text" name="lname" placeholder="Lastname" value="<?php echo $lastname; ?>" >
		  			   </div>
		        </div>

              <div class="name-details">
		              <div class="fields">
                        <label for="Email">Email</label>
                        <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>" >
		               </div>
		        
                    <div class="fields">
                                    <label for="origin">State</label>
                                    <?php
                                    $states = ["Abia", "Adamawa", "Akwa Ibom", "Anambra", "Bauchi", "Bayelsa", "Benue", "Borno", "Cross River", "Delta", "Ebonyi", "Edo", "Ekiti", "Enugu", "FCT - Abuja", "Gombe", "Imo", "Jigawa", "Kaduna", "Kano", "Katsina", "Kebbi", "Kogi", "Kwara", "Lagos", "Nasarawa", "Niger", "Ogun", "Ondo", "Osun", "Oyo", "Plateau", "Rivers", "Sokoto", "Taraba", "Yobe", "Zamfara"]
                                    ?>
                                    <select name="state">
                                        <?php foreach ($states as $state) : ?>
                                            <option value="<?php echo $state; ?> "><?php echo $state; ?> </option>
                                        <?php endforeach ?>
                                    </select>
                 </div>
		        </div>
		          
		          
			    <div class="others">

             <div class="others-field">
                       <label for="Phone">Mobile No</label>
				           <input type="number" id="phone" name="phone" placeholder="phone" > 
				     </div><br>
					        
			         
				    <div class="others-field">
                   <label for="Password">Password</label>
				       <input type="password" id="passa" name="password" placeholder="password" value="<?php echo $password; ?>" >
				       <span id="showa" onclick="checka()"><i class="fa fa-eye"></i></span>   
				    </div><br>
				       
				    <div class="others-field">
                       <label for="Confirm Password">Confirm Password</label>
				           <input type="password" id="passb" name="confirmpass" placeholder="confirmpassword" >
				     	     <span id="showb" onclick="checkb()"><i class="fa fa-eye"></i></span>	  
				     </div><br>
				       
                       <input type="hidden" name="action" value="first_reg" >  
				      <div class="others-field">
				           <button type="submit" class="btn" name="register">Sign up</button>
				     </div>
		 
			</div>
		   	
		   	<div class="create">			
			       <a href ="login.php " class="createbut"> Already have an Account ? Login</a>
            </div>
            
            </form>
       </div>
    </div>
   </div>
      </main>
  
    

</body>
<script src="../Resources/js/loader.js"></script>  
<script src="../Resources/js/validatephone.js"></script>  
<script type="text/javascript">

//const form=document.querySelector("");
    
    const form=document.querySelector("form");
    const btn=document.querySelector("button");
    const error=document.querySelector(".error");
    
    form.onsubmit=(e)=>{
       e.preventDefault();
    }
    
    btn.onclick=()=>{
    
    let xhr=new XMLHttpRequest();
    
    xhr.onreadystatechange=()=>{
    if(xhr.readyState===XMLHttpRequest.DONE){
         if(xhr.status===200){
    	      	let data=xhr.response;
    	      	
    	     	if(data ==="success"){
    	     	//    error.textContent=data;
    				location.href="dashboard.php";
   				 }
 	  			 else{
   					 error.textContent=data;
      		 		error.style.display="block";
      				 btn.innerHTML="Sign up again";
      				 btn.style.fontSize="0.8em";
   					}    	
         	}//status
         	
      	}
    else{
           btn.innerHTML='<i class="fa fa-spinner fa-pulse"></i>';
           btn.style.color="white";
          btn.style.fontSize="1.2em";
         }
    }
    
    xhr.open("POST","../Controllers/signupcontroller.php",true);
    let formdata=new FormData(form);
    xhr.send(formdata);
    
   


    
  }
    
   
   function checka(){
   var d=document.getElementById("passa");
   var eyea=document.getElementById("showa");
   	
   
   
   if(d.type==="password"){
		   d.type="text";
		   eyea.innerHTML='<i class="fa fa-eye-slash"></i>';
	   }
   else{
	   d.type="password";
	   eyea.innerHTML='<i class="fa fa-eye"></i>';
	   	
	   }
   }
   
   
   
   function checkb(){
   var e=document.getElementById("passb");
    var eyeb=document.getElementById("showb");
    
   if(e.type==="password"){
   e.type="text";
   eyeb.innerHTML='<i class="fa fa-eye-slash"></i>';
 	  }
   else{
   e.type="password";
   eyeb.innerHTML='<i class="fa fa-eye"></i>';
   
		   }
   }


</script>

</html>