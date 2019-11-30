<?php fnGetHeader(array("title"=>"Category Management")); ?>
        <section id="content">
            <section class="vbox">
                <section class="scrollable padder">
                    <div class="m-b-md"> <?php echo @$this->noti; ?>
                        <h3 class="m-b-none"> Category Management</h3>
                    </div>
                    <?php if (GET('editId')) {
                        
                        ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <section class="panel panel-default">
                                    <header class="panel-heading font-bold"> Edit Category </header>
                                    <div class="panel-body">
                                        <form class="form-inline" role="form" method="post">
                                            <div class="form-group col-sm-5">

                                                <input class="form-control" placeholder="Category" name="categorys" type="text" value="<?php echo getCategory($this->editFetch['parent']); ?>">
                                            </div>
                                            <div class="form-group col-sm-5">
                                                <input class="form-control" placeholder="Sub Cateogry" name="subCat" type="text" value="<?php echo stripslashes($this->editFetch['text']); ?>">
                                            </div>
                                            <input type="hidden" name="parentId" value="<?php echo ($this->editFetch['parent']); ?>">
                                            <input type="hidden" name="editId" value="<?php echo GET('editId'); ?>">
                                            <button type="submit" name="update" class="btn btn-default">Submit</button>
                                        </form>
                                    </div>
                                </section>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <section class="panel panel-default">
                                    <header class="panel-heading bg-light">
                                        <ul class="nav nav-tabs nav-justified">
                                            <li class=""><a href="#category" data-toggle="tab">Add Category</a></li>
                                            <li class="active"><a href="#Subcategory" data-toggle="tab">Add Sub Category</a></li>
                                        </ul>
                                    </header>
                                    <div class="panel-body">
                                        <div class="tab-content">
                                            <div class="tab-pane" id="category">
                                                <div class="panel-body">
                                                    <form class="form-inline" role="form" method="post">
                                                        <div class="form-group col-sm-10">
                                                            <label class="sr-only" >Category Name</label>
                                                            <input class="form-control col-sm-12" placeholder="Category Name" type="text" name="category">
                                                        </div>
                                                        <button type="submit" class="btn btn-default" name="addCategory">Add Category</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="tab-pane active" id="Subcategory">
                                                <div class="panel-body">
                                                    <form class="form-inline" role="form" method="post">
                                                        <div class="form-group col-sm-5">
                                                            <select name="categoryId" class="form-control" required>
                                                                <option value="">--Select Category--</option>
                                                                <?php foreach ($this->category as $category) { ?>
                                                                    <option value="<?php echo $category['uid']; ?>"><?php echo stripslashes($category['text']); ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-sm-5">
                                                            <input class="form-control " placeholder="Sub-Category Name" type="text" name="Subcategory">
                                                        </div>
                                                        <button type="submit" class="btn btn-default" name="addSubCategory">Add Sub-Category</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>


                    <?php } ?>
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-sm-12">
                                <section class="panel panel-default">
                                    <header class="panel-heading"> Category </header>
                                    <table class="table table-striped m-b-none text-sm">
                                        <thead>
                                            <tr>
                                                <th width="20"><input type="checkbox"></th>
                                                <th>Category</th>
                                                <th>Sub-category</th>
                                                <th width="70"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($this->Fetchcat as $Fetchcat) { ?>
                                                <tr>
                                                    <td><input name="uid[]" value="<?php echo $Fetchcat['uid'] ?>" type="checkbox"></td>
                                                    <td><?php echo getCategory($Fetchcat['parent']); ?></td>
                                                    <td><?php echo getCategory($Fetchcat['uid']); ?></td>
                                                    <td class="text-right"><div class="btn-group"> <a href="<?php echo URL; ?>category/?action=edit&editId=<?php echo $Fetchcat['uid']; ?>" ><i class="fa fa-pencil"></i></a>
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