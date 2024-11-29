<?php
require_once 'controller/connection.php';

if (isset($_GET['delete'])) {
    $idDelete = $_GET['delete'];
    $query = mysqli_query($connection, "DELETE FROM type_of_service WHERE id='$idDelete'");
    header("Location: ?page=service&delete=success");
    die;
} else if (isset($_GET['edit'])) {
    $idEdit = $_GET['edit'];
    $queryEdit = mysqli_query($connection, "SELECT * FROM type_of_service WHERE id='$idEdit'");
    $rowEdit = mysqli_fetch_assoc($queryEdit);
    if (isset($_POST['edit'])) {
        $service_name = $_POST['service_name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        $queryEdit = mysqli_query($connection, "UPDATE type_of_service SET service_name='$service_name', phone='$phone', address='$address' WHERE id='$idEdit'");
        header("Location: ?page=service&edit=success");
        die;
    }
} else if (isset($_POST['add'])) {
    $service_name = $_POST['service_name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $queryAdd = mysqli_query($connection, "INSERT INTO type_of_service (service_name, phone, address) VALUES ('$service_name', '$phone', '$address')");
    header("Location: ?page=service&add=success");
    die;
}
?>

<div class="card shadow">
    <div class="card-header">
        <h3><?= isset($_GET['edit']) ? 'Edit' : 'Add' ?> Data Service</h3>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label for="" class="form-label">Service Name</label>
                    <input type="text" class="form-control" id="" name="service_name" placeholder="Enter service name"
                        value="<?= isset($_GET['edit']) ? $rowEdit['service_name'] : '' ?>" required>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="" class="form-label">Price</label>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                        <input type="number" name="pickup_pay" style="" class="form-control" placeholder="Input Paid Amount" value="<?= isset($_GET['edit']) ? $rowEdit['price'] : '' ?>">
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="" class="form-label">Description</label>
                    <textarea name="description" id="" class="form-control" placeholder="Enter description"><?= isset($_GET['edit']) ? $rowEdit['description'] : '' ?></textarea>
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