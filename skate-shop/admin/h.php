<?php session_start(); 
include('condb.php');
error_reporting( error_reporting() & ~E_NOTICE );
  $user_id = $_SESSION['user_id'];
  $a_name = $_SESSION['a_name'];
  $a_user = $_SESSION['a_user'];
 	if(!$_SESSION['login']){
    Header("Location: ../logout.php");  
    exit;
  }  
?>