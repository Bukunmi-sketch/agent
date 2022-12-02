<?php 

            //import users class file
    include '../Models/Auth.php';  
    include '../Models/Agent.php';  
    include '../Models/Login.php';  
    include '../Models/Register.php';  
    include '../Models/Product.php';  
    include '../Models/Order.php';  
    include '../Models/Customer.php';
    include '../Models/Category.php';
    include '../Models/Report.php';
    include '../Models/Notification.php';
    include '../Models/Payment.php';
    include '../Models/Dashboard.php';
      // create of object of the Agent class
    $authInstance= new Auth($conn);
    $AgentInstance= new Agent($conn);
    $loginInstance= new Login($conn);
    $registerInstance= new Register($conn);
    $productInstance = new Product($conn);
    $orderInstance = new Order($conn);
    //$customersInstance = new Customer($conn);
    $categoryInstance = new Category($conn);
    $reportInstance = new Report($conn);
    $payInstance = new Payment($conn);
    $notifyInstance = new Notification($conn);
    $dashboardInstance =new Dashboard($conn);
    
    $dirfile="../Images/product-img/";

/*
 /";
   $postdirfile="../Images/post_img/post-image--";
   $coverdirfile="../Images/cover_img/";
   //$dirfile='..../Images/signup_img/'

*/

     ?>