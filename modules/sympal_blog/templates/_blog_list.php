<?php echo get_sympal_pager_header($pager, $contents) ?>

<?php foreach ($contents as $content): ?>

    <h3><?php echo link_to($content->getHeaderTitle(), $content->getRoute()) ?></h3>

    <p class="small bottom">
        <?php if($content->isPublished()): ?>
            <?php echo sprintf(__('Posted by %s on %s'), $content->CreatedBy->getName(), format_datetime($content->date_published, sfSympalConfig::get('date_published_format'))) ?>
        <?php else: ?>
            <?php echo sprintf(__('Posted by %s - Not yet published'), $content->CreatedBy->getName()) ?>
        <?php endif; ?>
    </p>

    <?php $teaser = $content->getRecord()->getTeaser(); ?>

    <?php $filter = new sfContentFilterMarkdown(); ?>
    <?php if('' == $teaser): ?>
        <?php $teaser = mb_substr(strip_tags($filter->filter($content->getSlot('body')->render())), 0, 500); ?>
    <?php else: ?>
        <?php $teaser = $filter->filter($teaser); ?>
    <?php endif; ?>

    <p><?php echo $teaser ?> [<?php echo link_to(__('read more'), $content->getRoute()) ?>]</p>
<?php endforeach; ?>

<?php (is_object($menuItem)) ? $route = $menuItem->getItemRoute() : $route = '' ?>

<?php echo get_sympal_pager_navigation($pager, url_for($route)) ?>
