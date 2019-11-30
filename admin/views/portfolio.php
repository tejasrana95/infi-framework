<?php fnGetHeader(array("title"=>"Portfolio Management")); ?>
<section id="content">
  <section class="vbox">
    <section class="scrollable padder">
      <div class="m-b-md"> <?php echo @$this->noti; ?>
        <h3 class="m-b-none"><?php if(GET('action')=='edit'){ echo 'Edit'; } else { echo 'Add';} ?> Portfolio</h3>
      </div>
      <div class="row">
        <div class="col-sm-12">
         
              <?php if(GET('action')=="add" || GET('action')=="edit"){ ?>
               <section class="panel panel-default">
            <header class="panel-heading font-bold">Page</header>
            <div class="panel-body">
              <form class="bs-example form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="col-lg-2 control-label">Title</label>
                  <div class="col-lg-10">
                    <input class="form-control" placeholder="Title" name="title" type="text" value="<?php if(GET('editUid')) { echo stripslashes($this->editrow['title']); } ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-lg-12 control-label">
                    <center>
                      Content
                    </center>
                  </label>
                  <div class="col-lg-12">
                    <textarea name="content" class="form-control mceEditor" style="height:500px;"><?php if(GET('editUid')) { echo stripslashes($this->editrow['content']); } ?></textarea>
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-lg-2 control-label">Client</label>
                  <div class="col-lg-10">
                    <input class="form-control" placeholder="Client" name="client" type="text" value="<?php if(GET('editUid')) { echo stripslashes($this->editrow['client']); } ?>" required>
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-lg-2 control-label">Type</label>
                  <div class="col-lg-10">
                    <input class="form-control" placeholder="Type" name="type" type="text" value="<?php if(GET('editUid')) { echo stripslashes($this->editrow['type']); } ?>" required>
                  </div>
                </div>
                  <div class="form-group">
                  <label class="col-lg-2 control-label">Technology</label>
                  <div class="col-lg-10">
                    <input class="form-control" placeholder="Technology" name="technology" type="text" value="<?php if(GET('editUid')) { echo stripslashes($this->editrow['technology']); } ?>" required>
                  </div>
                </div>
               
                 <div class="form-group">
                    <label class="col-sm-2 control-label">File input</label>
                    <div class="col-sm-10">
                      <input style="left: -500px;" id="filestyle-0" class="filestyle" data-icon="false" data-classbutton="btn btn-default" data-classinput="form-control inline input-s" type="file" name="featuredImage">    
                      
                      <?php if(GET('editUid')) { if($this->editrow['featuredImage']){ ?> <img src="<?php echo URL.PUBLICS ?>image_thumb.php?image_path=<?php echo $this->editrow['featuredImage']; ?>&pix=20">  <?php } } ?>
                      
                    </div>
                  </div>
                
               
                
                <!---- Button -->
                <div class="form-group">
                  <div class="col-lg-offset-2 control-label col-lg-10">
                  <?php if(GET('editUid')) { echo '<input type="hidden" name="editUid" value="'.GET('editUid').'">'; }?>
                    <button type="submit" name="submit" value="Submit" class="btn btn-s-md btn-primary ">
					<?php if(GET('editUid')) { echo 'Update'; } else { echo "Create"; }?>
                    </button>
                  </div>
                </div>
              </form>
                </div>
          </section>
        </div>
      </div>

              <?php }
				  else {
				  ?>
                  
              <section class="panel panel-default">
                <header class="panel-heading"> All Pages </header>
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
                        <th class="th-sortable" data-toggle="class">Title </th>
                        <th>Client</th>
                        <th>Type</th>
                        <th>Technology</th>
                     
                        <th width="60"></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php  ?>
                     <?php foreach($this->PagingNationFetch as $PagingNationFetch){ ?>
                     <tr>
                        <td><input name="uid[]" value="<?php echo $PagingNationFetch['uid'] ?>" type="checkbox"></td>
                        <td><?php echo stripslashes($PagingNationFetch['title']) ?></td>
                        <td><?php echo stripslashes($PagingNationFetch['client']) ?></td>
                        <td><?php echo getCategory($PagingNationFetch['type']); ?></td>
                        <td><?php echo $PagingNationFetch['technology'] ?></td>
                        <td><a href="<?php echo URL ?>portfolio/?action=edit&editUid=<?php echo $PagingNationFetch['uid'] ?>"><i class="fa fa-edit"></i></a>
                        <a href="<?php echo SITEURL ?>portfolio/?portfolioId=<?php echo $PagingNationFetch['uid'] ?>" target="_blank"><i class="fa fa-eye"></i></a></td>
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
			echo pagination($this->statement,$this->limit,$this->page,'?',$this->oldData);
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

<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<?php include('js/editor.php'); ?>

<script>
function GetKeyword()
{
	$("#searchTags").val($("#keywords").val());
}

$(function(){

   // listen to events on the category dropdown
   $('#category').change(function(){

       // don't do anything if use selects "Select Cat"
       if($(this).val() !== "Select Cat") {

           
           $.get('<?php echo URL.PUBLICS; ?>getCategory.php?cat='+ $(this).val(), function(result){
               $('#SubCategory').html(result);
           });

       }

   });

});
</script>
<?php fnGetFooter(array("js/file-input/bootstrap-filestyle.min.js")); ?>