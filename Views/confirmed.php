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
    <title> Confirmed | verified Order</title>
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

    //    $sort=$_POST['sortorders'];
    $status="confirmed";
    $stmt=$orderInstance->confirmedOrders($status, $referral);
         $orderData=$stmt->fetchAll(PDO::FETCH_ASSOC);
        
        
        ?>
         
        
        <div class="middle">
        <?php  if($stmt->rowCount() > 0 ): ?>
        
        <h5>Note: only verified i.e verified on either klump and Flutterwave servers as paid are included here, 99% of paid orders are likely to be verified </h5>
        

<div class="table-container">
  <table>
    <tr>
      <th> Referral</th>
      <th> Order id</th>
      <th>Customer Name</th>
      <th>Customers Phone No</th>
      <th>Customers Request item</th>
      <th>Customers Email</th>
      <th>Amount Paid</th>
      <th>Customers State</th>
      <th>Local Gov</th>
      <th>Customers Address</th>
      <th>Payment status</th>
      <th>Payment Type</th>
      <th>Order Status</th>
      <th>Date order was placed</th>
      <th>Time order was placed</th>
      <th>Additional Info</th>
      <th>Transaction Reference</th>
      <th>Payment Confirmation</th>
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
      <td> <?php echo  "{$orders['amount']}" ; ?>  </td>
      <td> <?php echo  "{$orders['state']}" ; ?>  </td>
      <td> <?php echo  "{$orders['customers_lga']}" ; ?>  </td>
      <td> <?php echo  "{$orders['customers_address']}" ; ?>  </td>
      <td> <?php echo  "{$orders['payment_status']}" ; ?>  </td>
      <td> <?php echo  "{$orders['payment_type']}" ; ?>  </td>
      <td> <?php echo  "{$orders['order_status']}" ; ?>  </td>
      <td> <?php  echo date("D,F j Y",  strtotime($orders['created_at'])); ?> </td>
      <td> <?php  echo date("H:i a",  strtotime($orders['created_at'])); ?> </td>
      <td> <?php echo  "{$orders['additional_info']}" ; ?>  </td>
      <td> <?php echo  "{$orders['transaction_ref']}" ; ?>  </td>
      <td> <?php echo  "{$orders['payment_confirmation']}" ; ?>  </td>
    </tr>
    </div>
      <?php endforeach ?>
  </table>
</div>

    <?php else: ?>
        <h4 style="font-family:'poppins', sans-serif; text-align:center; margin-top:300px; font-weight:lighter;">
         <i class="fa fa-info-circle" aria-hidden="true"></i>
          No payment has been verified for ony ordered item referred by you
        </h4>
    <?php endif ?>
        </div>

    




    </div> 
       
   </main>
          
         
           <script src="../Resources/js/sidebar.js"></script>
           <script src="../Resources/js/del-order.js"></script>
   
     </body>

</html>
