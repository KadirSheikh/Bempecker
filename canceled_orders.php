<?php include 'common/connect.php'; ?>
<title>Canceled Orders</title>
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
                            
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                    $total = 0;
                    $order = mysqli_query($conn,"SELECT 
                                                        * 
                                                   FROM 
                                                      `order_tbl`
                                                   INNER JOIN
                                                      `products_tbl`
                                                   ON
                                                      order_tbl.product_id = products_tbl.id 
                                                   WHERE 
                                                      order_tbl.user_id = '$_SESSION[user_id]'
                                                   AND
                                                      order_tbl.cancel_request = 1
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
                                <h2 class="h5 text-black"><?php echo $row['product_name'] ?></h2>
                            </td>
                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['product_quantity']; ?></td>
                            <td><?php echo $row['price']*$row['product_quantity'] ?></td>
                            <td>
                                Canceled
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
});
</script>