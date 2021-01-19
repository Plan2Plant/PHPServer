<?php
 # Display Errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


	# Define Variables
		$stage['planting'] = 0; 
		$stage['establishment'] = 0; 
		$stage['suckers_selection'] = 0; 
		$stage['growth'] = 0; 
		$stage['flower_diffrentiation'] = 0; 
		$stage['shooting'] = 0; 
		$stage['hands_opening'] = 0; 
		$stage['bunch_filling'] = 0; 
		$stage['harvest'] = 0; 

function stages ($stage,$temp_day, $temp_night, $humid,  $daylength, $wind) {

	if ($stage == 'planting') {
		return 1;
	}
	if ($stage == 'establishment') {
	# Establishment Stage 
		/* Day Temperature */
		$day_temperature_days = 30;
		$day_temperature_degree = 28;
		$day_temperature_reduce = 0.125;
		$day_temperature_increase = 0.3;
	}
	# ==============///   Planting Stage   \\\===============
		$stage['planting'] = 1; // Planting stage always 1; 
	             						                    	
	# ==============/// Establishment Stage \\\==============
		$establishment_data = 0;
		$stage['establishment'] = 0;
		## ======= Day Temperature =======
			if ($temp_day == 28) $stage['establishment']=0;
			// If Temperature Above 28c
			if ($temp_day > 28) {
				$temp_difference = $temp_day - 28;
				$establishment_data = 0.125*$temp_difference;
				$stage['establishment']= $stage['establishment']+$establishment_data; // Append Data
				/* Reset Data / $establishment_data = 0; / Reset Data */
			}
			// If Temperature Under 28c
			if ($temp_day < 28) {
				$temp_difference = 28 - $temp_day;
				$establishment_data = 0.3/30*$temp_difference; // Divide /30 because the datat is monthly .
				$stage['establishment']= $stage['establishment']-$establishment_data; // Append Data
				/* Reset Data / $establishment_data = 0; / Reset Data */
			}
		## ======= Night Temperature =======
			if ($temp_night == 26) $stage['establishment']=0;
			// If Temperature Above 28c
			if ($temp_night > 26) {
				$temp_difference = $temp_night - 26;
				$establishment_data = 0.04*$temp_difference;
				$stage['establishment']=$stage['establishment']+$establishment_data*-1; // Append Data
				/* Reset Data / $establishment_data = 0; / Reset Data */
			}
			// If Temperature Under 28c
			if ($temp_night < 26) {
				$temp_difference = 26 - $temp_night;
				$establishment_data = 0.08/30*$temp_difference; // Divide /30 because the datat is monthly .
				$stage['establishment']= $stage['establishment']+$establishment_data; // Append Data
				/* Reset Data / $establishment_data = 0; / Reset Data */
			}
		## ======= RH (Humid) =======
			if ($humid < 20) $error = "Humidity must be above 20%";
			if ($humid < 80 && $humid > 65) {
				$humid_difference = 80 - $humid;
				$establishment_data = 0.008/30*$humid_difference; // Divide /30 because the datat is monthly .
				$stage['establishment']= $stage['establishment']+$establishment_data; // Append Data
				/* Reset Data / $establishment_data = 0; / Reset Data */
			}
			if ($humid < 65 && $humid > 50) {
				$humid_difference = 65 - $humid;
				$establishment_data = 0.016/30*$humid_difference; // Divide /30 because the datat is monthly .
				$stage['establishment']= $stage['establishment']+$establishment_data; // Append Data
				/* Reset Data / $establishment_data = 0; / Reset Data */
			}
			if ($humid <= 50) {
				$humid_difference = 65 - $humid;
				$establishment_data = 0.035/30*$humid_difference; // Divide /30 because the datat is monthly .
				$stage['establishment']= $stage['establishment']+$establishment_data; // Append Data
				/* Reset Data / $establishment_data = 0; / Reset Data */
			}
		## ======= Day Length =======
			if ($daylength < 20) {
				$daylength_difference = 20 - $daylength; // at 20 hours speed up to 25 days, each 0.5 of an hour less, will add 0.27 days 
				$daylength_difference = $daylength_difference*2; // Multiple (*2) to convert from Hour to Half Hour
				$establishment_data = $daylength_difference*0.27;
				$stage['establishment']= $stage['establishment']+$daylength_difference; // Append Data
				/* Reset Data / $establishment_data = 0; / Reset Data */
			} 
		## ======= Wind (KMH) =======
			if ($wind > 15 && $wind >= 20) { // Till 15 won't influence, each 5 kmh will extend by 0.05 days
				$wind_difference = $wind - 15; // Get The Difference 
				$wind_difference = $wind_difference / 5; // Divide the differnce to get every 5 KMH 
				$wind_difference = floor($wind_difference); // Get int number 
				$wind_difference = $wind_difference * 0.05; // each 5 kmh will extend by 0.05 days
				$stage['establishment']= $stage['establishment']+$wind_difference; // Append Data

				/* Reset Data / $establishment_data = 0; / Reset Data */
			} 
	# ==============/// Suckers Selection Stage \\\==============


	echo '<a style="color:red">Day Temp: </a>'.$temp_day.'<br>';
	echo '<a style="color:red">Night Temp: </a>'.$temp_night.'<br>';
	echo '<a style="color:red">Establishment Stage: </a>'.$stage['establishment'].'<br>';
}



###### TEST Function ######
$temp_day = 28;
$temp_night = 23;
$humid = 28;
$daylength = 28;
$wind = 28;
stage2($temp_day, $temp_night, $humid,  $daylength, $wind);


?>
