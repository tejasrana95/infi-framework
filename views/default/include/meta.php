<head>
    <?php echo $meta; ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,700,600,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo TEMPLATE ?>css/bootstrap.css" type="text/css" media="screen">
    <!-- REVOLUTION BANNER CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE ?>css/fullwidth.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE ?>css/settings.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE ?>css/magnific-popup.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE ?>css/owl.carousel.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE ?>css/owl.theme.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE ?>css/jquery.bxslider.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE ?>css/font-awesome.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE ?>css/style.css" media="screen">
    <link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE ?>css/responsive.css" media="screen">


    <script type="text/javascript" src="<?php echo TEMPLATE ?>js/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo TEMPLATE ?>js/jquery.migrate.js"></script>
    <script type="text/javascript" src="<?php echo TEMPLATE ?>js/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="<?php echo TEMPLATE ?>js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo TEMPLATE ?>js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?php echo TEMPLATE ?>js/raphael-min.js"></script>
    <script type="text/javascript" src="<?php echo TEMPLATE ?>js/DevSolutionSkill.min.js"></script>
    <script type="text/javascript" src="<?php echo TEMPLATE ?>js/retina-1.1.0.min.js"></script>
    <script type="text/javascript" src="<?php echo TEMPLATE ?>js/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="<?php echo TEMPLATE ?>js/plugins-scroll.js"></script>

    <!-- jQuery KenBurn Slider  -->
    <script type="text/javascript" src="<?php echo TEMPLATE ?>js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="<?php echo TEMPLATE ?>js/script.js"></script>

    <!--[if lt IE 9]>
            <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
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
