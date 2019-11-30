<?php fnGetHeader(array("title"=>"VQ Mod Manager")); ?>
        <section id="content">
            <section class="vbox">

                <section class="scrollable padder">
                    <div class="m-b-md"> <?php echo @$this->noti; ?>
                        <h3 class="m-b-none">VQ Mod Manager</h3>
                    </div>


                    <div class="row">
                        <div class="col-sm-12">
                            <section class="panel panel-default">

                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="active"><a href="#list" role="tab" data-toggle="tab">List of VQ's</a></li>
                                    <li><a href="#log" role="tab" data-toggle="tab">Logs</a></li>
                                    <li><a href="#flush" role="tab" data-toggle="tab">Flush</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane fade in active" id="list">
                                        <div class="row">
                                            <div class="col-sm-12">

                                                <section class="panel panel-default">
                                                    <header class="panel-heading"> All XML's </header>
                                                    <form action="" method="post">
                                                        <table class="table table-striped m-b-none text-sm">
                                                            <thead>
                                                                <tr>
                                                                    <th>Id Name</th>
                                                                    <th>Author Name</th>
                                                                    <th>Version</th>
                                                                    <th width="150" class="text-center">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                if (!empty($this->xml_detail)) {
                                                                    foreach ($this->xml_detail as $row) {
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $row['id'] ?></td>
                                                                            <td><?php echo $row['author'] ?></td>
                                                                            <td><?php echo $row['version'] ?></td>
                                                                            <td class="text-right"><?php
                                                                                if ($row['path'] != "default.xml") {
                                                                                    if ($row['enable'] == "1") {
                                                                                        ?>
                                                                                        [<a href="<?php echo URL . $this->getPage[0]; ?>/?action=disable&xml=<?php echo $row['path'] ?>" onclick="return confirm('Are your sure to disable this XML file?\nAll the code will be disable of this XML.');">Disable</a>] [<a href="<?php echo URL . $this->getPage[0]; ?>/?action=delete&xml=<?php echo $row['path'] ?>" onclick="return confirm('Are your sure to remove this XML file?\nAll the code will be disable of this XML.');">Delete</a>]
                                                                                    <?php } else { ?>
                                                                                        [<a href="<?php echo URL . $this->getPage[0]; ?>/?action=enable&xml=<?php echo $row['path'] ?>" onclick="return confirm('Are your sure to enable this XML file?\nAll the code will be enable of this XML.');">Enable</a>] [<a href="<?php echo URL . $this->getPage[0]; ?>/?action=delete&xml=<?php echo $row['path'] ?>" onclick="return confirm('Are your sure to remove this XML file?\nAll the code will be disable of this XML.');">Delete</a>]
                                                                                    <?php
                                                                                    }
                                                                                } else {
                                                                                    echo 'System';
                                                                                }
                                                                                ?></td>  
                                                                        </tr>
                                                                        <?php
                                                                    }
                                                                }
                                                                ?>
                                                            </tbody>

                                                        </table>
                                                    </form>
                                                </section>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="log">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <section class="panel panel-default">
                                                    <header class="panel-heading font-bold"> All Error Logs </header>
                                                    <div class="panel-body">

                                                        <div class="form-group col-sm-12">
                                                            <textarea class="form-control" id="moduleSource" style="width: 100%; height: 400px;" readonly=""><?php echo $this->Log_detail; ?></textarea>
                                                        </div>
                                                        <div class="form-group col-sm-12">
                                                            <a href="<?php echo URL . $this->getPage[0] ?>/?action=deleteLog" class="btn btn-default">Clear</a>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="flush"><div class="row">
                                            <div class="col-sm-12">
                                                <section class="panel panel-default">
                                                    <header class="panel-heading font-bold"> All cached files </header>
                                                    <form method="post" accept="">
                                                        <div class="panel-body">

                                                            <div class="form-group col-sm-12">
                                                                <select class="form-control" multiple="" name="cache[]">
                                                                    <?php foreach ($this->cache_detail as $cache_detail) { ?>
                                                                        <option value="<?php echo $cache_detail; ?>"><?php echo $cache_detail; ?></option>
<?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-sm-12">
                                                                <button name="action" value="deleteCache" class="btn btn-default">Flush</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </section>
                                            </div>
                                        </div></div>
                                </div>
                            </section>
                        </div>

                    </div>







                </section>
            </section>
        </section>
<?php fnGetFooter(); ?>