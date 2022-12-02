<?php

//namespace Users;

require '../Includes/db.inc.php';

   class Category{
        private $db;
       
        public function __construct($conn)
        {
            $this->db= $conn;
        }

        //create new category
        public function createCategory($name, $creator, $created_at,$creator_id){  
               try{
                
                   $sql="INSERT INTO categories(name, created_by, created_at, creator_id ) VALUES (:category_name, :creator, :created, :creator_id )";
                     $stmt= $this->db->prepare($sql);
                      $result=  $stmt->execute([
                        ":category_name"=>$name,
                        ":creator" =>$creator,
                        ":created" =>$created_at,
                        ":creator_id" =>$creator_id
                   ]);
   
                   if($result){
                     return true;
                       }else{
                    //   echo "error while creating category";
                    return false;
                   }
               } catch(PDOException $e){
                   echo  $e->getMessage(); 
               }
    }   //create()
   
                                  //if produxtname already exist  //auth
public function IfCategoryExisted($categoryname){
    try{
    
      $sql="SELECT * FROM categories WHERE name =:categoryname";
      $stmt= $this->db->prepare($sql);
      $stmt->bindParam(':categoryname', $categoryname);
      $stmt->execute();
      // Check if row is actually returned
      if($stmt->rowCount() > 0 ){
        //  echo "category name already existeds";
          return false;
       } else{   
          //   echo 'continue to create category';
             return true;
         }
    }catch(PDOException $e){
           echo  $e->getMessage(); 
       }
    }

  
    public function getCategories()
    {             
      $sql="SELECT * FROM categories";
      $stmt=$this->db->prepare($sql);
      $stmt->execute();
      return $stmt;
    }


}
    
    ?>

