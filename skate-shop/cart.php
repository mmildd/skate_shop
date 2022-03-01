<?php session_start();?>
<?php include('h.php');?>
<?php include('h2.php');?>
<?php
	 error_reporting( error_reporting() & ~E_NOTICE );
	$p_id = $_GET['p_id']; 
	$act = $_GET['act'];

	if($act=='add' && !empty($p_id))
	{
		if(isset($_SESSION['cart'][$p_id]))
		{
			$_SESSION['cart'][$p_id]++;
		}
		else
		{
			$_SESSION['cart'][$p_id]=1;
		}
	}

	if($act=='remove' && !empty($p_id))  //ลบ
	{
		unset($_SESSION['cart'][$p_id]);
	}

	if($act=='update')
	{
		$amount_array = $_POST['amount'];
		foreach($amount_array as $p_id=>$amount)
		{
			$_SESSION['cart'][$p_id]=$amount;
		}
	}

    //cancel cart
    if($act=='cancel')
    {
        unset($_SESSION['cart']);
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="menu3.css" type="text/css" />
<title>Shopping Cart</title>
<?php include('h2.php');?>

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
   

      <div class="row">
      <div class="col-md-2">
	  <div id="menu">
          <ul>
            <li><a href="memberprofile.php" >Your Profile  <i class="fas fa-house-user"></i></a></li>
            <li><a href="cart.php" >Cart <i class="fas fa-shopping-cart"></i></a></li>
            <li><a href="order.php" >Order  <i class="fas fa-box-open"></i></a></li>
          </ul>
        </div>
      </div>
     
	  <div class="card" style="width: 65rem;">
<form id="frmcart" name="frmcart" method="post" action="?act=update">
<table class="table table-hover table-info table-striped" width="100" border="0"  class="square">
    <tr>
      <td colspan="6" align="center" bgcolor="#81b4fe">
      <b><h4>ตะกร้าสินค้า</span></td>
    </tr>
    <tr>
	  <td  align="center" bgcolor="#81b4fe">รูปสินค้า</td>
      <td bgcolor="#81b4fe">สินค้า</td>
      <td align="center" bgcolor="#8be3c9">ราคา</td>
      <td align="center" bgcolor="#afecda">จำนวน</td>
      <td align="center" bgcolor="#61c0cf">รวม(บาท)</td>
      <td align="center" bgcolor="#b2dfbc">ลบ</td>
    </tr>
<?php
$total=0;
if(!empty($_SESSION['cart']))
{
	include("admin/condb.php");
	foreach($_SESSION['cart'] as $p_id=>$qty)
	{
		$sql = "select * from product where p_id=$p_id";
		$query = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($query);
		$sum = $row['p_price'] * $qty;
		$total += $sum; //ราคารวม
		$p_qty = $row['p_qty']; //สินค้าในสต๊อก
		echo "<tr>";
		echo "<td align='center'>"."<img src='admin/p_img/".$row['p_img']."'width='100'>"  ."</td>";
		echo "<td width='334'>" 
		. $row["p_name"] 
		."<br>"
		.'stock : '
		.$row["p_qty"] 
		. "</td>";
		echo "<td width='46' align='right'>" .number_format($row["p_price"],2) . "</td>";
		echo "<td width='50' align='right'>";  
		echo "<input type='number' name='amount[$p_id]' value='$qty'  min='1' max='$p_qty'/></td>";
		echo "<td width='93' align='right'>".number_format($sum,2)."</td>";
		//remove product
		echo "<td width='46' align='center'><a href='cart.php?p_id=$p_id&act=remove'>ลบ</a></td>";
		echo "</tr>";
	}
	echo "<tr>";
  	echo "<td colspan='4' bgcolor='#CEE7FF' align='center'><b>ราคารวม</b></td>";
  	echo "<td align='right' bgcolor='#CEE7FF'>"."<b>".number_format($total,2)."</b>"."</td>";
  	echo "<td align='left' bgcolor='#CEE7FF'></td>";
	echo "</tr>";
}


?>
<tr>
<td><a href="home.php">กลับหน้ารายการสินค้า</a></td>
<td colspan="5" align="right">
    <input type="button" name="btncancel" value="ยกเลิกสั่งซื้อ" class='btn border-secondary btn-sm' onclick="window.location='cart.php?act=cancel';" />
    <input type="submit" name="button" id="button" value="ปรับปรุง" class='btn border-warning btn-sm'/>

	<?php if($act=='update'){ ?>
    <input type="button" name="Submit2" value="สั่งซื้อ" class='btn btn-danger btn-sm' onclick="window.location='confirm.php';" />
	<?php } ?>
	
</td>
</tr>
</table>
</form>
	</div>
	</div>
</body>
<footer>
  <?php include('footer2.php');?>
  </footer>
</html>