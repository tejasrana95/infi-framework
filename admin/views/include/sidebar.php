<section class="vbox">
    <header class="bg-dark dk header navbar navbar-fixed-top-xs">
        <div class="navbar-header aside-md"> <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav"> <i class="fa fa-bars"></i> </a> <a href="#" class="navbar-brand" data-toggle="fullscreen"><img src="<?php echo TEMPLATE; ?>images/logo.png" class="m-r-sm"><?php echo SITENAMES; ?></a> <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".nav-user"> <i class="fa fa-cog"></i> </a> </div>

        <ul class="nav navbar-nav navbar-right hidden-xs nav-user">

            <li class="dropdown hidden-xs"> <a href="#" class="dropdown-toggle dker" data-toggle="dropdown"><i class="fa fa-fw fa-search"></i></a>
                <section class="dropdown-menu aside-xl animated fadeInUp">
                    <section class="panel bg-white">
                        <form role="search">
                            <div class="form-group wrapper m-b-none">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-info btn-icon"><i class="fa fa-search"></i></button>
                                    </span> </div>
                            </div>
                        </form>
                    </section>
                </section>
            </li>
            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <span class="thumb-sm avatar pull-left"> <img src="<?php
                        if (isset($_COOKIE['login_pic'])) {
                            echo base64_decode($_COOKIE['login_pic']);
                        } else {
                            echo TEMPLATE . IMAGES . 'default.png';
                        }
                        ?>"> </span> <?php echo base64_decode($_COOKIE['login_short_name']); ?> <b class="caret"></b> </a>
                <ul class="dropdown-menu animated fadeInRight">
                    <span class="arrow top"></span>
                    <li> <a href="<?php echo URL; ?>profile/">Profile</a> </li>
                    <li class="divider"></li>
                    <li> <a href="<?php echo URL; ?>logout.php" data-toggle="ajaxModal" >Logout</a> </li>
                    <li class="divider"></li>

                    <li> <a href="<?php echo SITEURL; ?>"><b>View Site</b></a> </li>
                </ul>
            </li>
        </ul>
    </header>
    <section>
        <section class="hbox stretch"> <!-- .aside -->
            <aside class="bg-dark lter aside-md hidden-print" id="nav">
                <section class="vbox">

                    <section class="w-f scrollable">
                        <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="3px" data-color="#333333"> <!-- nav -->
                            <nav class="nav-primary hidden-xs">
                                <ul class="nav">
                                    <li <?php ActiveUrl('home'); ?>> <a href="<?php echo URL; ?>home/" class="active"> <i class="fa fa-dashboard icon"> <b class="bg-danger"></b> </i> <span>Dashboard</span> </a> </li>
                                    <?php if (checkPermission('premission_page')) { ?>  
                                        <li <?php ActiveUrl('page'); ?> > <a href="#layout" > <i class="fa fa-columns icon"> <b class="bg-warning"></b> </i> <span class="pull-right"> <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> </span> <span>Page Management</span> </a>
                                            <ul class="nav lt">
                                                <li > <a href="<?php echo URL; ?>page/?action=add" > <i class="fa fa-angle-right"></i> <span>Add Page</span> </a> </li>
                                                <li > <a href="<?php echo URL; ?>page/?action=view" > <i class="fa fa-angle-right"></i> <span>View Page</span> </a> </li>
                                            </ul>
                                        </li>
                                        <li <?php ActiveUrl('portfolio'); ?> > <a href="#layout" > <i class="fa fa-columns icon"> <b class="bg-warning"></b> </i> <span class="pull-right"> <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> </span> <span>Portfolio</span> </a>
                                            <ul class="nav lt">
                                                <li > <a href="<?php echo URL; ?>portfolio/?action=add" > <i class="fa fa-angle-right"></i> <span>Add Portfolio</span> </a> </li>
                                                <li > <a href="<?php echo URL; ?>portfolio/?action=view" > <i class="fa fa-angle-right"></i> <span>View Portfolio</span> </a> </li>
                                            </ul>
                                        </li>
                                    <?php } ?>

                                    <?php if (checkPermission('premission_site')) { ?>  
                                        <li <?php ActiveUrl('site'); ?>> <a href="#uikit" > <i class="fa fa-flask icon"> <b class="bg-success"></b> </i> <span class="pull-right"> <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> </span> <span>Site Management</span> </a>
                                            <ul class="nav lt">
                                                <li > <a href="<?php echo URL; ?>slider/" > <i class="fa fa-angle-right"></i> <span>Slider</span> </a> </li>
                                                <li > <a href="<?php echo URL; ?>menu/" >  <i class="fa fa-angle-right"></i> <span>Menu</span> </a> </li>
                                                <li > <a href="<?php echo URL; ?>gallery/" > <i class="fa fa-angle-right"></i> <span>Gallery</span> </a> </li>
                                                <li > <a href="<?php echo URL; ?>category/" > <i class="fa fa-angle-right"></i> <span>Category management</span> </a> </li>
                                                <li > <a href="<?php echo URL; ?>template/" > <i class="fa fa-angle-right"></i> <span>Template management</span> </a> </li>
                                                <li > <a href="<?php echo URL; ?>module/" > <i class="fa fa-angle-right"></i> <span>Module management</span> </a> </li>
                                                <li > <a href="<?php echo URL; ?>systems/" > <i class="fa fa-angle-right"></i> <span>System management</span> </a> </li>
                                                <li > <a href="<?php echo URL; ?>modulemanager/" > <i class="fa fa-angle-right"></i> <span>System Module</span> </a> </li>
                                            </ul>
                                        </li>
                                    <?php } ?>
                                    <li> <a href="#"><i class="fa fa-gear icon"> <b class="bg-primary"></b> </i> <span class="pull-right"> <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> </span> <span>Setting</span> </a>
                                        <ul class="nav lt">
                                            <li ><a href="<?php echo URL; ?>settings/" > <i class="fa fa-angle-right"></i> <span>Settings</span> </a> </li>
                                            <li ><a href="<?php echo URL; ?>vqmod_manager/" > <i class="fa fa-angle-right"></i> <span>VQ Mod Manager</span> </a> </li>
                                        </ul>
                                    </li>
                                    <li <?php ActiveUrl('modules'); ?>> <a href="#" > <i class="fa fa-gear icon"> <b class="bg-primary"></b> </i> <span class="pull-right"> <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> </span> <span>Modules</span> </a>
                                        <ul class="nav lt">
                                            <?php
                                            $sql = new sql();
                                            $modules = $sql->fetchAll('sysmodule', array("enable" => "1"));
                                            foreach ($modules as $module) {
                                                ?>
                                                <li ><a href="<?php echo URL; ?>modules/<?php echo $module['module_id'] ?>/<?php echo $module['module_id'] ?>/" > <i class="fa fa-angle-right"></i> <span><?php echo $module['module_name'] ?></span> </a> </li>
                                            <?php } ?>
                                        </ul>
                                    </li>

                                    <?php if (checkPermission('premission_user')) { ?>  
                                        <li <?php ActiveUrl('user'); ?>> <a href="#" > <i class="fa fa-user icon"> <b class="bg-primary"></b> </i> <span class="pull-right"> <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> </span> <span>User</span> </a>
                                            <ul class="nav lt">
                                                <li > <a href="<?php echo URL; ?>user/?action=add" > <i class="fa fa-angle-right"></i> <span>Add User</span> </a> </li>
                                                <li > <a href="<?php echo URL; ?>user/?action=view" > <i class="fa fa-angle-right"></i> <span>View User</span> </a> </li>
                                            </ul>
                                        </li>
                                    <?php } ?>

                                    <?php if (checkPermission('permission_blog')) { ?>  
                                        <li <?php ActiveUrl('blog'); ?>> <a href="#pages" > <i class="fa fa-file-text icon"> <b class="bg-primary"></b> </i> <span class="pull-right"> <i class="fa fa-angle-down text"></i> <i class="fa fa-angle-up text-active"></i> </span> <span>Blog</span> </a>
                                            <ul class="nav lt">
                                                <li > <a href="<?php echo URL; ?>blog/?action=add" > <i class="fa fa-angle-right"></i> <span>Add Blog</span> </a> </li>
                                                <li > <a href="<?php echo URL; ?>blog/?action=view" > <i class="fa fa-angle-right"></i> <span>View Blog</span> </a> </li>
                                               <!-- <li > <a href="invoice.html" > <i class="fa fa-angle-right"></i> <span>Comments</span> </a> </li>-->
                                            </ul>
                                        </li>
                                    <?php } ?>

                                    <?php if (checkPermission('premission_filemanager')) { ?>  
                                        <li <?php ActiveUrl('filemanager'); ?>> <a href="<?php echo URL; ?>filemanager/" > <i class="fa  fa-files-o icon"> <b class="bg-info"></b> </i> <span>File Manager</span> </a> </li>
                                    <?php } ?>

                                </ul>
                            </nav>
                            <!-- / nav --> </div>
                    </section>
                    <footer class="footer lt hidden-xs b-t b-dark">

                        <div style="margin-top:15px;"><center ><?php echo SITENAME; ?> &copy; <?php echo date("Y"); ?></center></div>

                    </footer>
                </section>
            </aside>
            <!-- /.aside -->