<?php
require 'config/config.php';

$conn = mysqli_connect(HOST, USERNAME, PASWWORD, DATABASE);

if (mysqli_connect_error()) {
    echo mysqli_connect_error();
    exit();
}

echo 'Connected successfully.';