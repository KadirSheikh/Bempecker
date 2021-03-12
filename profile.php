<?php include 'common/connect.php'; ?>
<title>My profile</title>
<?php include 'common/auth.php'; ?>

<body>
    <style>
    .user-card-full {
        overflow: hidden
    }

    .card {
        border-radius: 5px;
        -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
        box-shadow: 0 1px 20px 0 rgba(69, 90, 100, 0.08);
        border: none;
        margin-bottom: 30px
    }

    .m-r-0 {
        margin-right: 0px
    }

    .m-l-0 {
        margin-left: 0px
    }

    .user-card-full .user-profile {
        border-radius: 5px 0 0 5px
    }

    .bg-c-lite-green {
        background-color: #13AC47;
    }

    .user-profile {
        padding: 20px 0
    }

    /* .card-block {
    padding: 1.25rem
} */

    .m-b-25 {
        margin-bottom: 25px
    }

    .img-radius {
        border-radius: 5px
    }

    h6 {
        font-size: 14px
    }

    .card .card-block p {
        line-height: 25px
    }

    @media only screen and (min-width: 1400px) {
        p {
            font-size: 14px
        }
    }

    .card-block {
        padding: 1.25rem
    }

    .b-b-default {
        border-bottom: 1px solid #e0e0e0
    }

    .m-b-20 {
        margin-bottom: 20px
    }

    .p-b-5 {
        padding-bottom: 5px !important
    }

    .card .card-block p {
        line-height: 25px
    }

    .m-b-10 {
        margin-bottom: 10px
    }

    .text-muted {
        color: #919aa3 !important
    }

    .b-b-default {
        border-bottom: 1px solid #e0e0e0
    }

    .f-w-600 {
        font-weight: 600
    }

    .m-b-20 {
        margin-bottom: 20px
    }

    .m-t-40 {
        margin-top: 20px
    }

    .p-b-5 {
        padding-bottom: 5px !important
    }

    .m-b-10 {
        margin-bottom: 10px
    }

    .m-t-40 {
        margin-top: 20px
    }

    .user-card-full .social-link li {
        display: inline-block
    }

    .user-card-full .social-link li a {
        font-size: 20px;
        margin: 0 10px 0 0;
        -webkit-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out
    }
    </style>
    <div class="container" style="margin-top:200px;">
        <?php include 'common/header.php'; ?>
        <?php 
       $user_id = $_SESSION['user_id'];
       $query = "SELECT * FROM customer_tbl WHERE id=$user_id";
       $result = mysqli_query($conn , $query);

       while($row = mysqli_fetch_assoc($result)){
           $name = $row['name'];
           $mobile = $row['mobile_no'];
           $email = $row['email'];
           $profile_pic = $row['profile_photo'];
       }
       
       ?>

        <?php 
        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
          
$user_id = $_SESSION['user_id'];
if(isset($_POST['update_profile'])){
     $u_name = test_input($_POST['name']);
     $u_email = test_input($_POST['email']);
     $u_mobile = test_input($_POST['mobile']);

     $update_res = mysqli_query($conn , "UPDATE customer_tbl SET `name`='$u_name' , `email`='$email' , `mobile_no`='$mobile' WHERE id=$user_id");
     if($update_res){
        echo '
        <script>
        swal("Profile Updated!", " " , "success").then(() => {
            window.location.href="profile.php";
          });
        </script>
        ';
     }else{
        echo '
        <script>
        swal("Profile update failed!", " " , "error");
          });
        </script>
        ';
     }
}

?>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="border-radius:0px !important;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Your Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <form action="" method="post">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Full Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" placeholder="Full Name"
                                        value="<?php echo $name ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" placeholder="Email"
                                        value="<?php echo $email ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Mobile No.</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="mobile" placeholder="Mobile No."
                                        value="<?php echo $mobile ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="submit" class="btn btn-primary float-right" name="update_profile"
                                        value="Update">
                                </div>
                            </div>
                        </form>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>


        <?php

                   $user_id = $_SESSION['user_id'];
 
                    if (isset($_POST['upload'])) {

                    $profileimg = $_FILES["profileimg"]["name"];
                    $profileimg_tmp = $_FILES["profileimg"]["tmp_name"];

                    $fileinfo = @getimagesize($profileimg_tmp);
                    $width = $fileinfo[0];
                    $height = $fileinfo[1];
                    
                    $allowed_image_extension = array(
                        "png",
                        "jpg",
                        "jpeg"
                    );
                    
                    
                    $file_extension = pathinfo($profileimg, PATHINFO_EXTENSION);
                    
                    
                    if (!file_exists( $profileimg_tmp)) {
                        $response = array(
                        "message" => "Choose image file to upload."
                        );
                    }    
                    else if (!in_array($file_extension, $allowed_image_extension)) {
                        $response = array(
                        "message" => "Upload valid images. Only PNG and JPG are allowed."
                        );
                        
                    }    
                    else if (($_FILES["profileimg"]["size"] > 2000000)) {
                        $response = array(
                        "message" => "Image size exceeds 2MB"
                        );
                    }    
                    else if ($width > "300" || $height > "200") {
                        $response = array(
                        "message" => "Image dimension should be within 300X200"
                        );
                    } 
                    else {
                    $target_dir = "assets/profile_pics/";
                    $target_file = $target_dir . basename($profileimg); 

                    move_uploaded_file($profileimg_tmp, $target_file);
                    }

                    
                    
                    if(!empty($response)) {  
                    $msg = $response["message"];
                    
                    echo "<script type='text/javascript'>
                    swal('$msg' , 'Go back and try again.','error');
                    </script>";
                    
                    }else {
                    $query_upload = "UPDATE `customer_tbl` SET `profile_photo`='{$profileimg}' WHERE `id` = $user_id";
                        
                    $upload_img = mysqli_query($conn , $query_upload);
                    
                        
                    echo ".";
                    
                        if ($upload_img) { 
                    
                    echo '<script type="text/javascript">
                    swal("Profile Uploaded Successfully.", "", "success").then(() => {
                    window.location.href="profile.php";
                    });
                    
                    </script>';
                    
                    } else { 
                    echo '<script type="text/javascript">
                    swal("Something went wrong.", "Go back and try again.", "error");
                    </script>';
                        }
                    } 

                    }

?>

        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content" style="border-radius:0px !important;">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="file" class="form-control" name="profileimg">
                            </div>
                            <input type="submit" class="btn btn-primary float-right" value="Upload" name="upload">
                        </form>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>




        <div class="page-content page-container" id="page-content" style="margin-right:-40px;">
            <div class="padding">
                <div class="row container d-flex justify-content-center">
                    <div class="col-xl-6 col-md-12">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                    <div class="card-block text-center text-white">
                                        <div class="m-b-25">

                                            <img src="assets/profile_pics/<?php echo $profile_pic ?>"
                                                class="img-radius img-fluid" alt="User-Profile-Image"
                                                style="width:100px;height:100px;border-radius:50%;">
                                            <a href="#" data-toggle="modal" data-target="#exampleModal1"
                                                title="Change Profile">
                                                <i class="fa fa-camera" aria-hidden="true"
                                                    style="font-size:15px; color:white;"></i>
                                            </a>
                                        </div>

                                        <h6 class="f-w-600"><?php echo $name; ?></h6>

                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Your Info</h6>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p class="m-b-10 f-w-600">Full Name</p>
                                                <h6 class="text-muted f-w-400"><?php echo $name; ?></h6>
                                            </div>
                                            <div class="col-sm-12">
                                                <p class="m-b-10 f-w-600">Email</p>
                                                <h6 class="text-muted f-w-400"><?php echo $email; ?></h6>
                                            </div>
                                            <div class="col-sm-12">
                                                <p class="m-b-10 f-w-600">Phone</p>
                                                <h6 class="text-muted f-w-400"><?php echo $mobile; ?></h6>
                                            </div>
                                            <div class="col-sm-6 mt-5">
                                                <button data-toggle="modal" data-target="#exampleModal"
                                                    class="btn btn-block btn-success"
                                                    style="background-color: #13AC47;cursor:pointer;">Edit</button>
                                            </div>
                                        </div>
                                        <!-- <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Projects</h6> -->
                                        <!-- <div class="row">
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Recent</p>
                                        <h6 class="text-muted f-w-400">Sam Disuja</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="m-b-10 f-w-600">Most Viewed</p>
                                        <h6 class="text-muted f-w-400">Dinoter husainm</h6>
                                    </div>
                                </div> -->
                                        <!-- <ul class="social-link list-unstyled m-t-40 m-b-10">
                                            <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                                                    data-original-title="facebook" data-abc="true"><i
                                                        class="mdi mdi-facebook feather icon-facebook facebook"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                                                    data-original-title="twitter" data-abc="true"><i
                                                        class="mdi mdi-twitter feather icon-twitter twitter"
                                                        aria-hidden="true"></i></a></li>
                                            <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                                                    data-original-title="instagram" data-abc="true"><i
                                                        class="mdi mdi-instagram feather icon-instagram instagram"
                                                        aria-hidden="true"></i></a></li>
                                        </ul> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <!-- Site footer -->

    <?php include 'common/footer.php'; ?>

</body>