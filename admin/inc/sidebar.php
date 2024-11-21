<?php
require_once 'controller/connection.php';
$idNavbarUser = $_SESSION['id'];
$queryNavbarUser = mysqli_query($connection, "SELECT * FROM user WHERE id = '$idNavbarUser'");
$rowNavbarUser = mysqli_fetch_assoc($queryNavbarUser);
?>

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo gap-2 mb-4 mt-4">
        <img src="img/logo/logo.png" alt="" width="30px"><br><br>
        <span class="demo text-body fw-bolder" style="font-size: 25px;">Laundry Faith</span>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item <?= !isset($_GET['pg']) || $_GET['pg'] == 'dashboard' ? 'active' : '' ?>">
            <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Administrator -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Master Data</span>
        </li>
        <li class="menu-item <?= (isset($_GET['pg']) && ($_GET['pg'] == 'user' || $_GET['pg'] == 'add-user')) ? 'active' : '' ?>
">
            <a href="?pg=user" class="menu-link gap-3">
                <!-- <i class="menu-icon tf-icons bx bx-home-circle"></i> -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-file-person" viewBox="0 0 16 16">
                    <path
                        d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                    <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                </svg>
                <div data-i18n="Account">Data User</div>
            </a>
        </li>

        <!-- Recycle Bin -->

        <!-- END Administrator -->

    </ul>
</aside>