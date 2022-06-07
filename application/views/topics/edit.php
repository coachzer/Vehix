<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('topics/update'); ?>
<input type="hidden" name="id" value="<?php echo $topic['id']; ?>">

<div class="form-group">
    <label>Title</label>
    <input type="text" name="title" class="form-control" placeholder="Add Title Here" value="<?php echo $topic['title']; ?>">
</div>

<div class="form-group">
    <label>Vehicle</label>
    <input type="text" name="vehicle" class="form-control" placeholder="Add Your Vehicle Here" value="<?php echo $topic['vehicle']; ?>">
</div>

<div class="form-group">
    <label>YouTube Link</label>
    <input type="url" name="url" class="form-control" placeholder="Add YouTube URL Here" value="<?php echo $topic['url']; ?>">
</div>


<div class="form-group">
    <label>Body</label>
    <textarea id="editor1" class="form-control" name="body" placeholder="Add Body Here" value="<?php echo $topic['body']; ?>"></textarea>
</div>

<div class="form-group">
    <label for="">Category</label>
    <select name="category_id" class="form-control">
        <?php foreach ($categories as $category) : ?>
            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
        <?php endforeach; ?>
    </select>
</div>

<div class="form-group mt-2 mb-1">
    <input type="submit" class="btn btn-primary" value="Submit">
    <input type="reset" class="btn btn-danger" value="Reset">
</div>
</form>