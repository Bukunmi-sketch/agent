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
    <title> Edit Account </title>
    <?php include '../Includes/metatags.php' ; ?>

              <link rel="stylesheet" type="text/css" href="../Resources/css/left.css"> 
              <link rel="stylesheet" type="text/css" href="../Resources/css/app.css">
              <link rel="stylesheet" type="text/css" href="../Resources/css/dropdown.css">
              <link rel="stylesheet" type="text/css" href="../Resources/css/email.css">
</head>
<body>
   <?php include './components/header.php' ; ?>
    <main>
        <div class="container">
        <?php include './components/left.php' ; ?>
       
        <div class="middle">

<div class="min-sub-container" >
     
       <div class="spanheader">
           <span><h4> Input your current password to continue </h4></span>
       </div>

       <form class="create" action="#"  enctype="multipart/form-data">
           <div class="error"></div>

            <div class="inputbox-details">
                <label for="Message">Message</label>
                <textarea id="passa" name="message"  class="description" placeholder="Message" autofocus value=" " autocomplete="on"></textarea>
            </div>


        <div class="button-details">
           <input type="hidden"  name="admin" value="<?php echo $sessionid; ?> "  autofocus >
           <button class="submit" name="login"> Continue </button>
        </div>

    </form>

</div>
</div>



        </div>
   </main>
          
           <script src="../Resources/js/sendemail.js"></script>
           <script src="../Resources/js/sidebar.js"></script>

     </body>

</html>
