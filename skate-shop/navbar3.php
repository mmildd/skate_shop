<?php include('h2.php');?>
<?php include('h.php');?>
<?php
      $query_product = "SELECT * FROM shop ";
      $result_pro =mysqli_query($con, $query_product) or die ("Error in query: $query_product " . mysqli_error());
      $row_pro = mysqli_fetch_array($result_pro);
      ?>

<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #069;">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php" style="color: #fff;"><?php echo $row_pro["h_name"];?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
      <b class="nav-link disabled" tabindex="-1" aria-disabled="true" style="color: #fff;"><i class="fas fa-user"></i> <?php echo $m_name; ?></b>
        </li>
      </ul>
          

      <a href="logout.php" class="btn btn-light active" onclick="return confirm('คุณต้องการออกจากระบบหรือไม่?')">logout</a>
    
    </div>
  </div>
</nav>