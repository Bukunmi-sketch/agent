<?php

//namespace Users;

require '../Includes/db.inc.php';
 // session_start();

   class Product{
        private $db;
       
        public function __construct($conn)
        {
            $this->db= $conn;
        }

        //create new products
        public function createProducts($admin_id, $picture, $product_name, $description, $category, $price, $available, $date){  
               try{
                
                   $sql="INSERT INTO products(user_id, product_picture, product_name, description, category, price,	available,	created_at	)VALUES   (:admin_id, :picture,:product_name, :description, :category, :price, :isavailable, :created )";
                     $stmt= $this->db->prepare($sql);
                      $result=  $stmt->execute([
                        ":admin_id"=>$admin_id,
                        ":description" =>$description,
                        ":picture" => $picture,
                        ":product_name" =>$product_name,
                        ":category" => $category,
                        ":price" =>$price,
                        ":isavailable" => $available,
                        ":created" =>$date
                   ]);
   
                   if($result){
                     return true;
                       }else{
                    return false;
                   }
               } catch(PDOException $e){
                   echo  $e->getMessage(); 
               }
           }   //create()


                               //if produxtname already exist  //auth
public function IfProductExisted($productname){
    try{
    
      $sql="SELECT * FROM products WHERE product_name =:productname";
      $stmt= $this->db->prepare($sql);
      $stmt->bindParam(':productname', $productname);
      $stmt->execute();
      // Check if row is actually returned
      if($stmt->rowCount() > 0 ){
        //  echo "produxtname has been used";
          return false;
       } else{   
          //   echo 'continue to sign up';
             return true;
         }
    }catch(PDOException $e){
           echo  $e->getMessage(); 
       }
    }



           public function getProducts()
           {             
             $sql="SELECT * FROM products";
             $stmt=$this->db->prepare($sql);
             $stmt->execute();
             return $stmt;
           }


            //create new products
        public function updateProducts($productid, $picture, $product_name, $description, $category, $price, $available){  
          try{
           
              $sql="UPDATE products SET product_picture=:picture , product_name= :product_name , description= :description , category= :category , price=:price ,	available=:isavailable WHERE  id=:productid ";
                $stmt= $this->db->prepare($sql);
                 $result=  $stmt->execute([
                   ":productid"=>$productid,
                   ":description" =>$description,
                   ":picture" => $picture,
                   ":product_name" =>$product_name,
                   ":category" => $category,
                   ":price" =>$price,
                   ":isavailable" => $available
              ]);

              if($result){
                return true;
                  }else{
               return false;
              }
          } catch(PDOException $e){
              echo  $e->getMessage(); 
          }
      }   //updatate with pictures()

         //create new products
         public function updateWithoutPics($productid, $product_name, $description, $category, $price, $available){  
          try{
           
              $sql="UPDATE products SET product_name= :product_name , description= :description , category= :category , price=:price ,	available=:isavailable WHERE  id=:productid ";
                $stmt= $this->db->prepare($sql);
                 $result=  $stmt->execute([
                   ":productid"=>$productid,
                   ":description" =>$description,
                   ":product_name" =>$product_name,
                   ":category" => $category,
                   ":price" =>$price,
                   ":isavailable" => $available
              ]);

              if($result){
                return true;
                  }else{
               return false;
              }
          } catch(PDOException $e){
              echo  $e->getMessage(); 
          }
      }   //create()
         
         

           public function deleteProduct($productid){
            $deletesql="DELETE FROM products WHERE id=:product LIMIT 1 ";
             $stmt=$this->db->prepare($deletesql);
             $stmt->bindParam(":product", $productid);  
              if($stmt->execute()){
                 return true;
            //  echo 'product deleted';
              } else{
                 return false;
                // echo 'product cant be deleted';
              }       
          }

               //get all the details about the product
       public function getProductInfo($productid){
         try{
        $sql="SELECT * FROM products WHERE id=:productid";
        $stmt=$this->db->prepare($sql);
        $stmt->bindParam(":productid", $productid);
        $stmt->execute();
        $returned_row =$stmt->fetch(pdo::FETCH_ASSOC);
        return [
           'id' => $returned_row['id'],
          'product_name' =>         $returned_row['product_name'],
          'description'=>   $returned_row['description'],  
          'category' =>   $returned_row['category'],
          'price' =>      $returned_row['price'],
          'product_picture' =>      $returned_row['product_picture'],
          'available' =>      $returned_row['available']
          ];
    }catch(PDOException $e){
      echo $e->getMessage();
    }
  } 


    


}

?>