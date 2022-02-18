<html>
<head></head>
<body>

<?php 
include('condb.php'); 
include('h.php'); 
include('h2.php'); 
$sql_provinces = "SELECT * FROM provinces";
$query_provinces = mysqli_query($con,$sql_provinces);
?>

<form  name="register" action="member_form_add_db.php" method="POST" id="member">
       <div class="form-group">
        <div class="col-sm-6" align="center"> เพิ่มสมาชิก </div><p></p>
            <div class="col-sm-3" align="left"> Username </div>
          <div class="col-sm-5" align="left">
            <input  name="m_user" type="text" required class="form-control" id="m_user" placeholder="Username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2"  />
          </div>
      </div> <p></p>
        <div class="form-group">
            <div class="col-sm-3" align="left"> Password </div>
          <div class="col-sm-5" align="left">
            <input  name="m_pass" type="password" required class="form-control" id="m_pass" placeholder="Password" pattern="^[a-zA-Z0-9]+$" minlength="2" />
          </div>
        </div><p></p>
        <div class="form-group">
        <div class="col-sm-3" align="left"> Name </div>
          <div class="col-sm-5" align="left">
            <input  name="m_name" type="text" required class="form-control" id="m_name" placeholder="ชื่อ-สกุล " />
          </div>
        </div><p></p>
        <div class="form-group">
        <div class="col-sm-3" align="left"> Email </div>
          <div class="col-sm-5" align="left">
            <input  name="m_email" type="email" class="form-control" id="m_email"   placeholder=" อีเมล์ example@hotmail.com"/>
          </div>
        </div><p></p>
        <div class="form-group">
        <div class="col-sm-3" align="left"> Tell </div>
          <div class="col-sm-5" align="left">
            <input  name="m_tel" type="text" class="form-control" id="m_tel"  placeholder="เบอร์โทร ตัวเลขเท่านั้น" />
          </div>
        </div><p></p>
        <div class="form-group">
        <div class="col-sm-3" align="left"> Address </div>
        <div class="col-sm-5" align="left"> บ้านเลขที่
            <input  name="a_address" type="text" class="form-control" id="a_address"  placeholder="บ้านเลขที่ หมู่ที่" />
          </div>
          <div class="col-sm-8" align="left"> จังหวัด
            <select name="provinces" id="provinces">
              <option value="" selected disabled>กรุณาเลือกจังหวัด</option>
              <?php foreach ($query_provinces as $value_provinces){ ?>
                <option value="<?=$value_provinces['id']?>"><?=$value_provinces['pro_name_th']?></option>
              <?php } ?>
            </select><br>

            <label>อำเภอ</label>
            <select name="amphures" id="amphures">
            </select><br>

            <label>ตำบล</label>
            <select name="districts" id="districts">
            </select>

            <div class="col-sm-5" align="left">
            <label>รหัสไปรษณีย์</label>
              <input type="text"  name="zip_code" class='form-control ' minlength="5" maxlength="5" id="zip_code"  readonly/>
          </div>
          </div>
        </div><p></p>
       
      <div class="form-group">
          <div class="col-sm-5" align="right">
          <button type="submit" class="btn btn-success" id="btn"><span class="glyphicon glyphicon-ok"></span> เพิ่มสมาชิก  </button>
          </div>     
      </div>
      </form>
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