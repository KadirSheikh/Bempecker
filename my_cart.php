<?php include 'common/connect.php'; ?>
<title>My Cart</title>
<?php include 'common/auth.php'; ?>

<body>
    <?php include 'common/header.php'; ?>
    <style>
    .qty .count {
        color: #000;
        display: inline-block;
        vertical-align: top;
        /* font-size: 25px;
        font-weight: 700; */
        line-height: 30px;
        padding: 0 2px;
        min-width: 35px;
        text-align: center;
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
        width: 2%;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input:disabled {
        background-color: white;
    }

    .fixed-right {
        position: fixed;
        top: 0;
        right: 0;
        z-index: 1030;
        margin-top: 150px;
    }

    .img_cart {
        outline: solid 20px #98AC99;
        border: 2px solid black;
        width: 40%;
        height: auto;
        margin-bottom: 50px;
    }

    .des {
        display: block;
        margin-left: -15px;
    }

    .mb {
        display: none;
    }

    .mb_cart {
        display: none;
    }

    @media (max-width:767px) {
        .img_cart {
            outline: solid 20px #98AC99;
            border: 2px solid black;
            width: 55%;
            height: auto;
            margin-left: 20px;
            margin-bottom: 50px;
        }

        .des {
            display: none;
        }

        .mb {
            display: block;
        }

        .fixed-right {
            display: none;
        }

        .mb_cart {
            display: block;
        }

        .delete_cart_item {
            margin-top: 100px !important;
        }

    }
    </style>


    <div class="container" style="margin-top:200px;">
  


        <div class="col-12 col-sm-2 fixed-right" style="background-color:#CEDFB6;text-align: center;">
            <br><br>
            <h6 class="text-center">Order Summery</h6>
            <div class="row mt-5">
                <div class="col-6">
                    Subtotal
                </div>

                <?php 
               $user_id = $_SESSION['user_id'];
               $sum_query = "SELECT SUM(total_price) AS `total` FROM `cart_tbl` WHERE `user_id`=$user_id";
               $result_sum = mysqli_query($conn , $sum_query);
                while($row = mysqli_fetch_assoc($result_sum)){
                    ?>
                <div class="col-6 subtotal_des">
                    Rs.<?php echo $row['total'] ?>
                </div>
                <?php
                    
                }

               ?>
            </div>
            <div class="row">
                <div class="col-6">
                    Shipping
                </div>
                <div class="col-6">
                    Free
                </div>
            </div>

            <hr>

            <div class="row mt-4">
                <div class="col-6">
                    Total
                </div>

                <?php 
               $user_id = $_SESSION['user_id'];
               $sum_query = "SELECT SUM(total_price) AS `total` FROM `cart_tbl` WHERE `user_id`=$user_id";
               $result_sum = mysqli_query($conn , $sum_query);
                while($row = mysqli_fetch_assoc($result_sum)){
                    ?>
                <div class="col-6 subtotal_des_dash">
                    Rs.<?php echo $row['total'] ?>
                </div>
                <?php
                    
                }

               ?>


            </div>
            <br>
            <br>


            <a href="checkout.php"
                style="border:1px solid black; padding:10px 50px;background-color:#7E9774;color:black;">Checkout</a>

            <br>
            <br>
            <br><br>
        </div>

        <div class="col-sm-3 col-8">
            <h1 style="border-bottom:4px solid black;">MY CART</h1>
        </div>
        <a class="btn btn-1 btn-outline-success mt-5" href="our_product.php">&#x2190; Continue Shopping</a>


        <div class="mt-5 is_cart_empty"></div>

        <div class="row mt-5">
            <?php

        if(isset($_GET['id'])){

            $id = base64_decode($_GET['id']);
            $query = "SELECT * FROM `products_tbl` WHERE id=$id";
            $data = mysqli_query($conn , $query);
            $name = $image = $modal_no = $length = $diameter = $price = "";
            while($row = mysqli_fetch_assoc($data)){
                $name = $row['name'];
                $image = $row['image'];
                $modal_no = $row['modal_no'];
                $length = $row['length'];
                $diameter = $row['diameter'];
                $price = $row['price'];
                $type = $row['type'];
            }

            $u_id = $_SESSION['user_id'];

            $check = mysqli_query($conn,"SELECT `p_id`,`user_id`,`quatity` FROM `cart_tbl` WHERE `p_id`= '$id' AND `user_id`='$u_id'");

            if(mysqli_num_rows($check)>0){
                
              $res = mysqli_fetch_assoc($check);
              $product_quantity=$res['quatity']+1;
              
              $update = mysqli_query($conn,"UPDATE `cart_tbl` SET `quatity`='$product_quantity' WHERE `p_id`= '$id' AND `user_id`='$u_id'");
              if ($update) {
                echo '
                <script>
                swal("Item Added!", " " , "success").then(() => {
                    window.location.href="my_cart.php";
                  });
                </script>
                ';
              }
            } else{

     
                $insert_cart_q = "INSERT INTO `cart_tbl`(`user_id`, `p_id`, `p_name`, `p_img`, `p_mn`, `p_length`, `p_diameter`, `p_price`, `p_type` , `quatity` , `total_price`) VALUES ($u_id,$id,'$name','$image','$modal_no','$length','$diameter',$price,'$type' , '1',$price)";
                $data_cart = mysqli_query($conn , $insert_cart_q);
    
                if($data_cart){
                    echo '
                    <script>
                    swal("Item Added!", " " , "success").then(() => {
                        window.location.href="my_cart.php";
                      });
                    </script>
                    ';
    
                }
                }

       
            }

    ?>

          
            <?php 
         $u_id = $_SESSION['user_id'];
         $get_cart = "SELECT * FROM `cart_tbl` WHERE `user_id`=$u_id ORDER BY `id` DESC";
         $cart_data = mysqli_query($conn , $get_cart);
         
         while($row = mysqli_fetch_assoc($cart_data)){
          ?>
            <div class="col-6 col-sm-3">
                <h6>PRODUCT</h6>
                <img src="assets/products/<?php echo $row['p_img'] ?>" alt="" class="img-fluid img_cart mt-5">

                <div class="des">
                    <h5><?php echo $row['p_name'] ?></h5>
                    <p>Modal No. : <?php echo $row['p_mn'] ?></p>
                    <p>Length : <?php echo $row['p_length'] ?></p>
                    <p>Diameter : <?php echo $row['p_diameter'] ?></p>
                </div>
            </div>
            <div class="col-6 col-sm-3 mb">
                <h5><?php echo $row['p_name'] ?></h5>
                <p>Modal No. : <?php echo $row['p_mn'] ?></p>
                <p>Length : <?php echo $row['p_length'] ?></p>
                <p>Diameter : <?php echo $row['p_diameter'] ?></p>
            </div>

            <div class="col-4 col-sm-3 mb-5">
                <h6>PRICE</h6>

                <p><b>Rs.<?php echo $row['p_price'] ?></b></p>
            </div>
            <div class="col-4 col-sm-3 mb-5">
                <h6>QTY</h6>

                <div class="qty" style="margin-left:-30px;">
                    <span class="minus" style="border:1px solid black;">-</span>
                    <input data-pid="<?php echo $row['p_id'] ?>" data-price="<?php echo $row['p_price'] ?>"
                        data-cid="<?php echo $row['id'] ?>" type="number" class="count" name="qty"
                        value="<?php echo $row['quatity'] ?>" style="border:1px solid black;border-radius:50%;">
                    <span class="plus" style="border:1px solid black;">+</span>
                </div>
            </div>
            <div class="col-4 col-sm-2 mb-5 total_div">

                <div class="row">
                    <div class="col-6 col-sm-6">
                        <h6>TOTAL</h6>
                        <p id="total_price_<?php echo $row['id'] ?>"><b>Rs.<?php echo $row['total_price'] ?></b></p>
                    </div>
                    <div class="col-6 col-sm-6 mt-3">
                        <button class="btn btn-danger delete_cart_item" title="delete item"
                            data-cd="<?php echo $row['id'] ?>" style="cursor:pointer;"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>

          



            <div class="col-12 col-sm-12 mb-5" style="border:1px solid black;"></div>

            <?php
         }
    ?>


        </div>

        <!-- mobile view checkout -->
        <div class="col-12 col-sm-2 mb_cart" style="background-color:#CEDFB6;text-align: center;">
            <br><br>
            <h6 class="text-center">Order Summery</h6>
            <div class="row mt-5">
                <div class="col-6">
                    Subtotal
                </div>
                <?php 
               $user_id = $_SESSION['user_id'];
               $sum_query = "SELECT SUM(total_price) AS `total` FROM `cart_tbl` WHERE `user_id`=$user_id";
               $result_sum = mysqli_query($conn , $sum_query);
                while($row = mysqli_fetch_assoc($result_sum)){
                    ?>
                <div class="col-6 subtotal_mb">
                    Rs.<?php echo $row['total'] ?>
                </div>
                <?php
                    
                }

               ?>

            </div>
            <div class="row">
                <div class="col-6">
                    Shipping
                </div>
                <div class="col-6">
                    Free
                </div>
            </div>

            <hr>

            <div class="row mt-4">
                <div class="col-6">
                    Total
                </div>
                <?php 
               $user_id = $_SESSION['user_id'];
               $sum_query = "SELECT SUM(total_price) AS `total` FROM `cart_tbl` WHERE `user_id`=$user_id";
               $result_sum = mysqli_query($conn , $sum_query);
                while($row = mysqli_fetch_assoc($result_sum)){
                    ?>
                <div class="col-6 subtotal_mb_dash">
                    Rs.<?php echo $row['total'] ?>
                </div>
                <?php
                    
                }

               ?>
            </div>
            <br>
            <br>


            <a href="checkout.php"
                style="border:1px solid black; padding:10px 50px;background-color:#7E9774;color:black;">Checkout</a>

            <br>
            <br>
            <br><br>
        </div>


    </div>




    <?php include 'common/footer.php'; ?>
    <?php

$check_query = "SELECT * FROM cart_tbl";
$result = mysqli_query($conn , $check_query);
$count = mysqli_num_rows($result);

if($count == 0){
  echo "<script>
  $('.mb_cart').hide();
  $('.fixed-right').hide();
  $('.is_cart_empty').html('<h3>No item in cart</h3>');
  
  </script>";  
}



?>
    <script>
    $(document).ready(function() {

        $('.count').prop('disabled', true);
        $(document).on('click', '.plus', function() {
            $(this).siblings('.count').val(parseInt($(this).siblings('.count').val()) + 1);
            var quantity = $(this).siblings('.count').val();
            var pro_id = $(this).siblings('.count').attr('data-pid');
            var pro_price = $(this).siblings('.count').attr('data-price');
            var cart_id = $(this).siblings('.count').attr('data-cid');
            var user_id = <?php echo $_SESSION['user_id'];?>

            $.ajax({
                url: 'apis/update_qty_plus.php',
                method: 'POST',
                data: {
                    quantity: quantity,
                    product_id: pro_id,
                    price: pro_price,
                    user_id: user_id

                },
                success: function(response) {
                    var response = JSON.parse(response);
                    console.log(response);

                    if (response.status) {

                        $('#total_price_' + cart_id).html("<b>Rs." + response.total +
                            "</b>");
                        $('.subtotal_des').html("<p>Rs." + response.subtotal + "</p>");
                        $('.subtotal_mb').html("<p>Rs." + response.subtotal + "</p>");
                        $('.subtotal_des_dash').html("<p>Rs." + response.subtotal + "</p>");
                        $('.subtotal_mb_dash').html("<p>Rs." + response.subtotal + "</p>");
                    }
                }

            });


        });

        $(document).on('click', '.minus', function() {
            $(this).siblings('.count').val(parseInt($(this).siblings('.count').val()) - 1);
            if ($(this).siblings('.count').val() == 0) {
                $(this).siblings('.count').val(1);
            }

            var quantity = $(this).siblings('.count').val();
            var pro_id = $(this).siblings('.count').attr('data-pid');
            var pro_price = $(this).siblings('.count').attr('data-price');
            var cart_id = $(this).siblings('.count').attr('data-cid');
            var user_id = <?php echo $_SESSION['user_id'];?>

            $.ajax({
                url: 'apis/update_qty_minus.php',
                method: 'POST',
                data: {
                    quantity: quantity,
                    product_id: pro_id,
                    price: pro_price,
                    user_id: user_id

                },
                success: function(response) {
                    console.log(response)
                    var response = JSON.parse(response);
                    console.log(response);

                    if (response.status) {

                        $('#total_price_' + cart_id).html("<b>Rs." + response.total +
                            "</b>");
                        $('.subtotal_des').html("<p>Rs." + response.subtotal + "</p>");
                        $('.subtotal_mb').html("<p>Rs." + response.subtotal + "</p>");
                        $('.subtotal_des_dash').html("<p>Rs." + response.subtotal + "</p>");
                        $('.subtotal_mb_dash').html("<p>Rs." + response.subtotal + "</p>");
                    }
                }

            });

        });


        $('.delete_cart_item').on('click', function() {
            var cart_id = $(this).attr('data-cd');

            $.ajax({
                url: 'apis/delete_cart_item.php',
                method: 'POST',
                data: {
                    cart_id: cart_id

                },
                success: function(response) {
                    var response = JSON.parse(response);
                    console.log(response);

                    if (response.status) {
                        swal(response.message, "", "success").then(() => {
                            window.location.href = "my_cart.php";
                        });

                    } else {
                        swal(response.message, "", "error");
                    }
                }

            });
        });


    });
    </script>

</body>