<meta charset="UTF-8">
<?php
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด

	//รับค่าไฟล์จากฟอร์ม
$b_name = $_POST['b_name'];
$b_number = $_POST['b_number'];
$b_uname = $_POST['b_uname'];

	// เพิ่มไฟล์เข้าไปในตาราง uploadfile
	

		$sql = "INSERT INTO bank
		(
		b_name,
		b_number,
		b_uname
		)
		VALUES
		(
		'$b_name',
		'$b_number',
		'$b_uname')";
		
		$result = mysqli_query($con, $sql);// or die ("Error in query: $sql " . mysqli_error());
	
	mysqli_close($con);
	// javascript แสดงการ upload file
	
	
	if($result){
echo "<script type='text/javascript'>";
echo "alert('Add Succesfuly');";
echo "window.location = 'bank_list.php'; ";
echo "</script>";
}
else{
echo "<script type='text/javascript'>";
echo "alert('Error back to upload again');";
echo "window.location = 'bank_list.php'; ";
echo "</script>";
}
?>