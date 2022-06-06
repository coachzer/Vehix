<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>
<div class="row my-3">
    <div class="col-md-6">

        <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Enter Name">
        </div>

        <div class="form-group">
            <label>Surname</label>
            <input type="text" class="form-control" name="surname" placeholder="Enter Surname">
        </div>

        <div class="form-group">
            <label>Zipcode</label>
            <input type="text" class="form-control" name="zipcode" placeholder="Enter Zipcode">
        </div>

        <div class="form-group">
            <label>Vehicle</label>
            <input type="vehicle" class="form-control" name="vehicle" placeholder="Enter Vehicle">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="username" placeholder="Enter Username">
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter Email">
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password">
        </div>

        <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" class="form-control" name="password2" placeholder="Confirm Password">
        </div>
    </div>
</div>
<div class="my-3">
    <button class="btn btn-primary" type="submit">Register</button>
</div>

<?php echo form_close(); ?>