<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Member List</title>
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
     
      
<?php 
include('condb.php'); 
include('h.php'); 
include('h2.php'); 
$sql_provinces = "SELECT * FROM provinces";
$query_provinces = mysqli_query($con,$sql_provinces);
?>

      <a  class="btn-info btn-sm" href="member_list.php?act=add" data-bs-toggle="modal" data-bs-target="#addmember" data-bs-whatever="@mdo">
      Add Member
        </a>
 
 <!-- add admin -->

 <div class="modal fade" id="addmember" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">เพิ่ม Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <form  name="register" action="member_form_add_db.php" method="POST" id="member">
                  <div class="mb-3">
                  <label for="message-text" class="col-form-label">Username:</label>
                  <input  name="m_user" type="text" required class="form-control" id="m_user"  title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2"  />
                  </div>
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">Password:</label>
                    <input  name="m_pass" type="password" required class="form-control" id="m_pass" placeholder="Password" pattern="^[a-zA-Z0-9]+$" minlength="2" />
                  </div>
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">Name:</label>
                    <input  name="m_name" type="text" required class="form-control" id="m_name" placeholder="ชื่อ-สกุล " />
                  </div>
      
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">Email:</label>
                    <input  name="m_email" type="email" class="form-control" id="m_email"   placeholder=" อีเมล์ example@hotmail.com"/>
                  </div>
      
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">Tell:</label>
                    <input  name="m_tel" type="text" class="form-control" id="m_tel" cols="20"  placeholder="เบอร์โทร ตัวเลขเท่านั้น" />
                  </div>
                 
                  <div class="mb-1">
                    <label for="message-text" class="col-form-label">Address</label> <hr></hr>
                    <div class="mb-3">
                      <label for="message-text" class="col-form-label">บ้านเลขที่:</label>
                        <input  name="a_address" type="text" class="form-control" id="a_address"  placeholder="บ้านเลขที่ หมู่ที่" />
                      <label for="message-text" class="col-form-label">จังหวัด:</label>
                      <select name="provinces" id="provinces">
                        <option value="" selected disabled>กรุณาเลือกจังหวัด</option>
                        <?php foreach ($query_provinces as $value_provinces){ ?>
                          <option value="<?=$value_provinces['id']?>"><?=$value_provinces['pro_name_th']?></option>
                        <?php } ?>
                      </select><br>
                      <label for="message-text" class="col-form-label">อำเภอ:</label>
                      <select name="amphures" id="amphures">
                       </select><br>
                      <label for="message-text" class="col-form-label">ตำบล:</label>
                      <select name="districts" id="districts">
                      </select><br>
                      <label for="message-text" class="col-form-label">รหัสไปรษณีย์:</label>
                      <input type="text" name="zip_code" class='form-control ' minlength="5" maxlength="5" id="zip_code"  readonly/>
                  </div>
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
            include('member_form_add.php');
          }elseif ($act == 'edit') {
            
            include('member_form_edit.php');
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

                $query = "SELECT * FROM address 
                          LEFT JOIN member ON member.member_id=address.member_id
                          LEFT JOIN provinces ON provinces.id=address.a_provinces 
                          LEFT JOIN amphures ON amphures.id=address.a_amphures
                          LEFT JOIN districts ON districts.id=address.a_districts" or die("Error:" . mysqli_error());
                //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result .
                $result = mysqli_query($con, $query);
                //4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล:
                $row_am = mysqli_fetch_assoc($result);

                $num=0;
                ?>
 
        <script>    
        $(document).ready(function() {
            $('#example1').DataTable( {
             // "aaSorting" :[[0,'ASC']],
            "lengthMenu":[[20,50, 100, -1], [20,50, 100,"All"]]
          });
        } );
        
          </script> <p></p>
        
          <table border="2" class="display table table-bordered" id="example1" align="center"  >
          <thead  >
            <tr class="info" bgcolor='#c8a9fa'>    
            <th width="5%">no</th>
            <th >m_user</th>
            <th>m_name</th>
            <th>m_tel</th>
            <th>m_email</th>
            <th>m_address</th>
            <th width="5%">edit</th>
            <th width="5%">delete</th>
          </tr>
        </thead>
          <?php do {  $num++; ?>
            <tr>
            <td><?php echo $num; ?></td>
              <td><?php echo $row_am['m_user']; ?></td>
              <td ><?php echo $row_am['m_name']; ?></td>
              <td><?php echo $row_am['m_tel']; ?></td>
              <td><?php echo $row_am['m_email']; ?></td>
              <td>
                <?php echo $row_am['a_address']; ?>
                <?php echo $row_am['pro_name_th']; ?>
                <?php echo $row_am['am_name_th']; ?>
                <?php echo $row_am['dis_name_th']; ?>
                <?php echo $row_am['a_zipcode']; ?>
              </td>
              <td align="center" ><a href="member_list.php?act=edit&ID=<?php echo $row_am['member_id']; ?>" class="btn btn-warning btn-sm"> Edit 
              <input type="hidden" name="provinces" value="<?php echo $row_am['pro_name_th']; ?>">
              <input type="hidden" name="amphures" value="<?php echo $row_am['am_name_th'];?>">
              <input type="hidden" name="districts" value="<?php echo $row_am['dis_name_th'];?>">
              </a> </td>
              <td align="center" ><a href="member_del_db.php?ID=<?php echo $row_am['member_id']; ?>" class='btn btn-danger btn-sm'  onclick="return confirm('Do you want to delete this member? !!!'')">Delete</a> </td>
            </tr>
            
            <?php } while ($row_am =  mysqli_fetch_assoc($result)); ?>
          
            </table></div></center>
                <!-- Content Wrapper. Contains page content -->



      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script type="text/javascript">
        $('#provinces').change(function(){
          var id_provinces = $(this).val();
          $.ajax({
            type: "post",
            url: "member_ajax.php",
            data: {id:id_provinces,function:'provinces'},
            success: function(data){
              $('#amphures').html(data);
              $('#districts').html(' ');
              $('#zip_code').val(' ');
            }
          });
        });
        $('#amphures').change(function(){
          var id_amphures = $(this).val();
          $.ajax({
            type: "post",
            url: "member_ajax.php",
            data: {id:id_amphures,function:'amphures'},
            success: function(data){
              //console.log(data);
              $('#districts').html(data);
              $('#zip_code').val(' ');
            }
          });
        });
        $('#districts').change(function(){
          var id_districts = $(this).val();
          $.ajax({
            type: "post",
            url: "member_ajax.php",
            data: {id:id_districts,function:'districts'},
            success: function(data){
              //console.log(data);
              $('#zip_code').val(data);
            }
          });
        });
      </script>
  </body>
</html>
  