
<meta charset="UTF-8">
<?php
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
	//รับค่าไฟล์จากฟอร์ม
$o_ems = $_POST['o_ems'];
$o_id = $_POST['o_id'];
$o_ems_date = date('Y-m-d H:i:s');

	$sql = "UPDATE order_head SET  
			o_ems='$o_ems',
            o_status=3,
            o_ems='$o_ems',
			o_ems_date='$o_ems_date'
			WHERE o_id='$o_id' ";

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());


mysqli_close($con); //ปิดการเชื่อมต่อ database 


	if($result){
echo "<script type='text/javascript'>";
echo "alert('แจ้งเลขไปรษณีย์สำเร็จ');";
echo "window.location = 'index.php'; ";
echo "</script>";
}
else{
echo "<script type='text/javascript'>";
echo "alert('Error back to upload again');";
echo "window.location = 'index.php'; ";
echo "</script>";
}
?>