<?php
require_once 'controller/connection.php';

if (isset($_GET['delete'])) {
    $idDelete = $_GET['delete'];
    $query = mysqli_query($connection, "DELETE FROM user WHERE id='$idDelete'");
    header("Location: ?page=user&delete=success");
    die;
} else if (isset($_GET['edit'])) {
    $idEdit = $_GET['edit'];
    $queryEdit = mysqli_query($connection, "SELECT * FROM user WHERE id='$idEdit'");
    $rowEdit = mysqli_fetch_assoc($queryEdit);
    if (isset($_POST['edit'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'] ? $_POST['password'] : $rowEdit['password'];
        $id_level = $_POST['id_level'];

        $queryEdit = mysqli_query($connection, "UPDATE user SET username='$username', email='$email', password='$password', id_level='$id_level' WHERE id='$idEdit'");
        header("Location: ?page=user&edit=success");
        die;
    }
} else if (isset($_POST['add'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $id_level = $_POST['id_level'];

    $queryAdd = mysqli_query($connection, "INSERT INTO user (username, email, password, id_level) VALUES ('$username', '$email', '$password', '$id_level')");
    header("Location: ?page=user&add=success");
    die;
}

$queryLevel = mysqli_query($connection, "SELECT * FROM level");
?>

<div class="card shadow">
    <div class="card-header">
        <h3><?= isset($_GET['edit']) ? 'Edit' : 'Add' ?> Data User</h3>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label for="username" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan nama"
                        value="<?= isset($_GET['edit']) ? $rowEdit['username'] : '' ?>" required>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email"
                        value="<?= isset($_GET['edit']) ? $rowEdit['email'] : '' ?>" required>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="level" class="form-label">Level</label>
                    <select class="form-control" name="id_level" id="">
                        <option value=""> -- Add Level -- </option>
                        <?php while ($rowLevel = mysqli_fetch_assoc($queryLevel)) : ?>
                            <option value="<?= $rowLevel['id'] ?>"
                                <?= isset($_GET['edit']) && ($rowLevel['id'] == $rowEdit['id_level']) ? 'selected' : '' ?>>
                                <?= $rowLevel['level_name'] ?></option>
                        <?php endwhile ?>
                    </select>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="password" class="form-label">password</label>
                    <input type="password" class="form-control" id="password" name="password" for="password"
                        placeholder="Masukkan password" <?= isset($_GET['edit']) ? '' : 'required' ?>>
                </div>
            </div>
            <div class="">
                <button type="submit" class="btn btn-primary"
                    name="<?php echo isset($_GET['edit']) ? 'edit' : 'add' ?>">
                    <?php echo isset($_GET['edit']) ? 'Edit' : 'Add' ?>
                </button>
            </div>
        </form>
    </div>
</div>