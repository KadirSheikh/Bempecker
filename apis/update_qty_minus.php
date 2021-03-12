<?php include '../common/connect.php'; ?>
<?php 
 $qty = $_POST['quantity'];
 $p_id = $_POST['product_id'];
//  $total_price = $_POST['price']*$qty;

 $user_id = $_POST['user_id'];

$res_total_price = "";
$query_total = "SELECT * FROM `cart_tbl` WHERE `p_id` = $p_id";
$result_total = mysqli_query($conn , $query_total);
while($row = mysqli_fetch_assoc($result_total)){
    $res_total_price = $row['total_price'];
 }

$remaining =  $res_total_price  - $_POST['price'];

if($remaining != 0){
    $query = "UPDATE `cart_tbl` SET `quatity`=$qty , `total_price`=$remaining WHERE `p_id` = $p_id";
    $result = mysqli_query($conn , $query);
}




$sum_total_price = "";

$sum_query = "SELECT SUM(total_price) AS `total` FROM `cart_tbl` WHERE `user_id`=$user_id";
$result_sum = mysqli_query($conn , $sum_query);
 while($row = mysqli_fetch_assoc($result_sum)){
    $sum_total_price = $row['total'];
 }
 
if($result){
    echo json_encode(array(
        "status" => true,
        "total" => $remaining ,
        "subtotal" => $sum_total_price
    ));
}else{
    echo json_encode(array(
        "status" => false,
        "total" => $remaining ,
        "subtotal" => $sum_total_price
    ));
}

?>