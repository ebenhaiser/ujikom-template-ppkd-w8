<?php
require_once 'controller/connection.php';

// get order code
$getOrderCodeQuery = mysqli_query($connection, "SELECT id FROM trans_order ORDER BY id DESC LIMIT 1");
$getorderCodeID = mysqli_fetch_assoc($getOrderCodeQuery);
$orderCode = "LNDRY-" . date('YmdHis') . "-" . $getorderCodeID['id'] + 1;


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
                    <input type="date" class="form-control" name="order_code">
                </div>
                <div class="col-sm-4 mb-3">
                    <label for="" class="form-label">Customer Name</label>
                    <select name="id_customer" id="" class="form-control">
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
                    <select name="" id="" class="form-control">
                        <option value="">-- choose service --</option>
                        <?php while ($rowService = mysqli_fetch_assoc($queryService)): ?>
                            <option value="<?= $rowService['id'] ?>"><?= $rowService['service_name'] ?></option>
                        <?php endwhile ?>
                    </select>
                </div>
                <div class="col-sm-6 mb-3">
                    <label for="" class="form-label">Quantity</label>
                    <input type="number" class="form-control" name="qty" placeholder="Enter quantity">
                </div>
            </div>
            <hr>
            <div class="mb-3" align="right">
                <button class="btn btn-secondary">
                    <i class="bx bx-plus"></i>
                </button>
            </div>
            <table class="table table-responsive table-bordered table-striped mb-3">
                <thead>
                    <tr>
                        <th>Service Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <div align="right">
                <button class="btn btn-primary" type="submit" name="submit">Add</button>
            </div>
        </div>
    </div>
</form>