<?php

include '../Models/Category.php';
include '../Models/Auth.php';


$categoryInstance=new Category($conn);
$authInstance=new Auth($conn);

$category_name="";
$creator="";
$date="";


if($_SERVER['REQUEST_METHOD']=="POST"){


    $category_name=$authInstance->validate($_POST['category_name']);
    $creator=$_POST['creator_name'];
    $date=date("y-m-d h:ia");
    $creator_id=$_POST['creator_id'];
 

    if(!empty($category_name)){
        if($categoryInstance->IfCategoryExisted($category_name)){ 
                if($categoryInstance->createCategory($category_name, $creator, $date, $creator_id) ){
                    echo "success";
                }else{
                    echo "an error occurred while adding a category";
                }    
        }else{
            echo "category name already existed";
        }   
     }else{
       echo 'category name cannot be empty';
     }






}



?>