<?php include '../common/connect.php'; ?>
<?php

if (!isset($_SESSION['admin_id'])) {
  echo "<script>window.location.href='login.php';</script>";
  die;
}


// if (isset($_GET['product_id'])) {
//   $delete = mysqli_query($connect,"DELETE FROM `product_tbl` WHERE `id`='".$_GET['product_id']."'");
//   if($delete){
//     echo "<script>alert('Product ID = ".$_GET['product_id']." Deleted.');window.location.href='index.php';</script>";
//   }
//   else{
//     echo "<script>alert('Technical Error!');</script>";
//   }
// }

$target_dir = "../assets/products/";

$uploadOk = 1;

// Check if image file is a actual image or fake image
if(isset($_POST["add"])) {
  
  $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
  $product_img = mysqli_real_escape_string($conn, $_POST['product_photo']);
  $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
  $product_type = mysqli_real_escape_string($conn, $_POST['product_type']);
  $product_modal_no = mysqli_real_escape_string($conn, $_POST['product_modal_no']);
  $product_length = mysqli_real_escape_string($conn, $_POST['product_length']);
  $product_diameter = mysqli_real_escape_string($conn, $_POST['product_diameter']);
  $product_des = mysqli_real_escape_string($conn, $_POST['product_des']);
  
  
  $target_file = $target_dir . basename($_FILES["product_photo"]["name"]);
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  
if ($_FILES["product_photo"]["size"] > 5242880) {
    echo "<script>alert('Sorry, your file is too large.Please upload below 5 MB.')</script>";
    $uploadOk = 0;
}


else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.')</script>";
    $uploadOk = 0;
}

else if ($uploadOk == 0) {
    echo "<script>alert('Sorry, your file was not uploaded.')</script>";

} else {
    if (move_uploaded_file($_FILES["product_photo"]["tmp_name"], $target_file)) {
        
        $path = basename( $_FILES["product_photo"]["name"]);

      $add_pro = "INSERT INTO `products_tbl`(`name`, `image`, `price`, `type`, `modal_no`, `length`, `diameter`, `description`) VALUES ('$product_name','$path','$product_price','$product_type','$product_modal_no','$product_length','$product_diameter','$product_des')";
        $result = mysqli_query($conn, $add_pro);
        if($result){
          echo "<script>alert('Added Succesfully');window.location.href='addProduct.php';</script>";
          
        }
        else{
          echo "<script>alert('Failed To Add');window.location.href='addProduct.php';</script>";
          
        }

    } else {
        echo "<script>alert('Sorry, there was an error uploading your file.".$_FILES["product_photo"]["size"]."');window.location.href='add_product.php';</script>";
        
    }
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
  <link rel="stylesheet" type="text/css" href="css/login.css">

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
  
  <div class="row">
        <!-- Sign IN FORM -->
        <div class="col-sm-6 col-md-6 col-lg-6 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Add Product</h5>
            <hr class="my-4">
            <form class="form-signin" method="POST" enctype="multipart/form-data">
              <div class="col-md-12">
                  <div class="form-group">
                    <label for="Product Name">Name</label>
                    <input name="product_name" required type="text" class="form-control" placeholder="Product Name">
                  </div>
                </div>
               
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="Price">Price</label>
                    <input type="number" name="product_price" required class="form-control" placeholder="Product Price"> 
                        
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="Price">Type</label>
                    <select name="product_type" id="" class="form-control" required>
                    <option value="lamps">Lamp</option>
                    <option value="accessories">Accessories</option>
                    </select>
                        
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="Price">Model Number</label>
                    <input type="text" name="product_modal_no" required class="form-control" placeholder="eg:ACB180101"> 
                        
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="Price">Length</label>
                    <input type="text" name="product_length" required class="form-control" placeholder='eg:12" - 3"'> 
                        
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="Price">Diameter</label>
                    <input type="text" name="product_diameter" required class="form-control" placeholder='eg:12" - 3"'> 
                        
                  </div>
                </div>
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="Description">Product Description</label>
                    <textarea class="form-control" required  name="product_des" rows="3" placeholder="Product Description"></textarea>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="Photo">Upload Photo</label>
                    <input type="file" name="product_photo" required class="form-control" >
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group">
                    <button type="submit" class="login-btn btn btn-block" name="add">Add</button>
                  </div>
                </div>
             
            </form>
          </div>
        </div>
      </div>
</div>
  

</div>

</body>
</html>