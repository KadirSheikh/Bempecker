<?php include '../common/connect.php'; ?>
<?php

if (!isset($_SESSION['admin_id'])) {
  echo "<script>window.location.href='login.php';</script>";
  die;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<!-- BOOTSTRAP LINKS -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

	<!-- CSS FILES -->
	<link rel="stylesheet" type="text/css" href="css/login.css">

</head>
<style type="text/css">
  .card .card-body h5{
    white-space: nowrap;
  }
</style>
<body>
<?php
    include 'navbar.php'; 

?>

<div class="container mt-3">
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Users</h4>
                </div>
                <div class="card-body">
                  <!------------------ User Table List ------------------>

                  <div class="table-responsive">
                    <table class="table" id="users_tbl">
                    <thead class=" text-primary">
                        <th>
                          UserID
                        </th>
                        <th>
                          Profile
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          Mobile
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          Reg. Date
                        </th>
                      </thead>

                  
                    <tbody id="searchtbl">
                        <?php 
                        $query = mysqli_query($conn,"SELECT * FROM `customer_tbl`");

                           $counter=1;
     while($row = mysqli_fetch_assoc($query)) {
               
        
      ?>
                      <tr>
                          <td class="user-id">
                            <?php echo $row['id']; ?>
                          </td>
                          <td>
                            <img src="../assets/profile_pics/<?php echo $row['profile_photo']; ?>" alt="" width="80" height="80">
                          </td>
                          <td class="text-primary">
                            <b><?php echo $row['name']; ?></b>
                          </td>
                          <td>
                            <?php echo $row['mobile_no']; ?>
                          </td>
                          <td> 
                            <?php echo $row['email']; ?>
                          </td>
                          <td>
                             <?php echo $row['reg_date']; ?>
                          </td>
                        </tr>
                      <?php $counter++;} ?>
                    </tbody>
                    
                  </table>
                </div>

                <!---------------------- User Table List End ---------------------->
                </div>
              </div>
            </div>
            <div class="col-md-2">
              <div class="card">
              <div class="card-body">
                <h5 class="card-title text-center">Total Users</h5>
                <hr>
                <div class="text-center">
                  <h3 class="card-text">
                  <?php 
                  $count = mysqli_query($conn,"SELECT *  FROM customer_tbl");
                  echo mysqli_num_rows($count);
                  ?>
                </h3>
                </div>

              </div>
            </div>
            </div>
          </div>
        </div>
      </div>  
</div>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#users_tbl').DataTable();

});
</script>
</body>
</html>