<?php
if (isset($_GET['list'])) {
  if ($_GET['list']="list") {
    header('Location: statistic-list.php');
  }
}
include ("config.php");
function randomNum () {
  $min=1;
  $max=100;
  echo rand($min,$max);
}
function getChartData ($conn, $id, $year)
{
  $sql = "SELECT * FROM chart WHERE id='$id'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    $data[] ="";
    $i=0;
    while($row = $result->fetch_assoc()) {
      return ($row[$year]);
      // $i++;
    }
    return $data;
  } else {
    echo "0 results";
  }
}
if (!isset($_GET['type'])) {
  die("No Type");
} else { $type=$_GET['type']; }
if (!isset($_GET['id'])) {
  die("NO ID");
} else $id = $_GET['id'];
function getData ($conn, $id)
{
  $sql = "SELECT * FROM area WHERE id = '$id' LIMIT 1";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      return $row;
    }
  } else {
    echo "0 results";
  }
}
$data = getData ($conn, $id);
// die($type);
// $data = getDataChartName ($conn);
// print_r($data);
// getChartData ($conn, '1', '2016');
?>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Plan2Plant</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- OpenStreet Map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<script src='//api.tiles.mapbox.com/mapbox.js/plugins/leaflet-omnivore/v0.3.1/leaflet-omnivore.min.js'></script>
<script src='https://api.tiles.mapbox.com/mapbox.js/v1.6.1/mapbox.js'></script>
<link href='https://api.tiles.mapbox.com/mapbox.js/v1.6.1/mapbox.css' rel='stylesheet' />
 <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
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
  <style type="text/css">/* Chart.js */
    @-webkit-keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}@keyframes chartjs-render-animation{from{opacity:0.99}to{opacity:1}}.chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}
    #mapid { height: 80vh; }
  </style>
</head>
 <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Plan2Plant</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search"> -->
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap" style="display:none;">
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
              Map <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <span data-feather="map"></span>
              Map
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="statistic.php?list=list">
              <span data-feather="trending-up"></span>
              Statistic
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              About
            </a>

      </div>
    </nav>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Statistics: <?php echo $data['name']; ?></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>

        <div id="chartContainer" style="height: 85vh; width: 100%;">

    </main>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
        <script src="assets/dist/js/dashboard.js"></script>
  <script type="text/javascript">
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  theme: "light2", // "light1", "light2", "dark1", "dark2"
  title:{
    text: "<?php echo $type; ?>"
  },
  axisY: {
    title: "Weight(TONS)"
  },
  data: [{        
    type: "column",  
    showInLegend: true, 
    legendMarkerColor: "grey",
    legendText: "Years Range",
    dataPoints: [      
      { y: <?php echo getChartData ($conn, $id, '2015'); ?>, label: "2015" },
      { y: <?php echo getChartData ($conn, $id, '2016'); ?>,  label: "2016" },
      { y: <?php echo getChartData ($conn, $id, '2017'); ?>,  label: "2017" },
      { y: <?php echo getChartData ($conn, $id, '2018'); ?>,  label: "2018" },
      { y: <?php echo getChartData ($conn, $id, '2019'); ?>,  label: "2019" },
      { y: <?php echo getChartData ($conn, $id, '2020'); ?>, label: "2020" },
      { y: <?php echo getChartData ($conn, $id, '2021'); ?>,  label: "2021" },
      { y: <?php echo getChartData ($conn, $id, '2022'); ?>,  label: "2022" },
      { y: <?php echo getChartData ($conn, $id, '2023'); ?>,  label: "2023" },
      { y: <?php echo getChartData ($conn, $id, '2024'); ?>,  label: "2024" },
      { y: <?php echo getChartData ($conn, $id, '2025'); ?>,  label: "2025" }
    ]
  }]
});
chart.render();

}
</script>
      </body>
</html>
