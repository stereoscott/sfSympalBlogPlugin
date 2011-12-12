<div id="two-columns">
    <div class="box bottom">
        <h1><?php echo $sf_sympal_content->getTitle(); ?></h1>
        <p class="quiet">
            <?php // The problem with this kind of slot is that it creates a new slot every time the content is seen ?>
            <?php //echo sprintf(__('Posted by %s on %s'), get_sympal_content_slot('created_by_id', array('content' => $sf_sympal_content)), get_sympal_content_slot('date_published', array('content' => $sf_sympal_content))) ?>
        </p>
        <?php echo get_sympal_content_slot('body') ?>
        <?php if(sfSympalConfig::get('sfSympalCommentsPlugin', 'enabled') && sfSympalConfig::get('sfSympalBlogPlugin', 'enable_comments')): ?>
            <?php use_helper('Comments') ?>
            <?php echo get_sympal_comments($sf_sympal_content) ?>
        <?php endif; ?>
    </div>
</div>

<?php slot('sidebar') ?>
    <?php echo get_component('sympal_blog', 'sidebar') ?>
<?php end_slot() ?>
