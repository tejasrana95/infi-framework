<?php fnGetHeader(array("title" => "User Management")); ?>
<section id="content">
    <section class="vbox">
        <section class="scrollable padder">
            <div class="m-b-md"> <?php echo @$this->noti; ?>
                <h3 class="m-b-none"><?php
                    if (GET('action') == 'edit') {
                        echo 'Edit';
                    } else {
                        echo 'Add';
                    }
                    ?> User</h3>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <?php if (GET('action') == "add" || GET('action') == "edit") { ?>
                        <section class="panel panel-default">
                            <header class="panel-heading font-bold">User</header>
                            <div class="panel-body">
                                <form class="bs-example form-horizontal" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Full Name</label>
                                        <div class="col-lg-10">
                                            <input class="form-control"  placeholder="Full Name" name="name" type="text" value="<?php
                                            if (GET('editUid')) {
                                                echo stripslashes($this->editrow['name']);
                                            }
                                            ?>" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">User Name</label>
                                        <div class="col-lg-10">
                                            <input class="form-control"  placeholder="User Name" name="userName" type="text" value="<?php
                                            if (GET('editUid')) {
                                                echo stripslashes($this->editrow['username']);
                                            }
                                            ?>"  <?php
                                                   if (GET('editUid')) {
                                                       echo "readonly=''";
                                                   } else {
                                                       echo "required";
                                                   }
                                                   ?> required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Password</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" placeholder="Password" name="passWord" type="password" value="" <?php
                                                   if (!GET('editUid')) {
                                                       echo "required";
                                                   }
                                                   ?> required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Repeat Password</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" placeholder="Repeat Password" name="passWord1" type="password" value="" <?php
                                                   if (!GET('editUid')) {
                                                       echo "required";
                                                   }
                                                   ?> required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Email</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" placeholder="Alert & Reset password link will be send on email" name="email" type="email" value="<?php
                                                   if (GET('editUid')) {
                                                       echo stripslashes($this->editrow['email']);
                                                   }
                                                   ?>" required="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label">Permission(s)</label>

                                        <div class="col-sm-3">
                                            <label class="col-lg-6 control-label">Can Manage Blog</label>
                                            <label class="switch">
                                                <input name="blog_premission" value="1" type="checkbox" <?php
                                                   if (GET('editUid')) {
                                                       echo if_radio($this->editPermission['permission_blog'], '1');
                                                   }
                                                   ?> >
                                                <span></span> </label>
                                            </label>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="col-lg-6 control-label">Can Manage Page</label>
                                            <label class="switch">
                                                <input name="page_premission" value="2" type="checkbox" <?php
                                                   if (GET('editUid')) {
                                                       echo if_radio($this->editPermission['premission_page'], '2');
                                                   }
                                                   ?>>
                                                <span></span> </label>
                                            </label>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="col-lg-6 control-label">Can Manage Site</label>
                                            <label class="switch">
                                                <input name="site_premission" value="3" type="checkbox" <?php
                                                   if (GET('editUid')) {
                                                       echo if_radio($this->editPermission['premission_site'], '3');
                                                   }
                                                   ?>>
                                                <span></span> </label>
                                            </label>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label"></label>

                                        <div class="col-sm-3">
                                            <label class="col-lg-6 control-label">Can Access FileManager</label>
                                            <label class="switch">
                                                <input name="filemanager_premission" value="4" type="checkbox" <?php
                                                   if (GET('editUid')) {
                                                       echo if_radio($this->editPermission['premission_filemanager'], '4');
                                                   }
                                                   ?>>
                                                <span></span> </label>
                                            </label>
                                        </div>
                                        <div class="col-sm-3">
                                            <label class="col-lg-6 control-label">Can Manage User</label>
                                            <label class="switch">
                                                <input name="user_premission" value="5" type="checkbox" <?php
                                                   if (GET('editUid')) {
                                                       echo if_radio($this->editPermission['premission_user'], '5');
                                                   }
                                                   ?>>
                                                <span></span> </label>
                                            </label>
                                        </div>

                                    </div>






                                    <!---- Button -->
                                    <div class="form-group">
                                        <div class="col-lg-offset-2 control-label col-lg-10">
    <?php
    if (GET('editUid')) {

        echo '<input type="hidden" name="editUid" value="' . GET('editUid') . '">';
    }
    ?>
                                            <button type="submit" name="submit" value="Submit" class="btn btn-s-md btn-primary ">
                <?php
                if (GET('editUid')) {
                    echo 'Update';
                } else {
                    echo "Create";
                }
                ?>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>

    <?php
} else {
    ?>

                <section class="panel panel-default">
                    <header class="panel-heading"> All User </header>
                    <div class="row text-sm wrapper">
                        <form action="" method="get">
                            <div class="col-sm-3">
                                <div class="input-group">
                                    <input class="input-sm form-control" placeholder="Search" name="q" type="text">
                                    <span class="input-group-btn">
                                        <input type="hidden" name="action" value="view">
                                        <button class="btn btn-sm btn-default" type="submit" name="search" value="search">Go!</button>
                                    </span> </div>
                            </div>
                        </form>
                    </div>
                    <form action="" method="post">
                        <div class="table-responsive">
                            <table class="table table-striped b-t b-light text-sm">
                                <thead>
                                    <tr>
                                        <th width="20"><input type="checkbox"></th>
                                        <th class="th-sortable" data-toggle="class">Name </th>
                                        <th class="th-sortable" data-toggle="class">User Name </th>
                                        <th>Email</th>
                                        <th>IP Address</th>
                                        <th>Last Access</th>
                                        <th>Permission</th>
                                        <th width="70"></th>
                                    </tr>
                                </thead>
                                <tbody>
    <?php ?>
                                    <?php foreach ($this->PagingNationFetch as $PagingNationFetch) { ?>
                                        <tr>
                                            <td><input name="uid[]" value="<?php echo $PagingNationFetch['uid'] ?>" type="checkbox"></td>
                                            <td><?php echo $PagingNationFetch['name'] ?></td>
                                            <td><?php echo $PagingNationFetch['username'] ?></td>
                                            <td><?php echo $PagingNationFetch['email'] ?></td>
                                            <td><?php echo $PagingNationFetch['ip'] ?></td>
                                            <td><?php echo $PagingNationFetch['lastAcess'] ?></td>
                                            <td><?php echo $PagingNationFetch['permission']; ?></td>

                                            <td class="text-right"><div class="btn-group">
                                                    <a href="<?php echo URL ?>user/?action=edit&editUid=<?php echo $PagingNationFetch['uid'] ?>"><i class="fa fa-edit"></i></a>

                                                    &nbsp;&nbsp;
        <?php if ($PagingNationFetch['active'] == '1') { ?>
                                                        <a href="<?php echo URL . $this->getPage[0]; ?>/?action=deactivate&activateId=<?php echo $PagingNationFetch['uid']; ?>" ><i class="fa fa-check"></i></a><?php } else { ?><a href="<?php echo URL . $this->getPage[0]; ?>/?action=activate&activateId=<?php echo $PagingNationFetch['uid']; ?>" ><i class="fa fa-times"></i></a><?php } ?>
                                                </div>
                                            </td>
                                        </tr>
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
    <?php
    echo pagination($this->statement, $this->limit, $this->page, '?', $this->oldData);
    ?>
                                </div>

                            </div>
                        </footer>
                    </form>
                </section>

<?php } ?>
        </section>
    </section>
</section>
<?php fnGetFooter(); ?>