<?php

$connection = mysqli_connect("localhost", "root", "", "ujikom_template");

if (!$connection) {
    echo "Unable to connect";
    die;
}
