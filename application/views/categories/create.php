<div class="row shadow p-3 mb-4 bg-body rounded">
    <h2 class="text-center"><?= $title ?></h2>
</div>
<?php echo validation_errors(); ?>
<div class="mb-4">
    <?php echo form_open_multipart('categories/create'); ?>
    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter Category Name">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
    <?php form_close(); ?>
</div>