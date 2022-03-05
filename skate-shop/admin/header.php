


<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>headeradmin</title>

    <?php include('h.php');
      error_reporting( error_reporting() & ~E_NOTICE );
      ?>
       <?php include('h2.php');
      error_reporting( error_reporting() & ~E_NOTICE );
      ?>
</head>

<?php
      $query_product = "SELECT * FROM shop ";
      $result_pro =mysqli_query($con, $query_product) or die ("Error in query: $query_product " . mysqli_error());
      $row_pro = mysqli_fetch_array($result_pro);

      ?>

<body>
<div class="row">
<img src="g_img/<?php echo $row_pro['g_img']; ?>" width="100%" height="300">
    <p></p><p></p>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="col-10">
        <a  href="index.php"  align="center" class="card-title" style="color:#069;"><h4 ><?php echo $row_pro["h_name"];?></a> 
        <a  class="navbar-brand" href="about_store_edit_db.php" data-bs-toggle="modal" data-bs-target="#edit" data-bs-whatever="@mdo">
          <i style="color:red;"class="fas fa-edit"></i>
        </a>
      </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <div class="col-1">
        <div class="icons">
            <i class="fas fa-user"></i><b style="color:#212529"> <?php echo $a_user; ?></b>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="../logout.php" class="fas fa-sign-out-alt" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่?')"></a>
        </div>
      </div>
 
</div>
<br>
 <!-- edit -->
 <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แก้ไขรูป และ ชื่อร้าน</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form name="edit" action="about_store_edit_db.php" method="POST" id="edit" class="form-horizontal" enctype="multipart/form-data">
                  <div class="mb-3">
                  <label for="message-text" class="col-form-label">ชื่อร้าน:</label>
                  <input type="text"  name="h_name" class="form-control"  value="<?php echo $row_pro["h_name"];?>"/>
                  </div>
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">รูป:</label>
                    <input type="file" name="g_img" id="g_img" class="form-control" />
                  </div>
      
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <input type="hidden" name="img2" value="<?php echo $row_pro["g_img"];?>" />
                <button type="submit" class="btn btn-primary">save</button>
              </div>
              </form>
              </div>
            </div>
          </div>
        </div>




<!-- menu starts  -->
<div class="row">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="col-sm">
<div class="card border-warning text-center" style="height: 10rem; width: 10rem;" >
  <div class="card-body">
    <br><br>
  <a href="admin_list.php">จัดการผู้ดูแลระบบ  
     <i class="fas fa-user-cog"></i>
  </a>
  </div>
</div>
</div>

<div class="col-sm">
<div class="card border-info text-center" style="height: 10rem; width: 10rem;" >
  <div class="card-body ">
    <br><br>
    <a href="type_list.php">จัดการประเภทสินค้า   <i class="fas fa-list-ul"></i></a>
  </div>
</div>
</div>

<div class="col-sm">
<div class="card border-success text-center" style="height: 10rem; width: 10rem;" >
  <div class="card-body">
    <br><br>
    <a href="product_list.php">จัดการสินค้า   <i class="fab fa-product-hunt"></i></a>
  </div>
</div>
</div>

<div class="col-sm">
<div class="card border-warning text-center" style="height: 10rem; width: 10rem;" >
  <div class="card-body">
    <br><br>
    <a href="bank_list.php">จัดการธนาคาร  <i class="fas fa-money-check"></i></a>
  </div>
</div>
</div>

<div class="col-sm">
<div class="card border-info text-center" style="height: 10rem; width: 10rem;" >
  <div class="card-body">
    <br><br>
    <a href="member_list.php">จัดการสมาชิก  <i class="fas fa-users-cog"></i></a>
  </div>
</div>
</div>

<div class="col-sm">
<div class="card border-success text-center" style="height: 10rem; width: 10rem;" >
  <div class="card-body">
    <br><br>
    <a href="about_store.php">จัดการ Home  <i class="fas fa-home"></i></a>
  </div>
</div>
</div>
  
</div>



<!-- header section ends -->



    
</body>
</html>