<?php echo get_sympal_breadcrumbs($menuItem) ?>

<div id="two-columns">
    <div class="box bottom">
        <h1><?php echo $sf_sympal_content->getTitle(); ?></h1>
        <p class="quiet">
            <?php //echo sprintf(__('Posted by %s on %s'), get_sympal_content_slot('created_by_id', array('content' => $sf_sympal_content)), get_sympal_content_slot('date_published', array('content' => $sf_sympal_content))) ?>
        </p>
        <?php echo get_sympal_content_slot('body') ?>
    </div>
</div>
<?php slot('sidebar') ?>
    <?php echo get_component('sympal_blog', 'sidebar') ?>
<?php end_slot() ?>
