<?php fnGetHeader(array("title"=>"Menu")); ?>
<section id="content">
  <section class="vbox">
    <section class="scrollable padder">
      <div class="m-b-md"> <?php echo @$this->noti; ?>
        <h3 class="m-b-none"> Menu Management</h3>
      </div>
      <?php if(GET('editId')){ ?>
      <div class="row">
        <div class="col-sm-12">
          <section class="panel panel-default">
              <header class="panel-heading font-bold"> Edit Menu </header>
              <div class="panel-body">
                <form class="form-inline" role="form" method="post">
                <table border="0" style="width:99%;">
                 <tr><td>
                       Main Manu
                     </td><td> 
                      Sub Menu
                     </td></tr>
                <tr><td>
                        <input class="form-control col-sm-12" placeholder="Menu Name" type="text" name="menuLabel" value="<?php echo stripslashes($this->editFetchParent['label']) ?>">
                     </td><td> 
                        <input class="form-control col-sm-12" placeholder="Sub Menu" type="text" name="SubmenuLabel" value="<?php echo stripslashes($this->editFetch['label']) ?>">
                     </td></tr>
               <tr><td>
                        <input class="form-control col-sm-12" placeholder="Menu Link" type="text" name="menuLink"  value="<?php echo stripslashes($this->editFetchParent['link']) ?>">
                     </td><td> 
                        <input class="form-control col-sm-12" placeholder="Sub Menu Link" type="text" name="SubmenuLink"  value="<?php echo stripslashes($this->editFetch['link']) ?>">
                     </td></tr>
                      <tr><td>
                        <input class="form-control col-sm-12" placeholder="Sort" type="text" name="menuSort"  value="<?php echo stripslashes($this->editFetchParent['sort']) ?>">
                     </td><td> 
                        <input class="form-control col-sm-12" placeholder="Sort" type="text" name="SubmenuSort"  value="<?php echo stripslashes($this->editFetch['sort']) ?>">
                     </td></tr>                   
                <tr><td>
                         <label>
                      <input  type="checkbox" name="MenunoLink" value="1" <?php echo if_radio($this->editFetchParent['noLink'] ,1) ?>>
                      No link? </label>
                     </td><td> 
                          <label>
                      <input  type="checkbox" name="SubmenunoLink" value="1"  <?php echo if_radio($this->editFetch['noLink'] ,1) ?>>
                      No link? </label>
                     </td></tr>  
                      <tr><td colspan="2" align="right">
                      <input type="hidden" name="ParentId" value="<?php  echo $this->editFetchParent['uid'] ?>">
                      <input type="hidden" name="SubmenuId" value="<?php   echo $this->editFetch['uid'] ?>">
                         <button type="submit" class="btn btn-default" name="UpdateMenu">Update Menu</button>
                    
                     </td></tr>      
                </table>
                </form>
              </div>
            </section>
        </div>
      </div>
      <?php } else {?>
       <div class="row">
        <div class="col-sm-12">
          <section class="panel panel-default">
            <header class="panel-heading bg-light">
              <ul class="nav nav-tabs nav-justified">
                <li class="active"><a href="#category" data-toggle="tab">Add Menu</a></li>
                <li class="" ><a href="#Subcategory" data-toggle="tab">Add Sub Menu</a></li>
              </ul>
            </header>
            <div class="panel-body">
              <div class="tab-content">
                <div class="tab-pane active" id="category">
                  <div class="panel-body">
                    <form class="form-inline" role="form" method="post">
                      <div class="form-group col-sm-4">
                        <label class="sr-only" >Menu Name</label>
                        <input class="form-control col-sm-12" placeholder="Menu Name" type="text" name="menu">
                      </div>
                      <div class="form-group col-sm-5">
                        <label class="sr-only" >Menu Link</label>
                        <input class="form-control col-sm-12" placeholder="Menu Link" type="text" name="link" value="">
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="sr-only" >Sort</label>
                        <input class="form-control col-sm-12" placeholder="Sort" type="text" name="sort">
                      </div>
                                            
                      <div class="checkbox m-l-xs m-r-xs col-sm-1">
                    <label>
                      <input  type="checkbox" name="noLink" value="1">
                      No link? </label>
                  </div>
                      
                      <button type="submit" class="btn btn-default" name="addMenu">Add Menu</button>
                    </form>
                  </div>
                </div>
                <div class="tab-pane " id="Subcategory">
                  <div class="panel-body">
                    <form class="form-inline" role="form" method="post">
                      <div class="form-group col-sm-2">
                        <select name="parent" class="form-control" required>
                          <option value="">--Select Menu--</option>
                          <?php foreach($this->menu as $menu){ ?>
                          <option value="<?php echo stripslashes($menu['uid']); ?>"><?php echo stripslashes($menu['label']); ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group col-sm-3">
                        <label class="sr-only" >Menu Label</label>
                        <input class="form-control col-sm-12" placeholder="Sub-Menu Name" type="text" name="label" value="">
                      </div>
                      <div class="form-group col-sm-3">
                        <label class="sr-only" >Menu Link</label>
                        <input class="form-control col-sm-12" placeholder="Sub-Menu Link" type="text" name="link" value="">
                      </div>
                      <div class="form-group col-sm-1">
                        <label class="sr-only" >Sort</label>
                        <input class="form-control col-sm-12" placeholder="Sort" type="text" name="sort">
                      </div>
                                            
                      <div class="checkbox m-l-xs m-r-xs col-sm-1">
                    <label>
                      <input  type="checkbox" name="noLink" value="1">
                      No link? </label>
                  </div>
                      <button type="submit" class="btn btn-default" name="addSubMenu">Add Sub-Category</button>
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
            <header class="panel-heading"> Menu </header>
            <table class="table table-striped m-b-none text-sm">
              <thead>
                <tr>
                      <th width="20"><input type="checkbox"></th>
                  <th>Menu</th>
                  <th>Sub-Menu</th>
                  <th width="70"></th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($this->FetchMenu as $FetchMenu){ ?>
                <tr>
                      <td><input name="uid[]" value="<?php echo $FetchMenu['uid'] ?>" type="checkbox"></td>
                  <td><?php echo ($FetchMenu['label']); ?></td>
                  <td><?php echo getMenu($FetchMenu['parent']); ?></td>
                  <td class="text-right"><div class="btn-group"> <a href="<?php  echo URL.$this->getPage[0]; ?>/?action=edit&editId=<?php echo $FetchMenu['uid']; ?>" ><i class="fa fa-pencil"></i></a>
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