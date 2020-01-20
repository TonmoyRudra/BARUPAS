<?php
include('../../config.php');
//upload_file.php

if(isset($_FILES['upload']['name']))
{
 $target_path = '../upload/notices/';
 $file = $_FILES['upload']['tmp_name'];
 $file_name = $_FILES['upload']['name'];
 $file_name_array = explode(".", $file_name);
 $extension = end($file_name_array);
 $new_image_name = rand() . '.' . $extension;

 $target_path = dirname(__DIR__)."/".$target_path.$new_image_name;

//  print_r($target_path); exit;
 chmod($target_path, 0777);
 $allowed_extension = array("jpg", "jpeg", "gif", "png", "pdf", "doc", "docx", "zip");
 if(in_array($extension, $allowed_extension))
 {
  move_uploaded_file($file, $target_path);
  $function_number = $_GET['CKEditorFuncNum'];
//   $url = $target_path;
  $url = BASE_URL . 'upload/notices/' . $new_image_name;
  $message = '';
  echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
 }
}

?>
