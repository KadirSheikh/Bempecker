<?php include 'common/connect.php'; ?>
<title>Home</title>
<body>
    <style>
    .glow {
        font-size: 50px;
        color: black;
        text-align: center;
        text-shadow: 2px 2px gray;
    }

    .label_galaxy {
        text-align: center;
        margin-left: -160px;

    }



    @media (max-width:767px) {
        .label_galaxy {
            text-align: center;
            margin-left: -1px;

        }

        .img_center {
            margin-left: 70px;
        }
    }

    .moretext {
        display: none;
    }
    </style>
    <div class="container" style="margin-top:200px;">
        <?php include 'common/header.php'; ?>
        <div class="row">
            <div class="row col-12 col-sm-6">

                <div class="col-12 col-sm-12 mt-5">
                    <h1 style="font-family: 'Montserrat';">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h1>
                </div>
                <?php 
                  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
                ?>
                <div class="col-12 col-sm-12 mt-3 mb-5">
                    <a href="our_product.php" class="show_now" style="text-decoration:none">SHOP NOW</a>
                </div>
                <hr>


                <?php
    
                 }
                ?>


            </div>
            <div class="col-12 col-sm-6 overlay">
                <div class="thin_border"></div>
                <img src="assets/products/38.png" alt="" class="img-fluid img-1 ml-5 mt-5">
            </div>
        </div>

        <div class="row mt-5">
            <div class="row col-12 col-sm-6">

                <div class="col-12 col-sm-12" style>
                    <h2>About Bampeaker.</h2>
                    <p style="color:#797979;">Bacon ipsum dolor amet sirloin jowl turducken pork loin pig pork belly,
                        chuck cupim tongue beef
                        doner tri-tip pancetta spare ribs porchetta.
                        Brisket ball tip cow sirloin. Chuck porchetta kielbasa pork chop doner sirloin, bacon beef
                        brisket ball tip short ribs.
                    </p>
                    <p class="moretext" style="color:#797979;">
                        Brisket ball tip cow sirloin. Chuck porchetta kielbasa pork chop doner sirloin, bacon beef
                        brisket ball tip short ribs.
                        Brisket ball tip cow sirloin. Chuck porchetta kielbasa pork chop doner sirloin, bacon beef
                        brisket ball tip short ribs.
                    </p>

                    <span class="show_now mt-3 moreless-button" style="cursor:pointer;">READ MORE</span>
                </div>



            </div>
            <div class="col-12 col-sm-6 ">
                <img src="assets/products/14.png" alt="" class="img-fluid img-2 img_center mt-5" style="margin-left:65px;">
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12 col-sm-6">
                <h1 class="glow" style="font-family: 'Montserrat';">ARTISTIC</h1>
                <h1 class="glow" style="font-family: 'Montserrat';">BAMBOO</h1>
                <div class="col-12 col-sm-12">
                    <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum eligendi fugiat
                        culpa eum itaque mollitia numquam optio ab esse dignissimos consectetur eveniet deleniti dolores
                        illo molestias, quae unde beatae? Et.</h6>
                </div>




                <img src="assets/products/1.png" alt="" class="img-fluid img-3 img_center">
                <div class="mt-4 label_galaxy">
                    <h6>GALAXY (STRIPES)</h6>
                    <?php 
                  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
                ?>
                    <div class="col-12 col-sm-12 mt-3 mb-3">
                        <a href="our_product.php" style="color:black;">Shop Now</a>
                    </div>



                    <?php
    
                 }
                ?>

                </div>



                <img src="assets/products/1.png" alt="" class="img-fluid img-4 mt-5 img_center">
                <div class="mt-4 label_galaxy">
                    <h6>GALAXY (STRIPES)</h6>
                    <?php 
                  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
                ?>
                    <div class="col-12 col-sm-12 mt-3 mb-3">
                        <a href="our_product.php" style="color:black;">Shop Now</a>
                    </div>



                    <?php
    
                 }
                ?>

                </div>

            </div>
            <div class="col-12 col-sm-6 mt-3">
            <!-- <div class=" overlay">
                <div class="thin_border" style="border: 5px solid black;width: 80%;height: 90%;opacity:0.5;"></div>
                <img src="assets/products/47.png" alt="" class="img-fluid img-5 ml-5 mt-5" style="border:none !important;">
            </div> -->
                <img src="assets/products/47.png" alt="" class="img-fluid img-5">
                <img src="assets/products/1.png" alt="" class="img-fluid img-6 mt-5 img_center">
                <div class="mt-4 label_galaxy">
                    <h6>GALAXY (STRIPES)</h6>
                    <?php 
                  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){
                ?>
                    <div class="col-12 col-sm-12 mt-3 mb-3">
                        <a href="our_product.php" style="color:black;">Shop Now</a>
                    </div>



                    <?php
    
                 }
                ?>

                </div>

            </div>
        </div>


    </div>



    <!-- Site footer -->

    <?php include 'common/footer.php'; ?>
    <script>
    $('.moreless-button').click(function() {
        $('.moretext').slideToggle();
        if ($('.moreless-button').text() == "Read more") {
            $(this).text("Read less")
        } else {
            $(this).text("Read more")
        }
    });
    </script>
</body>