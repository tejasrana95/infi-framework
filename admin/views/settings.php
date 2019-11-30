<?php fnGetHeader(array("title"=>"Settings")); ?>
        <section id="content">
            <section class="vbox">
                <section class="scrollable padder">
                    <div class="m-b-md"><div id="noti">
                            <?php echo @$this->noti; ?>
                        </div>
                        <h3 class="m-b-none">Settings</h3>
                    </div>

                    <section class="panel panel-default">

                        <form action="" method="post">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="active"><a href="#theme" role="tab" data-toggle="tab">Theme</a></li>
                                <li ><a href="#site" role="tab" data-toggle="tab">Site Info</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="theme">

                                    <div class="form-group">
                                        <label class="col-lg-4 control-label">Theme</label>
                                        <div class="col-sm-8">
                                            <label class="switch">
                                                <select name="setting[THEME]" class="form-control">
                                                    <?php foreach ($this->theme_detail as $theme) { ?>
                                                        <option value="<?php echo $theme ?>" <?php echo if_select(@$this->systemrow["THEME"], $theme) ?>><?php echo $theme; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="tab-pane" id="site">
                                    <div class="table-responsive">

                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Site Site name</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="setting[SITENAME]" class="form-control" value="<?php echo @$this->systemrow["SITENAME"] ?>" placeholder="e.g. John's Blog">                                               
                                            </div>
                                        </div>
                                        <div class="clearfix">&nbsp;</div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Site Title</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="setting[TITLE]" class="form-control" value="<?php echo @$this->systemrow["TITLE"] ?>" placeholder="e.g. John's Blog">                                               
                                            </div>
                                        </div>
                                        <div class="clearfix">&nbsp;</div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Title Postfix</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="setting[TITLEPOSTFIX]" class="form-control" value="<?php echo @$this->systemrow["TITLEPOSTFIX"] ?>" placeholder="e.g. JOHN">                                               
                                            </div>
                                        </div>
                                        
                                        <div class="clearfix">&nbsp;</div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Site Keywords</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="setting[KEYWORDS]" class="form-control" value="<?php echo @$this->systemrow["KEYWORDS"] ?>" placeholder="e.g. best blog, new blog etc">                                               
                                            </div>
                                        </div>
                                        <div class="clearfix">&nbsp;</div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Site Description</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="setting[DESCRIPTION]" class="form-control" value="<?php echo @$this->systemrow["DESCRIPTION"] ?>" placeholder="e.g. This is a john's blog">                                               
                                            </div>
                                        </div>
                                        <div class="clearfix">&nbsp;</div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Site URL</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="setting[WWW]" class="form-control" value="<?php echo @$this->systemrow["WWW"] ?>" placeholder="e.g. www.example.com">                                               
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="clearfix">&nbsp;</div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Email</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="setting[MAIL]" class="form-control" value="<?php echo @$this->systemrow["MAIL"] ?>" placeholder="e.g. john@example.com">                                               
                                            </div>
                                        </div>
<div class="clearfix">&nbsp;</div>
                                        <div class="form-group">
                                            <label class="col-lg-4 control-label">Author</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="setting[AUTHOR]" class="form-control" value="<?php echo @$this->systemrow["AUTHOR"] ?>" placeholder="e.g. Abc Company">                                               
                                            </div>
                                        </div>



                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" name="submit" value="submit" class="btn btn-default">Submit</button>
                                </div>
                            </div>
                        </form>
                    </section>

                </section>
            </section>




        </section>

<?php fnGetFooter(array("js/file-input/bootstrap-filestyle.min.js")); ?>