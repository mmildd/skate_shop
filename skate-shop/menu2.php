<?php include('h2.php');?>

<?php require_once('admin/condb.php');

	$query_type = "SELECT * FROM type ORDER BY type_id ASC";
	$result_type =mysqli_query($con, $query_type) or die ("Error in query: $query_type " . mysqli_error());
		// echo($query_type);
		// exit()

?>
<link rel="stylesheet" href="menu.css" type="text/css" />
<div  id="menu"> 
<ul>
	<li>
	<?php
		foreach ($result_type as $row )  { ?>

		 <a href="home.php?act=showbytype&type_id=<?php echo $row['type_id'];?>" class="list-group-item list-group-item-action" style="background-color: #86cfda;"> 
		 	<?php echo $row["type_name"]; ?></a>

	<?php } ?>   
	</li>

  </ul>                   
</div>