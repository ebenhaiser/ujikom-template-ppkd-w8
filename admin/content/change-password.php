<?php
include 'controller/connection.php';
if (empty($_SESSION)) {
  header("Location: controller/logout.php");
}
$profileUserID = $_SESSION['id'];
$queryProfile = mysqli_query($connection, "SELECT * FROM user WHERE id='$profileUserID'");
$rowProfile = mysqli_fetch_assoc($queryProfile);

if (isset($_POST['save'])) {
  $oldPassword = mysqli_real_escape_string($connection, $_POST['oldPassword']);
  $newPassword = mysqli_real_escape_string($connection, $_POST['newPassword']);
  $confirmPassword = mysqli_real_escape_string($connection, $_POST['confirmPassword']);

  if ($oldPassword == $rowProfile['password']) {
    if ($newPassword == $confirmPassword) {
      $updatePassword = mysqli_query($connection, "UPDATE user SET password='$newPassword' WHERE id='$profileUserID'");
      if ($updatePassword) {
        header('Location: ?page=change-password&changePassword=success');
      } else {
        header('Location: ?page=change-password&changePassword=error');
      }
    } else {
      header('Location: ?page=change-password&changePassword=notMatch');
    }
  } else {
    header('Location: ?page=change-password&changePassword=wrongPassword');
  }
}

?>

<div class="card shadow">
    <div class="card-header">
        <h3>Change Password</h3>
    </div>
    <div class="card-body">
        <?php if (isset($_GET['changePassword']) && $_GET['changePassword'] == 'success'): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            Change Password Success!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php elseif (isset($_GET['changePassword']) && $_GET['changePassword'] == 'error'): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            Unable to change password, please try again.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php elseif (isset($_GET['changePassword']) && $_GET['changePassword'] == 'notMatch'): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            New and confirm passwords do not match, please try again.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php elseif (isset($_GET['changePassword']) && $_GET['changePassword'] == 'wrongPassword'): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            Wrong old password, please try again.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif ?>
        <div class="row">
            <div class="col-sm-6 mx-auto">
                <form action="" method="post">
                    <div class="form-group mb-3 form-password-toggle">
                        <label for="" class="form-label">Old Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="oldPassword"
                                placeholder="Enter your old password" aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>
                    <div class="form-group mb-3 form-password-toggle">
                        <label for="" class="form-label">New Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="newPassword"
                                placeholder="Enter your new password" aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>
                    <div class="form-group mb-3 form-password-toggle">
                        <label for="" class="form-label">Confirm Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="password" class="form-control" name="confirmPassword"
                                placeholder="Confirm password" aria-describedby="password" />
                            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>
                    <div class="form-group" align="right">
                        <button type="submit" name="save" class="btn btn-primary">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>