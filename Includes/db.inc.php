<?php

/*
  $servername="fdb26.awardspace.net";
   $username="3320362_hmm";
   $password="Computer19";
   $dbname="3320362_hmm";
  $servername = "localhost";
  */
 

   $servername="afrimamafarms.com";
   $dbname="afrimama_afrimama";
   $username="afrimama_mama_afri";
   $password="afrimummy2022";
  

    /*
  $servername="localhost";
   $username="root";
   $password="";
   $dbname="afrimama"; 
   */
 
   
  


   try{
    $conn= new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if($conn){
      //  echo "connected succesfully";
       // echo "<br>";
    }
    else{
     //   echo "can't connect";
    }

  }
   catch(PDOException $e){
       echo "error while connecting to the database" .  $e->getMessage() ;
   }

   

    



?>