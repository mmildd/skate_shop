<!DOCTYPE html>
<html>
<head>
<?php session_start();?>
<?php include('h.php');?>
<?php include('h2.php');?>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
  
   
    <img  src="img/bg1.png" class="img-fluid" alt="">
      <?php include('navbar3.php');
      $mmm = $_SESSION['member_id'];
      ?>
   
      <?php

	

       error_reporting( error_reporting() & ~E_NOTICE );
                //1. เชื่อมต่อ database:
                include('admin/condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง admin:

                //รอชำระเงิน
                $query = "SELECT * FROM order_head AS h
                INNER JOIN member  AS m 
                ON h.o_memberid = m.member_id
                INNER JOIN order_detail  as d 
                ON h.o_id = d.o_id 
                AND h.o_memberid = $mmm 
                AND h.o_status = 1
                GROUP BY d.o_id ASC" or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                $row_pro = mysqli_fetch_assoc($result);
               // echo $result;
                //exit;
                
                //ชำระเงินแล้ว
                $query2 = "SELECT * FROM order_head AS h
                INNER JOIN member  AS m 
                ON h.o_memberid = m.member_id
                INNER JOIN order_detail  as d 
                ON h.o_id = d.o_id 
                AND h.o_memberid = $mmm 
                AND h.o_status = 2
                GROUP BY d.o_id ASC" or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result2 = mysqli_query($con, $query2);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                $row_pro2 = mysqli_fetch_assoc($result2);


                //จัดส่งแล้ว
                $query3 = "SELECT * FROM order_head AS h
                INNER JOIN member  AS m 
                ON h.o_memberid = m.member_id
                INNER JOIN order_detail  as d 
                ON h.o_id = d.o_id 
                AND h.o_memberid = $mmm 
                AND h.o_status = 3
                GROUP BY d.o_id ASC" or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result3 = mysqli_query($con, $query3);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                $row_pro3 = mysqli_fetch_assoc($result3);

                //ยกเลิก
                $query4 = "SELECT * FROM order_head AS h
                INNER JOIN member  AS m 
                ON h.o_memberid = m.member_id
                INNER JOIN order_detail  as d 
                ON h.o_id = d.o_id 
                AND h.o_memberid = $mmm 
                AND h.o_status = 4
                GROUP BY d.o_id ASC" or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result4 = mysqli_query($con, $query4);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                $row_pro4 = mysqli_fetch_assoc($result4);


               

 
 //echo $row_pro2;
 //exit;
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
 
<nav style="width: 40rem;">
 <div class="nav nav-tabs " id="nav-tab" role="tablist">
   <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#pay" type="button" role="tab" aria-controls="nav-home" aria-selected="true">ที่ต้องชำระ
   
   </button>
   <button class="nav-link " id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#checkbill" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">ชำระแล้ว
    
   </button>
   <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#delivery" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">ที่ต้องได้รับ
    
   </button>
   <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#cancel" type="button" role="tab" aria-controls="nav-cancel" aria-selected="false">ยกเลิกแล้ว
    
   </button>
 </div>
</nav>

<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="pay" role="tabpanel" aria-labelledby="nav-home-tab">
  <div class="card" style="width: 50rem;">
      
  <form name="saveorder" action="pay_bill.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
      <table class="table table-hover table-warning table-striped" width="100" border="0"  class="square">
      
            <tr>
                <td width="100" colspan="10" bgcolor="#FFDDBB" align="center">
                    <strong><h4>ที่ต้องชำระ</strong>
                </td>
            </tr>
            <tr>
                <td align="center" bgcolor="#F9D5E3">รหัสการสั่งซื้อ</td>
                <td align="center" bgcolor="#F9D5E3">จำนวนรายการ</td>
                <td align="center" bgcolor="#F9D5E3">ราคารวม</td>
                <td align="center" bgcolor="#F9D5E3">สถานะ</td>
                <td align="center" bgcolor="#F9D5E3">วันที่ทำรายการ</td>
                <td align="center" bgcolor="#F9D5E3"></td>
            </tr>
            <?php foreach ($result as $row_pro) { ?>
          
          <tr>

            <td width="15%" align="center"><?php echo $row_pro['o_id']; ?> <a href="showorder.php?id=<?php echo $row_pro['o_id']; ?>" ><i class="fas fa-search-plus"></i></a></td>
            <td width="15%" align="center"><?php echo $row_pro['o_qty']; ?></td>
            <td width="10%" align="center"><?php echo $row_pro['o_total']; ?></td>
            <td width="15%" align="center" style="color:red">รอชำระเงิน</td>
            <td width="20%" align="center" ><?php echo $row_pro['o_dttm']; ?></td>
            <td align="center" ><a href="pay_bill.php?act=edit&ID=<?php echo $row_pro['o_id']; ?>" class="btn btn-danger btn-md"> ชำระเงิน 
            <input type="hidden" name="o_total" value="<?php echo $total;?>">
            <input type="hidden" name="o_memberid" value="<?php echo $member_id;?>">
            <input type="hidden" name="o_qty" value="<?php echo $o_qty;?>">
          </a> </td>
         
          </tr>
          
      
          <?php } ?>
        
        
      </table>
            </form>
        </div>

  </div>
  
  <div class="tab-pane fade " id="checkbill" role="tabpanel" aria-labelledby="nav-profile-tab">
  <div class="card" style="width: 50rem;">
      
      <table class="table table-hover table-warning table-striped" width="100" border="0"  class="square">
      
            <tr>
                <td width="100" colspan="8" bgcolor="#FFDDBB" align="center">
                    <strong><h4>ชำระเงินสำเร็จ</strong>
                </td>
            </tr>
            <tr>
                <td align="center" bgcolor="#F9D5E3">รหัสการสั่งซื้อ</td>
                <td align="center" bgcolor="#F9D5E3">จำนวนรายการ</td>
                <td align="center" bgcolor="#F9D5E3">ราคารวม</td>
                <td align="center" bgcolor="#F9D5E3">สถานะ</td>
                <td align="center" bgcolor="#F9D5E3">วันที่ทำรายการ</td>
            </tr>
            <?php foreach ($result2 as $row_pro2) { ?>
          
          <tr>

            <td width="5%" align="center"><?php echo $row_pro2['o_id']; ?> <a href="showorder_paid.php?id=<?php echo $row_pro2['o_id']; ?>" ><i class="fas fa-search-plus"></i></a></td>
            <td width="10%" align="center"><?php echo $row_pro2['o_qty']; ?></td>
            <td width="2%" align="center"><?php echo $row_pro2['h_total']; ?></td>
            <td width="5%" align="center" style="color:blue">ชำระเงินแล้ว</td>
            <td width="10%" align="center" ><?php echo $row_pro2['o_dttm']; ?></td>
           
          </tr>
          
      
          <?php } ?>
        
        
      </table>

        </div>

  </div>
  <div class="tab-pane fade" id="delivery" role="tabpanel" aria-labelledby="nav-contact-tab">
  <div class="card" style="width: 60rem;">
      
      <table class="table table-hover table-warning table-striped" width="100" border="0"  class="square">
      
            <tr>
                <td width="100" colspan="8" bgcolor="#FFDDBB" align="center">
                    <strong><h4>ที่ต้องได้รับ</strong>
                </td>
            </tr>
            <tr>
                <td align="center" bgcolor="#F9D5E3">รหัสการสั่งซื้อ</td>
                <td align="center" bgcolor="#F9D5E3">จำนวนรายการ</td>
                <td align="center" bgcolor="#F9D5E3">ราคารวม</td>
                <td align="center" bgcolor="#F9D5E3">วันที่จัดส่ง</td>
                <td align="center" bgcolor="#F9D5E3">Tracking</td>
            </tr>
            <?php foreach ($result3 as $row_pro3) { ?>
          
          <tr>

            <td width="5%" align="center"><?php echo $row_pro3['o_id']; ?> <a href="showorder_track.php?id=<?php echo $row_pro3['o_id']; ?>" ><i class="fas fa-search-plus"></i></a></td>
            <td width="10%" align="center"><?php echo $row_pro3['o_qty']; ?></td>
            <td width="2%" align="center"><?php echo $row_pro3['h_total']; ?></td>
            <td width="10%" align="center" ><?php echo $row_pro3['o_dttm']; ?></td>
            <td width="10%" align="center" style="color:#6610f2"><?php echo $row_pro3['o_ems']; ?></td>
          </tr>
          
      
          <?php } ?>
        
        
      </table>

        </div>

  </div>

  <div class="tab-pane fade" id="cancel" role="tabpanel" aria-labelledby="nav-contact-tab">
  <div class="card" style="width: 50rem;">
      
      <table class="table table-hover table-warning table-striped" width="100" border="0"  class="square">
      
            <tr>
                <td width="100" colspan="8" bgcolor="#FFDDBB" align="center">
                    <strong><h4>ยกเลิกสำเร็จ</strong>
                </td>
            </tr>
            <tr>
                <td align="center" bgcolor="#F9D5E3">รหัสการสั่งซื้อ</td>
                <td align="center" bgcolor="#F9D5E3">จำนวนรายการ</td>
                <td align="center" bgcolor="#F9D5E3">ราคารวม</td>
                <td align="center" bgcolor="#F9D5E3">วันที่ยกเลิก</td>
            </tr>
            <?php foreach ($result4 as $row_pro4) { ?>
          
          <tr>

            <td width="5%" align="center"><?php echo $row_pro4['o_id']; ?> <a href="showorder_cancel.php?id=<?php echo $row_pro4['o_id']; ?>" ><i class="fas fa-search-plus"></i></a></td>
            <td width="10%" align="center"><?php echo $row_pro4['o_qty']; ?>
          </td>
            <td width="2%" align="center"><?php echo $row_pro4['h_total']; ?></td>
            <td width="10%" align="center" ><?php echo $row_pro4['o_dttm']; ?></td>

           
          </tr>
          
      
          <?php } ?>
        
        
      </table>

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
  