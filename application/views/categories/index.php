<div class="row shadow p-3 mb-4 bg-body rounded">
    <h2 class="text-center"><?= $title ?></h2>
</div>

<div class="row shadow p-3 mb-4 bg-body rounded">
    <ul class="list-group">
        <?php foreach ($categories as $category) : ?>
            <li class="list-group-item">
                <h4>
                    <a href="<?php echo site_url('/categories/topics/' . $category['id']); ?>"><?php echo $category['name']; ?></a>
                    <?php if ($this->session->userdata('user_id') == $category['user_id'] or $this->session->userdata('user_id') == 1) : ?>
                        <form action="categories/delete/<?php echo $category['id']; ?>" method="post" style="display: inline;">
                            <input type="submit" class="btn-link text-danger" value="[X]">
                        </form>
                    <?php endif; ?>
                </h4>
            </li>
        <?php endforeach; ?>
    </ul>
</div>