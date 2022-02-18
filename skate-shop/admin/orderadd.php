<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Order</title>
  <?php session_start();?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
  <body>


    
  <?php include('h.php');
      error_reporting( error_reporting() & ~E_NOTICE );
      include('datatable.php');
      ?>
      
      <br></br>
      
      <?php

	

       error_reporting( error_reporting() & ~E_NOTICE );
                //1. เชื่อมต่อ database:
                include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง admin:

                //รอชำระเงิน
                $query = "SELECT * FROM order_head AS h
                INNER JOIN member  AS m 
                ON h.o_memberid = m.member_id
                INNER JOIN order_detail  as d 
                ON h.o_id = d.o_id 
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
                AND h.o_status = 4
                GROUP BY d.o_id ASC" or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result4 = mysqli_query($con, $query4);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                $row_pro4 = mysqli_fetch_assoc($result4);

 
                //query status=1
                $status1="SELECT o_status, COUNT(o_id) as s1total FROM order_head WHERE o_status=1 GROUP BY o_status";
                $rs1=mysqli_query($con,$status1);
                $rows1=mysqli_fetch_array($rs1);

                //query status=2
                $status2="SELECT o_status, COUNT(o_id) as s2total FROM order_head WHERE o_status=2 GROUP BY o_status";
                $rs2=mysqli_query($con,$status2);
                $rows2=mysqli_fetch_array($rs2);

                //query status=3
                $status3="SELECT o_status, COUNT(o_id) as s3total FROM order_head WHERE o_status=3 GROUP BY o_status";
                $rs3=mysqli_query($con,$status3);
                $rows3=mysqli_fetch_array($rs3);

                //query status=4
                $status4="SELECT o_status, COUNT(o_id) as s4total FROM order_head WHERE o_status=4 GROUP BY o_status";
                $rs4=mysqli_query($con,$status4);
                $rows4=mysqli_fetch_array($rs4);

                
                
               // echo $status1;
 //echo $row_pro2;
 //exit;
 ?>

 <script>    
        $(document).ready(function() {
            $('#example1').DataTable( {
             // "aaSorting" :[[0,'ASC']],
            "lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
          });
        } );
        
          </script> <p></p>
      
      
      <div class="col-md-10">
 
 <nav style="width: 40rem;">
 <div class="nav nav-tabs " id="nav-tab" role="tablist">
   <button class="nav-link " id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#pay" type="button" role="tab" aria-controls="nav-home" aria-selected="true">ยังไม่ชำระ
    <span class="badge bg-info"><?php echo $rows1['s1total']; ?></span>
   </button>
   <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#checkbill" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">ที่ต้องจัดส่ง
    <span class="badge bg-danger"><?php echo $rows2['s2total']; ?></span>
   </button>
   <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#delivery" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">จัดส่งแล้ว
    <span class="badge bg-info"><?php echo $rows3['s3total']; ?></span>
   </button>
   <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#cancel" type="button" role="tab" aria-controls="nav-cancel" aria-selected="false">ยกเลิกแล้ว
    <span class="badge bg-info"><?php echo $rows4['s4total']; ?></span>
   </button>
 </div>
</nav>

<div class="tab-content" id="nav-tabContent">
 <div class="tab-pane fade " id="pay" role="tabpanel" aria-labelledby="nav-home-tab">
 <div class="card" style="width: 60rem;">
     
 
     <table class="table table-hover table-info table-striped" width="100" border="0"  class="square">
     
           <tr>
               <td width="100" colspan="10" bgcolor="#FFDDBB" align="center">
                   <strong><h4>ยังไม่ชำระ</strong>
               </td>
           </tr>
           <tr>
               <td align="center" bgcolor="#F9D5E3">รหัสการสั่งซื้อ</td>
               <td align="center" bgcolor="#F9D5E3">จำนวนรายการ</td>
               <td align="center" bgcolor="#F9D5E3">ราคารวม</td>
               <td align="center" bgcolor="#F9D5E3">สถานะ</td>
               <td align="center" bgcolor="#F9D5E3">วันที่ทำรายการ</td>
               <td align="center" bgcolor="#9d7ed5">ผ่านมา</td>
           </tr>
           <?php foreach ($result as $row_pro) {
             $o_id=$row_pro['o_id'];
             ?>
         
         <tr>

           <td width="15%" align="center"><?php echo $row_pro['o_id']; ?> <a href="orderadd_wait.php?id=<?php echo $row_pro['o_id']; ?>" ><i class="fas fa-search-plus"></i></a></td>
           <td width="15%" align="center"><?php echo $row_pro['o_qty']; ?></td>
           <td width="10%" align="center"><?php echo $row_pro['o_total']; ?></td>
           <td width="15%" align="center" style="color:red">รอชำระเงิน</td>
           <td width="20%" align="center" ><?php echo $row_pro['o_dttm']; ?></td>
           <td width="20%"  align="center">
                 <?php 
                  $o_dttm = date('Y-m-d', strtotime($row_pro['o_dttm'])); // วันที่สั่งซื้อ
                  $datenow = date('Y-m-d');
                  //echo 'วันที่สั่งซื้อ '.$o_dttm;
                  ///echo '<br>';
                  //echo 'วันที่ปัจจุบัน '.$datenow;
                  $caldate = round(abs(strtotime("$o_dttm") - strtotime("$datenow"))/60/60/24); 
                  echo $caldate. 'วัน';
                  echo '<br>';
                  if($caldate > 7){
                    echo "<a href='orderadd_wait.php?id=$o_id&do=order_cancel' class='btn btn-danger' target='_blank'>ยกเลิก</a>";
                  }else{
                    echo '-';
                  }
                 ?>
          </td>
          
         </tr>
         
     
         <?php } ?>
       
       
     </table>
       </div>

 </div>
 
 <div class="tab-pane fade show active" id="checkbill" role="tabpanel" aria-labelledby="nav-profile-tab">
 <div class="card" style="width: 50rem;">
     
     <table class="table table-hover table-info table-striped" width="100" border="0"  class="square">
     
           <tr>
               <td width="100" colspan="8" bgcolor="#FFDDBB" align="center">
                   <strong><h4>ที่ต้องจัดส่ง</strong>
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

           <td width="5%" align="center"><?php echo $row_pro2['o_id']; ?> <a href="orderadd_track.php?id=<?php echo $row_pro2['o_id']; ?>" ><i class="fas fa-search-plus"></i></a></td>
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
     
     <table class="table table-hover table-info table-striped" width="100" border="0"  class="square">
     
           <tr>
               <td width="100" colspan="8" bgcolor="#FFDDBB" align="center">
                   <strong><h4>จัดส่งแล้ว</strong>
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

           <td width="5%" align="center"><?php echo $row_pro3['o_id']; ?> <a href="orderadd_com.php?id=<?php echo $row_pro3['o_id']; ?>" ><i class="fas fa-search-plus"></i></a></td>
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
     
     <table class="table table-hover table-info table-striped" width="100" border="0"  class="square">
     
           <tr>
               <td width="100" colspan="8" bgcolor="#FFDDBB" align="center">
                   <strong><h4>ยกเลิกแล้ว</strong>
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

           <td width="5%" align="center"><?php echo $row_pro4['o_id']; ?> <a href="orderadd_cancel.php?id=<?php echo $row_pro4['o_id']; ?>" ><i class="fas fa-search-plus"></i></a></td>
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

 
</html>
  