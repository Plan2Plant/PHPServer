<?php 
include ('../../config.php');

function getAreasbyID ($conn) {
  $sql = "SELECT * FROM area";
  $result = $conn->query($sql);
  $i=0;
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      // echo $row['name'].'<br>';
      echo '<div class="alert alert-secondary" role="alert">
			  <h4><center>'.$row['name'].'</center></h4>';
			$xmlfile = '../../excel/'.$row['id'].'.xlsx';
	    	// echo $xmlfile;
	    	require_once('../simplexlsx.class.php');
    		$xlsx = new SimpleXLSX($xmlfile);
			// echo '<pre>'; print_r($xlsx->rows()); echo '</pre>';
			$output_xlsx = $xlsx->rows();
			?>
		      <div class="table-responsive">
		      	<!-- <?php //echo '<pre>'; print_r($output_xlsx); echo '</pre>';  ?> -->
		      	<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">Month</th>
				      <!-- <th scope="col">Name</th> -->
				      <th scope="col">Day Temperature</th>
				      <th scope="col">Night Temperature</th>
				      <th scope="col">Humidity</th>
				      <th scope="col">Day Length</th>
				      <th scope="col">Wind speed (km / h)</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php 
				  	$xlsx_count = 0;
				  		foreach ($output_xlsx as $row) {
				  			echo '<tr>';
				  			if ($xlsx_count == 0) {
				  				$xlsx_count++;
				  			} else {
				  				$first_row_count = 0;
					  			foreach ($row as $column) {
					  				if ($first_row_count == 1) { $first_row_count++; }
					  				elseif ($first_row_count == 0) { echo '<td style="font-weight:bold;">'.$column.'</td>'; $first_row_count++; }
					  				else { echo '<td>'.$column.'</td>'; $first_row_count++; }
							  	}
						  	}
						  	echo '</tr>';
						}
				  	?>
			
				  </tbody>
				</table>
		      </div>
		      <?php
	echo '</div>';
    }
  } else {
    echo "0 results";
  }
}
?>
    <!-- <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4"> -->
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Stages Data</h1>
      </div>


      <!-- <h2>The Data</h2> -->
      <div class="table-responsive">
		<?php getAreasbyID ($conn); ?>
      </div>
    <!-- </main> -->