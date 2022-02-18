<?php session_start();?>
<?php include('h.php');?>


<head>
  <style>
    body {
  background: url(img/woodwhite.jpeg);
  background-attachment: fixed;
  background-position: center;
  overflow-x: hidden;
}
  </style>
</head>
<body>
  

<?php
      $query_product = "SELECT * FROM shop ";
      $result_pro =mysqli_query($con, $query_product) or die ("Error in query: $query_product " . mysqli_error());
      $row_pro = mysqli_fetch_array($result_pro);
      ?>

<img src="admin/g_img/<?php echo $row_pro['g_img']; ?>" width="100%" height="400">

    <?php include('navbar.php');?>

    <div class="row">
      <div class="col-md-2">
        <?php include('menu.php'); ?>
      </div>

      <div class="col-md-10">
        <?php 
          $act = (isset($_GET['act']) ? $_GET['act'] : ''); //ตรวจสอบการประกาศค่าตัวแปร
          $q = (isset($_GET['q']) ? $_GET['q'] : ''); //รับค่า q เข้า
          if($act == 'showbytype'){
            //showproduct แยก type 
            include('show_product_type.php'); 

            //เรียกใช้ q เพื่อserch
          }elseif($q!=''){
            include('show_product_q.php'); 

          //showproduct type all
          }else{
          include('show_product.php'); 
        }
        ?>

      </div>
    </div>

  <footer>
  <?php include('footer.php');?>
  </footer>
</body>
</html>