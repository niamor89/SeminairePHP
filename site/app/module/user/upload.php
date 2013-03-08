<?php
$items = array();
$file_dir = 'assets/img/avatar';
if (!file_exists($file_dir))
	mkdir($file_dir, 0755, true);

foreach($_FILES as $file){
	//var_dump($file);
	if (!$file['error']) {
	  $item = array();
	  $file_path = $file_dir . '/' . $file['name'];
	   move_uploaded_file($file['tmp_name'], $file_path);

	  unset($file['tmp_name']);
	  unset($file['error']);
	  $item += $file;
	 	 
	  $items[] = $items;
	  
	$_SESSION['avatar'] = '/'.$file_path;
	$row = update_avatar('/'.$file_path);
	}
}

?>