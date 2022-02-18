<?php
include('admin/condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
	$date1 = date("Ymd_His");
	//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
	$numrand = (mt_rand());
	
  //สร้างตัวแปรเก็บค่าที่รับมาจากฟอร์ม
  $m_user = $_POST["m_user"];
  $m_pass = hash('sha512',$_POST["m_pass"]); //pass จะ random ไปเรื่อยๆ ปลอดภัยสุด
  $m_name = $_POST["m_name"];
  $m_email = $_POST["m_email"];
  $m_tel = $_POST["m_tel"];
  $a_address = $_POST["a_address"];
  $provinces = $_POST["provinces"];
  $amphures = $_POST["amphures"];
  $districts = $_POST["districts"];
  $zip_code = $_POST["zip_code"];



  $check = "
	SELECT  m_email
	FROM member  
	WHERE m_email = '$m_email'
	";
    $result1 = mysqli_query($con, $check) or die(mysqli_error());
    $num=mysqli_num_rows($result1);
 
    if($num > 0)
    {
    echo "<script>";
    echo "alert('  Email นี้มีผู้ใช้งานแล้ว!');";
    echo "window.history.back();";
    echo "</script>";
    }else{
     //เช็คข้อมูลซ้ำ

  //เพิ่มเข้าไปในฐานข้อมูล
  $sql = "INSERT INTO member(member_id,m_user, m_pass, m_name, m_email, m_tel)
       VALUES(null,'$m_user', '$m_pass', '$m_name', '$m_email', '$m_tel')";

  $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

  $sqls = "SELECT * FROM member ORDER BY member_id DESC";
  $results = mysqli_query($con, $sqls) or die ("Error in query: $sqls " . mysqli_error());
  $row2 = mysqli_fetch_array($results);
  $member_id = $row2['member_id'];

  $sql_add="INSERT INTO address (a_address, a_provinces, a_amphures, a_districts, a_zipcode, member_id)
           VALUES('$a_address', '$provinces', '$amphures', '$districts', '$zip_code', '$member_id')";
 $resultadd = mysqli_query($con, $sql_add) or die ("Error in query: $sql_add " . mysqli_error());

 //echo '<hr>';
//echo $member_id;
	//exit;


  //ปิดการเชื่อมต่อ database
  mysqli_close($con);
  //จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
    }


  if($resultadd){
  echo "<script type='text/javascript'>";
  echo "alert('Add Member Succesfuly');";
  echo "window.location = 'index.php'; ";
  echo "</script>";
  }
  else{
  echo "<script type='text/javascript'>";
  echo "alert('Error back to register again');";
  echo "</script>";
}
?>