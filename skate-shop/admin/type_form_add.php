<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Skate Shop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
</head>

<body>
<div class="container">
  <p> </p>
    <div class="row">
      <div class="col-md-12">
        <form  name="admin" action="type_form_add_db.php" method="POST" id="admin" class="form-horizontal">
          <div class="form-group">
          <div class="col-sm-6" align="left"> Type of Product  </div>
            <div class="col-sm-9" align="left">
              <input  name="type_name" type="text" required class="form-control" id="type_name" placeholder="ประเถทสินค้า"  title="" minlength="2"  />
            </div>
          </div><p></p>
          <div class="form-group">
            <div class="col-sm-9" align="right">
              <button type="submit" class="btn btn-success btn-sm" id="btn"> Save </button>      
            </div> 
          </div>
        </form>
      </div>
    </div>
</div>



</body>
</html>