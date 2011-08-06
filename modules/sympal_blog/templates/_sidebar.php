<div id="sidebar" class="box bottom">

    <?php slot('breadcrumbs') ?>
        <?php echo get_sympal_breadcrumbs(array(
          'Home' => '@homepage',
          'Blog' => ''
        )) ?>
    <?php end_slot() ?>

    <div id="sidebar-theme-icon">&nbsp;</div>
    <div id="sidebar-info-icon">&nbsp;</div>

    <div id="sidebar-content">

        <?php foreach ($widgets as $template): ?>
            <?php echo sfSympalToolkit::getSymfonyResource($template) ?>
        <?php endforeach; ?>

    </div>

</div>
