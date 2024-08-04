<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4 class="">EDIT Home</h4>
                        </div>
                        <div class="card-body">
                            <h4 class="text-center text-success">
                                <?php echo isset($message) ? $message : ''; ?>
                            </h4>
                            <form action="action.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Name</label>
                                    <div class="col-md-9">
                                        <input type="text" name="name" class="form-control" value="<?php echo $name; ?>"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Designation</label>
                                    <div class="col-md-9">
                                        <input type="text" name="designation" class="form-control" value="<?php echo $designation; ?>"/>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Description</label>
                                    <div class="col-md-9">
                                        <textarea name="description" class="form-control"><?php echo $description; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Image</label>
                                    <div class="col-md-9">
                                        <input type="file" name="image" class="form-control-file"/>
                                        <img src="<?php echo $image; ?>" alt="" width="100" height="100">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" name="updateBtn" class="btn btn-success btn-block" value="UPDATE"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>