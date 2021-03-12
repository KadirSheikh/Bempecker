<?php include 'common/connect.php'; ?>
<title>Shop</title>
<body>
    <style>
    .atc {
        border: 1px solid black;
        padding: 10px 20px;
        color: black;
        background-color: #9BB29B;
        cursor: pointer;
       
    }

   
    .qv {
        border: 1px solid black;
        padding: 10px 20px;
        color: black;
        cursor: pointer;
    }

    .behclick-panel .list-group {
        margin-bottom: 0px;
    }

    .behclick-panel .list-group-item:first-child {
        border-top-left-radius: 0px;
        border-top-right-radius: 0px;
    }

    .behclick-panel .list-group-item {
        border-right: 0px;
        border-left: 0px;
    }

    .behclick-panel .list-group-item:last-child {
        border-bottom-right-radius: 0px;
        border-bottom-left-radius: 0px;
    }

    .behclick-panel .list-group-item {
        padding: 5px;
    }

    .behclick-panel .panel-heading {
        /* 				padding: 10px 15px;
                            border-bottom: 1px solid transparent; */
        border-top-right-radius: 0px;
        border-top-left-radius: 0px;
        border-bottom: 1px solid darkslategrey;
    }

    .behclick-panel .panel-heading:last-child {
        /* border-bottom: 0px; */
    }

    .behclick-panel {
        border-radius: 0px;
        border-right: 0px;
        border-left: 0px;
        border-bottom: 0px;
        box-shadow: 0 0px 0px rgba(0, 0, 0, 0);
    }

    .behclick-panel .radio,
    .checkbox {
        margin: 0px;
        padding-left: 10px;
    }

    .behclick-panel .panel-title>a,
    .panel-title>small,
    .panel-title>.small,
    .panel-title>small>a,
    .panel-title>.small>a {
        outline: none;
    }

    .behclick-panel .panel-body>.panel-heading {
        padding: 10px 10px;
    }

    .behclick-panel .panel-body {
        padding: 0px;
    }

    /* unvisited link */
    .behclick-panel a:link {
        text-decoration: none;
    }

    /* visited link */
    .behclick-panel a:visited {
        text-decoration: none;
    }

    /* mouse over link */
    .behclick-panel a:hover {
        text-decoration: none;
    }

    /* selected link */
    .behclick-panel a:active {
        text-decoration: none;
    }

   
    </style>
    <?php include 'common/header.php'; ?>
    <div class="container" style="margin-top:200px;">


        <div class="col-sm-4">
            <h1 style="border-bottom:4px solid black;">OUR PRODUCTS</h1>
        </div>
        <div class="col-12 col-sm-6 mt-5">

            <div class="col-sm-8 col-12">

                <div id="accordion" class="panel panel-primary behclick-panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Filter By</h3>
                    </div>
                    <div class="panel-body">
                        <div class="panel-heading ">
                            <h4 class="panel-title">
                                <a class="toggle_filter" data-toggle="collapse" href="#collapse1" style="color:black;">
                                    Collection
                                    <span style="float:right;">+</span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse1" class="panel-collapse collapse in">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="checkbox">
                                        <label>
                                            <input type="radio" value="all" name="collection" checked>
                                            All
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="checkbox">
                                        <label>
                                            <input type="radio" value="lamps" name="collection">
                                            Lamps
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="checkbox">
                                        <label>
                                            <input type="radio" value="accessories" name="collection">
                                            Accessories
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="panel-heading ">
                            <h4 class="panel-title">
                                <a class="toggle_filter" data-toggle="collapse" href="#collapse0" style="color:black;">
                                    Price<span style="float:right;">+</span>
                                </a>
                            </h4>
                        </div>
                        <div id="collapse0" class="panel-collapse collapse in">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="checkbox">
                                        <label>
                                            <input type="radio" value="0 AND 1000" name="price">
                                            0 - Rs.1000
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="checkbox">
                                        <label>
                                            <input type="radio" value="1000 AND 2000" name="price">
                                            Rs.1000 - Rs.2000
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="checkbox">
                                        <label>
                                            <input type="radio" value="2000 AND 3000" name="price">
                                            Rs.2000 - Rs.3000
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="checkbox">
                                        <label>
                                            <input type="radio" value="3000 AND 4000" name="price">
                                            Rs.3000 - Rs.4000
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="checkbox">
                                        <label>
                                            <input type="radio" value="4000 AND 5000" name="price">
                                            Rs.4000 - Rs.5000
                                        </label>
                                    </div>
                                </li>
                            </ul>

                        </div>






                    </div>
                </div>
            </div>

        </div>
        <div class="message mt-5" style="text-align:center;"></div>
        <div class="row mt-5 our_products" style="text-align:center;">


            <?php  

            if(isset($_GET['type'])){
                $type = $_GET['type'];
                $select_query_type = "SELECT * FROM `products_tbl` WHERE `type`='$type'";
                $select_result_type = mysqli_query($conn , $select_query_type);
        
                while($row = mysqli_fetch_assoc($select_result_type)){
                    ?>
                    <div class="col-12 col-sm-3">
                        <img src="assets/products/<?php echo $row['image'] ?>" alt="" class="img-fluid img_pro mb-5">
        
                        <h6 class="text-center name_val"><?php echo $row['name'] ?></h6>
                        <h6 class="text-center">Rs.<?php echo $row['price'] ?></h6>
                        <div class="mt-3 atc_qv" style="margin-bottom:100px;">
                          <a href="my_cart.php?id=<?php echo base64_encode($row['id']) ?>" class="atc" style="text-decoration:none;">Add To Cart</a>
                          <a href="product_detail.php?id=<?php echo base64_encode($row['id']); ?>" class="qv" style="text-decoration:none;">Quick View</a>
                        </div>
                      
                    </div>
        
                    <?php
                }
                
            }else{


                $select_query = "SELECT * FROM `products_tbl`";
                $select = mysqli_query($conn , $select_query);

                while($row = mysqli_fetch_assoc($select)){
                    ?>
                    <div class="col-12 col-sm-3">
                        <img src="assets/products/<?php echo $row['image'] ?>" alt="" class="img-fluid img_pro mb-5">

                        <h6 class="text-center name_val"><?php echo $row['name'] ?></h6>
                        <h6 class="text-center">Rs.<?php echo $row['price'] ?></h6>
                        
                        <div class="mt-3 atc_qv" style="margin-bottom:100px;">
                        <a href="my_cart.php?id=<?php echo base64_encode($row['id']) ?>" class="atc" style="text-decoration:none;">Add To Cart</a>
                        <a href="product_detail.php?id=<?php echo base64_encode($row['id']); ?>" class="qv" style="text-decoration:none;">Quick View</a>
                        </div>

                    </div>

                    <?php
                }
            }
		
                
		
		?>





        </div>








    </div>
    <?php include 'common/footer.php'; ?>
    <script>
    $(document).ready(function() {
        $('.toggle_filter').click(function() {
            if ($(this).find('span').text() == '+') {
                $(this).find('span').text('-');
            } else {
                $(this).find('span').text('+');
            }
        });


        $("input[type='radio']").click(function() {
            var collection = $("input[name='collection']:checked").val();
            var price = $("input[name='price']:checked").val();

            $.ajax({
                url: 'apis/filter.php',
                method: 'POST',
                data: {
                    collection: collection,
                    price: price
                },
                success: function(response) {
                    // console.log(response);

                    
                    $('.our_products').html(response);
                    
                    if ($('.our_products').is(':empty')) {
                        
                        $('.message').html('<h2>No Item Found!</h2>');

                    }
                }

            });

        });

     



    });

    // $('input[name=collection]').change(function() {
    //     var value = $('input[name=collection]:checked').val();


    // $.ajax({
    //     url: 'filter_by_collection.php',
    //     method: 'POST',
    //     data: {
    //         data: value
    //     },
    //     success: function(response) {
    //         console.log(response);
    // $('.our_products').empty();
    // $('.our_products').html(response);
    //     }

    // });



    // });


    // $('input[name=price]').change(function() {
    //     var value = $('input[name=price]:checked').val();


    //     $.ajax({
    //         url: 'filter_by_price.php',
    //         method: 'POST',
    //         data: {
    //             data: value
    //         },
    //         success: function(response) {
    //             console.log(response);
    //             $('.our_products').empty();
    //             $('.our_products').html(response);
    //         }

    //     });



    // });
    </script>
</body>