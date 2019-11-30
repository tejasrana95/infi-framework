<?php fnGetHeader(array("title"=>"Template")); ?>
        <section id="content">
            <section class="vbox">
                <section class="scrollable padder">
                    <div class="m-b-md"> <?php echo @$this->noti; ?>
                        <h3 class="m-b-none"> Template Management</h3>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <section class="panel panel-default">
                                <header class="panel-heading font-bold"> <?php
                                    if (GET('editId')) {
                                        echo "Update";
                                    } else {
                                        echo "Define";
                                    }
                                    ?> Template </header>
                                <div class="panel-body">
                                    <form class="form-inline" role="form" method="post">
                                        <div class="form-group col-sm-10">

                                            <input class="form-control" placeholder="Enter Tempate Name" type="text" name="templateName" value="<?php
                                            if (GET('editId')) {
                                                echo $this->editFetch['name'];
                                            }
                                            ?>">
                                        </div>
                                        <?php
                                        if (GET('editId')) {
                                            echo '<input type="hidden" name="edituid" value="' . $this->editFetch['uid'] . '">';
                                        }
                                        ?>
                                        <button type="submit" name="templateSubmit" value="submit" class="btn btn-default">Submit</button>
                                    </form>
                                </div>
                            </section>
                        </div>
                    </div>

                    <form action="" method="post">
                        <div class="row">
                            <div class="col-sm-12">
                                <section class="panel panel-default">
                                    <header class="panel-heading"> Templates </header>
                                    <table class="table table-striped m-b-none text-sm">
                                        <thead>
                                            <tr>
                                                <th width="20"><input type="checkbox"></th>
                                                <th>Template ID</th>
                                                <th>Template Name</th>
                                                <th width="70"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($this->FetchTem as $FetchTem) { ?>
                                                <tr>
                                                    <td><input name="uid[]" value="<?php echo $FetchTem['uid'] ?>" type="checkbox"></td>
                                                    <td><?php echo $FetchTem['uid']; ?></td>
                                                    <td><?php echo stripslashes($FetchTem['name']); ?></td>
                                                    <td class="text-right"><div class="btn-group"> <a href="<?php echo URL . $this->getPage[0]; ?>/?action=edit&editId=<?php echo $FetchTem['uid']; ?>" ><i class="fa fa-pencil"></i></a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <footer class="panel-footer">
                                        <div class="row">
                                            <div class="col-sm-4 hidden-xs">

                                                <button type="submit" name="delete" onClick="return confirm('Are you sure to delete?');" class="btn btn-sm btn-default">Delete</button>
                                            </div>



                                        </div>
                                    </footer>
                                </section>

                            </div>

                        </div>
                    </form>
                </section>
            </section>
        </section>
        <?php fnGetFooter(); ?>