<?php

// Uploading file, set generated name, and set directory

foreach ($_FILES as $key => $file) {
    if ($file["error"] == 0) {
        $arr = explode("/", $file["type"]);
        $extension = end($arr);
        if (preg_match("/(png || jpg || jpeg)/", $extension)) {
            $name = mt_rand(1000000, 99999999);
            $name .= '.' . $extension;
            if (move_uploaded_file($file["tmp_name"], "directory_path" . $name)) {
                $img = $name;
            }
        }
    }
}