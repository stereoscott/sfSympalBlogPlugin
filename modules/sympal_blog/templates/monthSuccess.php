<?php use_stylesheet('/sfSympalBlogPlugin/css/blog.css') ?>

<?php echo get_sympal_breadcrumbs($menuItem, null, $date = date('M Y', strtotime($month.'/01/'.$year)), true) ?>

<div id="sympal_blog">
  <div id="list">
    <h2>Posts for the month of <?php echo $date ?></h2>

    <?php echo get_partial('sympal_blog/blog_list', array('pager' => $pager, 'menuItem' => $menuItem, 'content' => $content)) ?>

    <?php echo link_to('Create New', '@sympal_content_create_type?type='.$menuItem->ContentType->getSlug()) ?>
  </div>
</div>

<?php slot('sympal_right_sidebar') ?>
  <?php echo get_component('sympal_blog', 'sidebar') ?>
<?php end_slot() ?>