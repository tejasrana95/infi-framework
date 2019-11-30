<?php http_response_code(404); ?>
<!doctype html>
<html lang="en" class="no-js">
    <?php fnGetMeta(array("title"=>"Page not found - ".SITENAME)); ?>
    <body>

        <!-- Container -->
        <div id="container">
            <!-- Header
                ================================================== -->
            <?php fnGetHeader(); ?>
            <!-- End Header -->

            <!-- content 
                    ================================================== -->
            <div id="content">
                <!-- Page Banner -->
                <div class="page-banner">
                    <div class="container">
                        <h2>404 Error</h2>
                        <ul class="page-tree">
                            <li><a href="<?php echo URL; ?>">Home</a></li>
                            <li><a href="404/">404 Error</a></li>
                        </ul>
                    </div>
                </div>
                <div class="about-box">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12" style="text-align: center;">
                                <img alt="" src="<?php echo TEMPLATE; ?>images/page_404.png" >
                                <div class="col-md-12">
                                    <a href="<?php echo URL; ?>" class="btn btn-lg btn-default"><i class="fa fa-home">&nbsp;</i>Go Home</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix">&nbsp;</div>
            <!-- End content -->

            <!--footer-->
            <?php fnGetFooter(); ?>
            <!--endfooter-->
    </body>
</html>