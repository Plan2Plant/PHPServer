<?php
include('../../config.php');
require_once('../stages.php');
?>
    <!-- <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4"> -->
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Stages List</h1>
      </div>
<?php
$array_values = array_values($json2php);
$array_keys = array_keys($json2php['Stages']);
// print_r($array_values);
// print_r($array_keys);
$stage_count = 0;
?>
<?php
foreach ($json2php['Stages'] as  $x => $val) {
  // echo '<pre>'; print_r($x); echo '</pre><hr>';
  // echo '<pre>'; print_r($val); echo '</pre><hr>';
  if ($stage_count == 0) {

?>
<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php echo $stage_count; ?>" aria-expanded="false" aria-controls="collapse<?php echo $stage_count; ?>">
          <?php print_r($x); ?>
        </button>
      </h2>
    </div>
    <div id="collapse<?php echo $stage_count; ?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <?php echo '<pre>'; print_r($val); echo '</pre>'; ?>
      </div>
    </div>
  </div>
<?php
  } else {

?>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php echo $stage_count; ?>" aria-expanded="false" aria-controls="collapse<?php echo $stage_count; ?>">
          <?php print_r($x); ?>
        </button>
      </h2>
    </div>
    <div id="collapse<?php echo $stage_count; ?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        <?php echo '<pre>'; print_r($val); echo '</pre>'; ?>
      </div>
    </div>
  </div>
  <?php
	 } // Else END
	 $stage_count++;
	} // Foreach End
   ?>
</div>
      
    <!-- </main> -->