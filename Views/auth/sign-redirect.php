<?php 
 /*if( !$authInstance->isloggedin() ){
   $authInstance->redirect('login.php');
  }

  */

  if( !isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== 'permitted') {
    $authInstance->redirect("signup.php");
  }


  ?>