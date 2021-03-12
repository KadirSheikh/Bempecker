<?php include '../common/connect.php'; ?>

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
<body>

<?php

if (isset($_POST['login'])) {
   
  

  $username = $_POST['username'];
  $password = $_POST['password'];

  $login = mysqli_query($conn,"SELECT * FROM `admin_tbl` WHERE username = '$username' AND password = '$password'");
    if (mysqli_num_rows($login)>0) {
      
      $_SESSION['admin_id']=$username;
        echo "<script>alert('Welcome Admin!');window.location.href='index.php';</script>";
      }else{
        echo "<script>alert('Login Failed');</script>";  
    }
  }

?>

<div class="row">
        <!-- Sign IN FORM -->
        <div class="col-sm-4 col-md-4 col-lg-4 mx-auto" style="margin-top:200px;">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Admin Login</h5>
            <hr class="my-4">
            <form class="form-signin" method="POST">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="username">
              </div>
              <br>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-lock-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M2.5 9a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-7a2 2 0 0 1-2-2V9z"/>
                      <path fill-rule="evenodd" d="M4.5 4a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z"/>
                    </svg>
                  </span>
                </div>
                <input type="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" name="password">
              </div>
               <hr class="my-4">
            
              <button class="login-btn btn btn-lg btn-block text-uppercase" name="login" type="submit">Log in</button>
             
            </form>
          </div>
        </div>
      </div>
</div>
</body>
</html>