<!DOCTYPE html>
<html lang="en" class="<?php echo $htmlclass; ?>">
    <head>
        <?php echo $meta; ?>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" href="<?php echo TEMPLATE; ?>css/app.v2.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo TEMPLATE; ?>css/font.css" type="text/css" cache="false" />
        <!--[if lt IE 9]> <script src="<?php echo TEMPLATE; ?>js/ie/html5shiv.js" cache="false"></script> <script src="<?php echo URL . VIEW; ?>js/ie/respond.min.js" cache="false"></script> <script src="<?php echo TEMPLATE; ?>js/ie/excanvas.js" cache="false"></script> <![endif]-->
     
        <link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css">
        <!-- elFinder CSS (REQUIRED) -->
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo TEMPLATE; ?>filemanger-Plugin/css/elfinder.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo TEMPLATE; ?>filemanger-Plugin/css/theme.css">
        <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.js"></script>
        <?php
        if (isset($links)) {
            foreach ($links as $link) {
                echo '<link rel="stylesheet" type="text/css" href="' . TEMPLATE . $link . '" />';
            }
        }
        if (isset($scripts)) {
            foreach ($scripts as $script) {
                echo '<script type="text/javascript" src="' . TEMPLATE . $script . '"></script>';
            }
        }
        ?>
    </head>
    <body>
        <?php
        if ($sidebar == true) {
            fnGetSidebar();
        }
        ?>