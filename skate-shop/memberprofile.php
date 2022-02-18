<!DOCTYPE html>
<html>
<head>
<?php session_start();?>
<?php include('h.php');?>
<?php include('h2.php');?>
<meta charset="utf-8">
  <title>Skate Shop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  <style>
    body {
  background: url(img/woodwhite.jpeg);
  background-attachment: fixed;
  background-position: center;
  overflow-x: hidden;
}
  </style>

</head>
  <body>
  
  <?php
      $query_product = "SELECT * FROM shop ";
      $result_pro =mysqli_query($con, $query_product) or die ("Error in query: $query_product " . mysqli_error());
      $row_pro = mysqli_fetch_array($result_pro);
      ?>

<img src="admin/g_img/<?php echo $row_pro['g_img']; ?>" width="100%" height="400">
   

      <?php include('navbar3.php');?>
   
      <?php
          $act = $_GET['act'];
          if($act == 'edit'){
            include('member_form_edit.php');
          }


      ?>
 
    <div class="row">
      <div class="col-md-2">
        <div class="list-group">
          <a href="memberprofile.php" class="list-group-item list-group-item-action" style="background-color: #cbbbe9;">Your Profile  <i class="fas fa-house-user"></i></a>
          <a href="cart.php" class="list-group-item list-group-item-action" style="background-color: #cbbbe9;">Cart <i class="fas fa-shopping-cart"></i></a>
          <a href="order.php" class="list-group-item list-group-item-action" style="background-color: #cbbbe9;">Order  <i class="fas fa-box-open"></i></a>
        </div>
      </div>
      <div class="col-md-10">
    <?php
     
     $mm = $_SESSION['member_id'];

  

       error_reporting( error_reporting() & ~E_NOTICE );
                //1. เชื่อมต่อ database:
                include('admin/condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง admin:
                $query = "SELECT * FROM address 
                LEFT JOIN member ON member.member_id=address.member_id
                LEFT JOIN provinces ON provinces.id=address.a_provinces 
                LEFT JOIN amphures ON amphures.id=address.a_amphures
                LEFT JOIN districts ON districts.id=address.a_districts
                WHERE member.member_id = $mm  " or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                $row_am = mysqli_fetch_array($result);

               
                ?>
 
<p></p>

 
              
      <div class="card border-secondary" style="width: 20rem;">
        <div class="card-body">
          <p class="card-text"><h3>@<b><?php echo $row_am["m_user"];?></b></h3></p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Name : <?php echo $row_am["m_name"];?></li>
          <li class="list-group-item">Email : <?php echo $row_am["m_email"];?></li>
          <li class="list-group-item">Tel : <?php echo $row_am["m_tel"];?></li>
          <li class="list-group-item"> Address : <?php echo $row_am['a_address']; ?>
                <?php echo $row_am['pro_name_th']; ?>
                <?php echo $row_am['am_name_th']; ?>
                <?php echo $row_am['dis_name_th']; ?>
                <?php echo $row_am['a_zipcode']; ?></li>
        </ul>
        
        
        <div class="card-body">
        <div class="col-sm-12" align="right">
        <a href="member_form_edit.php?act=edit&ID=<?php echo $row_am['member_id']; ?>" class="btn btn-warning btn-sm"> Edit </a> 
        </div>
        </div>
      </div>
</div>
</div>               




  </body>

  
  <footer>
  <?php include('footer2.php');?>
  </footer>
</html>
  