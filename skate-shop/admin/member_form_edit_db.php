<meta charset="UTF-8">
<?php
//1. เชื่อมต่อ database: 
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
date_default_timezone_set('Asia/Bangkok');



//สร้างตัวแปรสำหรับรับค่าที่นำมาแก้ไขจากฟอร์ม
  $member_id = $_REQUEST["member_id"];
  $m_user = $_REQUEST["m_user"];
  $m_pass = hash('sha512',$_POST["m_pass"]); //pass จะ random ไปเรื่อยๆ ปลอดภัยสุด
  $m_name = $_REQUEST["m_name"];
  $m_email = $_REQUEST["m_email"];
  $m_tel = $_REQUEST["m_tel"];
  $a_address = $_REQUEST["a_address"];
  $provinces = $_REQUEST["provinces"];
  $amphures = $_REQUEST["amphures"];
  $districts = $_REQUEST["districts"];
  $zip_code = $_REQUEST["zip_code"];
  
//ทำการปรับปรุงข้อมูลที่จะแก้ไขลงใน database 
  
  $sql = "UPDATE member SET  
      m_user='$m_user', 
      m_pass='$m_pass', 
      m_name='$m_name',
      m_email='$m_email',
      m_tel='$m_tel'
      WHERE member_id='$member_id' ";

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

$sql2 = "UPDATE address SET  
      a_address='$a_address', 
      a_provinces='$provinces', 
      a_amphures='$amphures',
      a_districts='$districts',
      a_zipcode='$zip_code',
      member_id='$member_id'
      WHERE member_id='$member_id' ";

$result2 = mysqli_query($con, $sql2) or die ("Error in query: $sql2 " . mysqli_error());

mysqli_close($con); //ปิดการเชื่อมต่อ database 

//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
  
  if($result2){
  echo "<script type='text/javascript'>";
  echo "alert('Update');";
  echo "window.location = 'member_list.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to Update again');";
  echo "</script>";
}
?>