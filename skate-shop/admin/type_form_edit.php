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
$type_id = $_REQUEST["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT * FROM type WHERE type_id='$type_id' ";
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
    <form  name="admin" action="type_form_edit_db.php" method="POST" id="admin" class="form-horizontal">
          
          <input type="hidden" name="type_id" value="<?php echo $type_id; ?>" />
          
      <div class="card-body">
            <label class="card-text"><h4><b>แก้ไขประเภท</b></h4></label>
      </div><hr>
      <div class="card-body">
              <div class="col-sm-12" align="left"> ประเภทสินค้า :</div>
                <div class="col-sm-8" align="left">
                <input  name="type_name" type="text" required class="form-control" id="type_name" value="<?=$type_name;?>" placeholder="ประเถทสินค้า" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2"  />
                </div><p>
          
      <div class="card-body">
          <div class="col-sm-11" align="right">
          <input type="hidden" name="b_id" value="<?php echo $b_id; ?>" />
          <button type="submit" class="btn btn-success btn-sm" id="btn"> Edit </button>  
                
          </div> 
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>