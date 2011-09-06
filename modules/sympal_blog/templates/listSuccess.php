<?php //echo get_sympal_breadcrumbs($menuItem, $breadcrumbsTitle) ?>

<div id="two-columns">

    <div class="box bottom">
        <h2><?php echo $title ?></h2>
        <?php echo get_partial('sympal_blog/blog_list', array('pager' => $pager, 'menuItem' => $menuItem, 'contents' => $pager->getResults())) ?>
    </div>

</div>

<?php slot('sidebar') ?>
    <?php echo get_component('sympal_blog', 'sidebar') ?>
<?php end_slot() ?>
