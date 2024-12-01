<?php
session_start();
session_regenerate_id();
ob_start();
ob_clean();
require_once 'controller/connection.php';
require_once 'controller/functions.php';
if (empty($_SESSION['id'])) {
  header('Location: controller/logout.php');
}

?>
<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/admin/assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Laundry Faith</title>

  <meta name="description" content="" />

  <?php include 'inc/head.php' ?>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->
      <?php include 'inc/sidebar.php' ?>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        <?php include 'inc/nav.php' ?>
        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">

            <!-- Content -->
            <?php
            if (isset($_GET['page'])) {
              if (file_exists('content/' . $_GET['page'] . '.php')) {
                include 'content/' . $_GET['page'] . '.php';
              } else {
                header("Location: content/misc/error.php");
                die;
              }
            } else {
              include 'content/dashboard.php';
            }
            ?>
          </div>
          <!-- / Content -->

          <!-- Footer -->
          <?php include 'inc/footer.php' ?>
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

  <?php include 'inc/script.php' ?>
</body>

</html>