<?php include '../common/connect.php'; ?>
<?php

if (!isset($_SESSION['admin_id'])) {
  echo "<script>window.location.href='login.php';</script>";
  die;
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
	<link rel="stylesheet" type="text/css" href="css/login.css">

</head>
<style type="text/css">
  .card .card-body h5{
    white-space: nowrap;
  }
</style>
<body>
<?php
    include 'navbar.php'; 
	
?>

<div class="container mt-3">
  <div class="row">
    <div class="col-6 col-sm-3 col-md-3 mb-2">
      <div class="card">
              <div class="card-body">
                <h6 class="card-title text-center">Total Orders</h6>
                <hr>
                <div class="text-center">
                  <h6 class="card-text">
                  <?php 
                  $count = mysqli_query($conn,"SELECT *  FROM order_tbl");
                  echo mysqli_num_rows($count);
                  ?>
                </h6>
                </div>

              </div>
            </div>
    </div>
    <div class="col-6 col-sm-3 col-md-3 mb-2">
      <div class="card">
              <div class="card-body">
                <h6 class="card-title text-center">Orders Delivered</h6>
                <hr>
                <div class="text-center">
                  <h6 class="card-text">
                  <?php 
                  $count = mysqli_query($conn,"SELECT *  FROM order_tbl WHERE status='delivered'");
                  echo mysqli_num_rows($count);
                  ?>
                </h6>
                </div>

              </div>
            </div>
    </div>

    <div class="col-6 col-sm-3 col-md-3 mb-2">
      <div class="card">
              <div class="card-body">
                <h6 class="card-title text-center">Orders Shipped</h6>
                <hr>
                <div class="text-center">
                  <h6 class="card-text">
                  <?php 
                  $count = mysqli_query($conn,"SELECT *  FROM order_tbl WHERE status='shipped'");
                  echo mysqli_num_rows($count);
                  ?>
                </h6>
                </div>

              </div>
            </div>
    </div>

    <div class="col-6 col-sm-3 col-md-3 mb-2">
      <div class="card">
              <div class="card-body">
                <h6 class="card-title text-center">Orders Out to Deliver</h6>
                <hr>
                <div class="text-center">
                  <h6 class="card-text">
                  <?php 
                  $count = mysqli_query($conn,"SELECT *  FROM order_tbl WHERE status='out'");
                  echo mysqli_num_rows($count);
                  ?>
                </h6>
                </div>

              </div>
            </div>
    </div>

    <div class="col-6 col-sm-3 col-md-3 mb-2">
      <div class="card">
              <div class="card-body">
                <h6 class="card-title text-center">Orders Pending</h6>
                <hr>
                <div class="text-center">
                  <h6 class="card-text">
                  <?php 
                  $count = mysqli_query($conn,"SELECT *  FROM order_tbl WHERE status= 'pending'");
                  echo mysqli_num_rows($count);
                  ?>
                </h6>
                </div>

              </div>
            </div>
    </div>
    <div class="col-6 col-sm-3 col-md-3 mb-2">
      <div class="card">
              <div class="card-body">
                <h6 class="card-title text-center">Orders Canceled</h6>
                <hr>
                <div class="text-center">
                  <h6 class="card-text">
                  <?php 
                  $count = mysqli_query($conn,"SELECT *  FROM order_tbl WHERE status='canceled'");
                  echo mysqli_num_rows($count);
                  ?>
                </h6>
                </div>

              </div>
            </div>
    </div>
    <div class="col-6 col-sm-3 col-md-3 mb-2">
      <div class="card">
              <div class="card-body">
                <h6 class="card-title text-center">Total Products</h6>
                <hr>
                <div class="text-center">
                  <h6 class="card-text">
                  <?php 
                  $count = mysqli_query($conn,"SELECT *  FROM products_tbl");
                  echo mysqli_num_rows($count);
                  ?>
                </h6>
                </div>

              </div>
            </div>
    </div>
    <div class="col-6 col-sm-3 col-md-3 mb-2">
      <div class="card">
              <div class="card-body">
                <h6 class="card-title text-center">Total Users</h6>
                <hr>
                <div class="text-center">
                  <h6 class="card-text">
                  <?php 
                  $count = mysqli_query($conn,"SELECT *  FROM customer_tbl");
                  echo mysqli_num_rows($count);
                  ?>
                </h6>
                </div>

              </div>
            </div>
    </div>
    
  </div>
  </div>

</body>
</html>