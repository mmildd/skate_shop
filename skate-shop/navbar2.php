<?php include('h2.php');
 include('admin/condb.php');  
?>

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

        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #fff;">
              About
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="memberprofile.php" >Your Profile</a></li>
              <li><a class="dropdown-item" href="cart.php" >Cart</a></li>
              <li><a class="dropdown-item" href="order.php" >Order</a></li>
              <li><a class="dropdown-item" href="logout.php" >Log out</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <b class="nav-link disabled" tabindex="-1" aria-disabled="true" style="color: #fff;"><i class="fas fa-user"></i> <?php echo $m_name; ?></b>
        </li>
        <li class="nav-item">
        <a href="cart.php" class="btn position-relative"><i class="fas fa-shopping-cart" style="color: #fff;"></i>
        </a>
        </li>
      </ul>


      <form class="d-flex" action="home.php" method="GET">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q">
        <button class="btn btn-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>