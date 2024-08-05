<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4 class="">EDIT Service</h4>
                        </div>
                        <div class="card-body">
                            <h4 class="text-center text-success">
                                <?php echo isset($message) ? $message : ''; ?>
                            </h4>
                            <form action="action.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3">Icon</label>
                                    <div class="col-md-9">
                                        <input type="text" name="icon" class="form-control" value="<?php echo $icon; ?>"/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                <label class="col-form-label col-md-3">Title</label>
                                <div class="col-md-9">
                                    <input type="text" name="title" class="form-control" value="<?php echo $title; ?>"/>
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label class="col-form-label col-md-3">Description</label>
                                <div class="col-md-9">
                                    <textarea name="description" class="form-control"><?php echo $description; ?></textarea>
                                </div>
                            </div>
                                <div class="form-group row">
                                    <label class="col-form-label col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" name="updateServiceBtn" class="btn btn-success btn-block" value="UPDATE"/>
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