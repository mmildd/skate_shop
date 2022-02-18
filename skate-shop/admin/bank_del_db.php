<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//สร้างตัวแปรสำหรับรับค่า a_id จากไฟล์แสดงข้อมูล
$b_id = $_REQUEST["ID"];
 
//ลบข้อมูลออกจาก database ตาม a_id ที่ส่งมา
 
$sql = "DELETE FROM bank WHERE b_id='$b_id' ";
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('Delete Succesfuly');";
  echo "window.location = 'bank_list.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to delete again');";
  echo "</script>";
}
?>