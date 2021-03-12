<?php include 'common/connect.php';?>
<title>Product detail</title>

<body>
    <style>
    .modal.right .modal-dialog {
        position: fixed;
        margin: auto;
        width: 100%;
        height: 100%;
        -webkit-transform: translate3d(0%, 0, 0);
        -ms-transform: translate3d(0%, 0, 0);
        -o-transform: translate3d(0%, 0, 0);
        transform: translate3d(0%, 0, 0);
    }

    /* @media (max-width:767px) {
        .modal.right .modal-dialog {
        position: fixed;
        margin: auto;
        width: 100%;
        height: 100%;
        -webkit-transform: translate3d(0%, 0, 0);
        -ms-transform: translate3d(0%, 0, 0);
        -o-transform: translate3d(0%, 0, 0);
        transform: translate3d(0%, 0, 0);
    }

    } */


    .modal.right .modal-content {
        height: 100%;
        overflow-y: auto;
    }



    /*Right*/
    .modal.right.fade .modal-dialog {
        right: -0px;
        -webkit-transition: opacity 0.3s linear, right 0.3s ease-out;
        -moz-transition: opacity 0.3s linear, right 0.3s ease-out;
        -o-transition: opacity 0.3s linear, right 0.3s ease-out;
        transition: opacity 0.3s linear, right 0.3s ease-out;
    }

    .modal.right.fade.in .modal-dialog {
        right: 0;
    }

    /* ----- MODAL STYLE ----- */
    .modal-content {
        border-radius: 0;
        border: none;
    }

    .modal-header {

        background-color: #CDDBB8;
    }

    .modal-header h1 {
        margin-right: 180px;
    }

    .img-cart-detail {
        border: 30px solid #96A796;
        width: 70%;
        height: auto;
    }

    @media (max-width:767px) {
        .img-cart-detail {
            border: 30px solid #96A796;
            width: 90%;
            height: auto;
        }

        .modal-header h1 {
            margin-right: 150px;
        }

    }

    .qty {
        margin-top: 50px;
    }

    .qty .count1  {
        color: #000;
        display: inline-block;
        vertical-align: top;
        font-size: 15px;
        font-weight: 700;
        min-width: 30px;
        min-height: 30px;
        text-align: center;
        border: 1px solid black;
        border-radius: 50%;


    }

    .qty .count2  {
        color: #000;
        display: inline-block;
        vertical-align: top;
        font-size: 15px;
        font-weight: 700;
        min-width: 30px;
        min-height: 30px;
        text-align: center;
        border: 1px solid black;
        border-radius: 50%;


    }

    .qty .plus {
        cursor: pointer;
        display: inline-block;
        vertical-align: top;
        color: black;
        width: 30px;
        height: 30px;
        font: 30px/1 Arial, sans-serif;
        text-align: center;
        border-radius: 50%;
        border: 1px solid black;
    }

    .qty .minus {
        cursor: pointer;
        display: inline-block;
        vertical-align: top;
        color: black;
        width: 30px;
        height: 30px;
        font: 30px/1 Arial, sans-serif;
        text-align: center;
        border-radius: 50%;
        background-clip: padding-box;
        border: 1px solid black;
    }

    /* div {
    text-align: center;
} */
    .minus:hover {
        background-color: #7C9572 !important;
    }

    .plus:hover {
        background-color: #7C9572 !important;
    }

    span {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }

    input {
        border: 0;
        width: 1%;
    }

    .go-to-cart-btn {
        border: 1px solid black;
        text-decoration: none;
        color: black !important;
        padding: 10px 30px;
        background-color: #CDDBB8;

    }
    </style>

    <?php include 'common/header.php'; ?>

    <div class="container" style="margin-top:200px;">
        <div class="row">
            <?php
            
            if(isset($_GET['id'])){
            $id = base64_decode($_GET['id']);
            $query = "SELECT * FROM `products_tbl` WHERE id=$id";
            $data = mysqli_query($conn , $query);
            while($row = mysqli_fetch_assoc($data)){
                
                $name = $row['name'];
                $image = $row['image'];
                $modal_no = $row['modal_no'];
                $length = $row['length'];
                $diameter = $row['diameter'];
                $price = $row['price'];
            }
            }

          

   

    ?>
            <div class="col-12 col-sm-6">
                <!-- <div class="thin_border"></div> -->
                <img src="assets/products/<?php echo $image; ?>" alt="" class="img-fluid img-detail ml-4 mt-5">
            </div>
            <div class="col-12 col-sm-6">





                <h3 style="font-family: 'Montserrat';" class="mt-5"><?php echo $name; ?></h3>
                <h5 class="mt-5">Modal No. : <?php echo $modal_no; ?></h5>
                <h5>Length : <?php echo $length; ?></h5>
                <h5>Diameter : <?php echo $diameter; ?></h5>
                <h3 style="font-family: 'Montserrat';" class="mt-3">Rs.<?php echo $price; ?></h3>





                <h5 class="mt-3">What you get</h5>
                <p style="color:#849C84;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus fugit neque
                    corrupti alias magni
                    ducimus perspiciatis, repellendus repellat quam ratione eos? Perspiciatis deleniti earum placeat
                    optio doloribus explicabo sequi tempore.</p>

                <h5>Why Care</h5>
                <p style="color:#849C84;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus fugit neque
                    corrupti alias magni
                    ducimus perspiciatis, repellendus repellat quam ratione eos? Perspiciatis deleniti earum placeat
                    optio doloribus explicabo sequi tempore.</p>


                <?php if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']){ ?>
                <a href="#" class="cart_btn" style="text-decoration:none;" data-toggle="modal"
                    data-target="#myModal1">Add to Cart</a><br>


                <a href="checkout.php?id=<?php echo base64_encode($id) ?>" class="buy_btn" style="text-decoration:none;">Buy it Now</a>
                <?php } ?>

                <!-- add to cart modal -->
                <div class="modal right fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h5>Add to cart</h5>
                            </div>

                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-sm-6 col-6">
                                        <img src="assets/products/<?php echo $image; ?>" alt=""
                                            class="img-fluid img-cart-detail mt-4">
                                    </div>

                                    <div class="col-sm-6 col-6">
                                        <h6 style="font-family: 'Montserrat';" class="mt-5"><?php echo $name; ?></h6>
                                        <h6 style="font-family: 'Montserrat';" class="mt-3"> <b>Rs.</b> <b
                                                class="p_price_d"><?php echo $price; ?></b> </h6>
                                        <div class="qty">
                                            <span class="minus">-</span>
                                            <input type="number" class="count1" name="qty" value="1">
                                            <span class="plus">+</span>
                                        </div>
                                    </div>

                                </div>



                                <div class="row" style="margin-top:40vh;text-align:center;">
                                    <div class="col-sm-6 col-6">
                                        <h4>Total</h4>
                                    </div>
                                    <div class="col-sm-6 col-6">
                                        <h4><b>Rs.</b> <b class="total_price_detail"><?php echo $price; ?></b></h4>
                                    </div>
                                </div>

                                <div style="margin-top:20px;text-align:center;">
                                    <span class="go-to-cart-btn" style="cursor:pointer;">Add To Cart &rarr;</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- buy now modal -->

                <!-- <div class="modal right fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                <h1>Buy Now</h1>
                            </div>

                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-sm-6 col-6">
                                        <img src="assets/products/<?php echo $image; ?>" alt=""
                                            class="img-fluid img-cart-detail mt-4">
                                    </div>

                                    <div class="col-sm-6 col-6">
                                        <h5 style="font-family: 'Montserrat';" class="mt-5"><?php echo $name; ?></h5>
                                        <h5 style="font-family: 'Montserrat';" class="mt-3"> <b>Rs.</b> <b
                                                class="p_price_d1"><?php echo $price; ?></b> </h5>
                                        <div class="qty">
                                            <span class="minus">-</span>
                                            <input type="number" class="count2" name="qty" value="1">
                                            <span class="plus">+</span>
                                        </div>
                                    </div>

                                </div>



                                <div class="row" style="margin-top:45vh;text-align:center;">
                                    <div class="col-sm-6 col-6">
                                        <h4>Total</h4>
                                    </div>
                                    <div class="col-sm-6 col-6">
                                        <h4><b>Rs.</b> <b class="total_price_detail1"><?php echo $price; ?></b></h4>
                                    </div>
                                </div>

                                <div style="margin-top:20px;text-align:center;">
                                    <a href="single_checkout.php?id=<?php echo base64_encode($id) ?>">Buy Now</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> -->



                                       



            </div>
        </div>
    </div>
    <?php include 'common/footer.php'; ?>
    <script>
    $(document).ready(function() {
        //for add to cart
        $('.count1').prop('disabled', true);
        $(document).on('click', '.plus', function() {
            $(this).siblings('.count1').val(parseInt($(this).siblings('.count1').val()) + 1);
 
              console.log(parseInt($(this).siblings('.count1').val()));

            $('.total_price_detail').text(parseInt($(this).siblings('.count1').val()) * parseInt($('.p_price_d').text()));



        });

        $(document).on('click', '.minus', function() {
            $(this).siblings('.count1').val(parseInt($(this).siblings('.count1').val()) - 1);
            if ($(this).siblings('.count1').val() == 0) {
                $(this).siblings('.count1').val(1);

            }

            if ($('.total_price_detail').text() !== $('.p_price_d').text()) {
                $('.total_price_detail').html($('.total_price_detail').text() - $('.p_price_d').text());
            }


        });



// for buy now
// $('.count2').prop('disabled', true);
//         $(document).on('click', '.plus', function() {
//             $(this).siblings('.count2').val(parseInt($(this).siblings('.count2').val()) + 1);
 
//               console.log($('.total_price_detail1').text());

//             $('.total_price_detail1').text(parseInt($(this).siblings('.count2').val()) * parseInt($('.p_price_d1').text()));



//         });
//         $(document).on('click', '.minus', function() {
//             $(this).siblings('.count2').val(parseInt($(this).siblings('.count2').val()) - 1);
//             if ($(this).siblings('.count2').val() == 0) {
//                 $(this).siblings('.count2').val(1);

//             }

//             if ($('.total_price_detail1').text() !== $('.p_price_d1').text()) {
//                 $('.total_price_detail1').html($('.total_price_detail1').text() - $('.p_price_d1').text());
//             }


//         });

        $('.go-to-cart-btn').on('click', function() {

            var product_id = <?php echo $id ?>;
            var qty = $('.count1').val();
            var total_price = $('.total_price_detail').text();


            $.ajax({
                url: 'apis/add_single_to_cart.php',
                method: 'POST',
                data: {
                    p_id: product_id,
                    quantity: qty,
                    total_price: total_price


                },
                success: function(response) {
                    console.log(response);
                    var response = JSON.parse(response);
                    if (response.status) {
                        swal("Item Added!", " ", "success").then(() => {
                            window.location.href = "my_cart.php";
                        });;

                    } else {
                        swal("Failed to add!", " ", "error");
                    }
                }

            });


        });

    });
    </script>
</body>