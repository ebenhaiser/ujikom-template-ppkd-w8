<?php
// getting account username
$idDashboard = $_SESSION['id'];
$queryDashboard = mysqli_query($connection, "SELECT * FROM user WHERE id = '$idDashboard'");
$rowDashboard = mysqli_fetch_array($queryDashboard);

?>

<style>
    .card {
        min-height: 600px;
    }

    .card .card-body img {
        max-width: 250px;
    }
</style>

<div class="card">
    <div class="card-header">
        <h3>Dashboard</h3>
    </div>
    <div class="card-body d-flex align-items-center justify-content-center gap-3">
        <div class="row">
            <div class="col-sm-12 mb-5" align="center">
                <img src="https://placehold.co/400" alt="">
            </div>
            <div class="col-sm-12" align="center">
                <h2>Welcome, <?= $rowDashboard['name'] ?>!</h2>
            </div>
        </div>
    </div>
</div>