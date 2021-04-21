<?php
$upload_dir = "uploads/"; // Upload Directory - Permission must be 777
if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777);
}
  
if ( move_uploaded_file($_FILES['file']['tmp_name'], $upload_dir . $_FILES['file']['name']) && is_writable($upload_dir) ) {
	echo ($upload_dir.$_FILES['file']['name']);
} else echo 'error';
  
// echo "success";
// die("error");