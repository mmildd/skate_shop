<?php
include('condb.php');

$type_name = $_POST['type_name'];

$check = "
	SELECT  type_name 
	FROM type  
	WHERE type_name = '$type_name' 
	";
    $result1 = mysqli_query($con, $check) or die(mysqli_error());
    $num=mysqli_num_rows($result1);
 
    if($num > 0)
    {
    echo "<script>";
    echo "alert(' Type นี้มีแล้ว!');";
    echo "window.history.back();";
    echo "</script>";
    }else{//เช็คข้อมูลซ้ำ

$sql ="INSERT INTO type
    
    (type_name) 

    VALUES 

    ('$type_name')";
    
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
    mysqli_close($con);

    }
    
    if($result){
      echo "<script>";
      echo "alert('Add Type Succesfuly');";
      echo "window.location ='type_list.php'; ";
      echo "</script>";
    } else {
      
      echo "<script>";
      echo "alert('ERROR!');";
      echo "window.location ='type_list.php'; ";
      echo "</script>";
    }
?>