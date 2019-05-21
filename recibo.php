<?php
include('class.upload.php');
$handle = new upload($_FILES['image']);
if ($handle->uploaded) {
  $handle->file_new_name_body   = 'image_resized';

  $handle->image_resize         = true;
  $handle->image_x              = 100;
  $handle->image_ratio_y        = true;
  $handle->image_convert = 'jpg';
  $handle->process($_SERVER["DOCUMENT_ROOT"]);
  if ($handle->processed) {
    echo 'image resized';
    $handle->clean();
  } else {
    echo 'error : ' . $handle->error;
  }
}
  http_response_code(200);
  return json_encode(array(
      "ip" =>$_FILES['image']["type"]
  ));

// $_POST['image'];
// $repl = "_";
// $serc = " ";
// $nuovonome = basename($_FILES["image"]["name"]);
// $name = str_replace($serc, $repl, $nuovonome);
// list($base, $fin) = explode('.', $name);
// $temp = explode(".", $name);
// $extension = end($temp);
// $fecha = new DateTime();
// $newname = implode('.', [$base, $fecha->format('dmYHigF'), $extension]);

// move_uploaded_file($_FILES['image']["tmp_name"],"$newname");
?>