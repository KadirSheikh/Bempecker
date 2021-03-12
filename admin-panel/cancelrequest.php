<?php include '../common/connect.php'; ?>
<?php

if (!isset($_SESSION['admin_id'])) {
  echo "<script>window.location.href='login.php';</script>";
  die;
}

// if(isset($_POST['cancel-order'])){
//   $order_id = mysqli_real_escape_string($connect, $_POST['order_id']);
//   $order_id_num = mysqli_real_escape_string($connect, $_POST['order_id_num']);
//   $update = mysqli_query($connect,"UPDATE `order_tbl` SET `status` = 2 WHERE `ID` = '$order_id' ");
//   if($update)
//     echo "<script>alert('Order ID = $order_id_num Has Been Marked as Canceled.')</script>";
//   else
//     echo "<script>alert('Technical Error!')</script>";
// }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <!-- BOOTSTRAP LINKS -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <!-- CSS FILES -->
  <link rel="stylesheet" type="text/css" href="css/orders.css">

</head>
<style type="text/css">
  .accordion .card button {
    float: none;
}
</style>
<body>
<?php
    include 'navbar.php';
?>

<div class="container mt-3">
<div class="is_data_empty text-white text-center"></div>
  <!-- Accordian -->
  <div class="accordion" id="accordionExample">

    <?php 
      $product = mysqli_query($conn,"SELECT * FROM `order_tbl` WHERE `cancel_request` = 1 ORDER BY `ID` DESC");
      $counter = 1;
      while( $row = mysqli_fetch_assoc($product) ){
    ?>
<form method="POST">
  <input type="text" name="order_id" value="<?php echo $row['ID']; ?>" hidden>
  <input type="text" name="order_id_num" value="<?php echo $row['order_id']; ?>" hidden>
    <div class="card">
      <div class="card-header">
        <div class="row mb-0">
          <div class="col-10 col-sm-10">
            <h6>Product ID: <?php echo $row['product_id']; ?> | Name: <?php echo $row['product_name']; ?> |  Quantity. - <?php echo $row['product_quantity']; ?> | Total: Rs. <?php echo $row['total_price']; ?> | Status: Canceled
           
            </h6>
          </div>
          <div class="col-2 col-sm-2">
            <button class="btn btn-link btn-block text-right" type="button" data-toggle="collapse" data-target="#collapse<?php echo $counter; ?>" aria-expanded="true" aria-controls="collapse<?php echo $counter; ?>">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrows-angle-expand" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M5.828 10.172a.5.5 0 0 0-.707 0l-4.096 4.096V11.5a.5.5 0 0 0-1 0v3.975a.5.5 0 0 0 .5.5H4.5a.5.5 0 0 0 0-1H1.732l4.096-4.096a.5.5 0 0 0 0-.707zm4.344-4.344a.5.5 0 0 0 .707 0l4.096-4.096V4.5a.5.5 0 1 0 1 0V.525a.5.5 0 0 0-.5-.5H11.5a.5.5 0 0 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 0 .707z"/>
            </svg>
          </button>
          </div>
        </div>
      </div>

      <div id="collapse<?php echo $counter; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
        <div class="card-body">
          <div class="row">
                    <div class="col-sm-6">
                      <div class="col-sm-12"><h2>Order Detail</h2></div>
                      <div class="container">
                        <div class="container">
                          <div class="table-responsive">
                            <table class="table">
                              <tbody>                       
                                <tr>
                                  <td>
                                    Order Id:
                                  </td>
                                  <td class="text-primary">
                                    <?php echo $row['order_id']; ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    Customer Id:
                                  </td>
                                  <td>
                                    <?php echo $row['user_id']; ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    Placed On:
                                  </td>
                                  <td>
                                    <?php echo $row['purchase_date']; ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    Payment Mode:
                                  </td>
                                  <td>
                                    <?php echo $row['payment_mode']; ?>
                                  </td>
                                </tr>
                                
                                  
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="col-sm-12"><h2>Shipping Detail</h2></div>
                      <div class="container">
                        <div class="container">
                          <div class="table-responsive">
                            <table class="table">
                              <tbody>                       
                                <tr>
                                  <td>
                                    Ship Name:
                                  </td>
                                  <td>
                                    <?php echo $row['shipName']; ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    Ship Email:
                                  </td>
                                  <td>
                                    <?php echo $row['shipEmail']; ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    Ship Phone:
                                  </td>
                                  <td>
                                    <?php echo $row['shipPhone']; ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    Ship Address:
                                  </td>
                                  <td>
                                    <?php echo $row['shipAddress']; ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td>
                                    Ship City & Zip
                                  </td>
                                  <td>
                                    <?php echo $row['shipCity'] ?>
                                  </td>
                                </tr>
                                <tr>
                                  <td colspan="2">                                   
                                  <a class="btn btn-block btn-1 btn-outline-success" href="viewProduct.php?product_id=<?php echo $row['product_id']; ?>">View Product</a>
                                  </td>
                                </tr>
                                
                              </tbody>                                
                            </table>

                          </div>
                          
                        </div>
                      </div>
                    </div>
                    <!-- <div class="col-sm-12 text-center"> 
                                    <?php
                                      if( $row['status'] == 2 ){
                                        echo '<button class="btn btn-success">Canceled</button>'; 
                                      }
                                      else{
                                        echo '<button type="submit" name="cancel-order" class="btn btn-danger">Approve</button>';
                                      }
                                    ?>
                                  </div> -->
                  </div>
        </div>
      </div>
    </div>
</form>
    <?php
        $counter++; 
        }
      ?>
    
</div>

</div>
<script type="text/javascript" src="../assets/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.min.js"></script>
<?php

$check_query = "SELECT * FROM order_tbl";
$result = mysqli_query($conn , $check_query);
$count = mysqli_num_rows($result);

if($count == 0){
  echo "<script>
  $('.is_data_empty').html('<h3>No order found.</h3>');
  
  </script>";  
}



?>
</body>
</html>