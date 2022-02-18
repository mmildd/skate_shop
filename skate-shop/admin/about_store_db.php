

<meta charset="UTF-8">
<?php
include('condb.php'); 

$h_address = $_POST['h_address'];
$h_tel = $_POST['h_tel'];
$h_fb = $_POST['h_fb'];
$h_ig = $_POST['h_ig'];
	// เพิ่มไฟล์เข้าไปในตาราง uploadfile
	

	$sql = "UPDATE shop SET  
			h_address='$h_address',
            h_tel='$h_tel',
            h_fb='$h_fb',
            h_ig='$h_ig'
			";

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

//exit;

	mysqli_close($con); //ปิดการเชื่อมต่อ database 


	if($result){
echo "<script type='text/javascript'>";
echo "alert('อัพโหลดสำเร็จ');";
echo "window.location = 'about_store.php'; ";
echo "</script>";
}
else{
echo "<script type='text/javascript'>";
echo "alert('Error back to upload again');";
echo "window.location = 'about_store.php'; ";
echo "</script>";
}
?>