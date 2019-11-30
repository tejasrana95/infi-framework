<?php fnGetHeader(array("title"=>"Page Management")); ?>
        <section id="content">
            <section class="vbox">
                <section class="scrollable padder">
                    <div class="m-b-md"> <?php echo @$this->noti; ?>
                        <h3 class="m-b-none"><?php if (GET('action') == 'edit') {
            echo 'Edit';
        } else {
            echo 'Add';
        } ?> Page</h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">

<?php if (GET('action') == "add" || GET('action') == "edit") { ?>
                                <section class="panel panel-default">
                                    <header class="panel-heading font-bold">Page</header>
                                    <div class="panel-body">
                                        <form class="bs-example form-horizontal" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Title</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control" placeholder="Title" name="title" type="text" value="<?php if (GET('editUid')) {
        echo stripslashes($this->editrow['title']);
    } ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Heading</label>
                                                <div class="col-lg-10">
                                                    <input class="form-control" placeholder="Heading" name="heading" type="text" value="<?php if (GET('editUid')) {
        echo stripslashes($this->editrow['heading']);
    } ?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-12 control-label">
                                                    <center>
                                                        Content
                                                    </center>
                                                </label>
                                                <div class="col-lg-12">
                                                    <textarea name="content" class="form-control mceEditor" style="height:500px;"><?php if (GET('editUid')) {
        echo stripslashes($this->editrow['content']);
    } ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Category</label>
                                                <div class="col-lg-10">
                                                    
                                                    <select name="category" class="form-control" id="category" required>
                                                        <option value="">--Select Category--</option>
                                                        <?php foreach ($this->category as $category) { ?>
                                                            <option value="<?php echo $category['uid']; ?>" <?php if (GET('editUid')) {
                                                        echo if_select($category['uid'], $this->editrow['category']);
                                                    } ?>><?php echo $category['text']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Sub Category</label>
                                                <div class="col-lg-10">
                                                    <select name="subCategory" class="form-control" id="SubCategory">
                                                        <option value="">--Select Sub Category--</option>
                                                        <?php if (GET('editUid')) {
                                                            foreach ($this->Subcategory as $Subcategory) {
                                                                ?>
                                                                <option value="<?php echo $Subcategory['uid']; ?>" <?php if (GET('editUid')) {
                                                                    echo if_select($Subcategory['uid'], $this->editrow['subCategory']);
                                                                } ?>><?php echo $Subcategory['text']; ?></option>
        <?php }
    } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">Template</label>
                                                <div class="col-lg-10">
                                                    <select name="template" class="form-control" required>
                                                        <option value="">--Select Template--</option>
                                            <?php foreach ($this->template as $template) { ?>
                                                            <option value="<?php echo $template['uid']; ?>" <?php if (GET('editUid')) {
                                            echo if_select($template['uid'], $this->editrow['template']);
                                        } ?>><?php echo $template['name']; ?></option>
    <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-lg-2 control-label">File input</label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="filepath" placeholder="Image File" name="image" readonly="">
                                                </div>&nbsp;
                                                <button type="button" class="btn btn-default" onclick="openfilemanager('filepath')" >Select File</button>   <?php if (@$_GET['editUid']) {
        if ($this->editrow['featuredImage']) { ?> <img src="<?php echo URL . PUBLICS ?>image_thumb.php?image_path=<?php echo $this->editrow['featuredImage']; ?>&pix=20">  <?php }
    } ?>
                                            </div>

    <?php if (GET('editUid')) { ?> <div class="form-group">
                                                    <label class="col-lg-2 control-label">Permalink</label>
                                                    <div class="col-lg-10">
                                                        <input class="form-control" placeholder="Permalink" id="permalink" name="permalink" type="text" value="<?php if (GET('editUid')) {
            echo stripslashes($this->editrow['permalink']);
        } ?>" required onkeyup="doDashes(this.value);">
                                                    </div>
                                                </div> <?php } ?>
                                            <hr>
                                            <div class="form-group">
                                                <label class="col-lg-12 ">
                                                    <center>
                                                        Module Control
                                                    </center>
                                                </label>
                                                <div class="col-sm-12">
                                                    <section class="panel panel-default pos-rlt clearfix">
                                                        <header class="panel-heading">
                                                            <ul class="nav nav-pills pull-right">
                                                                <li> <a href="#" class="panel-toggle text-muted active"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a> </li>
                                                            </ul>
                                                            Modules </header>
                                                        <div class="panel-body clearfix collapse">
                                                            <div class="form-group">
                                                                <label class="col-lg-3 control-label">Module List</label>


                                                                <div class="col-lg-9 m-l-n">
                                                                    <select multiple=""  name="modules[]" class="form-control">
    <?php foreach ($this->modules as $modules) { ?>
                                                                            <option value="<?php echo $modules['uid'] ?>" <?php if (GET('editUid')) {
            if (in_array($modules['uid'], $this->editmodules)) {
                echo 'selected=""';
            }
        } ?>><?php echo stripslashes($modules['moduleName']); ?></option>
    <?php } ?>
                                                                    </select>
                                                                </div>


                                                            </div>
                                                    </section>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="col-lg-12 ">
                                                    <center>
                                                        Advance Control
                                                    </center>
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <section class="panel panel-default pos-rlt clearfix">
                                                    <header class="panel-heading">
                                                        <ul class="nav nav-pills pull-right">
                                                            <li> <a href="#" class="panel-toggle text-muted active"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a> </li>
                                                        </ul>
                                                        SEO </header>
                                                    <div class="panel-body clearfix collapse">
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Meta Title</label>
                                                            <div class="col-lg-9">
                                                                <input class="form-control" placeholder="SEO Title" name="seoTitle" type="text" id="" value="<?php if (GET('editUid')) {
        echo stripslashes($this->editrow['seoTitle']);
    } ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Meta Keywords</label>
                                                            <div class="col-lg-9">
                                                                <input class="form-control" placeholder="Keywords" name="keywords" type="text" id="keywords" value="<?php if (GET('editUid')) {
        echo stripslashes($this->editrow['keywords']);
    } ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-3 control-label">Meta Description</label>
                                                            <div class="col-lg-9">
                                                                <input class="form-control" placeholder="Meta Description" name="description" type="text" value="<?php if (GET('editUid')) {
        echo stripslashes($this->editrow['description']);
    } ?>">
                                                            </div>
                                                        </div>
                                                        <div class="radio col-lg-6 ">
                                                            <label>
                                                                <input type="radio" name="crawl" value="1"  <?php if (GET('editUid')) {
        echo if_radio('1', $this->editrow['crawl']);
    } else {
        echo 'checked';
    } ?>>
                                                                Allow Crawl </label>
                                                        </div>
                                                        <div class="radio col-lg-6">
                                                            <label>
                                                                <input type="radio" name="crawl" value="0" <?php if (GET('editUid')) {
        echo if_radio('0', $this->editrow['crawl']);
    } ?>>
                                                                NO INDEX, NO FOLLOW </label>
                                                        </div>
                                                </section>
                                            </div>
                                            <div class="col-sm-6">
                                                <section class="panel panel-default pos-rlt clearfix">
                                                    <header class="panel-heading">
                                                        <ul class="nav nav-pills pull-right">
                                                            <li> <a href="#" class="panel-toggle text-muted active"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a> </li>
                                                        </ul>
                                                        Optional Content </header>
                                                    <div class="panel-body clearfix collapse">
                                                        <div class="form-group">
                                                            <label class="col-lg-4 control-label">Show Optional Content 1</label>
                                                            <div class="col-lg-8">
                                                                <input class="form-control" placeholder="Optional Content 1" name="optional1" type="text" value="<?php if (GET('editUid')) {
        echo stripslashes($this->editrow['optional1']);
    } ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-4 control-label">Show Optional Content 2</label>
                                                            <div class="col-lg-8">
                                                                <input class="form-control" placeholder="Optional Content 2" name="optional2" type="text" value="<?php if (GET('editUid')) {
        echo stripslashes($this->editrow['optional2']);
    } ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-4 control-label">Show Optional Content 3</label>
                                                            <div class="col-lg-8">
                                                                <input class="form-control" placeholder="Optional Content 3" name="optional3" type="text" value="<?php if (GET('editUid')) {
        echo stripslashes($this->editrow['optional3']);
    } ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="col-lg-12">
                                                    <center>
                                                        Search and Javascript / CSS Control
                                                    </center>
                                                </label>
                                            </div>
                                            <div class="col-sm-6">
                                                <section class="panel panel-default pos-rlt clearfix">
                                                    <header class="panel-heading">
                                                        <ul class="nav nav-pills pull-right">
                                                            <li> <a href="#" class="panel-toggle text-muted active"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a> </li>
                                                        </ul>
                                                        Search Option </header>
                                                    <div class="panel-body clearfix collapse">
                                                        <div class="form-group">
                                                            <label class="col-lg-2 control-label">Search Tags</label>
                                                            <div class="col-lg-10">
                                                                <input class="form-control" placeholder="Search Tags" name="searchTags" type="text" id="searchTags" value="<?php if (GET('editUid')) {
        echo stripslashes($this->editrow['searchTags']);
    } ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-12 control-label">
                                                                <button type="button" name="updKeyword" id="updKeyword" onClick="GetKeyword();" class="btn btn-s-md btn-info">Update Keyword from SEO Keywords</button>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                            <div class="col-sm-6">
                                                <section class="panel panel-default pos-rlt clearfix">
                                                    <header class="panel-heading">
                                                        <ul class="nav nav-pills pull-right">
                                                            <li> <a href="#" class="panel-toggle text-muted active"><i class="fa fa-caret-down text-active"></i><i class="fa fa-caret-up text"></i></a> </li>
                                                        </ul>
                                                        Javascript / CSS Control </header>
                                                    <div class="panel-body clearfix collapse">
                                                        <div class="form-group">
                                                            <label class="col-lg-12">
                                                                <center>
                                                                    Javascript
                                                                </center>
                                                            </label>
                                                            <div class="col-lg-12">
                                                                <textarea name="customJS" class="form-control" placeholder="Paste your Custom JS with <script> </script>"><?php if (GET('editUid')) {
                                                    echo stripslashes($this->editrow['customJS']);
                                                } ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-lg-12">
                                                                <center>
                                                                    CSS
                                                                </center>
                                                            </label>
                                                            <div class="col-lg-12">
                                                                <textarea name="customCSS" class="form-control" placeholder="Paste your Custom CSS with <style> </style>"><?php if (GET('editUid')) {
                                                    echo stripslashes($this->editrow['customCSS']);
                                                } ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>

                                            <!---- Button -->
                                            <div class="form-group">
                                                <div class="col-lg-offset-2 control-label col-lg-10">
    <?php if (GET('editUid')) {
        echo '<input type="hidden" name="editUid" value="' . GET('editUid') . '">';
    } ?>
                                                    <button type="submit" name="submit" value="Submit" class="btn btn-s-md btn-primary ">
    <?php if (GET('editUid')) {
        echo 'Update';
    } else {
        echo "Create";
    } ?>
                                                    </button>
                                                    <button type="submit" name="submit" value="continue" class="btn btn-s-md btn-primary">Save &amp; Continue</button>
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
                                                <th>Heading</th>
                                                <th>Category</th>
                                                <th>Last Modify</th>
                                                <th>Modify By</th>
                                                <th width="60"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
    <?php ?>
    <?php foreach ($this->PagingNationFetch as $PagingNationFetch) { ?>
                                                <tr>
                                                    <td><input name="uid[]" value="<?php echo $PagingNationFetch['uid'] ?>" type="checkbox"></td>
                                                    <td><?php echo stripslashes($PagingNationFetch['title']) ?></td>
                                                    <td><?php echo stripslashes($PagingNationFetch['heading']) ?></td>
                                                    <td><?php echo getCategory($PagingNationFetch['category']); ?></td>
                                                    <td><?php echo $PagingNationFetch['LastModify'] ?></td>
                                                    <td><?php echo getAdmin($PagingNationFetch['LastModifyBy']); ?></td>
                                                    <td><a href="<?php echo URL ?>page/?action=edit&editUid=<?php echo $PagingNationFetch['uid'] ?>"><i class="fa fa-edit"></i></a>
                                                        <a href="<?php echo SITEURL ?><?php echo $PagingNationFetch['permalink'] ?>" target="_blank"><i class="fa fa-eye"></i></a></td>
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
		
        <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<?php include('js/editor.php'); ?>

        <script>
                                            function GetKeyword()
                                            {
                                                $("#searchTags").val($("#keywords").val());
                                            }

                                            $(function() {

                                                // listen to events on the category dropdown
                                                $('#category').change(function() {

                                                    // don't do anything if use selects "Select Cat"
                                                    if ($(this).val() !== "Select Cat") {


                                                        $.get('<?php echo URL . PUBLICS; ?>getCategory.php?cat=' + $(this).val(), function(result) {
                                                            $('#SubCategory').html(result);
                                                        });

                                                    }

                                                });

                                            });
        </script>
		
<script type="text/javascript">
function doDashes(str) {
    
    var re = /[^a-z0-9]+/gi; // global and case insensitive matching of non-char/non-numeric
    var re2 = /^-*|-*$/g;     // get rid of any leading/trailing dashes
    str = str.replace(re, '-');  // perform the 1st regexp
    str1= str.replace(re2, '').toLowerCase(); // ..aaand the second + return lowercased result
    $('#permalink').val(str1);
}
</script>
 <script>
                                            $(document).ready(function() {
                                                var form = $('#form');
                                                var submit = $('#submit');
                                                var noti = $('#noti');

                                                // form submit event
                                                form.on('submit', function(e) {
                                                    e.preventDefault(); // prevent default form submit

                                                    $.ajax({
                                                        url: '', // form action url
                                                        type: 'POST', // form submit method get/post
                                                        dataType: 'html', // request type html/json/xml
                                                        data: form.serialize() + '&ajaxformsubmit=' + "Yes", // serialize form data 

                                                        beforeSend: function() {
                                                            noti.fadeOut();
                                                            submit.html('Please Wait...'); // change submit button text
                                                        },
                                                        success: function(data) {
                                                            noti.html(data).fadeIn(); // fade in response data
                                                            form.trigger('reset');
                                                            submit.html('Create');
                                                            hidenotification();
                                                            ajaxData();
                                                        },
                                                        error: function(e) {
                                                            console.log(e)
                                                        }
                                                    });
                                                });
                                                ajaxData();
                                            });
                                            function ajaxData()
                                            {
                                                var URL="<?php echo URL ?>";
                                                var PUBLIC="<?php echo URL . PUBLICS ?>";
                                                $.getJSON("<?php echo URL . $this->getPage[0] ?>/?ajaxData=true", function(result) {
                                                    var trHTML = '';
                                                    $.each(result, function(i, item) {
                                                        trHTML += '<tr><td><input name="uid[]" value="' + item.uid + '" type="checkbox"></td><td>' + item.title + '</td><td><img src="'+PUBLIC+'image_thumb.php?image_path=' +item.image  + '&pix=20" /></td><td>' + item.sort + '</td><td><a href="'+URL+'slider/?action=edit&editUid=' + item.sort + '"><i class="fa fa-edit"></i></td></tr>';
                                                    });
                                                    $('#records_table').html(trHTML);
                                                });
                                            }
        </script>
<?php fnGetFooter(array("js/file-input/bootstrap-filestyle.min.js")); ?>