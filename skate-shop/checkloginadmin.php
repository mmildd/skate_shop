<?php 
//print_r($_POST);
//exit();
session_start();
        if(isset($_POST['a_email'])){
                  include("admin/condb.php");
                  $a_email = $_POST['a_email'];
                  $a_pass = $_POST['a_pass'];

                  $a_pass = hash('sha512',$a_pass);

                  //echo $a_pass;
                  //echo '<br>';
                  //echo hash('sha512','user');
                 // exit;

                  $sql="SELECT * FROM admin 
                  WHERE  a_email='".$a_email."' 
                  AND  a_pass='".$a_pass."' ";
                  $result = mysqli_query($con,$sql);
				
                  if(mysqli_num_rows($result)==1){
                      $row = mysqli_fetch_array($result);

                      $_SESSION["user_id"] = $row["a_id"];
                      $_SESSION["a_name"] = $row["a_name"];
                      $_SESSION["a_user"] = $row["a_user"];
                      $_SESSION["a_email"] = $row["a_email"];
                      $_SESSION["a_tel"] = $row["a_tel"];
                      $_SESSION["login"] = true;

                      if($_SESSION["user_id"]!=''){ 

                        Header("Location: admin/index.php");
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