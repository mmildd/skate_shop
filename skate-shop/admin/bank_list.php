<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Bank List</title>
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
      <a  class="btn-info btn-sm" href="bank_list.php?act=add" data-bs-toggle="modal" data-bs-target="#addbank" data-bs-whatever="@mdo">
      Add Bank
        </a>
 
 <!-- add admin -->

 <div class="modal fade" id="addbank" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่ม Bank</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <form  name="addbank" action="bank_form_add_db.php" method="POST"  class="form-horizontal">
                  <div class="mb-3">
                  <label for="message-text" class="col-form-label">ชื่อธนาคาร:</label>
                    <input type="text"  name="b_name" class="form-control" required placeholder="ชื่อธนาคาร" />
                  </div>
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">เลขบัญชี:</label>
                    <input type="text"  name="b_number" class="form-control" required placeholder="เลขบัญชี"/>
                  </div>
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">ชื่อบัญชี:</label>
                    <input type="text"  name="b_uname" class="form-control" required placeholder="ชื่อ"/>
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
            include('bank_form_add.php');
          }elseif ($act == 'edit') {
            include('bank_form_edit.php');
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
                //2. query ข้อมูลจากตาราง :
                $query = "SELECT * FROM bank ORDER BY b_id ASC" or die("Error:" . mysqli_error());
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
          <thead align="center">
            <tr class="info" bgcolor='#c8a9fa'>    
            <th width="5%">id</th>
            <th >bank</th>
            <th >name</th>
            <th>number</th>
            <th width="5%">edit</th>
            <th width="5%">delete</th>
          </tr>
        </thead>
          <?php do {  $num++; ?>
          
            <tr>
            <td><?php echo $row_am['b_id']; ?></td>
            <td><?php echo $row_am['b_name']; ?></td>
              <td><?php echo $row_am['b_uname']; ?></td>
              <td><?php echo $row_am['b_number']; ?></td>
              <td align="center" ><a href="bank_list.php?act=edit&ID=<?php echo $row_am['b_id']; ?>" class="btn btn-warning btn-sm"> Edit </a> </td>
              <td align="center" ><a href="bank_del_db.php?ID=<?php echo $row_am['b_id']; ?>" class='btn btn-danger btn-sm'  onclick="return confirm('Do you want to delete this Bank? !!!')">Delete</a> </td>
            </tr>
        
            <?php } while ($row_am =  mysqli_fetch_assoc($result)); ?>
          
            </table></div></center>
                <!-- Content Wrapper. Contains page content -->


  </body>
</html>
  