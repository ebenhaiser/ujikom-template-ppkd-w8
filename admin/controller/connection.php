<?php

$connection = mysqli_connect("localhost", "root", "", "angkatan3_laundry");

if (!$connection) {
    echo "Unable to connect";
    die;
}
