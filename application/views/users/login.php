<?php echo form_open('users/login'); ?>
<div class="row my-3">
    <div class="col-md-6">
        <img src="<?php echo base_url(); ?>assets/images/login_image.jpg" class="img-thumbnail">
    </div>

    <div class="col-md-6">
        <h1 class="text-center fst-italic mt-5">
            <?php echo $title; ?>
        </h1>

        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Enter Username" require autofocus>
        </div>
        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Enter Password" require autofocus>
        </div>
        <div class="d-grid my-2">
            <button type="submit" class="btn btn-primary rounded" type="block">Login</button>
        </div>
        <div class="fw-light fst-italic d-flex">
            <p class="mt-5 mx-auto">Log in to Vehix and start a discussion!</p>
        </div>
    </div>
</div>
<?php echo form_close(); ?>