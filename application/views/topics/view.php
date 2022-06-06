<div class="row shadow p-3 mb-4 bg-body rounded">
    <h2><?php echo $topic['title']; ?></h2>
    <div class="col-md-3">
        <img width="200px" class="mx-3 my-3" src="<?php echo site_url(); ?>assets/images/topics/<?php echo $topic['topic_image']; ?>">
    </div>
    <div class="col-md-9">
        <small class="topic-date">Posted on: <?php echo $topic['date']; ?></small><br>
        <div class="topic-body">
            <?php echo $topic['body']; ?>
        </div>
    </div>

    <?php if ($this->session->userdata('user_id') == $topic['user_id'] or $this->session->userdata('user_id') == 1) : ?>
        <hr>

        <div class="overlay-right d-flex">
            <a class="btn btn-primary float-sm-start" href="<?php echo base_url(); ?>topics/edit/<?php echo $topic['slug']; ?>">Edit</a>

            <?php echo form_open('/topics/delete/' . $topic['id']); ?>
            <input type="submit" value="Delete" class="btn btn-danger">
            </form>
        </div>
    <?php endif; ?>
</div>


<hr>

<div class="row shadow p-3 mb-4 bg-body rounded">
    <h3>Comments</h3>
    <?php if ($comments) :  ?>
        <?php foreach ($comments as $comment) : ?>
            <div class="card bg-light mb-3" style="max-width: 100rem;">
                <div class="card-body">
                    <p class="card-text"><?php echo $comment['body']; ?> [by <strong><?php echo $comment['name']; ?></strong> ]</p>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>No Comments to Display</p>
    <?php endif; ?>
    <hr>
    <h3>Add Comment</h3>
    <?php echo validation_errors(); ?>
    <?php echo form_open('comments/create/' . $topic['id']); ?>
    <div>
        <label>Name</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div>
        <label>Email</label>
        <input type="text" name="email" class="form-control">
    </div>
    <div>
        <label>Body</label>
        <textarea name="body" class="form-control"></textarea>
    </div>
    <br>
    <input type="hidden" name="slug" value="<?php echo $topic['slug']; ?>">
    <button class="btn btn-primary" type="submit">Submit Comment</button>
    </form>
</div>