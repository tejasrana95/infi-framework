<script src="<?php echo URL . VIEW ?>js/app.v2.js"></script><!-- Bootstrap --><!-- App -->
<script src="<?php echo URL . VIEW ?>js/charts/easypiechart/jquery.easy-pie-chart.js" cache="false"></script>
<script src="<?php echo URL . VIEW ?>js/charts/sparkline/jquery.sparkline.min.js" cache="false"></script>
<script src="<?php echo URL . VIEW ?>js/charts/flot/jquery.flot.min.js" cache="false"></script>
<script src="<?php echo URL . VIEW ?>js/charts/flot/jquery.flot.tooltip.min.js" cache="false"></script>
<script src="<?php echo URL . VIEW ?>js/charts/flot/jquery.flot.resize.js" cache="false"></script>
<script src="<?php echo URL . VIEW ?>js/charts/flot/jquery.flot.grow.js" cache="false"></script>
<script src="<?php echo URL . VIEW ?>js/charts/flot/demo.js" cache="false"></script>
<script src="<?php echo URL . VIEW ?>js/calendar/bootstrap_calendar.js" cache="false"></script>
<script src="<?php echo URL . VIEW ?>js/calendar/demo.js" cache="false"></script>
<script src="<?php echo URL . VIEW ?>js/sortable/jquery.sortable.js" cache="false"></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.0.0.js"></script>
<script type="text/javascript" src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>


<script type="text/javascript" src="<?php echo TEMPLATE; ?>filemanger-Plugin/js/elfinder.min.js"></script>
<div id="filemanager" title="File Manager" >
    <div id="elfinders" class="nonborderbox"></div>
</div>    
<script type="text/javascript">
    function openfilemanager(filepath) {
        var elf = $('#elfinders').elfinder({
            url: '<?php echo TEMPLATE; ?>filemanger-Plugin/php/connector.php',
            height: $(window).height() - 260, // connector URL (REQUIRED)
            closeOnEditorCallback: true,
            getFileCallback: function (url) {
                $("#" + filepath).val(url)
                $("#filemanager").dialog('close');
            }
        }).elfinder('instance');
        $("#filemanager").dialog("open");
    }
    (function ($) {
        $("#filemanager").dialog({
            width: $(window).width() - 200,
            height: $(window).height() - 200,
            autoOpen: false,
            show: {
                effect: "clip",
                duration: 500
            },
            hide: {
                effect: "clip",
                duration: 500
            }
        });
        $("#filemanager").dialog({autoOpen: false});
    })(jQuery)
</script>
<?php
if (isset($scriptsfooter)) {
    foreach ($scriptsfooter as $script) {
        echo '<script type="text/javascript" src="' . TEMPLATE . $script . '"></script>';
    }
}
?>
</body>
</html>