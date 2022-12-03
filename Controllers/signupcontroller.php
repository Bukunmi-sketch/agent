<?php
    
   
 
  include '../Models/Login.php';  
  include '../Models/Register.php';  
  include '../Models/Auth.php';  
  

      // create of object of the user classs
    $authInstance= new Auth($conn);
    $loginInstance= new Login($conn);
    $registerInstance= new Register($conn);
    //$imgInstance= new Uploadimg($conn);
 
   



    $firstname='';
    $lastname='';
    $username="";
    $state="";
    $email='';
    $referral= rand(0,time());
    $password='';
    $confirmpass="";
    $dp="";
    $type="";
    $question="";
    $answer="";
    $secretkey="";


   if($_SERVER['REQUEST_METHOD']=="POST"){

    
       $type=$_POST["action"];
       if($type=="first_reg"){
    
           // $authInstance= new User($conn);
    
            $firstname=$authInstance->validate(ucfirst($_POST['fname']));
            $lastname=$authInstance->validate(ucfirst($_POST['lname']));
            $email=$authInstance->validate(ucfirst($_POST['email']));
            $state=$authInstance->validate(ucfirst($_POST['state']));
            $phone=$authInstance->validate(ucfirst($_POST['phone']));
            $password=strtolower($_POST['password']);
            $confirmpass=strtolower($_POST['confirmpass']);
            $referral="AFRI-".rand(0,time());
            $date=date('y-m-d');
            $type="SIGNUP";
            $read_msg="UNREAD";
            $time=date("h:i:sa");
            
            
            if( !empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) && !empty($confirmpass) && !empty($phone) && !empty($referral) ){
                if($authInstance->validLetters($firstname)){
                    if($authInstance->validLetters($lastname)){
                      //function to check invalid email
                        if($authInstance->filteremail($email)){
                            //funtion to check if email has been used;
                              if($registerInstance->RegisterCheckemail($email)){
                                  //function to check if password is longer than 6
                                   if($authInstance->passwordlength($password)){
                                         //function to check if confirmpassword & password matches
                                          if($authInstance->matchpassword($password,$confirmpass)){
                                           
                                            echo 'verified';
                                          
                                          }else{
                                              echo "password does not match";
                                          }
                                   }else{
                                       echo "password is too short";
                                   }
                              }else{
                                  echo "oops this email has been used";
                              }
                        }else{
                            echo "invalid email address";
                        }
                    }else{
                       echo "Only letters and white space allowed  in lastname";  
                    }    
                }else{
                    echo "Only letters and white space allowed in firstname";
                }
    
            }else{
               // echo $referral;
                echo "all fields are required to be filled";
            }
   }elseif($type=="second_reg"){

      
      $reasons=$authInstance->validate(ucfirst($_POST['textbio'])); 
   
      $dp=$_FILES['product_image']["name"];
      $dpsize=$_FILES['product_image']['size'];
      $dptemp=$_FILES['product_image']['tmp_name'];

      $dir="../Images/signup_img/dp--";
      $dirfile=$dir.basename($dp);

      $id_img=$_FILES['identity_image']["name"];
      $id_img_size=$_FILES['identity_image']['size'];
      $id_img_temp=$_FILES['identity_image']['tmp_name'];

      $dir="../Images/identity_img/dp--";
      $dirfile=$dir.basename($dp);
      
    //  $userid=$_POST["userid"];
 
     
       
       // empty($dp) ? $dp= $dp 
  
  
      if(!empty($dp) && !empty($id_img) && !empty($reasons)){
  
                if( $imgInstance->imgextension($dp) ){
                    if($imgInstance->imgextension($id_img)){

                       if($imgInstance->largeImage($dpsize)){
                        if($imgInstance->largeImage($id_img_size)){

                          if($imgInstance->moveImage($dptemp, $dirfile)){
                             


                                    //function to register the user
                                    if($registerInstance->register($firstname, $lastname, $email, $referral, $password, $date)){
                                        if($data=$registerInstance->fectchRegistedDetails($email)){
                                              //define session if login was succesful with returned user data
                                              session_start();
                                              $_SESSION['email']=$data['email'];
                                              $_SESSION['firstname']=$data['firstname'];
                                              $_SESSION['lastname']=$data['lastname'];
                                              $_SESSION['id']=$data['id'];
                                              $_SESSION["lastactivity"]=time();  
                                              $_SESSION['loggedin']='permitted'; 
                                              $_SESSION['lastactivetime']=date("h:i:sa"); 
                                              $_SESSION['lastactivedate']=date("y-m-d");              
                                              $_SESSION['datelastactivity']=date('y-m-d h:i:s');  
                                              $ipaddress=$_SERVER['REMOTE_ADDR'];
                                              $browsertype=$_SERVER['HTTP_USER_AGENT'];

                                            //  $loginInstance->lastActivity($_SESSION['id'],$_SESSION["lastactivity"], $_SESSION['lastactivetime'], $_SESSION//['lastactivedate'],$_SESSION['datelastactivity']);                                                 
                                              $loginInstance->usersLogData($_SESSION["id"],$ipaddress, $browsertype);
                                                  
                                                         echo "success";                                                               

                                        }else{
                                              echo 'we could not sign you in as an agent';
                                        }                                                                              
                                   }else{
                                       echo "an error occurred while attempting to sign up";
                                   }
                          }else{
                              echo "file failed to move";
                          }
                        }else{
                            echo "identity image size must not be larger than 900kb";
                        } 
                        
                      }else{
                          echo "image size must not be larger than 900kb";
                      } 
                      
                    }else{
                        echo 'your identity file is not an image';
                      }      
               }else{
                  echo 'file is not an image';
                } 
      }else {
          echo 'all entries are required to be filled';
      }
      
                      
   }


  }
   








?>