<?php

if(isset($_POST['submit'])) {
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_type = $_FILES['file']['type'];
    $array = explode('.', $_FILES['file']['name']);
    $file_ext = strtolower(end($array));
    $extensions = array("jpeg","jpg","png");

    if (in_array($file_ext, $extensions) === false) {
        echo "Extension not allowed, please choose a JPEG or PNG file.";
    } elseif ($file_size > 2097152) {
        echo 'File size must be less than 2 MB';
    } else {
        move_uploaded_file($file_tmp, "uploads/".$file_name);
        echo "Success!";
    }
}