<?php
foreach ($topics as $topic) {
    $id = $topic['id'];
    $category_id = $topic['category_id'];
    $slug = $topic['slug'];
    $vehicle = $topic['vehicle'];
    $url = $topic['url'];
    $body = $topic['body'];
    $topic_image = $topic['topic_image'];
    $date = $topic['date'];
    $rating = $topic['rating'];
    $averagerating = $topic['averagerating'];
}

?>

<div class="row shadow p-3 mb-4 bg-body rounded">
    <h2 class="text-center"><?= $title ?></h2>
</div>

<?php foreach ($topics as $topic) : ?>
    <div class="row shadow p-3 mb-4 bg-body rounded">
        <h3><?php echo $topic['title']; ?></h3>
        <h5><?php echo $topic['vehicle']; ?></h5>
        <div class="col-md-3">
            <img width="200px" class="mx-3 my-3" src="<?php echo site_url(); ?>assets/images/topics/<?php echo $topic['topic_image']; ?>">
        </div>
        <div class="col-md-9">
            <small class="topic-date">Posted on: <?php echo $topic['date']; ?> in <strong><?php echo $topic['name']; ?></strong></small><br>
            <?php echo word_limiter($topic['body'], 60); ?>
            <br>
            <br>
            <p>
                <a class="btn btn-primary" href="<?php echo site_url('/topics/' . $topic['slug']); ?>">Go to the topic</a>
            </p>
        </div>

        <hr>
        <?= $id ?>
        <div class="topic-action text-center">
            <!-- Rating Bar -->
            <input id="topic_<?php echo $topic['id']; ?>" value="<?php echo $topic['rating']; ?>" class="rating-loading ratingbar" data-min="0" data-max="5" data-step="1">

            <!-- Average Rating -->
            <div>
                Average Rating:
                <span id="averagerating_<?php echo "averagerating_" . $topic['id']; ?>">
                    <?php echo $topic['averagerating']; ?>
                </span>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<div class="p-links text-center">
    <?php echo $this->pagination->create_links(); ?>
</div>