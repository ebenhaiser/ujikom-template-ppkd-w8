<?php
require_once 'controller/connection.php';
$idAdministratorValidation = $_SESSION['id'];
$queryAdministratorValidation = mysqli_query($connection, "SELECT * FROM user WHERE id = '$idAdministratorValidation'");
$rowAdministratorValidation = mysqli_fetch_assoc($queryAdministratorValidation);
if ($rowAdministratorValidation['id_level'] != 3) {
    header('Location: ?pg=dashboard');
    exit;
}
