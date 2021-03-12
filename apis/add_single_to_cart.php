<?php include '../common/connect.php'; ?>
<?php

$product_id =  $_POST['p_id'];
$product_quantity =  $_POST['quantity'];
$total_price =  $_POST['total_price'];

    $query = "SELECT * FROM `products_tbl` WHERE id=$product_id";
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

    $check = mysqli_query($conn,"SELECT `p_id`,`user_id`,`quatity` , `total_price` FROM `cart_tbl` WHERE `p_id`= '$product_id' AND `user_id`='$u_id'");

    if(mysqli_num_rows($check)>0){
        
      $res = mysqli_fetch_assoc($check);
      $product_quantity=$res['quatity']+$product_quantity;
      $total_price = $res['total_price']+$total_price;

      $update = mysqli_query($conn,"UPDATE `cart_tbl` SET `quatity`='$product_quantity' , `total_price`='$total_price' WHERE `p_id`= '$product_id' AND `user_id`='$u_id'");
      if ($update) {
        echo json_encode(array(
        "status" => true,
        "message" => "Item added"
    ));
      }
      else{
        echo json_encode(array(
            "status" => false,
             "message" => "Failed to add to cart."
        ));
      }
    } else{


        $insert_cart_q = "INSERT INTO `cart_tbl`(`user_id`, `p_id`, `p_name`, `p_img`, `p_mn`, `p_length`, `p_diameter`, `p_price`, `p_type` , `quatity` , `total_price`) VALUES ($u_id,$product_id,'$name','$image','$modal_no','$length','$diameter',$price,'$type' , '$product_quantity',$total_price)";
        $data_cart = mysqli_query($conn , $insert_cart_q);

        if($data_cart){
            echo json_encode(array(
                "status" => true,
                "message" => "Item added"
            ));

        }else{
            echo json_encode(array(
                "status" => false,
                 "message" => "Failed to add to cart."
            ));
        }
        }


    

?>