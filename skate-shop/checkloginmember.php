<?php 
//print_r($_POST);
//exit();
session_start();
        if(isset($_POST['m_email'])){
                  include("admin/condb.php");
                  $m_email = $_POST['m_email'];
                  $m_pass = $_POST['m_pass'];
                  
                  $m_pass = hash('sha512',$m_pass);

                  //echo $m_pass;
                  //echo '<br>';
                  //echo hash('sha512','user');

                  $sql="SELECT * FROM member 
                  WHERE  m_email='".$m_email."' 
                  AND  m_pass='".$m_pass."' ";
                  $result = mysqli_query($con,$sql);
				
                  if(mysqli_num_rows($result)==1){
                      $row = mysqli_fetch_array($result);

                      $_SESSION["member_id"] = $row["member_id"];
                      $_SESSION["m_name"] = $row["m_name"];
                      $_SESSION["m_user"] = $row["m_user"];
                      $_SESSION["m_email"] = $row["m_email"];
                      $_SESSION["m_tel"] = $row["m_tel"];
                      $_SESSION["m_address"] = $row["m_address"];
                      $_SESSION["loginmember"] = true;

                      if($_SESSION["member_id"]!=''){ 

                        Header("Location: home.php");
                      }
                
                  }else{
                    echo "<script>";
                        echo "alert(\" email หรือ  password ไม่ถูกต้อง\");"; 
                        echo "window.history.back()";
                    echo "</script>";
 
                  }
        }else{

             Header("Location: index.php"); //user & password incorrect back to login again
 
        }
?>