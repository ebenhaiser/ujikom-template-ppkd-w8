<?php
include 'controller/connection.php';
$query = mysqli_query($connection, "SELECT * FROM user");
$row = mysqli_fetch_assoc($query);
echo "<pre>";
print_r($row);
