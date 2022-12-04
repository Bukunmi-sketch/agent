<?php 
 session_start();
 ob_start();
 include '../Includes/inc.php'; 
 include './auth/sign-redirect.php'; 

 
    $sessionid=$_SESSION['id'];
      //used as a unique key to get all the users data after signup 
    $email= $_SESSION['email'];
    $AgentInfo = $AgentInstance->getAgentinfo($sessionid);
    $email = $AgentInfo['email'];
    $firstname = $AgentInfo['firstname'];
    $lastname = $AgentInfo['lastname'];
    $registered_date = $AgentInfo['date'];



  

?>
        <!DOCTYPE html>
        <html>
        <head>
        <title>Hi <?php echo "{$firstname} {$lastname}"; ?> welcome to bucuzzi</title>

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
           <p>Our Privacy policies</p>
           <a href="home.php" > <button class="go-home">skip</button></a>
       </div>
   
       <div class="container">
    
       <div class="sub-container">        
              <h3 class="dear-name">Dear, <?php echo "{$firstname} {$lastname}"; ?></h3>
            <h>This page informs you of our policies regarding to the collection,use of personal information we receive from users of the site</h>
            <p>While using this site ,we may ask you to provide us with certain personally identifiable information that can be used to contact or identify you,but not limited to your name</p>
             <p> Although we do not use cookies,we collect log data information which may include your internet protocol(IP)address, browser type,the pages of our site that you visit , the time and date of your visit and other statistics.</p>
             <p> You can decide to delete the details of your personal information from us by the deleting your account permanetly ,if you feel such action is needed </p>
             <p> Thanks!</p>
          
       </div>

       </div> 
</main>
       <script src="../Resources/js/loader.js"></script>  
  </body>
  
 
  </html>