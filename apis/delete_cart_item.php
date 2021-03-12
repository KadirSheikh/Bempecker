<?php include '../common/connect.php'; ?>
<?php 

$cart_id = $_POST['cart_id'];

$query = "DELETE FROM `cart_tbl` WHERE `id`=$cart_id";
$result = mysqli_query($conn , $query);

if($result){
    echo json_encode(array(
        "status" => true,
        "message" => "Item deleted successfully."
    ));
}else{
    echo json_encode(array(
        "status" => false,
        "message" => "Failed to delete item"
    ));
}

?>