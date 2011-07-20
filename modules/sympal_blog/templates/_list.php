<?php echo auto_discovery_link_tag('rss', $sf_sympal_content->getRoute().'.rss') ?>
<div id="two-columns">
    <div class="box bottom">
        <?php echo get_sympal_content_slot('body') ?>
        <?php $listResults = $pager->getResults() ?>
        <?php echo get_partial('sympal_blog/blog_list', array('menuItem' => $menuItem, 'pager' => $pager, 'contents' => $listResults)) ?>
    </div>
</div>
<?php slot('sidebar') ?>
    <?php echo get_component('sympal_blog', 'sidebar') ?>
<?php end_slot() ?>
