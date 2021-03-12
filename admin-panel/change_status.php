<?php include '../common/connect.php'; ?>
<?php 


$id =  $_POST['p_id'];

$status =  $_POST['status'];

$update_query = "UPDATE `order_tbl` SET `status`='$status' WHERE product_id = $id";

$result = mysqli_query($conn , $update_query);

if($result){
    echo json_encode(array(
        "status" => true
    ));
}else{
    echo json_encode(array(
        "status" => false
    ));
}











?>