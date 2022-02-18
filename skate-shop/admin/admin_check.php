<meta charset="utf-8">
<?php
	$a_email = $_POST["a_email"];
 
	$check = "
	SELECT  a_email 
	FROM admin  
	WHERE a_email = '$a_email' 
	";
    $result1 = mysqli_query($con, $check) or die(mysqli_error());
    $num=mysqli_num_rows($result1);
 
    if($num > 0)
    {
    echo "<script>";
    echo "alert(' ข้อมูลซ้ำ กรุณาเพิ่มใหม่อีกครั้ง !');";
    echo "window.history.back();";
    echo "</script>";
    }else{
	
	$sql = "INSERT INTO admin
	(a_email)
	VALUES
	('$a_email')";
	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
 
}
	mysqli_close($con);
	if($result){
	echo "<script type='text/javascript'>";
	echo "alert('เพิ่มข้อมูลสำเร็จ');";
	echo "window.location = 'admin_list.php'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'admin_list.php'; ";
	echo "</script>";
}
?>