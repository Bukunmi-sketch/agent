<?php

//namespace pay;

require '../Includes/db.inc.php';
 // session_start();

   class Notification{
        private $db;
       
        public function __construct($conn)
        {
            $this->db= $conn;
        }

        public function unreadNotificationOrders($referral){
          $query="SELECT * FROM orders WHERE  notify_status=:status AND referral=:referral";
          $status="unread";
          $prepnotify=$this->db->prepare($query);
          $prepnotify->bindParam(':status',$status );
          $prepnotify->bindParam(":referral", $referral);
          $prepnotify->execute();
          return $prepnotify->rowCount();
        }
      
       
       
        public function readNotification($referral){
          $status="unread";
          $query="UPDATE orders SET notify_status='read' WHERE notify_status=:status AND referral=:referral";
           $status="unread";
          $stmt=$this->db->prepare($query);
          $stmt->bindParam(':status',$status );
          $stmt->bindParam(":referral", $referral);
          $stmt->execute();
        }
        
        public function unreadNotifyReports(){
          $query="SELECT * FROM reports WHERE  notify_status=:status ";
          $status="unread";
          $prepnotify=$this->db->prepare($query);
          $prepnotify->bindParam(':status',$status );
          $prepnotify->execute();
          return $prepnotify->rowCount();
        }
      
       /*
       
        public function readNotificationReports(){
              $query="UPDATE Orders SET notify_status='read' WHERE notify_status=:$status ";
               $status="unread";
              $stmt=$this->db->prepare($query);
              $stmt->bindParam(':status',$status );
              $stmt->execute();
            }
      */
     public function countNewPayment($referral){
      $query="SELECT * FROM orders WHERE  notify_newpay=:newklump OR notify_newpay=:newFlutter AND referral=:referral";
      $newklump="unreadKlump";
      $newFlutter="unreadFlutterwave";
      $prepnotify=$this->db->prepare($query);
      $prepnotify->bindParam(':newklump',$newklump );
      $prepnotify->bindParam(':newFlutter',$newFlutter);
      $prepnotify->bindParam(":referral", $referral);
      $prepnotify->execute();
      return $prepnotify->rowCount();
    }   
            

     public function countNewKlumpPayment($referral){
      $query="SELECT * FROM orders WHERE  notify_newpay=:status AND referral=:referral";
      $status="unreadKlump";
      $prepnotify=$this->db->prepare($query);
      $prepnotify->bindParam(':status',$status );
      $prepnotify->bindParam(":referral", $referral);
      $prepnotify->execute();
      return $prepnotify->rowCount();
    }   

    public function readKlumpNotification($referral){
      $status="unreadKlump";
      $query="UPDATE orders SET notify_newpay='readKlump' WHERE notify_newpay=:status AND referral=:referral";
      $stmt=$this->db->prepare($query);
      $stmt->bindParam(':status',$status );
      $stmt->bindParam(":referral", $referral);
      $stmt->execute();
    }    
    
    public function countNewFlutterwavePayment($referral){
      $query="SELECT * FROM orders WHERE  notify_newpay=:status AND referral=:referral";
      $status="unreadFlutterwave";
      $prepnotify=$this->db->prepare($query);
      $prepnotify->bindParam(':status',$status );
      $prepnotify->bindParam(":referral", $referral);
      $prepnotify->execute();
      return $prepnotify->rowCount();
    }  
    
    public function readFlutterwaveNotification($referral){
      $status="unreadFlutterwave";
      $query="UPDATE orders SET notify_newpay='readFlutterwave' WHERE notify_newpay=:status AND referral=:referral";
      $stmt=$this->db->prepare($query);
      $stmt->bindParam(':status',$status );
      $stmt->bindParam(":referral", $referral);
      $stmt->execute();
    }    

    public function countPaymentOnDelivery($referral){
      $query="SELECT * FROM orders WHERE  payment_type=:status AND referral=:referral";
      $status="pay on delivery";
      $prepnotify=$this->db->prepare($query);
      $prepnotify->bindParam(':status',$status );
      $prepnotify->bindParam(":referral", $referral);
      $prepnotify->execute();
      return $prepnotify->rowCount();
    }  
    

}        

?>