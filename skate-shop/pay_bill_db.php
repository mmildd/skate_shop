<?php

//echo $_FILES['o_img']['name'];
//exit;

?>

<meta charset="UTF-8">
<?php
include('admin/condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//Set ว/ด/ป เวลา ให้เป็นของประเทศไทย
date_default_timezone_set('Asia/Bangkok');
	//สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลด
	//รับค่าไฟล์จากฟอร์ม
$b_id = $_POST['b_id'];
$o_img_date = $_POST['o_img_date'];
$o_img_total = $_POST['o_img_total'];
$o_id = $_POST['ID'];
$o_img =(isset($_POST['o_img']) ? $_POST['o_img'] :'');
//img
$date1 = date("Ymd_His");
	//สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
	$numrand = (mt_rand());
	$upload=$_FILES['o_img'];
	if($upload <> '') {
 
	//โฟลเดอร์ที่เก็บไฟล์
	$path="o_img/";
	//ตัวขื่อกับนามสกุลภาพออกจากกัน
	$type = strrchr($_FILES['o_img']['name'],".");
	//ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
	$newname ='slip'.$numrand.$date1.$type;
	$path_copy=$path.$newname;
	$path_link="o_img/".$newname;
	//คัดลอกไฟล์ไปยังโฟลเดอร์
	move_uploaded_file($_FILES['o_img']['tmp_name'],$path_copy);
	}else{
        $newname='';
    }
	// เพิ่มไฟล์เข้าไปในตาราง uploadfile
	

	$sql = "UPDATE order_head SET  
			b_id='$b_id',
            o_img_date='$o_img_date',
			o_img_total='$o_img_total', 
            o_status=2,
			o_img='$newname'
			WHERE o_id='$o_id' ";

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());



	mysqli_close($con); //ปิดการเชื่อมต่อ database 


	if($result){
echo "<script type='text/javascript'>";
echo "alert('แจ้งชำระเงินสำเร็จ');";
echo "window.location = 'order.php'; ";
echo "</script>";
}
else{
echo "<script type='text/javascript'>";
echo "alert('Error back to upload again');";
echo "window.location = 'order.php'; ";
echo "</script>";
}
?>