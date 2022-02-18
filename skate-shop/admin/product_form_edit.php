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
$p_id = $_GET["ID"];
//2. query ข้อมูลจากตาราง:
$sql = "SELECT p.*,t.type_name
FROM product as p 
INNER JOIN type as t ON p.type_id = t.type_id
WHERE p.p_id = '$p_id'
ORDER BY p.type_id asc";
$result2 = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
$row = mysqli_fetch_array($result2);
extract($row);

//2. query ข้อมูลจากตาราง 
$query = "SELECT * FROM type ORDER BY type_id asc" or die("Error:" . mysqli_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result = mysqli_query($con, $query);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>

</head>
<body>


  <div class="row">
  <div class="col-md-2"></div>
  <div class="col-10 ">
    <div class="card border-secondary" style="width: 40rem;" >
    <form  name="addproduct" action="product_form_edit_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
      <input type="hidden" name="p_id" value="<?php echo $p_id; ?>"> 
      <div class="card-body">
            <label class="card-text"><h4><b>แก้ไขสินค้า</b></h4></label>
      </div><hr>
      <div class="card-body">
              <div class="col-sm-12" align="left"> ชื่อสินค้า :</div>
                <div class="col-sm-8" align="left">
                <input type="text"  name="p_name" class="form-control" required placeholder="ชื่อสินค้า" / value="<?php echo $p_name; ?>">
                </div><p>
          
              <div class="col-sm-12" align="left"> ราคาสินค้า :</div>
              <div class="col-sm-10" align="left">
              <input type="text"  name="p_price" class="form-control" required placeholder="ราคาสินค้า" / value="<?php echo $p_price; ?>">
              </div><p>
            
              <div class="col-sm-12" align="left"> จำนวน : </div>
              <div class="col-sm-6" align="left">
              <input type="text"  name="p_qty" class="form-control" required placeholder="จำนวน" / value="<?php echo $p_qty; ?>">
              </div><p>

              <div class="col-sm-12" align="left"> ประเภทสินค้า : </div>
              <div class="col-sm-6" align="left">
              <select name="type_id" class="form-control" required>
              <option value="<?php echo $row["type_id"];?>">
                <?php echo $row["type_name"]; ?>
              </option>
              <option value="type_id">ประเภทสินค้า</option>
              <?php foreach($result as $results){?>
              <option value="<?php echo $results["type_id"];?>">
                <?php echo $results["type_name"]; ?>
              </option>
              <?php } ?>
            </select>
              </div><p>

              <div class="col-sm-12" align="left"> รายละเอียดสินค้า : </div>
              <div class="col-sm-6" align="left">
              <textarea  name="p_detail" rows="5" cols="60"><?php echo $p_detail; ?>
             </textarea>
              </div><p>

              <div class="col-sm-12" align="left"> ภาพสินค้า : </div>
              <div class="col-sm-6" align="left">
              <img src="p_img/<?php echo $row['p_img'];?>" width="100px">
            <br>
            <br>
            <input type="file" name="p_img" id="p_img" class="form-control" />
              </div><p>
      <div class="card-body">
          <div class="col-sm-11" align="right">
          <input type="hidden" name="b_id" value="<?php echo $b_id; ?>" />
          <input type="hidden" name="p_id" value="<?php echo $p_id; ?>" />
             <input type="hidden" name="img2" value="<?php echo $p_img; ?>" />
            <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
          </div> 
        </div>
      </form>
    </div>
  </div>
</div>
  </body>
</html>