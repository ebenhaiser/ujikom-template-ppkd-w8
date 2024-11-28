<?php
    session_start();
    include'controller/connection.php';
    if (empty($_SESSION)) {
      header("Location: controller/logout.php");
  }
    $profileUserID = $_SESSION['id'];
    $queryProfile = mysqli_query($connection, "SELECT * FROM users WHERE id='$profileUserID'");
    $rowProfile = mysqli_fetch_assoc($queryProfile);

    if(isset($_POST['save'])){
      $oldPassword = mysqli_real_escape_string($connection, $_POST['oldPassword']);
      $newPassword = mysqli_real_escape_string($connection, $_POST['newPassword']);
      $confirmPassword = mysqli_real_escape_string($connection, $_POST['confirmPassword']);

      if($oldPassword == $rowProfile['password']){
          if($newPassword == $confirmPassword){
              $updatePassword = mysqli_query($connection, "UPDATE users SET password='$newPassword' WHERE id='$profileUserID'");
              if($updatePassword){
                  echo "<script>alert('Password changed successfully!'); window.location.href='profile.php';</script>";
              } else {
                  echo "<script>alert('Password not changed!'); window.location.href='change-password.php';</script>";
              }
          } else {
              echo "<script>alert('New password and confirm password does not match!'); window.location.href='change-password.php';</script>";
          }
      } else {
          echo "<script>alert('Old password is incorrect!'); window.location.href='change-password.php';</script>";
      }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin | Home Editor</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include'inc/sidebar.php'; ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php include'inc/topbar.php'; ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Profile Editor</h1>
          <p class="mb-4">This is the section where you can edit the 'profile' section of your portfolio website.</p>

          <!-- Content Row -->
          <!-- Area Chart -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit your account profile</h6>
            </div>
            <div class="card-body">
              <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="">Old Password: </label>
                  <input type="password" class="form-control" id="oldPassword" name="oldPassword"
                    placeholder="Enter your old password" value="">
                </div>
                <div class="form-group">
                  <label for="">New Password: </label>
                  <input type="password" class="form-control" id="newPassword" name="newPassword"
                    placeholder="Enter your new password" value="">
                </div>
                <div class="form-group">
                  <label for="">Confirm Password: </label>
                  <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                    placeholder="Enter your new password" value="">
                </div>

                <div class="mb-3">
                  <button class="btn btn-primary" name="save" type="submit">
                    Simpan
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
  <script src="js/demo/chart-bar-demo.js"></script>

</body>

</html>