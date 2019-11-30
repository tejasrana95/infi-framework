<?php fnGetHeader(array("title"=>"Module"),null,array("editarea/edit_area_full.js")); ?>
		<script language="Javascript" type="text/javascript">
            // initialisation
            editAreaLoader.init({
                id: "moduleSource"	// id of the textarea to transform		
                , start_highlight: true	// if start with highlight
                , allow_resize: "both"
                , allow_toggle: true
                , word_wrap: true
                , language: "en"
                , syntax: "html"
                , toolbar: "search, go_to_line, |, undo, redo, |, select_font, |, syntax_selection, |, change_smooth_selection, highlight, reset_highlight, |, help"
                , syntax_selection_allow: "css,html,js,php,python,vb,xml,c,cpp,sql,basic,pas,brainfuck"

            });
        </script>
        <section id="content">
            <section class="vbox">
                <section class="scrollable padder">
                    <div class="m-b-md"> <?php echo @$this->noti; ?>
                        <h3 class="m-b-none"> Module Management</h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <section class="panel panel-default">
                                <header class="panel-heading"><?php if (GET('editId')) {
            echo 'Update';
        } else {
            echo 'Add';
        } ?> Module </header>
                                <div class="panel-body">
                                    <form class="bs-example form-horizontal" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Title</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" placeholder="Title" name="title" value="<?php if (GET('editId')) {
            echo stripslashes($this->editFetch['moduleName']);
        } ?>" required="" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Enable</label>
                                            <div class="col-sm-10">
                                                <label class="switch">
                                                    <input type="checkbox" name="enable" value="1" <?php if (GET('editId')) {
            echo if_radio(1, $this->editFetch['active']);
        } ?>>
                                                    <span></span> </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Source Code</label>
                                            <div class="col-lg-10">
                                                <textarea name="source" id="moduleSource" class="form-control" placeholder="Paste Your Source Code of Module." style="height: 400px;"><?php if (GET('editId')) {
            echo stripslashes($this->editFetch['source']);
        } ?></textarea>
                                            </div>
                                        </div>
<?php if (GET('editId')) { ?>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Short Code</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control" readonly="" type="text" name="shortCode" value="getModule('<?php echo GET('editId'); ?>');">
                                                </div>
                                            </div>
<?php } ?>

                                        <!---- Button -->
                                        <div class="form-group">
                                            <div class="col-lg-offset-2 control-label col-lg-10">
<?php if (GET('editId')) {
    echo '<input type="hidden" name="editId" value="' . GET('editId') . '">';
} ?>
                                                <button type="submit" name="submit" value="Submit" class="btn btn-s-md btn-primary "><?php if (GET('editId')) {
    echo 'Update';
} else {
    echo 'Add';
} ?> Module</button>
                                                <button type="submit" name="submit" value="continue" class="btn btn-s-md btn-primary ">Save &AMP; Continue</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </section>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-sm-12">
                            <form action="" method="post">
                            <section class="panel panel-default">
                                <header class="panel-heading"> Modules </header>
                                <table class="table table-striped m-b-none text-sm">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Module ID</th>
                                            <th>Module Name</th>
                                            <th width="70">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php foreach ($this->FetchModule as $FetchModule) { ?>
                                            <tr>
                                                <td><input type="checkbox" name="uid[]" value="<?php echo $FetchModule['uid'] ?>"></td>
                                                <td><?php echo stripslashes($FetchModule['uid']); ?></td>
                                                <td><?php echo stripslashes($FetchModule['moduleName']); ?></td>

                                                <td class="text-right"><div class="btn-group"> <a href="<?php echo URL . $this->getPage[0]; ?>/?action=edit&editId=<?php echo $FetchModule['uid']; ?>" ><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
    <?php if ($FetchModule['active'] == '1') { ?>
                                                            <a href="<?php echo URL . $this->getPage[0]; ?>/?action=deactivate&activateId=<?php echo $FetchModule['uid']; ?>" ><i class="fa fa-check"></i></a><?php } else { ?><a href="<?php echo URL . $this->getPage[0]; ?>/?action=activate&activateId=<?php echo $FetchModule['uid']; ?>" ><i class="fa fa-times"></i></a><?php } ?>
                                                    </div>

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
                            </form>
                        </div>

                    </div>
                </section>
                
            </section>
        </section>
<?php fnGetFooter(); ?>