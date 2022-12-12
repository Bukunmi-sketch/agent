<?php
  session_start();  
  ob_start();

  include '../Includes/autoload.php';
  include './auth/redirect.php';

    $sessionid=$_SESSION['id'];   
    $agentInfo=$AgentInstance->getAgentinfo($sessionid);
    $email =$agentInfo['email'];
    $firstname=$agentInfo['firstname'];
    $lastname= $agentInfo['lastname'];
    $registered_date=$agentInfo['date'];
    $referral=$agentInfo['referralcodes'];
    $reg_status=$agentInfo['reg_status'];

    //include './auth/complete-redirect.php';
   

   
   // include './components/activity.php';
//ob_end_clean(); 
?>
<!doctype html>
<html lang="en">
<head>
    <title>dashboard afrimama</title>
    <?php include '../Includes/metatags.php' ; ?>

              <link rel="stylesheet" type="text/css" href="../Resources/css/left.css"> 
              <link rel="stylesheet" type="text/css" href="../Resources/css/app.css">
              <link rel="stylesheet" type="text/css" href="../Resources/css/dropdown.css">
              <link rel="stylesheet" type="text/css" href="../Resources/css/form.css">
              <link rel="stylesheet" type="text/css" href="../Resources/css/dashboard.css">
</head>
<body>
   <?php include './components/header.php' ; ?>
    <main>
        <div class="container">
        <?php include './components/left.php' ; ?>
        <?php
                        $arr=[
                            1=>'red',
                            2=>'orange',
                            3=>'yellow',
                            4=>"green",
                            5=>"blue",
                            6=>"indigo",
                            7=>"violet",
                            8=>"orangered",
                            9=>"#cecece"
                        ];
                       
                        $key=array_rand($arr);
                        ?>

        <div class="middle">
            <h3>DASHBOARD OVERVIEW</h3>
           <div class="middle-content">

          UNDER CONSTRUCTION !
                      </div>
</div>



        </div>
   </main>
           <script src="../Resources/js/app.js"></script>
           <script src="../Resources/js/sidebar.js"></script>
     </body>

</html>
