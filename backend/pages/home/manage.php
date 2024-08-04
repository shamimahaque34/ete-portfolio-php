<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4 class="">MANAGE PRODUCT</h4>
                            <a href="action.php?status=add-home" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-plus-circle"></i></a>
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
                                    <th>Product Name</th>
                                    <th>Product Price</th>
                                    <th>Stock Amount</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                               
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>