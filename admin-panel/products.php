<?php include '../common/connect.php'; ?>
<?php

if (!isset($_SESSION['admin_id'])) {
  echo "<script>window.location.href='login.php';</script>";
  die;
}



if (isset($_GET['product_id'])) {
  $delete = mysqli_query($conn,"DELETE FROM `products_tbl` WHERE `id`='".$_GET['product_id']."'");
  if($delete){
    echo "<script>alert('Product ID = ".$_GET['product_id']." Deleted.');window.location.href='products.php';</script>";
  }
  else{
    echo "<script>alert('Technical Error!');</script>";
  }
}
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
      $product = mysqli_query($conn,"SELECT * FROM `products_tbl`");
      $counter = 1;
      while( $row = mysqli_fetch_assoc($product) ){
    ?> 
      <!-- Product List Accordian -->
      <div class="card">
        <div class="card-header">
          <div class="row mb-0">
            <div class="col-10 col-sm-10">
              <h6> <b>Product ID:</b> <?php echo $row['id']; ?> | <b>Name:</b> <?php echo $row['name']; ?> | <b>Model Number:</b><?php echo $row['modal_no']; ?> | <b>Price:</b>  Rs. <?php echo $row['price']; ?></h6>
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
            <div class="card mb-3" style="width: 100%">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img src="../assets/products/<?php echo $row['image']; ?>" class="card-img" style="width: 18rem;height: 18rem;max-width: auto;">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $row['name']; ?></h5>
                    <h6 class="card-title">Rs.<?php echo $row['price']; ?></h6>
                    <h6 class="card-title">Model No : <?php echo $row['modal_no']; ?></h6>
                    <h6 class="card-title">Length : <?php echo $row['length']; ?></h6>
                    <h6 class="card-title">Diameter : <?php echo $row['diameter']; ?></h6>
                    <p class="card-text"><?php echo $row['description']; ?>
                    </p>
                    <p class="card-text">
                      <a href="productEdit.php?product_id=<?php echo $row['id']; ?>">
                        <button class="btn btn-warning">
                          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                      </button>
                      </a>
                      
                      <!-- Delete Button -->
                      <a href="products.php?product_id=<?php echo $row['id']; ?>">
                        <button class="btn btn-danger delete_product">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                          <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                      </button>
                      </a>
                    </p>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
        $counter++; 
        }
      ?>
<script type="text/javascript" src="../assets/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery-ui/jquery-ui.min.js"></script>
<?php

$check_query = "SELECT * FROM products_tbl";
$result = mysqli_query($conn , $check_query);
$count = mysqli_num_rows($result);

if($count == 0){
  echo "<script>
  $('.is_data_empty').html('<h3>No product found.</h3>');
  
  </script>";  
}



?>
</div>

</div>

</body>
</html>