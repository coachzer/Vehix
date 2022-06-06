<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('topics/update'); ?>
<input type="hidden" name="id" value="<?php echo $topic['id']; ?>">
<div class="form-group">
    <label>TITLE</label>
    <input type="text" name="title" class="form-control" placeholder="Add Title Here" value="<?php echo $topic['title']; ?>">
</div>
<div class="form-group">
    <label>BODY</label>
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

<input type="submit" class="btn btn-primary" value="Submit">
</form>