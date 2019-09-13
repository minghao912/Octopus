<?php
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['studentID'];

    /* print_r(var_dump($_POST));
    print_r();
    print_r($id); */

    if ($id == '1234') {
        //redirect("/upload/index.php?id=" . $id);
        exit;
    }
}