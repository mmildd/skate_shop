

<?php 

    $type_id = $_GET['type_id'];
    //echo $type_id;
    //exit();


    $query_product_type = "SELECT * FROM product as p 
    INNER JOIN type as t
    ON p.type_id = t.type_id
    WHERE p.type_id =  $type_id 
    ORDER BY p.p_id ASC";
    $result_pro =mysqli_query($con, $query_product_type) or die ("Error in query: $query_product_type " . mysqli_error());
    //echo($query_product_type);
       // exit()

?>

<div class="row">

<?php foreach ($result_pro as $row_pro) { ?>

<div class="card text-black " style="width: 20rem; margin-top: 10px;">
<img src="admin/p_img/<?php echo $row_pro['p_img']; ?>" class="card-img-top" alt="..." style="height: 70%; width: 100%; ">
<div class="card-body">

  <h5 class="card-title"><?php echo $row_pro['p_name']; ?></h5> 
  <p class="card-text"><?php echo $row_pro['p_price']; ?>฿</p>

  <?php if($row_pro['p_qty'] > 0){ ?>
  <a href="cart.php?p_id=<?php echo $row_pro['p_id']; ?>&act=add" class="btn btn-info" onclick="return alert('เพิ่มสินค้าลงในตระกร้า')"><i class="fas fa-cart-plus"></i></a>
  <?php } else{
    echo '<button class="btn btn-danger" disabled><i class="fas fa-times"></i></button>';
  }?>

<button class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#detail<?php echo $row_pro['p_id']?>" data-bs-whatever="@mdo">detail</button>   
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;
  <a class="card-title text-secondary"><?php echo $row_pro['p_qty']; ?></a> 
</div>
</div>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<!-- detail-->
<div class="modal fade" id="detail<?php echo $row_pro['p_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo $row_pro["p_name"];?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="mb-3">
                  <?php echo"<img src='admin/p_img/".$row_pro['p_img']."'width='100%'>";?>
                  </div>
                  <div class="mb-3">
                  <p>
                ประเภท : <?php echo $row_pro["type_name"];?>
              </p>
              <p>
                ราคา : <b style="color:red"><?php echo $row_pro["p_price"];?>฿</b>
              </p>
              <?php echo $row_pro["p_detail"];?>
                 <p> 
                  </div>
      
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
              </div>
             
              </div>
            </div>
          </div>
        </div>
<?php } ?>





</div>