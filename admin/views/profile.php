<?php fnGetHeader(); ?>
<section id="content">
    <section class="vbox">
        <section class="scrollable padder">
            <div class="m-b-md"><div id="noti">
                    <?php echo @$this->noti; ?>
                </div>
                <h3 class="m-b-none">Profile management</h3>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel panel-default">
                        <header class="panel-heading font-bold">User</header>
                        <div class="panel-body">
                            <form action="<?php echo URL . $this->getUrl[0]; ?>/update/" class="bs-example form-horizontal" id="form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Full Name</label>
                                    <div class="col-lg-10">
                                        <input class="form-control"  placeholder="Full Name" name="profile[name]" type="text" value="<?php echo stripslashes($this->editrow['name']); ?>" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">User Name</label>
                                    <div class="col-lg-10">
                                        <input class="form-control"  placeholder="User Name" name="profile[userName]" type="text" value="<?php echo stripslashes($this->editrow['username']); ?>" readonly='' required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Current Password</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" placeholder="Current Password" name="profile[c_passWord]" type="password" value="" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Password</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" placeholder="Password" name="profile[passWord]" type="password" value="" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Repeat Password</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" placeholder="Repeat Password" name="profile[passWord1]" type="password" value="" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Email</label>
                                    <div class="col-lg-10">
                                        <input class="form-control" placeholder="Alert & Reset password link will be send on email" name="profile[email]" type="email" value="<?php echo stripslashes($this->editrow['email']); ?>" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-2 control-label">Profile Pic</label>
                                    <div class="col-sm-10"> 
                                        <div class="form-group col-sm-4">
                                            <input type="text" class="form-control" id="filepath" placeholder="Profile Pic" name="profile[profilepic]" readonly="">
                                        </div>&nbsp;
                                        <button type="button" class="btn btn-default" onclick="openfilemanager('filepath')" >Select File</button>   
                                        <?php
                                        if ($this->editrow['profilepic']) {
                                            ?> <img src="<?php echo URL . PUBLICS ?>image_thumb.php?image_path=<?php echo $this->editrow['profilepic']; ?>&pix=20">  <?php
                                        }
                                        ?>

                                    </div>
                                </div>

                                <!---- Button -->
                                <div class="form-group">
                                    <div class="col-lg-offset-2 control-label col-lg-10">
                                        <button type="submit" name="submit" id="submit" value="Submit" class="btn btn-s-md btn-primary ">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </section>
                </div>
            </div>
        </section>
    </section>
</section>
<?php fnGetFooter(); ?>