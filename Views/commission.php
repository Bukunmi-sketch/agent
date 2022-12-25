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
    <title>Paid Order</title>
    <?php include '../Includes/metatags.php' ; ?>

              <link rel="stylesheet" type="text/css" href="../Resources/css/left.css"> 
              <link rel="stylesheet" type="text/css" href="../Resources/css/app.css">
              <link rel="stylesheet" type="text/css" href="../Resources/css/dropdown.css">
              <link rel="stylesheet" type="text/css" href="../Resources/css/table.css">
            
</head>
<body>
   <?php include './components/header.php' ; ?>
    <main>
        <div class="container">
          <?php  include './components/left.php' ; ?>

        <?php 

        
        
        ?>
         
        
        <div class="middle">
    
        <?php 

//    $sort=$_POST['sortorders'];
     $stmt=$orderInstance->getPaymentStatus("paid",$referral);
     $orderData=$stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
    ?>
     
    
    <div class="middle">
    <?php  if($stmt->rowCount() > 0 ): ?>
    
    <h5>Note: only paid orders referrerd by you are included here, it certifies customers has paid for the product either through klump or flutterwave </h5>
    

<div class="table-container">
<table>
<tr>
  <th> Referral</th>
  <th> Order id</th>
  <th>Customer Name</th>
  <th>Customers Phone No</th>
  <th> Ordered item </th>
  <th> Customers Email </th>
  <th>Customers Phone No</th>
  <th>Amount Paid</th>
  <th>Item Commission %</th>\
  <th>Commission Amount </th>
</tr>
<?php foreach($orderData as $orders): ?>
<div >
<tr class="trr" id="eachorder<?php echo  "{$orders['order_id']}" ; ?>">  
<td> <?php echo  "{$orders['referral']}" ; ?> </td>
  <td> <?php echo  "{$orders['order_id']}" ; ?> </td>
  <td><?php echo  "{$orders['customers_firstname']} {$orders['customers_lastname']}" ; ?>   </td>
  <td> <?php echo  "{$orders['phone_no']}" ; ?> </td>
  <td> <?php echo  "{$orders['cart_items']}" ; ?> </td>
  <td> <?php echo  "{$orders['email']}" ; ?> </td>
  <td> <?php echo  "{$orders['amount']}" ; ?> </td>
  <td> <?php echo  "{$orders['commission']}" ; ?> </td>
  <td>  
   <?php
      echo $orders['commissionn']/100 * $orders['amount'];
   ?>

  </td>
</tr>
</div>
  <?php endforeach ?>
</table>
</div>

<?php else: ?>
    <h4 style="font-family:'poppins', sans-serif; text-align:center; margin-top:300px; font-weight:500;">
     <i class="fa fa-info-circle" aria-hidden="true"></i>
      No payment has been made for ony ordered item referred by you
    </h4>
<?php endif ?>
    </div>

    

</div>


    </div> 
       
   </main>
          
         
           <script src="../Resources/js/sidebar.js"></script>
           <script src="../Resources/js/del-order.js"></script>
   
     </body>

</html>
