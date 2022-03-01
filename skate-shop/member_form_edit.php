<!DOCTYPE html>
<html>
<head>
<?php session_start();?>
<?php include('h2.php');?>
<?php include('h.php');?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Skate Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="menu3.css" type="text/css" />
<style>
    body {
  background: url(img/woodwhite.jpeg);
  background-attachment: fixed;
  background-position: center;
  overflow-x: hidden;
}
  </style>


<?php
    //1. เชื่อมต่อ database:
    include('admin/condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
    $member_id = $_REQUEST["ID"];
    $provinces = $_REQUEST["ID"];
    $amphures = $_REQUEST["ID"];

    $mm = $_SESSION['member_id'];


    //2. query ข้อมูลจากตาราง:
    $sql = "SELECT * FROM member 
    INNER JOIN address ON member.member_id=address.member_id
    WHERE member.member_id = $mm  ";
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
    $row = mysqli_fetch_array($result);
    extract($row);

    $sql_province = "SELECT * FROM provinces";
    $result_province = mysqli_query($con, $sql_province);

    $sql_amphures = "SELECT * FROM amphures ";
    $result_amphures = mysqli_query($con, $sql_amphures);

    $sql_districts = "SELECT * FROM districts ";
    $result_districts = mysqli_query($con, $sql_districts);

    //echo '<pre>';
    //print_r($_SESSION);
    //echo '</pre>';
  
    //echo '<hr>';
  
    //echo '<pre>';
    //print_r($_REQUEST);
    //echo '</pre>';
    //exit;
    ?>
</head>

<body>

<?php
      $query_product = "SELECT * FROM shop ";
      $result_pro =mysqli_query($con, $query_product) or die ("Error in query: $query_product " . mysqli_error());
      $row_pro = mysqli_fetch_array($result_pro);
      ?>

<img src="admin/g_img/<?php echo $row_pro['g_img']; ?>" width="100%" height="400">
      <?php include('navbar3.php');
      error_reporting( error_reporting() & ~E_NOTICE );
      ?>
   
<div class="row">
  <div class="col-md-2">
  <div id="menu">
          <ul>
            <li><a href="memberprofile.php" >Your Profile  <i class="fas fa-house-user"></i></a></li>
            <li><a href="cart.php" >Cart <i class="fas fa-shopping-cart"></i></a></li>
            <li><a href="order.php" >Order  <i class="fas fa-box-open"></i></a></li>
          </ul>
        </div>
  </div>
      
  <div class="col-md-2">
      <p></p>
    <form  name="register" action="member_form_edit_db.php" method="POST" id="member"class="form-horizontal">
    <input type="hidden" name="member_id" value="<?php echo $member_id; ?>"> 
    <div class="card border-secondary" style="width: 60rem;" >
      <div class="row">
        
  <div class="col-md-6">

  <div class="card-body">
            <label class="card-text"><h4><b>แก้ไขสมาชิก</b></h4></label>
      </div><hr>
      <div class="card-body">
              <div class="col-sm-12" align="left"> Username :</div>
                <div class="col-sm-8" align="left">
                <input  name="m_user" type="text" required class="form-control" id="m_user" value="<?=$m_user;?>" placeholder="Username"  minlength="2"  />
                </div><p>
          
              <div class="col-sm-12" align="left"> Password :</div>
              <div class="col-sm-3" align="left">
                <input  name="m_pass" type="password" required class="form-control" id="m_pass" value="<?=$m_pass;?>" placeholder="Password" pattern="^[a-zA-Z0-9]+$" minlength="2" />
              </div><p>
            
              <div class="col-sm-12" align="left"> Name : </div>
              <div class="col-sm-8" align="left">
              <input  name="m_name" type="text" required class="form-control" id="m_name" value="<?=$m_name;?>" placeholder="ชื่อ-สกุล " />
              </div>
            
              <div class="col-sm-12" align="left"> Email :</div>
                <div class="col-sm-8" align="left">
                <input  name="m_email" type="email" class="form-control" id="m_email"  value="<?=$m_email;?>" placeholder=" อีเมล์ example@hotmail.com"/>
                </div><p>
            
          <div class="col-sm-12" align="left"> Tell :</div>
            <div class="col-sm-8" align="left">
            <input  name="m_tel" type="text" class="form-control" id="m_tel" value="<?=$m_tel;?>" placeholder="เบอร์โทร ตัวเลขเท่านั้น" />
            </div>
              </div>
  </div>
  <div class="col-md-6">
    <br><p><p>
              <div class="card-body">
          <div class="col-sm-12" align="left">
            <div class="col-sm-12" align="left"> 
              Address 
              <hr></hr> 
            </div> 
            <div class="col-sm-6" align="left"> บ้านเลขที่
              <input  name="a_address" type="text" class="form-control" id="a_address" value="<?=$a_address;?>"  placeholder="บ้านเลขที่ หมู่ที่" />
            </div>
          </div><p>
   
          <div class="col-sm-6" align="left"> 
            <label>จังหวัด</label><p>
            <select name="provinces" id="provinces" >
              <option value="" selected > <?=$pro_name_th;?>  </option>
              <?php foreach ($result_province as $value_provinces){ ?>
                <option value="<?=$value_provinces['id']?>" <?=$value_provinces['id']==$a_provinces?'selected':''?>><?=$value_provinces['pro_name_th']?></option>
              <?php } ?>
            </select><br><p>
            
            <label>อำเภอ</label>
            <select name="amphures" id="amphures">
            <option value="" selected disabled> <?=$am_name_th;?> </option>
              <?php foreach ($result_amphures as $value_amphures){ ?>
                <option value="<?=$value_amphures['id']?>"  <?=$value_amphures['id']==$a_amphures?'selected':''?>  ><?=$value_amphures['am_name_th']?></option>
              <?php } ?>
            </select><br><p>

            <label>ตำบล</label>
            <select name="districts" id="districts">
            <option value="" selected disabled> <?=$dis_name_th;?> </option>
              <?php foreach ($result_districts as $value_districts){ ?>
                <option value="<?=$value_districts['id']?>"  <?=$value_districts['id']==$a_districts?'selected':''?> ><?=$value_districts['dis_name_th']?></option>
              <?php } ?><p>
            </select>

            <div class="col-sm-5" align="left">
              <label>รหัสไปรษณีย์</label>
              <input type="text"  name="zip_code" class='form-control ' minlength="5" maxlength="5" id="zip_code" value="<?=$a_zipcode;?>"  readonly/>
            </div>
          </div>
     
          </div>
      <div class="card-body">
          <div class="col-sm-11" align="right">
            <button type="submit" class="btn btn-success" id="btn"><span class="glyphicon glyphicon-ok"></span> Edit member  </button>
          </div> 
        </div>
    
    </div>
  </div>
      </div>
    </form>
  </div>
</div>
  <footer>
  <?php include('footer2.php');?>
  </footer>

         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
    $('#provinces').change(function(){
      var id_provinces = $(this).val();
      $.ajax({
        type: "post",
        url: "admin/member_ajax_edit.php",
        data: {id:id_provinces,function:'provinces'},
        success: function(data){
          $('#amphures').html(data);
          $('#districts').html(data);
          $('#zip_code').val('');
        }
      });
    });
    $('#amphures').change(function(){
      var id_amphures = $(this).val();
      $.ajax({
        type: "post",
        url: "admin/member_ajax_edit.php",
        data: {id:id_amphures,function:'amphures'},
        success: function(data){
          //console.log(data);
          $('#districts').html(data);
          $('#zip_code').val('');
        }
      });
    });
    $('#districts').change(function(){
      var id_districts = $(this).val();
      $.ajax({
        type: "post",
        url: "admin/member_ajax_edit.php",
        data: {id:id_districts,function:'districts'},
        success: function(data){
          //console.log(data);
          $('#zip_code').val(data);
        }
      });
    });
  </script>

      </body>

</html>