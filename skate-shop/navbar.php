<?php
      $query_product = "SELECT * FROM shop ";
      $result_pro =mysqli_query($con, $query_product) or die ("Error in query: $query_product " . mysqli_error());
      $row_pro = mysqli_fetch_array($result_pro);
      ?>

<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #e374ab;">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><?php echo $row_pro["h_name"];?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            login
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#login" data-bs-whatever="@mdo">login</a></li>
            <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#loginadmin" data-bs-whatever="@mdo">login admin</a></li>
            <li><a class="dropdown-item" href="member_form_add.php" data-bs-toggle="modal" data-bs-target="#register" data-bs-whatever="@mdo">Register</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Please login</a>
        </li>
      </ul>

     <!-- login member -->
        <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form name="formlogin" action="checkloginmember.php" method="POST" id="login" class="form-horizontal">
                  <div class="mb-3">
                  <label for="message-text" class="col-form-label">Email:</label>
                  <input type="text"  name="m_email" class="form-control" required placeholder="Email" />
                  </div>
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">Password:</label>
                    <input type="password" name="m_pass" class="form-control" required placeholder="Password" />
                  </div>
      
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
              </form>
              </div>
            </div>
          </div>
        </div>

        <!-- login admin -->
        <div class="modal fade" id="loginadmin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login Admin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form name="formlogin" action="checkloginadmin.php" method="POST" id="login" class="form-horizontal">
                  <div class="mb-3">
                  <label for="message-text" class="col-form-label">Email:</label>
                  <input type="text"  name="a_email" class="form-control" required placeholder="Email" />
                  </div>
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">Password:</label>
                    <input type="password" name="a_pass" class="form-control" required placeholder="Password" />
                  </div>
      
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Login</button>
              </div>
              </form>
              </div>
            </div>
          </div>
        </div>

         <!-- Register member -->
         <?php $sql_provinces = "SELECT * FROM provinces";
$query_provinces = mysqli_query($con,$sql_provinces); ?>
         <div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <form name="formlogin" action="member_form_add_sha512_db.php" method="POST" id="login" class="form-horizontal">
                <div class="mb-3">
                  <label for="message-text" class="col-form-label">Username:</label>
                  <input  name="m_user" type="text" required class="form-control" id="m_user" placeholder="Username" minlength="2"  />
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
                    <label for="message-text" class="col-form-label">Tel:</label>
                    <input  name="m_tel" type="text" class="form-control" id="m_tel"  placeholder="เบอร์โทร ตัวเลขเท่านั้น" />
                  </div><p>
          
                  <div class="mb-3">
                    <label for="message-text" class="col-form-label">Address</label><hr></hr>
                    <div class="col-sm-5" align="left"> บ้านเลขที่
                    <input  name="a_address" type="text" class="form-control" id="a_address"  placeholder="บ้านเลขที่ หมู่ที่" />
                  </div><p>
                  <div class="col-sm-8" align="left"> <label>จังหวัด</label>
                    <select name="provinces" id="provinces">
                      <option value="" selected disabled>กรุณาเลือกจังหวัด</option>
                      <?php foreach ($query_provinces as $value_provinces){ ?>
                        <option value="<?=$value_provinces['id']?>"><?=$value_provinces['pro_name_th']?></option>
                      <?php } ?><p>
                    </select><br><p>
                    <p>
                    <label>อำเภอ</label>
                    <select name="amphures" id="amphures">
                    </select><br>
                    <p>
                    <label>ตำบล</label>
                    <select name="districts" id="districts">
                    </select>
                    <p>
                    <div class="col-sm-5" align="left">
                    <label>รหัสไปรษณีย์</label>
                      <input type="text"  name="zip_code" class='form-control ' minlength="5" maxlength="5" id="zip_code"  readonly/>
                  </div>
                  </div>
                </div>
                  </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Register</button>
              </div>
              </form>
              </div>
            </div>
          </div>
        </div>

      <form class="d-flex" action="index.php" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q">
        <button class="btn btn-success" type="submit">Search</button>
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
    </div>
  </div>
</nav>