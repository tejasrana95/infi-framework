<?php fnGetHeader(array("title"=>"Dashboard")); ?>
        <section id="content">
            <section class="vbox">
                <section class="scrollable padder">

                    <ul class="breadcrumb no-border no-radius b-b b-light pull-in">

                        <li>
                            <a href="<?php echo URL; ?>">
                                <i class="fa fa-home">
                                </i>
                                Home
                            </a>
                        </li>

                        <li class="active">
                            Dashboard
                        </li>

                    </ul>

                    <div class="m-b-md">

                        <h3 class="m-b-none">
                            Visitor Status
                        </h3>

                        <small>
                            Welcome back, <?php echo base64_decode($_COOKIE['login_short_name']); ?>
                        </small>

                    </div>

                    <section class="panel panel-default">

                        <div class="row m-l-none m-r-none bg-light lter">

                            <div class="col-sm-6 col-md-3 padder-v b-r b-light">

                                <span class="fa-stack fa-2x pull-left m-r-sm">

                                    <i class="fa fa-circle fa-stack-2x text-info">
                                    </i>

                                    <i class="fa fa-male fa-stack-1x text-white">
                                    </i>

                                </span>

                                <a class="clear" href="#">

                                    <span class="h3 block m-t-xs">
                                        <strong>
                                            52,000
                                        </strong>
                                    </span>

                                    <small class="text-muted text-uc">
                                        New robots
                                    </small>

                                </a>

                            </div>

                            <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">

                                <span class="fa-stack fa-2x pull-left m-r-sm">

                                    <i class="fa fa-circle fa-stack-2x text-warning">
                                    </i>

                                    <i class="fa fa-bug fa-stack-1x text-white">
                                    </i>

                                    <span style="width: 50px; height: 50px; line-height: 50px;" class="easypiechart pos-abt easyPieChart" data-percent="100" data-line-width="4" data-track-color="#fff" data-scale-color="false" data-size="50" data-line-cap="butt" data-animate="2000" data-target="#bugs" data-update="3000">
                                        <canvas width="50" height="50">
                                        </canvas>
                                    </span>

                                </span>

                                <a class="clear" href="#">

                                    <span class="h3 block m-t-xs">
                                        <strong id="bugs">
                                            1068
                                        </strong>
                                    </span>

                                    <small class="text-muted text-uc">
                                        Bugs intruded
                                    </small>

                                </a>

                            </div>

                            <div class="col-sm-6 col-md-3 padder-v b-r b-light">

                                <span class="fa-stack fa-2x pull-left m-r-sm">

                                    <i class="fa fa-circle fa-stack-2x text-danger">
                                    </i>

                                    <i class="fa fa-fire-extinguisher fa-stack-1x text-white">
                                    </i>

                                    <span style="width: 50px; height: 50px; line-height: 50px;" class="easypiechart pos-abt easyPieChart" data-percent="100" data-line-width="4" data-track-color="#f5f5f5" data-scale-color="false" data-size="50" data-line-cap="butt" data-animate="3000" data-target="#firers" data-update="5000">
                                        <canvas width="50" height="50">
                                        </canvas>
                                    </span>

                                </span>

                                <a class="clear" href="#">

                                    <span class="h3 block m-t-xs">
                                        <strong id="firers">
                                            759
                                        </strong>
                                    </span>

                                    <small class="text-muted text-uc">
                                        Extinguishers ready
                                    </small>

                                </a>

                            </div>

                            <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">

                                <span class="fa-stack fa-2x pull-left m-r-sm">

                                    <i class="fa fa-circle fa-stack-2x icon-muted">
                                    </i>

                                    <i class="fa fa-clock-o fa-stack-1x text-white">
                                    </i>

                                </span>

                                <a class="clear" href="#">

                                    <span class="h3 block m-t-xs">
                                        <strong>
                                            31:50
                                        </strong>
                                    </span>

                                    <small class="text-muted text-uc">
                                        Left to exit
                                    </small>

                                </a>

                            </div>

                        </div>

                    </section>

              



                </section>

            </section>
        </section>
        <?php fnGetFooter(); ?>