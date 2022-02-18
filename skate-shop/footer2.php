
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Pricing example · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/pricing/">

    <!-- Bootstrap core CSS -->
<link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
  </head>
  <body>
    
  <?php
      $query_product = "SELECT * FROM shop ";
      $result_pro =mysqli_query($con, $query_product) or die ("Error in query: $query_product " . mysqli_error());
      $row_pro = mysqli_fetch_array($result_pro);
      ?>

<?php include('h2.php');?>

<?php require_once('admin/condb.php');

	$query_type = "SELECT * FROM type ORDER BY type_id ASC";
	$result_type =mysqli_query($con, $query_type) or die ("Error in query: $query_type " . mysqli_error());
		// echo($query_type);
		// exit()

?>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check" viewBox="0 0 16 16">
    
    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
  </symbol>
</svg>
<div class="container py-3">
<footer class="pt-4 my-md-5 pt-md-5 border-top">
    <div class="row">
      <div class="col-5 col-md">
        <h5>Product</h5>
        <ul class="list-unstyled text-small">
          <?php
            foreach ($result_type as $row )  { ?>

            <a href="home.php?act=showbytype&type_id=<?php echo $row['type_id'];?>" class="link-secondary text-decoration-none"> 
              <?php echo $row["type_name"]; ?></a><br>

          <?php } ?>                      
        </ul>
      </div>
      <div class="col-5 col-md">
        <h5>About</h5>
        <ul class="list-unstyled text-small">
          <li class="mb-1"> <a class="link-secondary text-decoration-none" href="#">Location : <?php echo $row_pro["h_address"];?></a></li>
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="#">Tel : <?php echo $row_pro["h_tel"];?></a></li>
          <li class="mb-1"><a  class="link-secondary text-decoration-none" >
                    <i style="color:#495057" class="fab fa-facebook"></i> <?php echo $row_pro["h_fb"];?>
                  </a></li>
                  <li class="mb-1"> <a  class="link-secondary text-decoration-none" >
                  <i style="color:#495057" class="fab fa-instagram"></i> <?php echo $row_pro["h_fb"];?>
                  </a></li>
        </ul>
      </div>
      <div class="col-2 col-md">
        <h5>Each</h5>
        <ul class="list-unstyled text-small">
          <li class="mb-1"><a class="link-secondary text-decoration-none" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </footer>
    </div>