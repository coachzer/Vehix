<div class="row shadow p-3 mb-4 bg-body rounded">
    <h2 class="text-center"><?= $title ?></h2>
</div>

<?php echo validation_errors(); ?>
<div class="mb-4">
    <?php echo form_open_multipart('topics/create'); ?>

    <div class="form-group">
        <label>Title</label>
        <input type="text" name="title" class="form-control" placeholder="Add Title Here">
    </div>

    <div class="form-group">
        <label>Vehicle</label>
        <input type="text" name="vehicle" class="form-control" placeholder="Add Your Vehicle Here">
    </div>

    <div class="form-group">
        <label>YouTube Link</label>
        <input type="url" name="url" class="form-control" placeholder="Add YouTube URL Here">
    </div>

    <div class="form-group">
        <label>Body</label>
        <textarea id="editor1" class="form-control" name="body" placeholder="Add Body"></textarea>
    </div>

    <div class="form-group">
        <label>Category</label>
        <select name="category_id" class="form-control">
            <?php foreach ($categories as $category) : ?>
                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group my-2">
        <label for="">Upload Image</label>
        <input type="file" name="userfile" size="20">
    </div>

    <div class="form-group mt-2 mb-1">
        <button type="submit" class="btn btn-primary">Create</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </div>
    <?php form_close(); ?>
</div>