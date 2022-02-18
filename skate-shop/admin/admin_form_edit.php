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
    $a_id = $_REQUEST["ID"];
    //2. query ข้อมูลจากตาราง:
    $sql = "SELECT * FROM admin WHERE a_id='$a_id' ";
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
    <form  name="admin" action="admin_form_edit_db.php" method="POST" id="admin" class="form-horizontal">
      <input type="hidden" name="a_id" value="<?php echo $a_id; ?>"> 
      <div class="card-body">
            <label class="card-text"><h4><b>แก้ไขแอดมิน</b></h4></label>
      </div><hr>
      <div class="card-body">
              <div class="col-sm-12" align="left"> Name :</div>
                <div class="col-sm-8" align="left">
                  <input  name="a_name" type="text" required class="form-control" id="a_name"  value="<?=$a_name;?>"  placeholder="Name" />
                </div><p>
          
              <div class="col-sm-12" align="left"> Username :</div>
              <div class="col-sm-10" align="left">
                <input  name="a_user" type="text" required class="form-control" id="a_user" value="<?=$a_user;?>"  placeholder="username"  minlength="2"  />
              </div><p>
            
              <div class="col-sm-12" align="left"> Password : </div>
              <div class="col-sm-6" align="left">
                <input  name="a_pass" type="password" required class="form-control" id="a_pass" value="<?=$a_pass;?>"  placeholder="password" pattern="^[a-zA-Z0-9]+$" minlength="2" />
              </div>
            
              <div class="col-sm-12" align="left"> Email :</div>
                <div class="col-sm-10" align="left">
                  <input  name="a_email" type="email" class="form-control" id="a_email"  value="<?=$a_email;?>" placeholder=" อีเมล์ example@hotmail.com"/>
                </div><p>
            
          <div class="col-sm-12" align="left"> Tell :</div>
            <div class="col-sm-10" align="left">
              <input  name="a_tel" type="text" class="form-control" id="a_tel" value="<?=$a_tel;?>" placeholder="เบอร์โทร ตัวเลขเท่านั้น" />
            </div>
      </div>
      <div class="card-body">
          <div class="col-sm-11" align="right">
            <button type="submit" class="btn btn-success btn-sm" id="btn"> <span class="glyphicon glyphicon-saved"></span> edit</button>      
          </div> 
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>