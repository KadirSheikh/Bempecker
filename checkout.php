<?php include 'common/connect.php'; ?>
<title>Checkout</title>
<?php include 'common/auth.php'; ?>
<body>
    <?php include 'common/header.php'; ?>
    <div class="container" style="margin-top:200px;">
    <?php
  

	
	function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


  if(isset($_GET['id'])){
    $p_id = base64_decode($_GET['id']);
    $user_id = $_SESSION['user_id'];
    if(isset($_POST['place-order'])){
      $fullname = test_input($_POST['fname']);
      $email = test_input($_POST['email']);
      $mobile = test_input($_POST['phone']);
      $address = test_input($_POST['address']);
      $city = test_input($_POST['city']);		
      
      $payment_mode = test_input($_POST['payment_mode']);
      
      $select = mysqli_query($conn,"SELECT * FROM `products_tbl` WHERE `id`=$p_id");
      while($row = mysqli_fetch_assoc($select)){
        $order_id = 'BMPK'.date("d").date("m").date("Y").(mt_rand()).$user_id.'';
        $total_price = $row['price'];
  
       $product_name = $row['name'];
       $sql = "INSERT INTO `order_tbl`(`order_id`,`user_id`, `shipName`, `shipEmail`, `shipPhone`, `shipAddress`, `shipCity`, `product_id`, `product_name` , `product_quantity`, `total_price`,`payment_mode`)  VALUES ('$order_id','$user_id','$fullname','$email','$mobile','$address','$city','$p_id', '$product_name' , '1','$total_price','$payment_mode')";
      
       $insert = mysqli_query($conn,$sql);
           if($insert){
              echo "<script>swal('Your order is placed!' , '' , 'success').then(() => {
                  window.location.href='our_product.php';
                });;</script>";
           }
       
      }
      
      
  
  }
  }else{
    $user_id = $_SESSION['user_id'];
    if(isset($_POST['place-order'])){
      $fullname = test_input($_POST['fname']);
      $email = test_input($_POST['email']);
      $mobile = test_input($_POST['phone']);
      $address = test_input($_POST['address']);
      $city = test_input($_POST['city']);		
      
      $payment_mode = test_input($_POST['payment_mode']);
      
      $select = mysqli_query($conn,"SELECT cart_tbl.id, cart_tbl.p_id, cart_tbl.quatity, cart_tbl.user_id, products_tbl.id, products_tbl.name, products_tbl.price, products_tbl.image FROM `cart_tbl` INNER JOIN `products_tbl` ON cart_tbl.p_id = products_tbl.id WHERE cart_tbl.user_id = $user_id");
      while($row = mysqli_fetch_assoc($select)){
        // $order_id = time() . mt_rand();
        $order_id = 'BMPK'.date("d").date("m").date("Y").(mt_rand()).$user_id.'';
        $total_price = $row['price']*$row['quatity'];
        $product_name = $row['name'];
       $sql = "INSERT INTO `order_tbl`(`order_id`,`user_id`, `shipName`, `shipEmail`, `shipPhone`, `shipAddress`, `shipCity`, `product_id`, `product_name` , `product_quantity`, `total_price`,`payment_mode`)  VALUES ('$order_id','$user_id','$fullname','$email','$mobile','$address','$city','$row[p_id]', '$product_name' , '$row[quatity]','$total_price','$payment_mode')";
      
       $insert = mysqli_query($conn,$sql);
           if($insert){
              echo "<script>swal('Your order is placed!' , '' , 'success').then(() => {
                  window.location.href='our_product.php';
                });;</script>";
  
                
  
                $query_cart_delete = "DELETE FROM `cart_tbl`";
                $result_cart_delete = mysqli_query($conn , $query_cart_delete);
  
              
           }
       
      }
      
      
  
  }
  }

  



?>
        <form method="POST" action="">
        <div class="row">
          <div class="col-md-6 mb-5 mb-md-0 mt-3" >
            <div class="p-3 p-lg-5 border bg-light" style="border:1px solid #13AC47 !important;">
              <h2 class="h3 mb-3 text-black text-center strip">Billing Details</h2>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="fname" class="text-black">Full Name <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="fname" name="fname" placeholder="Full Name" required>
                </div>
              </div>

              

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="address" class="text-black">Address <span class="text-danger">*</span></label>
                  <!-- <input type="text" class="form-control" id="address" name="address" placeholder="Street address" required> -->
                  <textarea name="address" class="form-control" id="address" cols="10" rows="3" required placeholder="Address"></textarea>
                </div>
              </div>

              <div class="form-group row">
                <div class="col-md-12">
                  <label for="city" class="text-black">City <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="city" name="city" placeholder="City" required>
                </div>
              </div>

              <div class="form-group row mb-5">
                <div class="col-md-6">
                  <label for="email" class="text-black">Email Address <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="col-md-6">
                  <label for="phone" class="text-black">Phone <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" required>
                </div>
              </div>

            </div>
          </div>
          <div class="col-md-6">
            
            <div class="row mb-5">
              <div class="col-md-12">
                
                <div class="p-3 p-lg-5 border bg-light mt-3" style="border:1px solid #13AC47 !important;">
                  <h2 class="h3 mb-3 text-black text-center strip">Your Order</h2>
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Product</th>
                      <th>Total</th>
                    </thead>
                    <tbody>
                      <?php


                    if(isset($_GET['id'])){

                      $id = base64_decode($_GET['id']);

                              $total = 0;
                              $user_id = $_SESSION['user_id'];
                              $query_cart = "SELECT * FROM `products_tbl` WHERE `id`=$id";
                              $cart = mysqli_query($conn, $query_cart);
                              while( $row = mysqli_fetch_assoc($cart) ){
                            ?>
                                <tr>
                                  <td><?php echo $row['name']; ?><strong class="mx-2">x</strong> 1</td>
                                  <td>Rs.<?php echo $row['price']; ?></td>
                                </tr>

                            <?php
                              $total = $row['price'];
                              }
                          }else{
                            $total = 0;
                            $user_id = $_SESSION['user_id'];
                            $query_cart = "SELECT cart_tbl.id, cart_tbl.p_id, cart_tbl.quatity, cart_tbl.user_id, products_tbl.id, products_tbl.name, products_tbl.price, products_tbl.image FROM `cart_tbl` INNER JOIN `products_tbl` ON cart_tbl.p_id = products_tbl.id WHERE cart_tbl.user_id = $user_id";
                            $cart = mysqli_query($conn, $query_cart);
                            while( $row = mysqli_fetch_assoc($cart) ){
                          ?>
                              <tr>
                                <td><?php echo $row['name']; ?><strong class="mx-2">x</strong> <?php echo $row['quatity']; ?></td>
                                <td>Rs.<?php echo $row['price']*$row['quatity']; ?></td>
                              </tr>
        
                          <?php
                            $total = $total + ($row['price']*$row['quatity']);
                            }
                          }

                 
                  ?>
                      
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                        <td class="text-black">Rs.<?php echo $total; ?></td>
                      </tr>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Shipping</strong></td>
                        <td class="text-black">Free</td>
                      </tr>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                        <td class="text-black font-weight-bold"><strong>Rs.<?php echo $total; ?></strong></td>
                      </tr>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Payment</strong></td>
                        <td class="text-black">
                          <select class="form-control" name="payment_mode" required>
                            <option value="">Select</option>
                            <option value="cod">Cash on delivery</option>
                            <option value="paytm">PayTM</option>
                          </select>
                        </td>
                      </tr>
                    </tbody>
                  </table>

                  <div class="form-group">
                    <button type="submit" name="place-order" class="btn btn-lg btn-block" style="background-color: #13AC47;cursor:pointer;">Place Order</button>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </div>
        </form>
      </div>
    <?php include 'common/footer.php'; ?>


</body>