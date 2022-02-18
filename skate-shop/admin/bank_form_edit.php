<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Skate Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
$b_id = $_GET["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM bank WHERE b_id='$b_id' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result);
extract($row);
?>

</head>
<body>



  <div class="row">
  <div class="col-md-2"></div>
  <div class="col-10 ">
    <div class="card border-secondary" style="width: 20rem;" >
    <form  name="addbank" action="bank_form_edit_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
      <input type="hidden" name="b_id" value="<?php echo $b_id; ?>"> 
      <div class="card-body">
            <label class="card-text"><h4><b>แก้ไขธนาคาร</b></h4></label>
      </div><hr>
      <div class="card-body">
              <div class="col-sm-12" align="left"> ชื่อธนาคาร :</div>
                <div class="col-sm-8" align="left">
                <input type="text"  name="b_name" class="form-control" required placeholder="ชื่อธนาคาร" value="<?php echo $b_name; ?>"/>
                </div><p>
          
              <div class="col-sm-12" align="left"> เลขบัญชี :</div>
              <div class="col-sm-10" align="left">
              <input type="text"  name="b_number" class="form-control" required placeholder="เลขบัญชี" value="<?php echo $b_number; ?>"/>
              </div><p>
            
              <div class="col-sm-12" align="left"> ชื่อบัญชี : </div>
              <div class="col-sm-6" align="left">
              <input type="text"  name="b_uname" class="form-control" required placeholder="ชื่อ" value="<?php echo $b_uname; ?>"/>
              </div>
      <div class="card-body">
          <div class="col-sm-11" align="right">
          <input type="hidden" name="b_id" value="<?php echo $b_id; ?>" />
            <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
                
          </div> 
        </div>
      </form>
    </div>
  </div>
</div>
  </body>
</html>