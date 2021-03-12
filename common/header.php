

    <title>Bampecker</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" content="" />
    <meta name="author" content="codedthemes">
    <!-- Favicon icon -->
    <!-- <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon"> -->
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">


    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css"> -->
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.2/xlsx.full.min.js"></script> -->
  




    <style>

.sidebar {
  height: 100vh;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #F6F3F3;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
  
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 17px;
  color: black;
  display: block;
  transition: 0.3s;
  font-weight:600;
}

.btn{
  font-weight:400 !important;
}

.sidebar a:hover {
  color: lightgray;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: white;
  color: black;
  padding: 10px 30px;
  
  border: 1px solid;
  box-shadow: 1px 3px #888888;
}

.openbtn:hover {
  background-color: white;
}

#main {
  transition: margin-left .5s;
  padding: 10px;
  background-color:white;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
  
}

@media (max-width:767px) {
  .openbtn {
  font-size: 15px;
  cursor: pointer;
  background-color: white;
  color: black;
  padding: 10px 30px;
  
  border: 1px solid;
  box-shadow: 1px 3px #888888;
}

}

.active{
  background-color:#8888;
}

.user_image{
  width:100px;
  height:100px;
  border-radius:50%;
  height:auto;
  margin-left:70px;
  margin-top:20px;
}

</style>
</head>
<body>

<div id="mySidebar" class="sidebar">
<?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <?php 
  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
    ?>
    <?php 
    $user_id = $_SESSION['user_id'];
    $profile_q = mysqli_query($conn , "SELECT * FROM `customer_tbl` WHERE `id`= $user_id");
    while($row = mysqli_fetch_assoc($profile_q)){
      ?>
<img src="assets/profile_pics/<?php echo $row['profile_photo'] ?>" class="img-fluid user_image" alt=""> 
      <?php
    }
    ?>
   
<a href="profile.php" style="font-size:20px;"><?php echo $_SESSION['name']; ?></a>
  <hr>
  
  
    <?php
    
  }
 ?>
  <a href="index.php" class="<?= ($activePage == 'index') ? 'active':''; ?>"><i class="fa fa-home" aria-hidden="true"></i>  Home</a>
  <a href="about.php" class="<?= ($activePage == 'about') ? 'active':''; ?>"><i class="fa fa-info-circle" aria-hidden="true"></i>  About</a>
  <a href="our_product.php" class="<?= ($activePage == 'our_product') ? 'active':''; ?>"><i class="fa fa-shopping-bag" aria-hidden="true"></i>  Shop</a>
 
  <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
    ?>
    <a href="profile.php" class="<?= ($activePage == 'profile') ? 'active':''; ?>"><i class="fa fa-user" aria-hidden="true"></i>  My Profile</a>

    <a href="my_orders.php" class="<?= ($activePage == 'my_orders') ? 'active':''; ?>"><i class="fa fa-list" aria-hidden="true"></i>  My Orders</a>
    <a href="canceled_orders.php" class="<?= ($activePage == 'canceled_orders') ? 'active':''; ?>"><i class="fa fa-ban" aria-hidden="true"></i>  Canceled Orders</a>
    <?php 
    $query_total_cart_item = "SELECT COUNT('id') as 'cart_item_count' FROM `cart_tbl` WHERE `user_id`=$user_id";
    $result_cart = mysqli_query($conn , $query_total_cart_item);
    while($row = mysqli_fetch_assoc($result_cart)){
?>
  <a href="my_cart.php" class="<?= ($activePage == 'my_cart') ? 'active':''; ?>"><i class="fa fa-shopping-cart" aria-hidden="true"></i>  My Cart <span class="badge badge-pill badge-secondary">
<?php echo $row['cart_item_count'] ?> </span></a>
<?php
    }

    ?>

  <a href="contactus.php" class="<?= ($activePage == 'contactus') ? 'active':''; ?>"><i class="fa fa-phone" aria-hidden="true"></i>  Contact</a>
 <a href="logout.php" class=" btn" style="background-color:#807171;">Logout <i class="fa fa-sign-out" aria-hidden="true"></i></a>
  
    <?php
  }else {
?>
 <a href="contactus.php"><i class="fa fa-phone" aria-hidden="true"></i> Contact</a>
  <a href="login.php" class="mt-5 mb-2 btn" style="background-color:#807171;">Login <i class="fa fa-sign-in" aria-hidden="true"></i></a>
  <span style="margin-left:120px;font-size:large;">or</span>
  <a href="register.php" class="mt-2 btn" style="background-color:#807171;">Register <i class="fa fa-user-plus" aria-hidden="true"></i></a>
<?php

  }?>

</div>

<div id="main" class="fixed-top" >
<div class="container">
<button class="openbtn mt-4" onclick="openNav()">☰ MENU</button> 
 <a href="index.php">
 <img src="assets/logo/logo.png" alt="" class="img-fluid ml-auto head_logo">
 </a> 
 
</div>
</div>

<script>
  
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
