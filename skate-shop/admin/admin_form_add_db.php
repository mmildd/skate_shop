<?php
include('condb.php');
 
$a_user = $_POST['a_user'];
$a_pass = hash('sha512',$_POST["a_pass"]); //pass จะ random ไปเรื่อยๆ ปลอดภัยสุด
$a_name = $_POST['a_name'];
$a_email = $_POST['a_email'];
$a_tel = $_POST['a_tel'];

$check = "
	SELECT  a_user 
	FROM admin  
	WHERE a_user = '$a_user' 
	";
    $result1 = mysqli_query($con, $check) or die(mysqli_error());
    $num=mysqli_num_rows($result1);
 
    if($num > 0)
    {
    echo "<script>";
    echo "alert(' Username นี้มีผู้ใช้งานแล้ว!');";
    echo "window.history.back();";
    echo "</script>";
    }else{//เช็คข้อมูลซ้ำ
 
$sql ="INSERT INTO admin
    
    (a_user,  a_pass, a_name, a_email, a_tel) 
 
    VALUES 
 
    ('$a_user', '$a_pass', '$a_name', '$a_email', '$a_tel')";
    
    $result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
    mysqli_close($con);
    }
    
    if($result){
      echo "<script>";
      echo "alert('Add Admin Succesfuly');";
      echo "window.location ='admin_list.php'; ";
      echo "</script>";
    } else {
      
      echo "<script>";
      echo "alert('ERROR!');";
      echo "window.location ='admin_form_add.php'; ";
      echo "</script>";
    }
?>