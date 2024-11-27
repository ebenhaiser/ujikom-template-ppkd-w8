<?php
$queryDataUser = mysqli_query($connection, "SELECT user.id, user.deleted_at, user.name, user.email, level.level_name FROM user LEFT JOIN level ON user.id_level = level.id ORDER BY user.id_level DESC, user.id DESC");
?>
<div class="card mt-3">
    <div class="card-header">
        <h3>Data User</h3>
    </div>
    <div class="card-body">
        <?php if (isset($_GET['edit']) && $_GET['edit'] == 'success'): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            your data has been edited successfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php elseif (isset($_GET['delete']) && $_GET['delete'] == 'success'): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            your data has been deleted successfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php elseif (isset($_GET['add']) && $_GET['add'] == 'success'): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            your data has been added successfully!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif ?>
        <div align="right" class="button-action">
            <a href="?page=add-user" class="btn btn-primary">Add</a>
        </div>
        <table class="table table-bordered table-striped table-hover table-responsive mt-3">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Level</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($rowDataUser = mysqli_fetch_assoc($queryDataUser)) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= isset($rowDataUser['level_name']) ? $rowDataUser['level_name'] : '-' ?></td>
                    <td><?= isset($rowDataUser['name']) ? $rowDataUser['name'] : '-' ?></td>
                    <td><?= isset($rowDataUser['email']) ? $rowDataUser['email'] : '-' ?></td>
                    <td>
                        <a href="?page=add-user&edit=<?php echo $rowDataUser['id'] ?>">
                            <button class="btn btn-info">
                                <i class="tf-icon bx bx-edit bx-22px"></i>
                            </button>
                        </a>
                        <a onclick="return confirm ('Apakah anda yakin akan menghapus data ini?')"
                            href="?page=add-user&delete=<?php echo $rowDataUser['id'] ?>">
                            <button class="btn btn-danger">
                                <i class="tf-icon bx bx-trash bx-22px"></i>
                            </button>
                        </a>
                    </td>
                </tr>
                <?php endwhile; // End While 
                ?>
            </tbody>
        </table>
    </div>
</div>