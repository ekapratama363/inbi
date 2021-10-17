<?php

function upload_file($file, $dir)
{
    $filename = $file['name'];
    $ext      = pathinfo($filename, PATHINFO_EXTENSION);

    $target_dir  = "uploads/$dir/";
    $target_file = $target_dir . basename($filename);

    if ($ext != "jpg" && $ext != "png" && $ext != "jpeg" && $ext != "gif") {
        $message = 'The filetype you are attempting to upload is not allowed.';
        return $message;
    } else if ($file["size"] > 2000000) {
        $message = 'Sorry, your file is too large.';
        return $message;
    } else {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $filename;
        } else {
            $message = 'Upload image failed';
            return $message;
        }
    }
}