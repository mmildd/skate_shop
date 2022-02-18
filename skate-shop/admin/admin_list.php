<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin list</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
  <body>
    
    <?php include('h.php');
      error_reporting( error_reporting() & ~E_NOTICE );
      ?>
      <?php include('header.php');
      error_reporting( error_reporting() & ~E_NOTICE );
      ?>
      <br></br>
      <a  class="btn-info btn-sm" href="admin_list.php?act=add" data-bs-toggle="modal" data-bs-target="#addadmin" data-bs-whatever="@mdo">
      Add Admin
        </a>
 
 <!-- add admin -->

 <div class="modal fade" id="addadmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่ม admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form  name="admin" action="admin_form_add_db.php" method="POST" id="admin" class="form-horizontal">
                  <div class="mb-3">
                  <label for="message-text" class="col-form-label">Name:</label>
                  <input  name="a_name" type="text" required class="form-control" id="a_name" placeholder="Name" />
                  </div>
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">Username:</label>
                    <input  name="a_user" type="text" required class="form-control" id="a_user" placeholder="username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2"  />
                  </div>
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">Password:</label>
                    <input  name="a_pass" type="password" required class="form-control" id="a_pass" placeholder="password" pattern="^[a-zA-Z0-9]+$" minlength="2" />
                  </div>
      
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">Email:</label>
                    <input  name="a_email" type="email" class="form-control" id="a_email"   placeholder=" อีเมล์ example@hotmail.com"/>
                  </div>
      
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">Tell:</label>
                    <input  name="a_tel" type="text" class="form-control" id="a_tel"  placeholder="เบอร์โทร ตัวเลขเท่านั้น" />
                  </div>
      
      
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">save</button>
              </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      <?php
          $act = $_GET['act'];
          if($act == 'add'){
            include('admin_form_add.php');
          }elseif ($act == 'edit') {
            include('admin_form_edit.php');
          }
          elseif ($act == 'rwd') {
            include('admin_form_rwd.php');
          }
      ?>
 
    <p></p>
<center>
    <div class="col-md-9">
    <?php
      include('datatable.php');
       error_reporting( error_reporting() & ~E_NOTICE );
                //1. เชื่อมต่อ database:
                include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
                //2. query ข้อมูลจากตาราง admin:
                $query = "SELECT * FROM admin ORDER BY a_id ASC" or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                $row_am = mysqli_fetch_assoc($result);


                $num=0;
                ?>
 
        <script>    
        $(document).ready(function() {
            $('#example1').DataTable( {
              //"aaSorting" :[[0,'ASC']],
            "lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
          });
        } );
        
          </script> <p></p>
        
          <table border="2" class="display table table-bordered" id="example1" align="center"  >
          <thead  >
            <tr class="info" bgcolor='#c8a9fa'>    
            <th width="5%">no</th>
            <th >a_user</th>
            <th>a_name</th>
            <th>a_email</th>
            <th width="10%">a_tel</th>
            <th width="5%">edit</th>
            <th width="5%">delete</th>
          </tr>
        </thead>
          <?php do { 
            
            $num++;
            ?>
            <tr>
              <td><?php echo $num; ?></td>
              <td><?php echo $row_am['a_user']; ?></td>
              <td ><?php echo $row_am['a_name']; ?></td>
              <td><?php echo $row_am['a_email']; ?></td>
              <td ><?php echo $row_am['a_tel']; ?></td>
              <td align="center" ><a href="admin_list.php?act=edit&ID=<?php echo $row_am['a_id']; ?>" class="btn btn-warning btn-sm" > Edit </a> </td>
              <td align="center" ><a href="admin_del_db.php?ID=<?php echo $row_am['a_id']; ?>" class='btn btn-danger btn-sm'  onclick="return confirm('Do you want to delete this admin? !!!'')">Delete</a> </td>
            </tr>
        
            <?php } while ($row_am =  mysqli_fetch_assoc($result)); ?>
          
            </table></div></center>
                <!-- Content Wrapper. Contains page content -->


  </body>
</html>
  