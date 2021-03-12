<?php include 'common/connect.php'; ?>
<title>My orders</title>
<?php include 'common/auth.php'; ?>
<?php include 'common/header.php'; ?>
<div class="container" style="margin-top:200px;">
<a class="btn  btn-1 btn-outline-success"
        href="our_product.php">&#x2190; Continue Shopping</a>
    <div class="row mb-5 mt-5">
        <div class="col-md-12 table-border-style">
            <div class="table-responsive">
                <table id="dtBasicExample" class="table display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>

                            <th class="order-id">Order ID</th>
                            <th class="product-name">Image</th>
                            <th class="product-name">Product</th>
                            <th class="product-price">Price</th>
                            <th class="product-quantity">Quantity</th>
                            <th class="product-total">Total</th>
                            <th class="product-thumbnail">Status</th>
                            <th class="product-action">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                    $total = 0;
                    $user_id = $_SESSION['user_id'];
                    $order = mysqli_query($conn,"SELECT 
                                                        * 
                                                   FROM 
                                                      `order_tbl`
                                                   INNER JOIN
                                                   	  `products_tbl`
                                                   ON
                                                      order_tbl.product_id = products_tbl.id 
                                                   WHERE 
                                                      order_tbl.user_id = $user_id
                                                   AND
                                                   	  order_tbl.cancel_request = 0
                                                   ORDER BY order_tbl.ID DESC");
                    while( $row = mysqli_fetch_assoc($order) ){
                  ?>
                        <tr>

                            <td class="order-id">
                                <h2 class="h5 text-primary"><?php echo $row['order_id'] ?></h2>
                            </td>
                            <td class="product_img">
                                <img src="assets/products/<?php echo $row['image']; ?>" alt="" class="img-fluid"
                                    style="width:70px;height:70px;">
                            </td>
                            <td class="product-name">
                                <h2 class="h5 text-black"><?php echo $row['name'] ?></h2>
                            </td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['product_quantity']; ?></td>
                            <td><?php echo $row['price']*$row['product_quantity'] ?></td>
                            <td class="product-thumbnail">
                                <?php
                         echo $row['status'];
                      ?>
                            </td>
                            <td>
                                <button name="cancel-order" class="btn btn-danger btn-sm cancel_order" data-pid="<?php echo $row['order_id']; ?>">Cancel
                                    Order</button>
                            </td>

                        </tr>
                        <?php 
                  $total = $total + ($row['price']*$row['product_quantity']);
                  } 
                ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include 'common/footer.php'; ?>

<script>
$(document).ready(function() {
    $('#dtBasicExample').DataTable();


    $('.cancel_order').on('click' , function(){
        var p_id = $(this).attr('data-pid');

        $.ajax({
                url: 'apis/cancel_product.php',
                method: 'POST',
                data: {
                    p_id: p_id


                },
                success: function(response) {
                    console.log(response);
                    var response = JSON.parse(response);
                    if (response.status) {
                        swal("Order canceled!", " ", "success").then(() => {
                            window.location.href = "my_orders.php";
                        });

                    } else {
                        swal("Failed to cancel order!", " ", "error");
                    }
                }

            });
    })
});
</script>