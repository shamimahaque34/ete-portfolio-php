<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header text-center">
                        <h4 class="">ADD Social Icon INFO</h4>
                        <a href="action.php?status=manage-social-icon" class="btn btn-success btn-sm position-absolute me-5" style="right: 0"><i class="fa fa-sliders"></i></a>
                    </div>
                    <div class="card-body">
                        <h4 class="text-center text-success">
                            <?php echo isset($message) ? $message : ''; ?>
                        </h4>
                        <form action="action.php" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-form-label col-md-3">Name</label>
                                <div class="col-md-9">
                                    <input type="text" name="name" class="form-control"/>
                                </div>
                            </div>
                    
                            <div class="form-group row">
                                <label class="col-form-label col-md-3">Link Address</label>
                                <div class="col-md-9">
                                    <textarea name="link_address" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-md-3"></label>
                                <div class="col-md-9">
                                    <input type="submit" name="socialIconBtn" class="btn btn-success btn-block" value="ADD"/>
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