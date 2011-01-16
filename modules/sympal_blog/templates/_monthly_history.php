<div id="monthly-historic">
    <h2><?php echo __('History') ?></h2>
    <div id="monthly-historic-content">
        <ul>
            <?php foreach ($months as $month => $postCount): ?>
                <li><?php echo link_to(sprintf('%s (%s)', format_date(strtotime($month), 'MMMM yyyy'), $postCount) , '@sympal_blog_month?m='.date('m', strtotime($month)).'&y='.date('Y', strtotime($month))) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<script type="text/javascript">
/*<![CDATA[*/
    $('#monthly-historic h2').show();
    $('#monthly-historic h2').css('cursor', 'pointer');
    $('#monthly-historic > h2').click(function(){
        $('#monthly-historic-content').toggle();
    });
/*]]>*/
</script>
