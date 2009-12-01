<?php $pagerHtml = get_sympal_pager_navigation($pager, url_for($menuItem->getItemRoute())) ?>

<?php echo get_sympal_pager_header($pager, $content) ?>

<?php echo $pagerHtml ?>

<?php foreach ($content as $content): ?>
  <div class="row">
    <h3><?php echo link_to($content, $content->getRoute()) ?></h3>
    <?php echo image_tag($content->CreatedBy->getGravatarUrl(), 'align=right') ?>
    <p class="date">
      <strong>
        Posted by <?php echo $content->CreatedBy->getName() ?> on 
        <?php echo date('m/d/Y h:i:s', strtotime($content->created_at)) ?>
      </strong>
    </p>
    <p class="teaser"><?php echo $content->getRecord()->getTeaser() ?> <strong><small>[<?php echo link_to('read more', $content->getRoute()) ?>]</small></p>
  </div>
<?php endforeach; ?>

<?php echo $pagerHtml ?>