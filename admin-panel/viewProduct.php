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
  <?php 
    $product = mysqli_query($conn,"SELECT * FROM `products_tbl` WHERE `id` = '$_GET[product_id]' ");
    $row = mysqli_fetch_assoc($product);
  ?>
  <div class="card mb-3" style="width: 100%">
              <div class="row no-gutters">
                <div class="col-md-4">
                  <img src="../assets/products/<?php echo $row['image']; ?>" class="card-img" style="width: 20rem;height: 20rem;max-width: auto;">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h3 class="card-title"><?php echo $row['name']; ?></h3>
                    <h4 class="card-text">Rs.<?php echo $row['price']; ?></h4>
                    <h6 class="card-title">Modal No: <?php echo $row['modal_no']; ?></h6>
                    <h6 class="card-title">Length: <?php echo $row['length']; ?></h6>
                    <h6 class="card-title">Diameter: <?php echo $row['diameter']; ?></h6>
                    <p class="card-text"><?php echo $row['description']; ?></p>
                    
                    <p class="card-text"><a href="orders.php"><button class="btn btn-danger">Back</button></a></p>
                  </div>
                </div>
              </div>
            </div>  
</div>

</body>
</html>