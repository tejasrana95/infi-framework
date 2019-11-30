<?php fnGetHeader(array("title"=>"Filemanager"),array("js/app.v2.js")); ?>
		<!-- elFinder initialization (REQUIRED) -->
        <script type="text/javascript" charset="utf-8">
            $().ready(function() {
                var elf = $('#elfinder').elfinder({
                    url: '<?php echo TEMPLATE; ?>filemanger-Plugin/php/connector.php'  // connector URL (REQUIRED)
                            // lang: 'ru',             // language (OPTIONAL)
                }).elfinder('instance');
            });
        </script>
        <section id="content">
            <section class="vbox">

                <div id="elfinder" class="nonborderbox"></div>
            </section>
        </section>
        <?php fnGetFooter(); ?>