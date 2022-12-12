<?php 
 session_start();
 ob_start();
 include '../Includes/inc.php'; 
// include './auth/sign-redirect.php'; 

 
    $sessionid=$_SESSION['id'];
      //used as a unique key to get all the users data after signup 
    $email= $_SESSION['email'];
    $AgentInfo=$AgentInstance->getAgentinfo($sessionid);
    $email =$AgentInfo['email'];
    $firstname=$AgentInfo['firstname'];
    $lastname= $AgentInfo['lastname'];
    $referral= $AgentInfo['referralcodes'];
    $registered_date=$AgentInfo['date'];
    $reg_status=$AgentInfo['reg_status'];
    $status=$AgentInfo['Status'];
    
    
      if( $reg_status =="incomplete") {
        $authInstance->redirect("step2.php");
      }
    
      if( $reg_status =="incomplete" && $status =="pending") {
        $authInstance->redirect("step2.php");
      }
   

  

?>
        <!DOCTYPE html>
        <html>
        <head>
        <title>Hi <?php echo "{$firstname} {$lastname}"; ?> Awaiting Approval </title>

        <?php include '../Includes/metatags.php' ; ?>
        
        <link rel="stylesheet" href="../Resources/css/pending.css" type="text/css">
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
           <span onclick="history.back()"><i class="fa fa-arrow-left"></i> </span> 
           <p> Awaiting Approval</p>
           <a href="home.php" > <button class="go-home"> <?php echo ucfirst($status) ; ?></button></a>
       </div>
   
       <div class="container">
    
       <div class="sub-container">        
              <h3 class="dear-name">Dear, <?php echo "{$firstname} {$lastname}"; ?></h3>
            <h> Thanks for signaling a request to joining afrimamama as an Agent, Hereby check back while you await a confirmation from afrimama to approve your request</h>
          
          
       </div>

       </div> 
</main> 
  </body>
  
 
  </html>