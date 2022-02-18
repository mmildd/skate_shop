<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
 
//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
  $a_id = $_REQUEST["a_id"];
  $a_user = $_REQUEST["a_user"];
  $a_pass = hash('sha512',$_POST["a_pass"]); //pass จะ random ไปเรื่อยๆ ปลอดภัยสุด
  $a_name = $_REQUEST["a_name"];
  $a_email = $_REQUEST["a_email"];
  $a_tel = $_REQUEST["a_tel"];
 
//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
  
  $sql = "UPDATE admin SET  
      a_user='$a_user' , 
      a_pass='$a_pass' , 
      a_name='$a_name' ,
      a_email='$a_email' ,
      a_tel='$a_tel' 
      WHERE a_id='$a_id' ";
 
$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
mysqli_close($con); //ปิดการเชื่อมต่อ database 
 
//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result){
  echo "<script type='text/javascript'>";
  echo "alert('Update');";
  echo "window.location = 'admin_list.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to Update again');";
  echo "</script>";
}
?>