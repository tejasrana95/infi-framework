<section id="content">
    <section class="vbox">
        <section class="scrollable padder">
            <div class="m-b-md"><div id="noti">
                    <?php echo @$this->noti; ?>
                </div>
                <h3 class="m-b-none">Test Module</h3>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel panel-default">
                        <header class="panel-heading font-bold">Dummy Module</header>
                        <div class="panel-body">
                            <form action="<?php echo URL . $this->ModulePath . 'insert/'; ?>" class="bs-example form-horizontal" id="form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Name</label>
                                    <div class="col-lg-10">

                                        <input class="form-control"  placeholder="Full Name" name="testmodule[title]" type="text" value="<?php echo stripslashes(@$this->editrow['name']); ?>" required="">
                                    </div>
                                </div>
                                <!---- Button -->
                                <div class="form-group">
                                    <div class="col-lg-offset-2 control-label col-lg-10">
                                        <button type="submit" name="submit" id="submit" value="Submit" class="btn btn-s-md btn-primary ">Insert</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </section>
                </div></div>        


            <section class="panel panel-default">
                <header class="panel-heading"> All Data </header>
                <form action="<?php echo linkgen($this->ModulePath . 'delete/'); ?>" method="post">
                    <div class="table-responsive">
                        <table class="table table-striped b-t b-light text-sm">
                            <thead>
                                <tr>
                                    <th width="20"><input type="checkbox"></th>
                                    <th class="th-sortable" data-toggle="class">Name</th>

                                </tr>
                            </thead>
                            <tbody id="records_table">
                                <?php foreach ($this->allData as $allData) { ?>
                                    <tr><td><input name="delete_testmodule_uid[]" value="<?php echo $allData['uid'] ?>" type="checkbox"></td><td><?php echo stripslashes($allData['title']); ?></td></tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                    <footer class="panel-footer">
                        <div class="row">
                            <div class="col-sm-4 hidden-xs">

                                <button type="submit" name="delete" onClick="return confirm('Are you sure to delete?');" class="btn btn-sm btn-default">Delete</button>
                            </div>

                            <div class="col-sm-8 text-right text-center-xs">

                            </div>

                        </div>
                    </footer>
                </form>
            </section>


        </section>

    </section>
</section>