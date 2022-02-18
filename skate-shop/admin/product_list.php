<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Product List</title>
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

      <a  class="btn-info btn-sm" href="product_list.php?act=add" data-bs-toggle="modal" data-bs-target="#addproduct" data-bs-whatever="@mdo">
      Add Product
        </a>

        <?php
//1. เชื่อมต่อ database:
include('condb.php');  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี
//2. query ข้อมูลจากตาราง tb_member:
$query1 = "SELECT * FROM type ORDER BY type_id asc" or die("Error:" . mysqli_error());
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
$result1 = mysqli_query($con, $query1);
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
?>
 <!-- add product -->

 <div class="modal fade" id="addproduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่ม Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <form  name="addproduct" action="product_form_add_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
                  <div class="mb-3">
                  <label for="message-text" class="col-form-label">ชื่อสินค้า:</label>
                  <input type="text"  name="p_name" class="form-control" required placeholder="ชื่อสินค้า" />
                  </div>
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">ราคาสินค้า:</label>
                    <input type="text"  name="p_price" class="form-control" required placeholder="ราคาสินค้า"/>
                  </div>
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">จำนวน:</label>
                    <input type="text"  name="p_qty" class="form-control" required placeholder="จำนวน"/>
                  </div>
      
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">ประเภทสินค้า:</label>
                    <select name="type_id" class="form-control" required>
                      <option value="type_id">ประเภทสินค้า</option>
                      <?php foreach($result1 as $results){?>
                      <option value="<?php echo $results["type_id"];?>">
                        <?php echo $results["type_name"]; ?>
                      </option>
                      <?php } ?>
                    </select>
                  </div>
      
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">รายละเอียดสินค้า:</label>
                    <textarea  name="p_detail" rows="5" cols="50"></textarea>
                  </div>

                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">ภาพสินค้า:</label>
                    <input type="file" name="p_img" id="p_img" class="form-control" />
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
            include('product_form_add.php');
          }elseif ($act == 'edit') {
            include('product_form_edit.php');
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
                $query = "
                SELECT * FROM product as p 
                INNER JOIN type  as t ON p.type_id=t.type_id 
                ORDER BY p.p_id DESC" or die("Error:" . mysqli_error());
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
            <th width="5%">no</th>
            <th width="5%">product id</th>
            <th >type</th>
            <th >name</th>
            <th>stock</th>
            <th>price</th>
            <th >img</th>
            <th width="5%">edit</th>
            <th width="5%">delete</th>
          </tr>
        </thead>
          <?php do { $num++; ?>
          
            <tr>
            <td><?php echo $num; ?></td>
            <td><?php echo $row_am['p_id']; ?></td>
              <td><?php echo $row_am['type_name']; ?></td>
              <td><?php echo $row_am['p_name']; ?></td>
              <td align="center"><?php echo $row_am['p_qty']; ?></td>
              <td align="center"><?php echo $row_am['p_price']; ?></td>
              <td align="center"><?php echo "<img src='p_img/".$row_am['p_img']."' width='200'>"."</td>"; ?></td>
              <td align="center" ><a href="product_list.php?act=edit&ID=<?php echo $row_am['p_id']; ?>" class="btn btn-warning btn-sm"> Edit </a> </td>
              <td align="center" ><a href="product_del_db.php?ID=<?php echo $row_am['p_id']; ?>" class='btn btn-danger btn-sm'  onclick="return confirm('Do you want to delete this product? !!!')">Delete</a> </td>
            </tr>
        
            <?php } while ($row_am =  mysqli_fetch_assoc($result)); ?>
          
            </table></div></center>
                <!-- Content Wrapper. Contains page content -->


  </body>
</html>
  