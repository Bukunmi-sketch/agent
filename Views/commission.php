<?php
  session_start();  
  ob_start();

 // include '../Includes/inc.php';
 include '../Includes/autoload.php';
  include './auth/redirect.php';

    $sessionid=$_SESSION['id'];   
    include './auth/complete-redirect.php';
     
?>

<!doctype html>
<html lang="en">
<head>
    <title>Paid Order</title>
    <?php include '../Includes/metatags.php' ; ?>

              <link rel="stylesheet" type="text/css" href="../Resources/css/left.css"> 
              <link rel="stylesheet" type="text/css" href="../Resources/css/app.css">
              <link rel="stylesheet" type="text/css" href="../Resources/css/dropdown.css">
              <link rel="stylesheet" type="text/css" href="../Resources/css/table.css">
            
</head>
<body>
   <?php include './components/header.php' ; ?>
    <main>
        <div class="container">
          <?php  include './components/left.php' ; ?>

        <?php 

        
        
        ?>
         
        
        <div class="middle">
    
        UNDER CONSTRUCTION !


    

</div>


    </div> 
       
   </main>
          
         
           <script src="../Resources/js/sidebar.js"></script>
           <script src="../Resources/js/del-order.js"></script>
   
     </body>

</html>
