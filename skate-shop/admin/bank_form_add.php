
<div class="container">
  <div class="row">
      <form  name="addbank" action="bank_form_add_db.php" method="POST" enctype="multipart/form-data"  class="form-horizontal">
        <div class="form-group">
          <div class="col-sm-9">
            <p> ชื่อธนาคาร</p>
            <input type="text"  name="b_name" class="form-control" required placeholder="ชื่อธนาคาร" />
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-9">
            <p> เลขบัญชี</p>
            <input type="text"  name="b_number" class="form-control" required placeholder="เลขบัญชี"/>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-9">
            <p> ชื่อบัญชี</p>
            <input type="text"  name="b_uname" class="form-control" required placeholder="ชื่อ"/>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-success" name="btnadd"> บันทึก </button>
            
          </div>
        </div>
      </form>
    </div>
  </div>