<?php
include ("config.php");

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title><?php echo $website_title; ?> - Admin</title>

    <link rel="canonical" href="https://getbootstrap.comassets/examples/dashboard/">

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Favicons -->
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="assets/dist/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#"><strong><?php echo $website_title; ?></strong> Dashboard</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="#">Sign out</a>
    </li>
  </ul>
</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" href="#">
              <span data-feather="home"></span>
              Dashboard <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a id="dashboard" class="nav-link" href="#">
              <span data-feather="file"></span>
              Dashboard
            </a>
          </li>
<!--           <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Integrations
            </a>
          </li> -->
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Planting Stages</span>
          <a id="addDataExcel" class="nav-link d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a id="stagesList" class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Stages List
            </a>
          </li>
          <li class="nav-item">
            <a id="stagesData" class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Stages Data
            </a>
          </li>
          <li class="nav-item">
            <a id="addDataExcel" class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Add Data (Excel)
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Debug (Unity)
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main id="main" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>


      <!-- <h2>Section title</h2> -->
      <div class="table-responsive">
      	<center><h1 style="color:#007BFF;">Welcome To Admin Dashboard</h1></center>
      </div>
    </main>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
      <!-- <script>window.jQuery || document.write('<script src="assets/assets/js/vendor/jquery.slim.min.js"><\/script>')</script> -->
      <script src="assets/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="assets/dist/js/dashboard.js"></script>
        <script>
        $( document ).ready(function() {
            $(document).on('click', '.nav-link', function(){
            	$('#main').html('<div class="text-center" style="margin-top:20rem;"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>'); // Loading Status
                var el = $(this);
                $.ajax({
                    // data: {id: el.data('id')},
                    url: 'lib/admin/'+el.attr('id')+'.php'
                }).done(function(response){
                    $('#main').fadeOut(200, function() {
				      $("#main").html(response);  // After The Load
				      $("#main").fadeIn();
				    });
                });
                
                return false;
            });
        });
        </script>
    </body>
</html>
