<?php
require_once 'connection.php';

function loginController($email, $password)
{
    global $connection;
    $email    = $_POST['email']; //untuk mengambil nilai dari input
    $password = $_POST['password'];

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
