<div id="content-toc">
    <h2> <?php echo __('Content') ?> </h2>
    <div id="content-toc-content">
    </div>
</div>
<script type="text/javascript">
/*<![CDATA[*/
    $(document).ready(function() {$.toctoc()});
    $('#content-toc h2').show();
    $('#content-toc h2').css('cursor', 'pointer');
    $('#content-toc > h2').click(function(){
        $('#content-toc-content').toggle();
    });
/*]]>*/
</script>
