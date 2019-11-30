<?php

//Template Works
function fnGetMeta($metas = null, $links = null, $scripts = null) {
    if (!isset($meta)) {
        $meta = getMeta($metas);
    }
    include(BASEURL . VIEW . THEME . '/include/meta.php');
}

function fnGetHeader() {
    include(BASEURL . VIEW . THEME . '/include/header.php');
}

function fnGetMenu() {
    include(BASEURL . VIEW . THEME . '/include/menu.php');
}

function fnGetFooter($scriptsfooter = null) {
    include(BASEURL . VIEW . THEME . '/include/footer.php');
}

function fnGetSidebar() {
    include(BASEURL . VIEW . THEME . '/include/sidebar.php');
}

function fnGetSlider() {
    include(BASEURL . VIEW . THEME . '/include/slider.php');
}

function fnSidebar() {
    $page = permalinkGrabber();
    $sql = new sql();
    $fetch = $sql->fetch('page', array('permalink' => $page));
    $category = $fetch['category'];
    $Subcategory = $fetch['subCategory'];
    $sidebar = '<h5>' . getCategory($category) . '</h5>';
    $sidebar .='<ul id="plus-minus">';
    $getSubCat = $sql->fetchAll('category', array('parent' => $category));
    foreach ($getSubCat as $subcats) {
        $infi = '';
        $subinfi = "";
        $infiselected = array();
        $in_array = array();
        if (getCategory($subcats['uid']) != "") {
            $fetchpage = $sql->fetchAll('page', array('category' => $category, 'subCategory' => $subcats['uid']));
            if (isset($fetchpage)) {
                foreach ($fetchpage as $row) {
                    $in_array[] = $row['permalink'];
                }
                foreach ($fetchpage as $row) {
                    $infiselected[] = links($row['permalink']);
                }
                $currenturl = permalinkGrabber() . EXTENSION;

                if (in_array($currenturl, $infiselected)) {
                    $infi = 'infiselected';
                }
                $sidebar .='<li class="' . $infi . '"><a data-toggle="collapse" data-parent="#accordion' . $subcats['uid'] . '" href="#collapseOne' . $subcats['uid'] . '" class="';
                if (in_array($page, $in_array)) {
                    $sidebar .='plus minus';
                } else {
                    $sidebar .='plus';
                }
                $sidebar .='">' . getCategory($subcats['uid']) . ' <i class="icon-angle-right pull-right"></i></a></li>';
//<i class="caret pull-right"></i>
                $sidebar .='   <div id="collapseOne' . $subcats['uid'] . '" class="panel-collapse ';
                if (in_array($page, $in_array)) {
                    $sidebar .='in';
                } else {
                    $sidebar .='collapse';
                }
                $sidebar .='"><div class="widget-body bg-shadow blog-categories clearfix">
                                        <ul>';
                foreach ($fetchpage as $row) {
                    if ($currenturl == links($row['permalink'])) {
                        $subinfi = 'infiselected';
                    } else {
                        $subinfi = '';
                    }
                    $sidebar .=' <li class="' . $subinfi . '"><a href="' . URL . links($row['permalink']) . '">' . $row['title'] . '</a></li>';
                }
                unset($in_array);
                $sidebar .=' </ul>
                                    </div>
                                </div>';
                unset($infiselected);
            }
        }
    }
    $sidebar .='</ul>';
    echo $sidebar;
}

function shortcontact($permalinks, $noti = null) {
    echo '<div class="span4" style="margin-left:0px;">
                                <div class="head-style4">
                                    <h3><span> Request A Call Back </span></h3>
                                </div>
' . @$noti . '
                                <form action="' . URL . $permalinks . '" method="post">
                                                                        <div class="row">
                                        <div class="span4">
                                            <input class="span4" id="name" name="name" required="" placeholder="Full Name" type="text">
                                        </div>
                                        <div class="span4">
                                            <input type="email" class="span4" id="email" name="email" required="" placeholder="Email ID">
                                        </div>
                                        <div class="span4">
                                            <input type="text" class="span4" id="phone" name="phone" required="" placeholder="Phone Number">                                        </div>
                                        <div class="span4">
                                            <textarea class="span4" id="comment" name="message" required="" placeholder="Message" style="height: 30px;resize: none;"></textarea>
                                        </div>
                                        <div class="span4">
                                            <img src="captcha.php" style="margin-top: -10px;"> <input type="text" class="span1" id="Security" placeholder="Security Code" required="" name="security" style="width:100px;">
<input type="hidden" name="pageurl" value="' . $permalinks . '">					
						<button type="submit" name="submit" value="submit" class="btn send-btn" style="float: right;">Send <i class="icon-ok-sign"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>';
}

?>
