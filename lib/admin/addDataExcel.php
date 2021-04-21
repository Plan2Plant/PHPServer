<?php
require_once('../../config.php');
  function getAreasList ($conn,$name) {
  $sql = "SELECT * FROM area";
  $result = $conn->query($sql);
  $i=0;
  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      if ($name == $row['name']) {
      ?>
        <option value="<?php echo $row['id']; ?>" selected><?php echo $row['name']; ?></option>

        <?php
    	} else {
    		?>
		<option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
    		<?php
    	}
        $i++;
      
    }
  } else {
    echo "0 results";
  }
}
if (isset($_GET['action'])) {
	$_getinfo = $_GET['action'];
	if ($_getinfo == 'step3') {
		if (isset($_POST['xmlfile'])) {
			// print_r($_POST);
			// die();
			copy($_POST['xmlfile'], '../../excel/'.$_POST['area'].'.xlsx');
			die("Done");
		} else die('ERROR');
	}
}
?>
 
    <!-- <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4"> -->
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Data ( From Excel File )</h1>
      </div>
      <!-- <h2>Add Data ( From Excel File )</h2> -->
      <div class="wrapper">
		<?php
if (isset($_GET['action'])) {
	$_getinfo = $_GET['action'];
	switch ($_getinfo) {
	  case "step2": // Read Uploaded File
	    if (isset($_GET['xmlfile'])) {
	    	$xmlfile = $_GET['xmlfile'];
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
				      <th scope="col">Name</th>
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
					  			foreach ($row as $column) {
							  		echo '<td>'.$column.'</td>';
							  	}
						  	}
						  	echo '</tr>';
						}
				  	?>
			
				  </tbody>
				</table>
		      </div>
		      <div class="alert alert-primary" role="alert">
		        <form id="insertosql" name="insertosql" action="POST">
		          <select class="form-control" id="arealist" name="area">
		          	<?php echo getAreasList($conn,$output_xlsx[1][1]); ?>
			      </select>
			      <input type="hidden" name="xmlfile" value="<?php echo $xmlfile; ?>">
			      <br>
			      <center><button type="submit" style="margin:0 auto;"class="btn btn-primary btn-lg shadow">Assign to Database</button></center>
			    </form>
			    <script>
			      $(function () {

			        $('#insertosql').on('submit', function (e) {

			          e.preventDefault();

			          $.ajax({
			            type: 'post',
			            url: 'lib/admin/addDataExcel.php?action=step3',
			            data: $('#insertosql').serialize(),
			            success: function (response) {
			              alert(response);
			            }
			          });

			        });

			      });
			    </script>
			  </div>
			<?php
	    }
	    break;
	  case "step3": // Insert Uploaded Files To Database
	    	

	    break;
	  case "step4": // None Yet
	    echo "Your favorite color is green!";
	    break;
	  default: // Upload files
	  	echo '';
	}
} else {
?>
      	<!-- <p style="text-align: center; font-size:20px; font-weight:bold;">Test</p> -->
      	<form>
		    <p><input type="file" name="file" class="file" required></p>
		    <input type="submit"  name="submit" class="btn btn-info submit" value="Submit">
		</form>
<?php
}
?>
      </div>
    <!-- </main> -->
    <script type="text/javascript">
    $(function() {
        $('.submit').on('click', function() {
            var file_data = $('.file').prop('files')[0];
            if(file_data != undefined) {
                var form_data = new FormData();                  
                form_data.append('file', file_data);
                $.ajax({
                    type: 'POST',
                    url: 'lib/admin/ajax_upload.php',
                    contentType: false,
                    processData: false,
                    data: form_data,
                    success:function(response) {
                        if(response == 'error') {
                            alert('Something went wrong. Please try again.');
                        } else {
                            alert('Done');
                            $('#main').html('<div class="text-center" style="margin-top:20rem;"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
			                var elresponse = response;
			                $.ajax({
			                    // data: {id: el.data('id')},
			                    url: 'lib/admin/addDataExcel.php?action=step2&xmlfile='+elresponse
			                }).done(function(response){
			                    $('#main').fadeOut(200, function() {
							      $("#main").html(response); 
							      $("#main").fadeIn();
							    });
			                });
                        }
  
                        $('.file').val('');
                    }
                });
            }
            return false;
        });
    });
</script>