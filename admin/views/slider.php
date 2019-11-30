<?php fnGetHeader(array("title"=>"Slider Management")); ?>
        <section id="content">
            <section class="vbox">
                <section class="scrollable padder">
                    <div class="m-b-md"><div id="noti">
                            <?php echo @$this->noti; ?>
                        </div>
                        <h3 class="m-b-none"><?php
                            if (GET('action') == 'edit') {
                                echo 'Edit';
                            } else {
                                echo 'Add';
                            }
                            ?> Slider</h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">


                            <section class="panel panel-default">
                                <header class="panel-heading font-bold">Page</header>
                                <div class="panel-body">
                                    <form class="bs-example form-horizontal" id="form" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Title</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" placeholder="Title" name="title" type="text" value="<?php
                                                if (GET('editUid')) {
                                                    echo stripslashes($this->editrow['title']);
                                                }
                                                ?>" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Slider</label>
                                            <div class="col-sm-10"> 
                                                <div class="form-group col-sm-4">
                                                    <input type="text" class="form-control" id="filepath" placeholder="Image File" name="image" readonly="">
                                                </div>&nbsp;
                                                <button type="button" class="btn btn-default" onclick="openfilemanager('filepath')" >Select File</button>   
                                                <?php
                                                if (GET('editUid')) {
                                                    if ($this->editrow['image']) {
                                                        ?> <img src="<?php echo URL . PUBLICS ?>image_thumb.php?image_path=<?php echo $this->editrow['image']; ?>&pix=20">  <?php
                                                    }
                                                }
                                                ?>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Sort</label>
                                            <div class="col-lg-10">
                                                <input class="form-control" placeholder="Sort" name="sort" type="text" value="<?php
                                                if (GET('editUid')) {
                                                    echo stripslashes($this->editrow['sort']);
                                                }
                                                ?>" required>
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
                                                <input type="hidden" name="submit" value="submit">
                                                <button type="submit" id="submit" name="submit" value="Submit" class="btn btn-s-md btn-primary ">
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

                    <section class="panel panel-default">
                        <header class="panel-heading"> All Slider </header>
                        <form action="" method="post">
                            <div class="table-responsive">
                                <table class="table table-striped b-t b-light text-sm">
                                    <thead>
                                        <tr>
                                            <th width="20"><input type="checkbox"></th>
                                            <th class="th-sortable" data-toggle="class">Title </th>
                                            <th>Image</th>
                                            <th>Sort</th>

                                            <th width="60"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="records_table">
                                       
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