<?php include 'common/connect.php'; ?>
<title>Login</title>
<body>
    <style>
    body {
        padding-top: 4.2rem;
        /* padding-bottom: 4.2rem; */

    }

    a {
        text-decoration: none !important;
    }

    h1,
    h2,
    h3 {
        font-family: 'Montserrat';
    }

    .myform {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        padding: 1rem;
        -ms-flex-direction: column;
        flex-direction: column;
        width: 100%;
        pointer-events: auto;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid rgba(0, 0, 0, .2);

        outline: 0;
        max-width: 500px;
    }

    .tx-tfm {
        text-transform: uppercase;
        background-color: #807171;
        color: white;
        cursor: pointer;
    }

    /* .mybtn {
        border-radius: 50px;
    } */

    .login-or {
        position: relative;
        color: #aaa;
        margin-top: 10px;
        margin-bottom: 10px;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .span-or {
        display: block;
        position: absolute;
        left: 50%;
        top: -2px;
        margin-left: -25px;
        background-color: #fff;
        width: 50px;
        text-align: center;
    }

    .hr-or {
        height: 1px;
        margin-top: 0px !important;
        margin-bottom: 0px !important;
    }

    .google {
        color: #666;
        width: 100%;
        height: 40px;
        text-align: center;
        outline: none;
        border: 1px solid lightgrey;
    }

    form .error {
        color: #ff0000;
    }

    .alert {
        margin: auto;
        width: 30%;
        margin-top:100px;

    }

    @media (max-width:767px) {
        .alert {
            width: 90%;
        }

    }

    /* #second {
        display: none;
    } */
    </style>
    <?php 
   
   session_regenerate_id( true );
   date_default_timezone_set('Asia/Kolkata');
   
   
   function generate_token() {

         $token = md5(uniqid(rand(), TRUE));
         $_SESSION["token"] = $token;
   
     return $token;
   }
   
   function verify_token($token){
       if ( $token != $_SESSION["token"]) {
           // Reset token
           unset($_SESSION["token"]);
           die("CSRF token validation failed");
         }
   }

   
   ?>
   <?php include 'common/header.php'; ?>
    <?php
 

 function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  $db_email = $db_psw = "";
    if(isset($_POST['login'])) {

        verify_token($_POST["csrf_token"]);

   $email =test_input($_POST['email']);
   $password = test_input($_POST['password']);

   
  
   $query = "SELECT * FROM `customer_tbl` WHERE email = '{$email}'";
   $data = mysqli_query($conn , $query);
   $num_rows = mysqli_num_rows($data);
   if ($num_rows == 1) {
     $_SESSION['loggedin'] = true;
 }
   

        while($row = mysqli_fetch_assoc($data)){
          
          $db_email = $row['email'];
          $db_psw = $row['password'];
          $_SESSION['user_id'] = $row['id'];
          $_SESSION['name'] = $row['name'];

          
        }
        
$verify = password_verify($password, $db_psw);
if($email === $db_email){
  if($verify){
    
    echo '<script>
    swal("Login Successful!", "Lets Shop" , "success").then(() => {
        window.location.href="index.php";
        });
    </script>'; 

   }else{
    echo '<script>
    swal("Incorrect Password!", "" , "error");
    </script>'; 

   }

 
}else{
    echo '<script>
    swal("Incorrect Email!", "" , "error");
    </script>'; 

   }



}
   ?>
    

    <div class="container" style="margin-top:150px;">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div id="first">
                    <div class="myform form" style="background-color:#F6F3F3;">
                        <div class="logo mb-3">
                            <div class="col-md-12 text-center">
                                <h1>Login</h1>
                            </div>
                        </div>
                        <form action="" method="post" name="login">
                        <input type="hidden" class="form-control" name="csrf_token"
                                value="<?php echo generate_token(); ?>">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" class="form-control" id="email"
                                    aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    aria-describedby="emailHelp" placeholder="Enter Password">
                            </div>
                            <!-- <div class="form-group">
                                <p class="text-center">By signing up you accept our <a href="#">Terms Of Use</a></p>
                            </div> -->
                            <div class="col-md-12 text-center ">
                                <input type="submit" class=" btn btn-block mybtn tx-tfm" value="Login" name="login">
                            </div>
                            <!-- <div class="col-md-12 ">
                                <div class="login-or">
                                    <hr class="hr-or">
                                    <span class="span-or">or</span>
                                </div>
                            </div> -->
                            <!-- <div class="col-md-12 mb-3">
                                <p class="text-center">
                                    <a href="javascript:void();" class="google btn mybtn"><i class="fa fa-google-plus">
                                        </i> Signup using Google
                                    </a>
                                </p>
                            </div> -->
                            <div class="form-group mt-3">
                                <p class="text-center">Don't have account? <a href="register.php" id="signup">Sign up here</a></p>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php include 'common/footer.php'; ?>
    <script>
    $("#signup").click(function() {
        $("#first").fadeOut("fast", function() {
            $("#second").fadeIn("fast");
        });
    });

    $("#signin").click(function() {
        $("#second").fadeOut("fast", function() {
            $("#first").fadeIn("fast");
        });
    });



    $(function() {
        $("form[name='login']").validate({
            rules: {

                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,

                }
            },
            messages: {
                email: "Please enter a valid email address",

                password: {
                    required: "Please enter password",

                }

            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
    </script>
</body>