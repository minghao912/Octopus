<?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['files'])) {
        $errors = [];
        $path = '../uploads/';
        $extensions = ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'java', 'jar', 'zip'];

        $all_files = count($_FILES['files']['tmp_name']);

        for ($i = 0; $i < $all_files; $i++) {
            $file_name = $_FILES['files']['name'][$i];
            $file_tmp = $_FILES['files']['tmp_name'][$i];
            $file_type = $_FILES['files']['type'][$i];
            $file_size = $_FILES['files']['size'][$i];
            $file_ext = strtolower(end(explode('.', $_FILES['files']['name'][$i])));

            $date = new DateTime();
            $fileSuffix = $date->format('Ymd-His');
            $fileNoExt = substr($file_name, 0, (strrpos($file_name, ".")));

            //$destpath = $path . $file_name;
            $destpath = $path . $fileNoExt . '_' . $fileSuffix . '.' . $file_ext;

            //If the file is not in the approved extensions list or too big
            if (!in_array($file_ext, $extensions)) {
                $errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
            } if ($file_size > 131072000) {
                $errors[] = 'File size exceeds limit: ' . $file_name . ' ' . $file_type;
            }

            //If no errors, move file to /uploads folder
            if (empty($errors)) {
                move_uploaded_file($file_tmp, $destpath);
                print_r('File ' . $file_name . ' sucessfully transferred.');
            }
        }

        if ($errors) print_r($errors);
    }
}