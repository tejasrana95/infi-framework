<?php fnGetHeader(array("title"=>"Module Management")); ?>
        <section id="content">
            <section class="vbox">
                <section class="scrollable padder">
                    <div class="m-b-md"> <?php echo @$this->noti; ?>
                        <h3 class="m-b-none"> Modules</h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <section class="panel panel-default">

                                <header class="panel-heading font-bold">All Modules</header>
                                <div class="panel-body">
                                    <form action="" method="post">
                                        <div class="table-responsive">
                                            <table class="table table-striped b-t b-light text-sm">
                                                <thead>
                                                    <tr>
                                                        <th width="20"><input type="checkbox"></th>
                                                        <th>Name</th>
                                                        <th>Author</th>
                                                        <th>Version</th>
                                                        <th>Visit</th>
                                                        <th>Release</th>
                                                        <th width="200">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($this->module_list as $module_list) {
                                                        if(!isset($module_list['name']))
                                                        {
                                                            $module_list['name']="Unknown";
                                                        }
                                                        if(!isset($module_list['author']))
                                                        {
                                                            $module_list['author']="Unknown";
                                                        }
                                                        if(!isset($module_list['ver']))
                                                        {
                                                            $module_list['ver']="1.0";
                                                        }
                                                        if(!isset($module_list['url']))
                                                        {
                                                            $module_list['url']="#";
                                                        }
                                                        if(!isset($module_list['release']))
                                                        {
                                                            $module_list['release']=date('Y');
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td width="20"><input name="module_id[]" value="<?php echo $module_list['module_id'] ?>" type="checkbox"></td>
                                                            <td><?php echo $module_list['name'] ?></td>
                                                            <td><?php echo $module_list['author'] ?></td>
                                                            <td><?php echo $module_list['ver'] ?></td>
                                                            <td><a href="<?php echo $module_list['url'] ?>" target="_blank">Visit</a></td>
                                                            <td><?php echo $module_list['release'] ?></td>
                                                            <td width="60">[<?php if($module_list['module_install']){ ?> <a href="<?php echo URL.$this->getPage[0]; ?>/?module_id=<?php echo $module_list['module_id']; ?>&action=uninstall" onclick="return confirm('Are you sure to uninstall this module.\nOnce uninstalled everything of this module will be erased!!');">Un-Install</a> <?php } else {?><a href="<?php echo URL.$this->getPage[0]; ?>/?module_id=<?php echo $module_list['module_id']; ?>&action=install&module_name=<?php echo $module_list['name'] ?>">Install</a><?php } ?>] <?php if($module_list['module_install']){ if($module_list['module_enable']==1) { ?> [<a href="<?php echo URL.$this->getPage[0]; ?>/?module_id=<?php echo $module_list['module_id']; ?>&action=disable">Disable</a>]<?php } else {?>[<a href="<?php echo URL.$this->getPage[0]; ?>/?module_id=<?php echo $module_list['module_id']; ?>&action=enable">Enable</a>]<?php  } } ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <footer class="panel-footer">
                                            <div class="row">
                                                <div class="col-sm-4 hidden-xs">

                                                    <button type="submit" value="disbale" name="disable" onClick="return confirm('Are you sure to disbale selected modules?');" class="btn btn-sm btn-default">Disable</button>
                                                </div>

                                                <div class="col-sm-8 text-right text-center-xs">

                                                </div>

                                            </div>
                                        </footer>
                                    </form>
                                </div>
                            </section>
                        </div>
                    </div>

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
                str1 = str.replace(re2, '').toLowerCase(); // ..aaand the second + return lowercased result
                $('#permalink').val(str1);
            }
        </script>
        <?php fnGetFooter(array("js/file-input/bootstrap-filestyle.min.js")); ?>