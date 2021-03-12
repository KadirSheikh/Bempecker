<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">
    <img src="../assets/logo/logo.png" width="150" height="70">
    Welcome Admin
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?= ($activePage == 'index') ? 'active':''; ?>">
        <a class="nav-link home" href="index.php">Dashboard</a>
      </li>
      <li class="nav-item <?= ($activePage == 'users') ? 'active':''; ?>">
        <a class="nav-link products" href="users.php">Users</a>
      </li>
      <li class="nav-item <?= ($activePage == 'addProduct') ? 'active':''; ?>">
        <a class="nav-link products" href="addProduct.php">Add Product</a>
      </li>
      <li class="nav-item <?= ($activePage == 'products') ? 'active':''; ?>">
        <a class="nav-link products" href="products.php">Products</a>
      </li>
      <li class="nav-item <?= ($activePage == 'orders') ? 'active':''; ?>">
        <a class="nav-link orders" href="orders.php">Orders</a>
      </li>
      <li class="nav-item <?= ($activePage == 'cancelrequest') ? 'active':''; ?>">
        <a class="nav-link orders" href="cancelrequest.php">Canceled Orders</a>
      </li>
      <?php if (isset($_SESSION['admin_id'])) {
              ?>
      <li class="nav-item">
        <a class="nav-link logout" href="logout.php">Logout</a>
      </li>
      <?php }
          else{ ?>
      <li class="nav-item">
        <a class="nav-link login" href="login.php">Login!</a>
      </li>
    <?php } ?>
    </ul>
   
  </div>
</nav>

<style type="text/css">
  ul li{
    padding-left:10px;
    padding-right: 10px;
  }
  a.nav-link.home{
    transition: 0.3s;
  }
  a.nav-link.home:hover{
    padding-left: 15px;
    padding-right: 15px;
    border-radius: 6px;
    background-color: #55efc4; 
  }
  a.nav-link.products{
    transition: 0.3s;
  }
  a.nav-link.products:hover{
    padding-left: 15px;
    padding-right: 15px;
    border-radius: 6px;
    background-color: #55efc4; 
  }
  a.nav-link.orders{
    transition: 0.3s;
  }
  a.nav-link.orders:hover{
    padding-left: 15px;
    padding-right: 15px;
    border-radius: 6px;
    background-color: #55efc4; 
  }
  a.nav-link.logout{
    border-radius: 6px;
    background-color: #ff7979;
    color: white; 
  }
  a.nav-link.logout:hover{
    border-radius: 6px;
    background-color: #eb4d4b;
   
  }
  a.nav-link.login{
    border-radius: 6px;
    background-color: #2ecc71;
    transition: 0.3s;
    color: white;
  }
  a.nav-link.login:hover{
    padding-left: 15px;
    padding-right: 15px;
    border-radius: 6px;
    background-color: #55efc4;
    color: black;
  }
 
</style>

<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>