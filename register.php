<?php include 'common/connect.php'; ?>
<title>Sign up</title>
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
        /* border-radius: 1.1rem; */
        outline: 0;
        max-width: 500px;
    }

    .tx-tfm {
        text-transform: uppercase;

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

    /* #second {
        display: none;
    }
    */
    .alert {
        margin: auto;
        width: 30%;
        margin-top: 100px;

    }

    @media (max-width:767px) {
        .alert {
            width: 90%;
        }

    }
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
                   
                   if(isset($_POST['register'])){
   
                       verify_token($_POST["csrf_token"]);

                       if(!empty($_POST['name'])  && !empty($_POST['mobile']) && !empty($_POST['email']) && !empty($_POST['password'])){
                           $csrf = $_POST["csrf_token"];
                           $name = test_input($_POST['name']);
                           $mobile = test_input($_POST['mobile']);
                           $email = test_input($_POST['email']);
                           $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                        $query = "INSERT INTO `customer_tbl`(`csrf`, `name`, `mobile_no`, `email`, `password`) VALUES ('$csrf','$name',$mobile,'$email','$password')";
                        $insert = mysqli_query($conn , $query);

                        if($insert){
                            echo '<script>
                            swal("Registration Successful!", "Please Login" , "success").then(() => {
                                window.location.href="login.php";
                              });
                            </script>'; 
                           
                        }else{
                            echo '
                                <script>
                                swal("Registration Failed!!", " " , "error");
                                </script>';
                        }
                           
                       }

                       



                   }



   ?>
    <div class="container" style="margin-top:150px;">

        <div class="row">
            <div class="col-md-5 mx-auto">
                <div id="second">
                    <div class="myform form " style="background-color:#F6F3F3;">
                        <div class="logo mb-3">
                            <div class="col-md-12 text-center">
                                <h1>Signup</h1>
                            </div>
                        </div>
                        <form action="" method="post" name="registration">


                            <input type="hidden" class="form-control" name="csrf_token"
                                value="<?php echo generate_token(); ?>">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" name="name" class="form-control" id="name"
                                    aria-describedby="emailHelp" placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mobile</label>
                                <input type="number" name="mobile" class="form-control" id="mobile"
                                    aria-describedby="emailHelp" placeholder="Enter Mobile Number">
                            </div>
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
                            <div class="col-md-12 text-center mb-3">
                                <input type="submit" class=" btn btn-block mybtn  tx-tfm"
                                    style="background-color:#807171;cursor:pointer;" name="register"
                                    value="Get Started">
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <p class="text-center"><a href="login.php" id="signin">Already have an account?</a>
                                    </p>
                                </div>
                            </div>
                    </div>
                    </form>
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

        $("form[name='registration']").validate({
            rules: {
                name: "required",
                mobile: {
                    required: true,
                    minlength: 10,
                    maxlength: 10
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 8
                }
            },

            messages: {
                name: "Please enter your name",
                mobile: {
                    required: "Please enter your mobile number",
                    minlength: "Please enter a valid mobile number"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 8 characters long"
                },
                email: "Please enter a valid email address"
            },

            submitHandler: function(form) {
                form.submit();
            }
        });
    });
    </script>
</body>