<?php
require_once 'connection.php';

function loginController($email, $password)
{
    global $connection;
    $queryLogin = mysqli_query($connection, "SELECT * FROM user WHERE email='$email' AND deleted_at=0
    ");
    // mysqli_num_row() : untuk melihat total data di dalam table
    if (mysqli_num_rows($queryLogin) > 0) {
        $rowLogin = mysqli_fetch_assoc($queryLogin);
        if ($password == $rowLogin['password']) {
            $_SESSION['name'] = $rowLogin['name'];
            $_SESSION['id'] = $rowLogin['id'];

            return true;
        } else {
            return false;
        }
    } else {

        return false;
    }
}

function loginValidation()
{
    if (!isset($_SESSION['id'])) {
        return false;
    } else {
        return true;
    }
}

function getOrderStatus($status)
{
    switch ($status) {
        case 0:
            return '<span class="badge bg-label-warning">New</span>';
        case 1:
            return '<span class="badge bg-label-success">Picked Up</span>';
        default:
            return '<span class="badge bg-label-secondary">Unknown Status</span>';
    }
}
