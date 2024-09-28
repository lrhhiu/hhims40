<h1>Blog Posts</h1>
<ul>
    <?php foreach($posts as $post): ?>
        <li>
            <h2><?= $post['title'] ?></h2>
            <p><?= $post['content'] ?></p>
        </li>
    <?php endforeach; ?>
</ul>