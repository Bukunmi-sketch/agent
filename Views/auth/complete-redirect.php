<?php 

$AgentInfo=$AgentInstance->getAgentinfo($sessionid);
$email =$AgentInfo['email'];
$firstname=$AgentInfo['firstname'];
$lastname= $AgentInfo['lastname'];
$referral= $AgentInfo['referralcodes'];
$registered_date=$AgentInfo['date'];
$reg_status=$AgentInfo['reg_status'];
$status=$AgentInfo['status'];


if( $reg_status =="incomplete") {
    $authInstance->redirect("step2.php");
  }

  if( $status =="pending") {
    $authInstance->redirect("step2.php");
  }


?>