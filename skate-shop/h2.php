<?php 
include('admin/condb.php');
error_reporting( error_reporting() & ~E_NOTICE );
  $member_id = $_SESSION['member_id'];
  $m_name = $_SESSION['m_name'];
  $m_user = $_SESSION['m_user'];
 
  if(!$_SESSION['loginmember']){
    Header("Location: logout.php");  
    exit;
  }  
 
?>