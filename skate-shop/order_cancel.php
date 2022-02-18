
<meta charset="UTF-8">
<?php
include('admin/condb.php');  
date_default_timezone_set('Asia/Bangkok');


$o_id = $_POST['o_id'];


$sql1 =" SELECT * FROM order_detail

WHERE o_id = '$o_id'";

$result1 = mysqli_query($con, $sql1) or die(mysqli_error());
$count=mysqli_num_rows($result1);

while( $data = mysqli_fetch_array($result1)) {

		$p_id  =$data['p_id'];

		$d_qty  =$data['d_qty'];

		$sql2 ="SELECT * FROM product
		WHERE p_id = '$p_id' ";
		$result2 =  mysqli_query($con, $sql2) or die(mysqli_error());
		$data2 = mysqli_fetch_array($result2);

		for($i=0; $i<$count; $i++){
			$instock =  $data2['p_qty']; //จำนวนสินค้าที่มีอยู่
			
			$restore = $instock + $d_qty; //stock - order
			
			$sql3 = "UPDATE product
		SET p_qty = '$restore'
		WHERE p_id = '$p_id' ";
		mysqli_query($con,$sql3) or die( mysqli_error() );

			}

	
}
 

	$sql = "UPDATE order_head SET  
            o_status=4
			WHERE o_id='$o_id' ";

/*
echo $sql;
echo '<hr>';
echo $sql3;
echo '<hr>';
echo $sql2;
echo '<hr>';
echo $sql1;
echo '<hr>';
echo $p_id;*/
//exit;

$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());


mysqli_close($con); //ปิดการเชื่อมต่อ database 


	if($result){
echo "<script type='text/javascript'>";
echo "alert('ยกเลิก order สำเร็จ');";
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