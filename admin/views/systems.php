<?php fnGetHeader(array("title"=>"System")); ?>
        <section id="content">
            <section class="vbox">
                <section class="scrollable padder">
                    <div class="m-b-md"> <?php echo @$this->noti; ?>
                        <h3 class="m-b-none"> System Management</h3>
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
                                            <div class="col-lg-5">
                                                <input class="form-control" placeholder="Title" name="system" value="<?php if (GET('editId')) {
            echo stripslashes($this->editFetch['system']);
        } ?>" required="" type="text">
                                            </div>
                                            <div class="col-lg-5">
                                                <input class="form-control" placeholder="Value" name="value" value="<?php if (GET('editId')) {
            echo stripslashes($this->editFetch['value']);
        } ?>" required="" type="text">
                                            </div>
                                             <div class="col-lg-2">
<?php if (GET('editId')) {
    echo '<input type="hidden" name="editId" value="' . GET('editId') . '">';
} ?>
                                                <button type="submit" name="submit" value="Submit" class="btn btn-s-md btn-primary "><?php if (GET('editId')) {
    echo 'Update';
} else {
    echo 'Add';
} ?> System Variable</button>
                                            </div>
                                        </div>
                                       

                                        <!---- Button -->
                                        <div class="form-group">
                                           
                                        </div>
                                    </form>
                                </div>
                            </section>
                        </div>

                    </div>

                    
                    
                    
                    
                    
                    <div class="row">
                        <div class="col-sm-12">
                            
                            <section class="panel panel-default">
                                <header class="panel-heading"> System </header>
                                <form action="" method="post">
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
<?php foreach ($this->FetchSystem as  $FetchSystem) { ?>
                                            <tr>
                                                <td><input type="checkbox" name="uid[]" value="<?php echo $FetchSystem['uid'] ?>"></td>
                                                <td><?php echo stripslashes($FetchSystem['system']); ?></td>
                                                <td><?php echo stripslashes($FetchSystem['value']); ?></td>
                                                
                                                <td class="text-right"> <a href="<?php echo URL . $this->getPage[0]; ?>/?action=edit&editId=<?php echo $FetchSystem['uid']; ?>" ><i class="fa fa-pencil"></i></a></td>  
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
                                </form>
                            </section>
                        </div>

                    </div>
                </section>
            </section>
        </section>
<?php fnGetFooter(); ?>