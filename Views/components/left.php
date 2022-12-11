  <!------------------------LEFT ----------------- ---------------->
  <div class="left">
    <!------------------------for keeping profile and remove button for sidenav----------------- ---------------->
    <div class="image-removebox">

      <a href="mypage.php" class="profile">
           <div class="profile-photo">
              <img src="" alt=""  class="profile-photo">
           </div>
           <div class="handle">
              <h4><?php echo "{$firstname} {$lastname}"; ?> </h4>
              <h6>REF : <?php echo "{$referral}" ;?> </h6>
           </div>
       </a>

       <a href="Javascript:void(0)"  onclick="closenv()" class="remove-bar"> <i class="fa fa-remove remove"></i> </a>
</div>


<!---------------------end for keeping profile and remove button for sidenav----------------- ---------------->


    <!------------------------SIDEBAR-------------------active--------------->
     <div class="sidebar">

        
        <a href="dashboard.php"  class="menu-item">
           <span> <i class="fa fa-home" aria-hidden="true"></i> </span>
            <h3>Dashboard</h3>
        </a>
      
        <?php 
          $countnotify=$notifyInstance->unreadNotificationOrders();
          if($countnotify == 0 ):
         ?>
                              <!--IF THERE IS NO NOTIFICATION-->
        <a href="orders.php" class="menu-item" id="message-notifications">
             <span> <i class="fa fa-shopping-bag" aria-hidden="true"></i></span>
            <h3>All referred Orders</h3>
        </a>
        <?php else: ?>
         <!--IF THERE IS NOTIFICATION-->
         <a href="orders.php?read=true" class="menu-item" id="message-notifications">
         <span> <i class="fa fa-shopping-bag" aria-hidden="true"></i></span>
         <h3>All referred Orders</h3>
             <span><small class="notification-count"><?php echo $countnotify ?></small></span>
         </a>                        
        <?php endif ?>                      
                      


        <a href="javascript:void(0)" class="menu-item" onclick="attend()">
        <span> <i class="fa fa-cart-arrow-down" aria-hidden="true"></i> </span>
            <h3> referred orders Type</h3>
            <span> <i class="fa fa-caret-down" aria-hidden="true"></i> </span>
        </a>


        <div id="attendance"  class="dropdown-attendance">
           <a href="paid.php" class="menu-item">  <h3>paid Orders</h3> </a>
           <a href="unpaid.php" class="menu-item"> <h3>UnPaid Orders</h3> </a>
           <a href="confirmed.php" class="menu-item"> <h3>confirmed orders</h3> </a>
         </div>

         <?php 
                $countundelivered=$orderInstance->countUndeliveredOrders();
                if($countundelivered == 0 ):
            ?>
         <a href="javascript:void(0)" onclick="members()" class="menu-item">
            <h3>View Complete Orders</h3>
            <span> <i class="fa fa-caret-down" aria-hidden="true"></i> </span>
        </a>
        <?php else: ?>
        <a href="javascript:void(0)" onclick="members()" class="menu-item">
           <span> <i class="fa fa-check" aria-hidden="true"></i> </span>
            <h3>View Complete Orders</h3>
            <span><small class="notification-count"><?php echo $countundelivered ?></small></span>
            <span> <i class="fa fa-caret-down" aria-hidden="true"></i> </span>
        </a>
         <?php endif ?> 


        <div id="members"  class="dropdown-members">
            <?php 
                $countundelivered=$orderInstance->countUndeliveredOrders();
                if($countundelivered == 0 ):
            ?>
               <a href="undelivered.php" class="menu-item"> <h3>Undelivered Orders</h3> </a>
         <?php else: ?>
              <a href="undelivered.php" class="menu-item" id="message-notifications">
                 <h3>Undelivered Orders</h3>
                 <span><small class="notification-count"><?php echo $countundelivered ?></small></span>
              </a>   
         <?php endif ?> 

           <a href="delivered.php" class="menu-item"> <h3>Delivered Orders</h3> </a>   
         </div>

         <?php 
                $countPayOnDelivery=$notifyInstance->countPaymentOnDelivery();
             ?>           
                <a href="ondelivery.php" class="menu-item">
                  <span> <i class="fa fa-motorcycle" aria-hidden="true"></i> </span>
                   <h3>Payment on Delivery</h3>
                   <span><small class="notification-count"><?php echo $countPayOnDelivery; ?></small></span>
                </a>   
              <!------------------------------end of payment on delivery-------------------------------------> 

<!----------------------------------------------------------PAYMENT  ------------------------------------------------------->
<?php 
                $countPay=$notifyInstance->countNewPayment();
                if($countPay == 0 ):
            ?>         
          <a href="javascript:void(0)" onclick="campreg()" class="menu-item">
          <span> <i class="fa fa-money" aria-hidden="true"></i> </span>
            <h3>Referred Payment Mode</h3>
            <span> <i class="fa fa-caret-down" aria-hidden="true"></i> </span>
          </a>
          <?php else: ?>  
          <a href="javascript:void(0)" onclick="campreg()" class="menu-item">
            <h3>Payment</h3>
                 <span><small class="notification-count"><?php echo $countPay ?></small></span>
                 <span> <i class="fa fa-caret-down" aria-hidden="true"></i> </span>
              </a>   
        <?php endif ?> 
          

         <!-----------------------------------payment drodown ------------------------------------------------------->       
        <div id="campreg" class="dropdown-campreg">
      <!-------------------------------klump payment-------------------------------------> 
        <?php 
                $countKlumpPay=$notifyInstance->countNewKlumpPayment();
                if($countKlumpPay == 0 ):
            ?>
           <a href="klump.php" class="menu-item"> <h3>Klump payment</h3> </a>
        <?php else: ?>  
             <a href="klump.php?read=true" class="menu-item">
                 <h3>Klump payment</h3>
                 <span><small class="notification-count"><?php echo $countKlumpPay ?></small></span>
              </a>   
        <?php endif ?> 
           <!------------------------------end of klump payment-------------------------------------> 
              <!------------------------------flutterwave payment-------------------------------------> 

              <?php 
                $countFlutterwavePay=$notifyInstance->countNewFlutterwavePayment();
                if($countFlutterwavePay == 0 ):
             ?>
              <a href="flutterwave.php" class="menu-item"> <h3>Flutterwave payment</h3> </a>
             <?php else: ?>  
                <a href="flutterwave.php?read=true" class="menu-item">
                   <h3>Flutterwave payment</h3>
                   <span><small class="notification-count"><?php echo $countFlutterwavePay ?></small></span>
                </a>   
            <?php endif ?> 
              <!------------------------------end of flutterwave payment-------------------------------------> 
               <!------------------------------payment on deivery-------------------------------------> 

         </div>
      <!-----------------------------------end of payment drodown ------------------------------------------------------->   


<!---------------------------------------------------------- CONTACT CUSTOMERS ------------------------------------------------------->                 
        <a href="commission.php" class="menu-item">
            <span> <i class="fa fa-percent" aria-hidden="true"></i> </span>
            <h3> Your Commission </h3>
        </a>
   
       
        
<!---------------------------------------------------------- EDIT ADMIN ACCOUNT ------------------------------------------------------->     
        <a href="adminedit.php" class="menu-item">
            <span> <i class="fa fa-pencil" aria-hidden="true"></i> </span>
            <h3>Edit Your Account</h3>
        </a>

        <a href="dashboard.php?logout=disconnect" class="menu-item">
          <span> <i class="fa fa-power-off" aria-hidden="true"></i> </span>
            <h3>Log out</h3>
        </a>


    </div>
  </div>

    <script>




    </script>
