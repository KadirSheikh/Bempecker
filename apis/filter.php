<?php include '../common/connect.php'; ?>
<?php 

error_reporting(0);
 $collection = $_POST['collection'];
  $price = $_POST['price'];


 //only for price filter
      if($collection == 'all'){
          if(isset($_POST['price'])){
             $select_query = "SELECT * FROM `products_tbl` WHERE `price` BETWEEN $price";
          }else{
             $select_query = "SELECT * FROM `products_tbl`";
          }
         
        $select = mysqli_query($conn , $select_query);
    
        // $menu = array();
        while($row = mysqli_fetch_assoc($select)){
        
            echo'<div class="col-12 col-sm-3">
                <img src="assets/products/'.$row['image'].'" alt="" class="img-fluid img_pro mb-5">
    
                <h6 class="text-center">'.$row['name'].' </h6>
                <h6 class="text-center">'.$row['price'].' </h6>
                <div class="mt-3" style="margin-bottom:100px;">
                <a href="my_cart.php?id='.base64_encode($row['id']).'" class="atc" style="text-decoration:none;">Add To Cart</a>
                    <a href="product_detail.php?id='.base64_encode($row['id']).'" class="qv"
                        style="text-decoration:none;">Quick View</a>
                </div>
    
            </div>';

      } 

    //   echo json_encode($menu);//both filter
      }else if(isset($price)){
         $select_query = "SELECT * FROM `products_tbl` WHERE `type`='$collection' AND `price` BETWEEN $price";
        $select = mysqli_query($conn , $select_query);
    
        // $menu = array();
        while($row = mysqli_fetch_assoc($select)){
        
            echo'<div class="col-12 col-sm-3">
                <img src="assets/products/'.$row['image'].'" alt="" class="img-fluid img_pro mb-5">
    
                <h6 class="text-center">'.$row['name'].' </h6>
                <h6 class="text-center">'.$row['price'].' </h6>
                <div class="mt-3" style="margin-bottom:100px;">
                <a href="my_cart.php?id='.base64_encode($row['id']).'" class="atc" style="text-decoration:none;">Add To Cart</a>
                    <a href="product_detail.php?id='.base64_encode($row['id']).'" class="qv"
                        style="text-decoration:none;">Quick View</a>
                </div>
    
            </div>';
           

         
      } 

    //   echo json_encode($menu);


       //collection filter
    }else{
         $select_query = "SELECT * FROM `products_tbl` WHERE `type`='$collection'";
        $select = mysqli_query($conn , $select_query);
        // $menu = array();
        while($row = mysqli_fetch_assoc($select)){
        
            echo'<div class="col-12 col-sm-3">
                <img src="assets/products/'.$row['image'].'" alt="" class="img-fluid img_pro mb-5">
    
                <h6 class="text-center">'.$row['name'].' </h6>
                <h6 class="text-center">'.$row['price'].' </h6>
                <div class="mt-3" style="margin-bottom:100px;">
                <a href="my_cart.php?id='.base64_encode($row['id']).'" class="atc" style="text-decoration:none;">Add To Cart</a>
                    <a href="product_detail.php?id='.base64_encode($row['id']).'" class="qv"
                        style="text-decoration:none;">Quick View</a>
                </div>
    
            </div>';
        
      } 

    //   echo json_encode($menu);
    } 


?>