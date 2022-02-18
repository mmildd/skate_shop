
<meta charset="UTF-8">
<?php
include('condb.php'); 

date_default_timezone_set('Asia/Bangkok');
//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
$date1 = date("Ymd_His");
//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
$numrand = (mt_rand());

$h_name = $_POST['h_name'];
$g_img = (isset($_POST['g_img']) ? $_POST['g_img'] : '');
	$img2 = $_POST['img2'];
	$upload=$_FILES['g_img']['name'];
	if($upload !='') { 
 
	//โฟลเดอร์ที่เก็บไฟล์
	$path="g_img/";
	//ตัวขื่อกับนามสกุลภาพออกจากกัน
	$type = strrchr($_FILES['g_img']['name'],".");
	//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
	$newname =$numrand.$date1.$type;
 
	$path_copy=$path.$newname;
	$path_link="g_img/".$newname;
	//คัดลอกไฟล์ไปยังโฟลเดอร์
	move_uploaded_file($_FILES['g_img']['tmp_name'],$path_copy);  
		
	}else {
		$newname = $img2;
	
	}

	
	

	$sql = "UPDATE shop SET  
			h_name='$h_name',
            g_img='$newname'
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