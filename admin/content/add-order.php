<?php
require_once 'controller/connection.php';

// get order code
$getOrderCodeQuery = mysqli_query($connection, "SELECT id FROM trans_order ORDER BY id DESC LIMIT 1");
$getorderCodeID = mysqli_fetch_assoc($getOrderCodeQuery);
$orderCode = "LNDRY-" . date('YmdHis') . "-" . $getorderCodeID['id'] + 1;

if (isset($_POST['add_order'])) {
    $order_code = $_POST['add_order'];
    $order_date = $_POST['order_date'];
    $id_customer = $_POST['id_customer'];
} else if (isset($_GET['view'])) {
    $idView = $_GET['view'];
    $queryView = mysqli_query($connection, "SELECT * FROM trans_order WHERE id = '$idView'");
    $rowView = mysqli_fetch_assoc($queryView);
}


$queryService = mysqli_query($connection, "SELECT * FROM type_of_service");
$queryCustomer = mysqli_query($connection, "SELECT * FROM customer");
?>

<form action="" method="post">
    <div class="card shadow">
        <div class="card-header">
            <h3><?= isset($_GET['edit']) ? 'Edit' : 'Add' ?> Data Order</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4 mb-3">
                    <label for="" class="form-label">Order Code</label>
                    <input type="text" class="form-control" id="" name="phone" placeholder="Enter phone number"
                        value="<?= $orderCode ?>" readonly>
                </div>
                <div class="col-sm-4 mb-3">
                    <label for="" class="form-label">Order Date</label>
                    <input type="date" class="form-control" name="order_code"
                        <?= isset($_GET['view']) ? 'readonly' : '' ?>>
                </div>
                <div class="col-sm-4 mb-3">
                    <label for="" class="form-label">Customer Name</label>
                    <select name="id_customer" id="" class="form-control"
                        <?= isset($_GET['view']) ? "disabled='true'" : '' ?>>
                        <option value="">-- choose customer --</option>
                        <?php while ($rowCustomer = mysqli_fetch_assoc($queryCustomer)) : ?>
                        <option value="<?= $rowCustomer['id'] ?>"><?= $rowCustomer['customer_name'] ?></option>
                        <?php endwhile ?>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow mt-3">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <label for="" class="form-label">Service</label>
                    <select name="id_service" class="form-control" id="selected_service">
                        <option value="">-- choose service --</option>
                        <?php while ($rowService = mysqli_fetch_assoc($queryService)): ?>
                        <option value="<?= $rowService['id'] ?>"><?= $rowService['service_name'] ?></option>
                        <?php endwhile ?>
                    </select>
                </div>
                <input type="hidden" id="price">
                <div class="col-sm-6 mb-3">
                    <label for="" class="form-label">Quantity</label>
                    <input type="number" class="form-control" name="qty" placeholder="Enter quantity" id="selected_qty">
                </div>
            </div>
            <hr>
            <div class="mb-3" align="right">
                <button class="btn btn-secondary" id="add_row_order">
                    <i class="bx bx-plus"></i>
                </button>
            </div>
            <table class="table table-responsive table-bordered table-striped mb-3">
                <thead>
                    <tr>
                        <th>Service Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody id="order_table">
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" align="right"><strong>Total Price</strong></td>
                        <td>
                            <input type="text" id="total_price_formatted" style="border: none; outline: none;"
                                class="form-control" readonly>
                            <input type="hidden" name="total_price" id="total_price"
                                style="border: none; outline: none;" class="form-control" readonly>
                        </td>
                    </tr>
                </tfoot>
            </table>
            <input type="hidden" name="order_status" value="0">
            <div align="right">
                <button class="btn btn-primary" type="submit" name="add_order">Add</button>
            </div>
        </div>
    </div>
</form>