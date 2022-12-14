<?php
//namespace Users;
require '../Includes/db.inc.php';
 // session_start();

   class Register{
        private $db;
       
        public function __construct($conn)
        {
            $this->db= $conn;
        }

        //register new users
        public function register($firstname, $lastname,  $email, $mobile,  $referral, $state, $password, $date){  
               try{
                   //hash the password;
                   $user_hashed_password = password_hash($password, PASSWORD_DEFAULT );
   
                   $sql="INSERT INTO agents(firstname,lastname, email, Mobile,  referralcodes,  Status, reg_status, state, Password, reg_date)VALUES   (:firstname, :lastname, :email, :mobile,  :referralcodes, :status, :reg_status, :state, :password, :date)";
                   $stmt= $this->db->prepare($sql);
                   $result=  $stmt->execute([
                        ":firstname"=>$firstname,
                        ":lastname" =>$lastname,
                        ":mobile" =>$mobile,
                        ":state" =>$state,
                        ":referralcodes" =>$referral,
                        ":email" =>$email,
                        ":status" => 'pending',
                        ":reg_status" => 'incomplete',
                        ":password" => $user_hashed_password,
                        ":date" =>$date
                   ]);
   
                   if($result){
                     return true;
                //return the users data and email will be the unique key here                         
                    /*    return [
                        'email' => $email,  
                        'firstname'=>  $firstname,  
                        'lastname' =>  $lastname  
                            ];
                            */
                       }else{
                    //   echo "error while inserting";
                    return false;
                   }
               } catch(PDOException $e){
                   echo  $e->getMessage(); 
               }
           }   //register()

           public function updateImage( $dp, $id_img, $reasons, $sessionid){
 
            try{
                $reg_status='complete';
                $dpsql="UPDATE agents SET identity_pic=:identity_pic, display_pic=:display_pic, reason=:reasons, reg_status=:reg_status WHERE id=:agentid";
            
                $stmt=$this->db->prepare($dpsql);
                $stmt->bindParam(":agentid", $sessionid);
                $stmt->bindParam(":reasons", $reasons);
                $stmt->bindParam(":identity_pic", $id_img);
                $stmt->bindParam(":display_pic", $dp);
                $stmt->bindParam(":reg_status", $reg_status);
            
                if( $stmt->execute()){
                    //return the users data and email will be the unique key                  
                            return true;/*[
                            'id' => $sessionid,  
                            'resons' => $reasons
                                ];*/
                           }else{
                        //   echo "error while inserting";
                        return false;
                     }
                } catch(PDOException $e){
                       echo  $e->getMessage(); 
                   }
            
                }



                               //if email already exist  //auth
public function RegisterCheckemail($email){
    try{
    
      $sql="SELECT * FROM agents WHERE email =:email";
      $stmt= $this->db->prepare($sql);
      $stmt->bindParam(':email', $email);
      $stmt->execute();
      // Check if row is actually returned
      if($stmt->rowCount() > 0 ){
        //  echo "email has been used";
          return false;
       } else{   
          //   echo 'continue to sign up';
             return true;
         }
    }catch(PDOException $e){
           echo  $e->getMessage(); 
       }
    }



    public function fetchRegistedDetails($email){
      try{
         
           $sql="SELECT * FROM agents WHERE email =:email";
           $stmt= $this->db->prepare($sql);
           $stmt->bindParam(':email', $email);
           $stmt->execute();
           if($stmt->rowCount() > 0 ){
               
               $returned_row= $stmt->fetch(PDO::FETCH_ASSOC);      
                  return [
                     'id' =>        $returned_row['id'],
                     'firstname'=>  $returned_row['firstname'], 
                     'email' =>     $returned_row['email'],
                     'lastname' =>  $returned_row['lastname'],
                     'date' =>      $returned_row['reg_date'],
                     'password'=>   $returned_row['password']
                  ];
                    } else{
         
             return false;
          }
      }catch(PDOException $e){
          echo  $e->getMessage(); 
      }
    }  

   

    
public function createSignupNotification($sessionid, $getid, $type,$status, $reg_date, $time){
  //	  UPDATING WAS SUCCESSFUL CREATE A NOTIFICATION TO THE AFFECTED USER AND SELECTED POST
  $sql="INSERT INTO notifications(senderid,receiverid,type,status,date,time)VALUES(:sender, :receiver, :type, :status, :date, :time )";
  $stmt=$this->db->prepare($sql);
  $stmt->bindParam(":sender", $sessionid);
  $stmt->bindParam(":receiver", $getid);
  $stmt->bindParam(":type", $type);
  $stmt->bindParam(":status", $status);
  $stmt->bindParam(":date", $reg_date);
  $stmt->bindParam(":time", $time);

  if($stmt->execute()){
      return true;
   // echo 'notification created successfully';
  }else{
    return false;
  //  echo 'notification cannot be created and sent';
  }
    
}
public function deleteSignNotification($sessionid, $getid, $type,$status, $reference ){
  $sql="DELETE FROM notifications WHERE senderid=:sender AND receiverid=:receiver AND status=:status AND type=:type AND reference=:reference";
  $stmt=$this->db->prepare($sql);
  $stmt->bindParam(":sender", $sessionid);
  $stmt->bindParam(":receiver", $getid);
  $stmt->bindParam(":type", $type);
  $stmt->bindParam(":status", $status);
  $stmt->bindParam(":reference", $reference);
  if($stmt->execute()){
      return true;
   //echo 'notification delete successfully';
  }else{
    return false;
  //  echo 'notification cannot be created and sent';
  }
    
}
 
    
    
    
  }  //login









?>