<?php
include ("../../config.php");
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


    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- OpenStreet Map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<script src='//api.tiles.mapbox.com/mapbox.js/plugins/leaflet-omnivore/v0.3.1/leaflet-omnivore.min.js'></script>


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


      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="col-md-12">
              <h4>Plot Name: </h4>
            </div>
            <div class="col-md-6">
              <h4 style="text-align: right;"><?php echo $data['name'] ?></h4>
            </div>
          </div>
<!--           <ul>
            <li><strong style="font-size:15px;">Average Humidity: </strong><small style="font-size:15px;"><?php echo $data['humidity'] ?></small></li>
            <li><strong style="font-size:15px;">Average Max Monthly temp: </strong><small style="font-size:15px;"><?php echo $data['max_temp'] ?></small></li>
            <li><strong style="font-size:15px;">Average. Min Monthly temp: </strong><small style="font-size:15px;"><?php echo $data['min_temp'] ?></small></li>
             <li><strong style="font-size:15px;">Recent Crop: </strong><small style="font-size:15px;">Watermelon</small></li>
            <li><strong style="font-size:15px;">Size: </strong><small style="font-size:15px;"><?php echo $data['size'] ?></small></li>
            <li><strong style="font-size:15px;">Soil texture: </strong><small style="font-size:15px;"><?php echo $data['soil'] ?></small></li>
          </ul> -->
<!--           <span class="label label-info bg-info" style="padding: 4px 10% 4px 10%;font-size: 15px;font-weight: bold;color: #FFF;border-radius: 14px;">Geographical info</span>
          <ul style="margin-top:10px;">
            <li><strong style="font-size:15px;">Latitude: </strong><small style="font-size:15px;"><?php echo $data['latitude'] ?></small></li>
            <li><strong style="font-size:15px;">Longitude: </strong><small style="font-size:15px;"><?php echo $data['longitude'] ?></small></li>
            <li><strong style="font-size:15px;">Altitude: </strong><small style="font-size:15px;"><?php echo $data['altitude'] ?></small></li>
          </ul> -->
          <center>
            <div class="row">
              <div class="col-md-4">
                <button class="btn btn-block btn-primary" data-toggle="collapse" href="#collapseExample" style="">OPTIONS</button>
              </div>
              <div class="col-md-4">
                <button onclick="window.location.href='statistic.php?id=<?php echo $data['id']; ?>&type=Banana'" class="btn btn-block btn-danger" style="">Statistics</button>
              </div>
              <div class="col-md-4"><button class="btn btn-block btn-info" data-toggle="collapse" href="#collapseExample2" style="">Growing Time Forecast</button></div>
            </div>
          </center>

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
          <!-- == The Function ==  -->
          <div class="collapse" id="collapseExample2">
            <div id="growing_time"></div>
            <script type="text/javascript">$(document).ready(function(){$('#growing_time').load('lib/growing_time.php?id=<?php echo $data['id']; ?>');});</script> 
          </div>

        </div>               
      </div>
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
<!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
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
