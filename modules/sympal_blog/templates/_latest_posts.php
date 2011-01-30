<div id="latests-post">
    <h2><?php echo __('Latest posts') ?></h2>
    <div id="latests-post-content">
        <ul>
            <?php foreach ($latestPosts as $content): ?>
                <li><?php echo link_to($content, $content->getRoute()) ?></li>
             <?php endforeach; ?>
        </ul>
    </div>
</div>
