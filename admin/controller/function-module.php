<?php
function getLogin($connection, $email, $password, $softDelete = null)
{
    $query = "SELECT * FROM user WHERE email='$email'";

    if ($softDelete) {
        $query .= "  AND deleted_at=0";
    }

    $queryLogin = mysqli_query($connection, $query);
    // mysqli_num_row() : untuk melihat total data di dalam table
    if (mysqli_num_rows($queryLogin) > 0) {
        $rowLogin = mysqli_fetch_assoc($queryLogin);
        if ($password == $rowLogin['password']) {
            $_SESSION['id'] = $rowLogin['id'];
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getLogout()
{
    session_destroy();
    return true;
}

function deleteRow($connection, $table_name, $id, $softDelete = null)
{
    if ($softDelete) {
        $query = "UPDATE $table_name SET deleted_at = 1 WHERE id = $id";
    } else {
        $query = "DELETE FROM $table_name WHERE id = $id";
    }
    $queryDelete = mysqli_query($connection, $query);
    return true;
}

function getRowEdit($connection, $table_name, $id, $softDelete = null)
{
    $query = "SELECT * FROM $table_name WHERE id = '$id'";
    if ($softDelete) {
        $query .= " AND deleted_at = 0";
    }
    $queryEdit = mysqli_query($connection, $query);
    $rowEdit = mysqli_fetch_array($queryEdit);

    return $rowEdit;
}
