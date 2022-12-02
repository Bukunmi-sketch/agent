<?php

include '../Models/Product.php';
include '../Models/Uploadimg.php';
include '../Models/Auth.php';

//$loginInstance= new Login($conn);  
$imgInstance= new Uploadimg($conn);
$productInstance=new Product($conn);
$authInstance=new Auth($conn);

$product_name="";
$description="";
$price="";
$category="";
$available="";
$date="";
$picture="";

if($_SERVER['REQUEST_METHOD']=="POST"){


    $product_name=$authInstance->validate($_POST['product_name']);
    $description=$authInstance->validate($_POST['product_description']);
    $price=$authInstance->validate($_POST['product_price']);
    $category=$authInstance->validate($_POST['category']);
    $available=$authInstance->validate($_POST['product_available']);
    $date=date("y-m-d h:ia");
    $admin_id=$_POST['admin'];

    $picture=$_FILES['product_image']["name"];
    $dpsize=$_FILES['product_image']['size'];
    $dptemp=$_FILES['product_image']['tmp_name']; 
    $dir="../Images/product-img/";
    $dirfile=$dir.basename($picture);
    

    if(!empty($product_name) && !empty($price) && !empty($description) && !empty($category) && !empty($available) && !empty($picture) ){
        if($productInstance->IfProductExisted($product_name)){ 
          
                   if($imgInstance->imgextension($picture)){
                     if($imgInstance->largeImage($dpsize)){
                         if($imgInstance->moveImage($dptemp, $dirfile)){
                             if(  $productInstance->createProducts($admin_id, $picture, $product_name, $description, $category, $price, $available, $date) ){
                            
                                echo "success";
                            }else{
                                echo "an error occurred while uploading the image";
                            }
                         }else{
                             echo "file failed to move";
                         }
                     }else{
                         echo "image is too large";
                     }     
              }else{
                 echo 'file is not an image';
              }
        }else{
            echo "product type and name already existed";
        }   
     }else{
       echo 'products details must be totally filled';
     }






}



?>