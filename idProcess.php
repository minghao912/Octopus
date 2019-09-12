<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['studentID'];

    print_r(var_dump($_POST));
    print_r();
    print_r($id);
}