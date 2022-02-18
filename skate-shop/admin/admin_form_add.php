<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Skate Shop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
</head>

<body>
<form  name="admin" action="admin_form_add_db.php" method="POST" id="admin" class="form-horizontal">

          <div class="form-group">
          <div class="col-sm-6" align="center"> เพิ่มแอดมิน </div><p></p>
            <div class="col-sm-3" align="left"> Name </div>
            <div class="col-sm-6" align="left">
              <input  name="a_name" type="text" required class="form-control" id="a_name" placeholder="Name" />
            </div><p></p>
          </div>

          <div class="form-group">
            <div class="col-sm-3" align="left"> Username  </div>
            <div class="col-sm-6" align="left">
              <input  name="a_user" type="text" required class="form-control" id="a_user" placeholder="username" pattern="^[a-zA-Z0-9]+$" title="ภาษาอังกฤษหรือตัวเลขเท่านั้น" minlength="2"  />
            </div><p></p>
          </div>
          
          <div class="form-group">
            <div class="col-sm-3" align="left"> Password  </div>
            <div class="col-sm-6" align="left">
              <input  name="a_pass" type="password" required class="form-control" id="a_pass" placeholder="password" pattern="^[a-zA-Z0-9]+$" minlength="2" />
            </div><p></p>
          </div>

          <div class="form-group">
        <div class="col-sm-3" align="left"> Email </div>
          <div class="col-sm-5" align="left">
            <input  name="a_email" type="email" class="form-control" id="a_email"   placeholder=" อีเมล์ example@hotmail.com"/>
          </div>
        </div><p></p>
        <div class="form-group">
        <div class="col-sm-3" align="left"> Tell </div>
          <div class="col-sm-5" align="left">
            <input  name="a_tel" type="text" class="form-control" id="a_tel"  placeholder="เบอร์โทร ตัวเลขเท่านั้น" />
          </div>
        </div><p></p>
          <p></p>
          <div class="form-group">
            <div class="col-sm-6" align="right">
              <button type="submit" class="btn btn-success btn-sm" id="btn"> <span class="glyphicon glyphicon-saved"></span> เพิ่มแอดมิน </button>      
            </div> 
          </div>
        </form>


  </body>
</html>