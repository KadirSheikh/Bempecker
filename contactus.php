<?php include 'common/connect.php'; ?>
<title>Contact us</title>
<body>
    <style>
    .form-control1 {
        display: block;
        width: 100%;
        padding: 1rem .5rem;
        font-size: 1rem;
        line-height: 1.25;
        color: #7D9773;
        background-color: #CDDEB5;
        background-image: none;
        background-clip: padding-box;
        border: 1px solid black;
        border-radius: .25rem;
        transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    }
    </style>
    
    <?php include 'common/header.php'; ?>
    <?php
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
    
require 'PHPMailer/Exception.php'; 
require 'PHPMailer/PHPMailer.php'; 
require 'PHPMailer/SMTP.php';


    if(isset($_POST['contact_us'])){


$mail = new PHPMailer; 
 
$mail->isSMTP();                      // Set mailer to use SMTP 
$mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
$mail->SMTPAuth = true;               // Enable SMTP authentication 
$mail->Username = 'regame2021@gmail.com';   // SMTP username 
$mail->Password = 'Regames#123@www';   // SMTP password 
$mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
$mail->Port = 587;                    // TCP port to connect to 




$mail->setFrom($_POST['email'], $_POST['name']); 
$mail->addReplyTo($_POST['email'], $_POST['name']);


$mail->addAddress('bampecker@gmail.com');

$mail->isHTML(true);

$mail->Subject = "";

$bodyContent = '<p>'. $_POST['contact']. '</p>';


$mail->Body = $bodyContent;


if($mail->send()){
   echo "<script>swal('Mail Send!' , 'Thank you for contacting us!' , 'success')</script>";
}

}



?>


    <div class="container" style="margin-top:200px;">


        <div class="col-sm-3">
            <h1 style="border-bottom:4px solid black;">CONTACT US</h1>
        </div>

        <div class="row mt-5"
            style="text-align:center;background-color:#CDDEB5;padding-top:100px;padding-bottom:100px;">
            <div class="col-12 col-sm-4 mt-5">
                <h5>500 Terry Franscois Street</h5>
                <h5 class="mb-4">San Francisco, CA 94158</h5>
                <div class="col-2"  style="border-bottom:3px solid black;margin-left:70px;"></div>

                <h5 class="mt-5">Tel:123-456-789</h5>
                <h5 class="mb-4">Email:Info@mysite.com</h5>
                <div class="col-2 mb-5" style="border-bottom:3px solid black;margin-left:70px;"></div>

            </div>
            <div class="col-12 col-sm-8">
                <form action="" method="post">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control1" placeholder="Name" name="name">
                        </div>
                        <div class="col">
                            <input type="email" class="form-control1" placeholder="Email" name="email">
                        </div>
                    </div>
                    <textarea name="contact" id="" cols="10" rows="3" class="form-control1 mt-3"></textarea>
                    <input type="submit" class="btn mt-5"
                        style="background-color:#7D9773;padding:15px 100px;" name="contact_us" value="Submit">
                </form>
            </div>
        </div>
        <div class="row">
            
                <iframe width="100%" height="600"
                    src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;coord=52.70967533219885, -8.020019531250002&amp;q=1%20Grafton%20Street%2C%20Dublin%2C%20Ireland&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed"
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            
        </div>

    </div>
    <?php include 'common/footer.php'; ?>


</body>