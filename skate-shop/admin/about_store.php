<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Edit</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
  <body>
   
    <?php include('h.php');
      error_reporting( error_reporting() & ~E_NOTICE );
      ?>
      <?php include('header.php');
      error_reporting( error_reporting() & ~E_NOTICE );

      ?>
      
      <?php
      $query_product = "SELECT * FROM shop ";
      $result_pro =mysqli_query($con, $query_product) or die ("Error in query: $query_product " . mysqli_error());
      $row_pro = mysqli_fetch_array($result_pro);
      ?>
      

    
    <p></p><br>

<div class="row">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <div class="col-sm-5">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">แก้ไขรูป และ ชื่อร้าน</h5>
        <form name="store" action="about_store_edit_db.php" method="POST" id="store" class="form-horizontal" enctype="multipart/form-data" >
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">ชื่อร้าน:</label>
                    <input type="text"  name="h_name" class="form-control" value="<?php echo $row_pro["h_name"];?>" />
                  </div>
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">รูป:</label>
                    <input type="file"  name="g_img" id="g_img"   class="form-control" />
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
  <div class="col-sm-5">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">แก้ไข Footer
        <button class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#detail" data-bs-whatever="@mdo">see</button>   
        </h5>
        <form name="about" action="about_store_db.php" method="POST" id="login" class="form-horizontal">
                  <div class="mb-3">
                  <label for="message-text" class="col-form-label">ที่อยู่:</label>
                  <input type="text"  name="h_address" class="form-control"  value="<?php echo $row_pro["h_address"];?>"/>
                  </div>
                  <div class="mb-3">
                  <label for="message-text" class="col-form-label">เบอร์โทร:</label>
                  <input type="text"  name="h_tel" class="form-control"  value="<?php echo $row_pro["h_tel"];?>"/>
                  </div>
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">link facebook:</label>
                    <input type="text" name="h_fb"  class="form-control" value="<?php echo $row_pro["h_fb"];?>"/>
                    <label for="message-text" class="col-form-label">link Instragram:</label>
                    <input type="text" name="h_ig"  class="form-control" value="<?php echo $row_pro["h_ig"];?>"/>
                  </div>
      
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">save</button>
              </div>
              </form>
      </div>
    </div>
  </div>
</div>

  </body>


<!-- detail-->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">About</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="mb-3">
                    <?php echo $row_pro["h_name"];?><br>
                    <?php echo $row_pro["h_address"];?><br>
                    <?php echo $row_pro["h_tel"];?>
                  </div>
                  <div class="mb-3">
                  <p>
                  <a  class="navbar-brand" href="<?php echo $row_pro["h_fb"];?>" data-bs-toggle="modal" data-bs-target="#edit" data-bs-whatever="@mdo">
                    <i class="fab fa-facebook"></i>
                  </a>
                  <a  class="navbar-brand" href="<?php echo $row_pro["h_fb"];?>" data-bs-toggle="modal" data-bs-target="#edit" data-bs-whatever="@mdo">
                  <i class="fab fa-instagram"></i>
                  </a>
              </p>
                  </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              </div>
             
              </div>
            </div>
          </div>
        </div>
</html>
  