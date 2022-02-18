<?php
	session_start();
    include("admin/condb.php");  
?>
<?php include('h2.php');?>
<meta charset=utf-8 >


<!--สร้างตัวแปรสำหรับบันทึกการสั่งซื้อ -->
<?php

	//echo '<pre>';
	//print_r($_SESSION);
	//echo '</pre>';

	//echo '<hr>';

	//echo '<pre>';
	//print_r($_POST);
	//echo '</pre>';
	//exit;

	$o_memberid = $_POST["o_memberid"];
	$d_memberid = $_POST["o_memberid"];
	$h_total = $_POST["h_total"];
	$o_total = $_POST["o_total"];
	$o_qty = $_POST["o_qty"];

	$o_dttm = Date("Y-m-d G:i:s");
	

	//บันทึกการสั่งซื้อลงใน order_head
	mysqli_query($con, "BEGIN"); 

	$sql1	= "INSERT INTO order_head 
	VALUES
	(
	 null, 
	 '$o_dttm',
	 '$o_memberid',
	 '$o_qty',
	 '$h_total',
	 1,
	 0,
	 '',
	 '0000-00-00',
	 0.00,
	 '',
	 '0000-00-00 00:00:00'
	 )";
	$query1	= mysqli_query($con, $sql1) ; //connect to db

    //echo '<hr>';
	//echo $sql1;

    $sql2 = "SELECT MAX(o_id) 
	AS o_id 
	FROM order_head 
	WHERE o_memberid='$o_memberid' AND o_dttm='$o_dttm' ";
	$query2	= mysqli_query($con, $sql2);
	$row2 = mysqli_fetch_array($query2);
	$o_id = $row2["o_id"];

	//echo '<hr>';
	//echo $o_id;
    //echo '<hr>';
	//echo $sql2;

    foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql3	= "SELECT * FROM product WHERE p_id=$p_id";
		$query3	= mysqli_query($con, $sql3);
		$row3	= mysqli_fetch_array($query3);
		$d_subtotal	= $row3['p_price']*$qty;
		$d_dttm = Date("Y-m-d G:i:s");
		$count=mysqli_num_rows($query3);
	 

		$sql4	= "INSERT INTO order_detail 
		VALUES
		(null, 
		'$o_id', 
		'$p_id',
		'$d_memberid', 
		'$qty', 
		'$d_subtotal',
		'$o_total',
		'$d_dttm')";
		$query4	= mysqli_query($con, $sql4); //connect to db

    //echo '<hr>';
	//echo $sql4;
	

	for($i=0; $i<$count; $i++){
		$instock =  $row3['p_qty']; //จำนวนสินค้าที่มีอยู่
		
		$updatestock = $instock - $qty; //stock - order
		
		$sql5 = "UPDATE product SET  
		   p_qty=$updatestock
		   WHERE  p_id=$p_id ";
		$query5 = mysqli_query($con, $sql5) or die ("Error in query: $sql5 " . mysql_error($sql5));
		}

		
    }
	//exit;

    if($query1 && $query4){
        mysqli_query($con, "COMMIT");
		$msg = "สั่งซื้อสำเร็จ รอชำระเงิน";
		foreach($_SESSION['cart'] as $p_id)
		{	
			//unset($_SESSION['cart'][$p_id]);
			unset($_SESSION['cart']);
        }
    }
	else{
		mysqli_query($con, "ROLLBACK");  
		$msg = "สั่งซื้อไม่สำเร็จ กรุณาติดต่อเจ้าหน้าที่ค่ะ ";	
	}
	?>
    <script type="text/javascript">
	alert("<?php echo $msg;?>");
	window.location ='showorder.php?id=<?php echo $o_id;?>';
</script>