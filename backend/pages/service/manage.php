

<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>
<section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4 class="">MANAGE Service Info</h4>
                            <a href="action.php?status=add-service" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-plus-circle"></i></a>
                        </div>
                        <div class="card-body">
                            <h3 class="text-center text-danger">
                                <?php
                                    if (isset($_SESSION['message']))
                                    {
                                        echo $_SESSION['message'];
                                        unset($_SESSION['message']);
                                    }
                                ?>
                            </h3>
                            <h3 class="text-center text-success"><?php echo isset($_SESSION['message']) ? $_SESSION['message'] : ''; ?></h3>
                            <table class="table table-striped table-hover table-responsive-md text-center">
                                <thead>
                                <tr>
                                    <th>Icon</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($services as $service) { extract($service) ?>
                                <tr>
                                    <td><?php echo $icon ;?></td>
                                    <td><?php echo $title ;?></td>
                                    <td><?php echo $description ;?></td>
                                    <td><img src="<?php echo $image; ?>" alt="" height="100" width="100"></td>
                                    <td>
                                        <a href="action.php?status=edit-service&id=<?php echo $id; ?>" class="btn btn-success">Edit</a>
                                        <a href="action.php?status=delete-service&id=<?php echo $id; ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>