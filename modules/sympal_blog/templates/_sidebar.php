<div id="sidebar" class="box bottom">

    <?php echo image_tag('/sfSympalPlugin/lib/sidebar/images/info.png', array('id' => 'sidebar-info-icon')); ?>

    <div id="sidebar-content">

        <?php foreach ($widgets as $template): ?>
            <?php echo sfSympalToolkit::getSymfonyResource($template) ?>
        <?php endforeach; ?>

    </div>

</div>

<script type="text/javascript">
/*<![CDATA[*/
    $('#sidebar-info-icon').css('cursor', 'pointer');
    $('#sidebar-info-icon').click(function() {
        $('#sidebar-content').toggle();
    });
    $('#sidebar-content').hide();
/*]]>*/
</script>
