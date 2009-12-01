<?php use_stylesheet('/sfSympalBlogPlugin/css/blog.css') ?>

<?php echo get_sympal_breadcrumbs($menuItem, $content) ?>

<div id="sympal_blog">
  <div id="view">
    <h2><?php echo get_sympal_column_content_slot($content, 'title') ?></h2>

    <?php echo image_tag($content->CreatedBy->getGravatarUrl(), 'align=right') ?>

    <p>
      <strong>
        Posted by <?php echo get_sympal_column_content_slot($content, 'created_by', 'render_blog_post_author') ?> on 
        <?php echo get_sympal_column_content_slot($content, 'date_published') ?>
      </strong>
    </p>

    <?php if (sfSympalToolkit::isEditMode()): ?>
      <?php echo get_sympal_column_content_slot($content, 'teaser') ?>
      <hr/>
    <?php endif; ?>

    <?php echo get_sympal_content_slot($content, 'body', 'Markdown') ?>
  </div>

  <?php if (sfSympalConfig::get('sfSympalCommentsPlugin', 'installed') && sfSympalConfig::get('sfSympalCommentsPlugin', 'enabled') && sfSympalConfig::get('BlogPost', 'enable_comments')): ?>
    <?php use_helper('Comments') ?>
    <?php echo get_sympal_comments($content) ?>
  <?php endif; ?>
</div>

<?php slot('sympal_right_sidebar') ?>
  <?php echo get_component('sympal_blog', 'sidebar') ?>
<?php end_slot() ?>