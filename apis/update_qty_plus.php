<?php include '../common/connect.php'; ?>
<?php 
 $qty = $_POST['quantity'];
 $p_id = $_POST['product_id'];
 $total_price = $_POST['price']*$qty;

 $user_id = $_POST['user_id'];


$query = "UPDATE `cart_tbl` SET `quatity`=$qty , `total_price`=$total_price WHERE `p_id` = $p_id";
$result = mysqli_query($conn , $query);

$sum_total_price = "";

$sum_query = "SELECT SUM(total_price) AS `total` FROM `cart_tbl` WHERE `user_id`=$user_id";
$result_sum = mysqli_query($conn , $sum_query);
 while($row = mysqli_fetch_assoc($result_sum)){
    $sum_total_price = $row['total'];
 }
 
if($result){
    echo json_encode(array(
        "status" => true,
        "total" => $total_price,
        "subtotal" => $sum_total_price
    ));
}else{
    echo json_encode(array(
        "status" => false,
        "total" => $total_price,
        "subtotal" => $sum_total_price
    ));
}

?>