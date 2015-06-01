<?php
$uploadFolder = __DIR__ . '/uploads/';
$onlinePath = 'http://myblog.com/uploads/';
$target_file = $uploadFolder . basename($_FILES["file"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$response = array();

if (isset($_FILES['file'])) {
    $file = $_FILES['file'];
    $extension=pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = uniqid() . '.' . $extension;
//    echo json_encode(array('filename'=>$_FILES["file"]));
//    return;
    move_uploaded_file($file['tmp_name'], $uploadFolder . $filename);
    $response['filename'] = $onlinePath . $filename;

} else {
    $response['error'] = 'Error while uploading file';
}
echo json_encode($response);