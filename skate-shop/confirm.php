<?php
	session_start();
    include("admin/condb.php");  
?>
<!DOCTYPE html>
<html>
<head>
<?php include('h.php');?>
<?php include('h2.php');?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Checkout</title>

<style>
    body {
  background: url(img/woodwhite.jpeg);
  background-attachment: fixed;
  background-position: center;
  overflow-x: hidden;
}
  </style>
</head>

<body>
<?php
      $query_product = "SELECT * FROM shop ";
      $result_pro =mysqli_query($con, $query_product) or die ("Error in query: $query_product " . mysqli_error());
      $row_pro = mysqli_fetch_array($result_pro);
      ?>

<img src="admin/g_img/<?php echo $row_pro['g_img']; ?>" width="100%" height="300">
    <?php include('navbar3.php');?>

   <br></br>


<form name="saveorder" action="saveorder.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
  <table width="600" border="0" align="center" class="square">
    <tr>
      <td width="1558" colspan="4" bgcolor="#FFDDBB" align="center">
      <strong><h4>สั่งซื้อสินค้า</strong></td>
    </tr>
    <tr>
      <td bgcolor="#F9D5E3">สินค้า</td>
      <td align="center" bgcolor="#F9D5E3">ราคา</td>
      <td align="center" bgcolor="#F9D5E3">จำนวน</td>
      <td align="center" bgcolor="#F9D5E3">รวม/รายการ</td>
    </tr>
<?php
	$total=0;
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql	= "select * from product where p_id=$p_id";
		$query	= mysqli_query($con, $sql);
		$row	= mysqli_fetch_array($query);
		$sum	= $row['p_price']*$qty;
		$total	+= $sum;
    $o_qty += $qty;
    echo "<tr>";
    echo "<td>" . $row["p_name"] . "</td>";
    echo "<td align='right'>" .number_format($row['p_price'],2) ."</td>";
    echo "<td align='right'>$qty</td>";
    echo "<td align='right'>".number_format($sum,2)."</td>";
    echo "</tr>";
	}
	echo "<tr>";
    echo "<td  align='right' colspan='3' bgcolor='#F9D5E3'><b>รวม</b></td>";
    echo "<td align='right' bgcolor='#F9D5E3'>"."<b>".number_format($total,2)."</b>"."</td>";
    echo "</tr>";
?>
</table>


<center>
<div class="card border-warning mb-3 text-left" style="max-width: 600px;">

  <input type="hidden" name="o_total" value="<?php echo $total;?>">
  <input type="hidden" name="h_total" value="<?php echo $total;?>">
  <input type="hidden" name="o_memberid" value="<?php echo $member_id;?>">
  <input type="hidden" name="d_memberid" value="<?php echo $member_id;?>">
  <input type="hidden" name="o_qty" value="<?php echo $o_qty;?>">
  <button type="submit" value="สั่งซื้อ" class="btn btn-primary"  name="btnadd">ยืนยันการสั่งซื้อ</button>

  
  </div>
</div>

</form>


</body>
</html>