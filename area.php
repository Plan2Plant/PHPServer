<?php
include ("config.php");
if (!isset($_GET['id'])) {
  # code...
  die("ERROR NO ID");
} else { $id = $_GET['id']; }
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
$data = getData($conn, $id);
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
      <div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <!-- <h1 class="h2">Dashboard</h1> -->
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="row">
            <div class="col-md-6">
              <h4>Plot Name: </h4>
            </div>
            <div class="col-md-6">
              <h4 style="text-align: right;"><?php echo $data['name'] ?></h4>
            </div>
          </div>
          <ul>
            <li><strong style="font-size:15px;">Average Humidity: </strong><small style="font-size:15px;"><?php echo $data['humidity'] ?></small></li>
            <li><strong style="font-size:15px;">Average Max Monthly temp: </strong><small style="font-size:15px;"><?php echo $data['max_temp'] ?></small></li>
            <li><strong style="font-size:15px;">Average. Min Monthly temp: </strong><small style="font-size:15px;"><?php echo $data['min_temp'] ?></small></li>
             <li><strong style="font-size:15px;">Recent Crop: </strong><small style="font-size:15px;">Watermelon</small></li>
            <li><strong style="font-size:15px;">Size: </strong><small style="font-size:15px;"><?php echo $data['size'] ?></small></li>
            <li><strong style="font-size:15px;">Soil texture: </strong><small style="font-size:15px;"><?php echo $data['soil'] ?></small></li>
          </ul>
          <span class="label label-info bg-info" style="padding: 4px 10% 4px 10%;font-size: 15px;font-weight: bold;color: #FFF;border-radius: 14px;">Geographical info</span>
          <ul style="margin-top:10px;">
            <li><strong style="font-size:15px;">Latitude: </strong><small style="font-size:15px;"><?php echo $data['latitude'] ?></small></li>
            <li><strong style="font-size:15px;">Longitude: </strong><small style="font-size:15px;"><?php echo $data['longitude'] ?></small></li>
            <li><strong style="font-size:15px;">Altitude: </strong><small style="font-size:15px;"><?php echo $data['altitude'] ?></small></li>
          </ul>
          <center><button class="btn btn-block btn-primary" data-toggle="collapse" href="#collapseExample" style="width:50%">PLAN</button></center>

            <div class="collapse" id="collapseExample">
            <div class="card card-body" style="margin-top:15px;">
              <strong><a style="color:red;">Option 1: </a>Banana: </strong><p><?php echo $data['banana'] ?>
            </div>
            <div class="card card-body" style="margin-bottom:5px; margin-top:5px;">
              <strong><a style="color:red;">Option 2: </a>Corn: </strong><p><?php echo $data['corn'] ?>
            </div>
            <div class="card card-body">
              <strong><a style="color:red;">Option 3: </a>Avocado: </strong><p><?php echo $data['avocado'] ?>
            </div>
            <center style="margin-top:5px; margin-bottom:5px;"><strong class="label">Why Did You Choose This Option? </strong></center>

          <div style="margin-bottom:5px; margin-bottom:5px;" align="" class="input-group" style="margin-top:10px">
            <div class="input-group-prepend">
              <span class="input-group-text">Note: </span>
            </div>
            <textarea class="form-control" aria-label="With textarea"></textarea>
            <button class="btn btn-small btn-primary">Save</button>
          </div>
          </div>

        </div>        
        <div class="col-md-8">
          <div id="mapid"></div>
        </div>        
      </div>
    </main>
  </div>
</div>
<div id="growth" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <strong>Banana: </strong><p><?php echo $data['banana'] ?></p>
        <strong>Corn: </strong><p><?php echo $data['corn'] ?></p>
        <strong>Avocado: </strong><p><?php echo $data['avocado'] ?></p>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="assets/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script> -->
        <script src="assets/dist/js/dashboard.js"></script>
        <script>
            var mymap = L.map('mapid').setView([<?php echo $data['latitude'] ?>,<?php echo $data['longitude'] ?>], 16);
          var popup = L.popup();
          L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoicW5peHNhbSIsImEiOiJja2lna3pxZHYwNDEzMndubGRnOTNub21wIn0.NEjyfTZHGqTLJ0BGsOcXtA', {
              attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
              maxZoom: 18,
              id: 'mapbox/streets-v11',
              tileSize: 512,
              zoomOffset: -1,
              accessToken: 'your.mapbox.access.token'
          }).addTo(mymap);

          omnivore.kml('kml/<?php echo $data['kml'] ?>').addTo(mymap);
          L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
              attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
          }).addTo(mymap);

          L.marker([<?php echo $data['latitude'] ?>,<?php echo $data['longitude'] ?>]).addTo(mymap)
              .bindPopup('<?php echo $data['name'] ?>')
              .openPopup();
          // var polygon = L.polygon([
          //     [35.587089,32.647341],
          //     [35.588277,32.644605],
          //     [35.589385,32.645084]
          // ]).addTo(mymap);

          // var popup = L.popup()
          //     .setLatLng([51.5, -0.09])
          //     .setContent("I am a standalone popup.")
          //     .openOn(mymap);


          // function onMapClick(e) {
          //     alert("You clicked the map at " + e.latlng);
          // }

          // mymap.on('click', onMapClick);


        </script>

</body>
</html>