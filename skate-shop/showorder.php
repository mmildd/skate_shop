<!DOCTYPE html>
<html>
<head>
<?php session_start();?>
<?php include('h.php');?>
<?php include('h2.php');
 $o_id = $_GET["id"];
 $mmm = $_SESSION['member_id'];
?>
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

</head>
<body>
  
   
<?php
      $query_product = "SELECT * FROM shop ";
      $result_pro =mysqli_query($con, $query_product) or die ("Error in query: $query_product " . mysqli_error());
      $row_pro = mysqli_fetch_array($result_pro);
      ?>

<img src="admin/g_img/<?php echo $row_pro['g_img']; ?>" width="100%" height="300">
      <?php include('navbar3.php');?>
    <div>
      <?php

       error_reporting( error_reporting() & ~E_NOTICE );
                //1. เชื่อมต่อ database:
                include('admin/condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง admin:
                $query = "SELECT * FROM order_detail AS d
                INNER JOIN product  AS p ON d.p_id=p.p_id 
                INNER JOIN member  AS m ON d.d_memberid=m.member_id 
                AND o_id = $o_id"  or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                $row_pro = mysqli_fetch_assoc($result);

                $query2 = "SELECT * FROM address 
                LEFT JOIN provinces ON provinces.id=address.a_provinces 
                LEFT JOIN amphures ON amphures.id=address.a_amphures
                LEFT JOIN districts ON districts.id=address.a_districts
                LEFT JOIN member ON member.member_id=address.member_id
                WHERE address.member_id = $mmm"  or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result2 = mysqli_query($con, $query2);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                $row_pro2 = mysqli_fetch_assoc($result2);

                
                //echo '<hr>';
                //echo $row_pro;
               // exit;
              
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
       
        <div class="card" style="width: 50rem;">
            <div class="card-body">

                <div class="row">
                        <div class="col-md-6">
                            <p>รหัสการสั่งซื้อ : <?php echo $row_pro["o_id"];?></p>
                            <p>
                                ที่อยู่การจัดส่ง : คุณ<?php echo $row_pro['m_name']; ?>
                                            เลขที่<?php echo $row_pro2['a_address']; ?>
                                            จ.<?php echo $row_pro2['pro_name_th']; ?>
                                            อ.<?php echo $row_pro2['am_name_th']; ?>
                                            ต.<?php echo $row_pro2['dis_name_th']; ?>
                                            <?php echo $row_pro2['a_zipcode']; ?>
                            </p>
                            <p>
                                วันที่สั่งซื้อ : <?php echo $row_pro["d_dttm"];?>
                            </p>
                            
                            <h5 >สถานะ : <b style="color:red">รอชำระเงิน</b></h5> 
                            

                        </div>
                </div>  
            </div> 

            <div class="card-body">
        
                <table class="table table-bordered border-info" width="100"  class="square">
                    <thead align="center">
                        <tr class="table-info">
                            <td align="center" bgcolor="#9d7ed5">รหัส</td>
                            <td align="center" bgcolor="#9d7ed5">สินค้า</td>
                            <td align="center" bgcolor="#9d7ed5">ราคา</td>
                            <td align="center" bgcolor="#9d7ed5">จำนวน</td>
                            <td align="center" bgcolor="#9d7ed5">รวม</td>
                        </tr>
                    </thead>

                    <?php foreach ($result as $row_pro) { ?>
                    <tbody>
                    <tr>
                        <td width="5%" align="center"><?php echo $row_pro['p_id']; ?> </td>
                        <td width="50%" ><?php echo $row_pro['p_name']; ?></td>
                        <td width="20%" align="center"><?php echo $row_pro['p_price']; ?></td>
                        <td width="5%" align="center"><?php echo $row_pro['d_qty']; ?></td>
                        <td width="20%" align="center" ><?php echo $row_pro['d_subtotal']; ?></td>
                       
                    </tr>
                    </tdody>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php } ?>
                </table>


                <table class="table " width="100"  class="square">

                        <tr class="table">
                            <td align="right" width="40%" bgcolor="#F9D5E3"> </td>
                            <td align="right" width="20%" bgcolor="#F9D5E3"> </td>
                            <td align="right" width="20%" bgcolor="#F9D5E3">รวม </td>
                            <td align="center"  width="20%" bgcolor="#F9D5E3"><?php echo $row_pro['o_total']; ?></td>
                        </tr>
                 
                </table>
                <div class="row">
                <div class="col-md-4" align="left">
                <form action="order_cancel.php" method="post"> 
                    <input type="hidden" name="o_id" value="<?php echo $o_id; ?>">
                    <button type="submit" class="btn btn-secondary btn-sm" onclick="return confirm('ยืนยันการยกเลิก')">ยกเลิกสั่งซื้อ</button>
                </form> </div>
                <div class="col-md-8" align="right">
                <a href="pay_bill.php?act=edit&ID=<?php echo $row_pro['o_id']; ?>" class="btn btn-danger btn-sm"> ชำระเงิน 
                    <input type="hidden" name="o_total" value="<?php echo $total;?>">
                    <input type="hidden" name="o_memberid" value="<?php echo $member_id;?>">
                    <input type="hidden" name="o_qty" value="<?php echo $o_qty;?>">
                </a> </div>
                </div>
            </div>
            </div>
    </div>
</body>

  
  <footer>
  <?php include('footer2.php');?>
  </footer>

</html>
  