
<meta charset="UTF-8">
<?php
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
	//รับค่าไฟล์จากฟอร์ม

//print_r($_POST);
//echo '<hr>';
//exit;


$o_id = $_POST['o_id'];

	$sql = "UPDATE order_head SET  
            o_status=4
			WHERE o_id='$o_id' ";

//echo $sql;

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());


mysqli_close($con); //ปิดการเชื่อมต่อ database 


	if($result){
echo "<script type='text/javascript'>";
echo "alert('ยกเลิก order สำเร็จ');";
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