<?php

function redirect($path, $queryString = null) {
    $query='';
    if($queryString !=null){
       $query='?'.query_maker_int($queryString, '&');
    }
    header("Location: " . URL . $path.$query);
    die();
}
function linkgen($path, $queryString = null)
{
    $query='';
    if($queryString !=null){
       $query='?'.query_maker_int($queryString, '&');
    }
    return URL . $path.$query;
}
function getId() {
    $url = addslashes(@$_GET['url']);
    $url = rtrim($url, '/');
    $url = explode('/', $url);
    return $url;
}

function getPage() {
    $url = addslashes(@$_GET['url']);
    $url = rtrim($url, '/');
    $url = explode('/', $url);
    return $url;
}

function getBlog() {
    $url = addslashes(@$_GET['url']);
    $url = rtrim($url, '/');
    $url = explode('/', $url);
    return $url;
}

function GetData($page_name = NULL) {
    $urlparts = explode("/", $_SERVER['REQUEST_URI']);

    $key = array_search($page_name, $urlparts);
    $key = $key + 1;

    $urlparts2 = explode("?", @$urlparts[$key]);
    $urlparts3 = explode("&", @$urlparts2[1]);

    for ($i = 0; $i < count($urlparts3); $i++) {
        $urlparts4[] = explode("=", @$urlparts3[$i]);
        $key = $urlparts4[$i][0];
        $value = @$urlparts4[$i][1];
        $array[] = ($key);
        $array1[] = ($value);
        $query = array_combine($array, $array1);
    }
    return $query;
}

//use GET instead of $_GET
function GET($page_name) {
    $urlparts = explode("?", $_SERVER['REQUEST_URI']);
    $urlparts1 = explode('&', $urlparts[count($urlparts) - 1]);
    $key = array_search($page_name, $urlparts1);
    $key = $key + 1;
    for ($i = 0; $i < count($urlparts1); $i++) {
        $urlparts4[] = explode("=", @$urlparts1[$i]);
        $key = $urlparts4[$i][0];
        $value = @$urlparts4[$i][1];
        $array[] = ($key);
        $array1[] = ($value);
        $query = array_combine($array, $array1);
    }
    return (isset($query[$page_name])) ? $query[$page_name] : false;
}

function ActiveUrl($page) {
    $url = getId();
    $url = $url[count($url) - 1];
    if ($url == $page) {
        echo 'class="active"';
    }
}

function strip($value) {
    $value = stripslashes($value);
    $value = str_replace('+', ' ', $value);
    $value = str_replace('%28', '(', $value);
    $value = str_replace('%29', ')', $value);
    $value = str_replace('%27', "'", $value);
    $value = str_replace('%3C', "<", $value);
    $value = str_replace('%3E', ">", $value);
    $value = str_replace('%22', '"', $value);
    return $value;
}

function stripPlus($value) {
    $value = str_replace('+', ' ', $value);
    return $value;
}

function stripBracket($value) {
    $value = str_replace('%28', '(', $value);
    $value = str_replace('%29', ')', $value);
    return $value;
}

function date_convert($date) {
    $phpdate = strtotime($date);
    return date('d-m-Y', $phpdate);
}

function if_edit($edit, $data) {
    if ($edit == 'edit') {
        echo $data;
    }
}

function if_select($data, $comp_data) {

    if ($data == $comp_data) {
        return 'selected="selected"';
    }
}

function if_radio($data, $comp_data) {

    if ($data == $comp_data) {
        return 'checked';
    }
}

function query_maker($check, $prefix = ',') {
    for ($i = 0; $i < count($check); $i++) {
        $key[] = key($check);
        $quer[$i] = ($key[$i] . "='" . addslashes($check[$key[$i]]) . "'");
        next($check);
    }
    return implode($prefix, $quer);
}

function query_maker_int($check, $prefix = ',') {
    for ($i = 0; $i < count($check); $i++) {
        $key[] = key($check);
        $quer[$i] = ($key[$i] . "=" . addslashes($check[$key[$i]]) . "");
        next($check);
    }

    return implode($prefix, $quer);
}

function insert_maker($check) {
    for ($i = 0; $i < count($check); $i++) {
        $key[] = key($check);

        $quer[$i] = ($key[$i]);
        $value[$i] = ("'" . addslashes($check[$key[$i]]) . "'");
        next($check);
    }
    $new_insert = "( " . implode(',', $quer) . " ) VALUES (" . implode(',', $value) . ")";
    return $new_insert;
}

function check_maker($check) {
    for ($i = 0; $i < count($check); $i++) {
        $key[] = key($check);
        $quer[$i] = ($key[$i] . "='" . addslashes($check[$key[$i]]) . "'");
        next($check);
    }
    return implode(' and ', $quer);
}

function truncate($text, $length, $suffix = '', $isHTML = true) {
    $i = 0;
    $simpleTags = array('br' => true, 'hr' => true, 'input' => true, 'image' => true, 'link' => true, 'meta' => true);
    $tags = array();
    if ($isHTML) {
        preg_match_all('/<[^>]+>([^<]*)/', $text, $m, PREG_OFFSET_CAPTURE | PREG_SET_ORDER);
        foreach ($m as $o) {
            if ($o[0][1] - $i >= $length)
                break;
            $t = substr(strtok($o[0][0], " \t\n\r\0\x0B>"), 1);
            // test if the tag is unpaired, then we mustn't save them
            if ($t[0] != '/' && (!isset($simpleTags[$t])))
                $tags[] = $t;
            elseif (end($tags) == substr($t, 1))
                array_pop($tags);
            $i += $o[1][1] - $o[0][1];
        }
    }

    // output without closing tags
    $output = substr($text, 0, $length = min(strlen($text), $length + $i));
    // closing tags
    $output2 = (count($tags = array_reverse($tags)) ? '</' . implode('></', $tags) . '>' : '');

    // Find last space or HTML tag (solving problem with last space in HTML tag eg. <span class="new">)

    $splitted = preg_split('/<.*>| /', $output, -1, PREG_SPLIT_OFFSET_CAPTURE);
    $last_item = end($splitted);
    $pos = end($last_item);
    // Append closing tags to output
    $output.=$output2;

    // Get everything until last space
    $one = substr($output, 0, $pos);
    // Get the rest
    $two = substr($output, $pos, (strlen($output) - $pos));
    // Extract all tags from the last bit
    preg_match_all('/<(.*?)>/s', $two, $tags);
    // Add suffix if needed
    if (strlen($text) > $length) {
        $one .= $suffix;
    }
    // Re-attach tags
    $output = $one . implode($tags[0]);

    //added to remove  unnecessary closure
    $output = str_replace('</!-->', '', $output);

    return $output;
}

function authentication($page = "secure") {
    if (isset($_SESSION['login_code'])) {
        $login_code = explode('-TEJAS-', base64_decode($_SESSION['login_code']));
        $login_code = $login_code[0];
    } else {
        $login_code = false;
    }
    if ($page == "secure") {
        if (!isset($_SESSION['login']) || !isset($login_code) || $login_code != URL) {
            header('Location: ' . URL . 'logout.php');
        }
    } else {
        if (isset($_SESSION['login']) && isset($_SESSION['login_code']) && $login_code == URL) {
            header("Location: " . URL . "home/");
        }
    }
    $page = getPage();
    if ($page[0] == "modules") {
        $sql = new sql();
        $check = $sql->check("sysmodule", array("module_id" => $page[1], "enable" => 1));
        if (!$check) {
            redirect("modulemanager/?reply=permissiondenied&module=" . $page[1]);
        }
    }
}

function checkPermission($permissionID) {
    return ($_SESSION[$permissionID]) ? true : false;
}

function pagination($query, $per_page = 10, $page = 1, $url = '?', $old_data) {
    $sql = new sql();
    $sql = $sql->connect();
    $query = "SELECT COUNT(*) as `num` FROM {$query}";
    if (DB_DRIVER == "MYSQLI") {
        $result = $sql->query($query);
        $row = $result->fetch_array();
    } else {
        $row = mysql_fetch_array(mysql_query($query));
    }
    $total = $row['num'];
    $adjacents = "2";

    $page = ($page == 0 ? 1 : $page);
    $start = ($page - 1) * $per_page;

    $prev = $page - 1;
    $next = $page + 1;
    $lastpage = ceil($total / $per_page);
    $lpm1 = $lastpage - 1;

    $pagination = "";
    if ($lastpage > 1) {
        $pagination .= "<ul class='pagination'>";
        $pagination .= "<li class='details'>Page $page of $lastpage</li>";
        if ($lastpage < 7 + ($adjacents * 2)) {
            for ($counter = 1; $counter <= $lastpage; $counter++) {
                if ($counter == $page)
                    $pagination.= "<li><a class='current'>$counter</a></li>";
                else
                    $pagination.= "<li><a href='{$url}" . $old_data . "&page=$counter'>$counter</a></li>";
            }
        }
        elseif ($lastpage > 5 + ($adjacents * 2)) {
            if ($page < 1 + ($adjacents * 2)) {
                for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>$counter</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}" . $old_data . "&page=$counter'>$counter</a></li>";
                }
                $pagination.= "<li class='dot'>...</li>";
                $pagination.= "<li><a href='{$url}" . $old_data . "&page=$lpm1'>$lpm1</a></li>";
                $pagination.= "<li><a href='{$url}" . $old_data . "&page=$lastpage'>$lastpage</a></li>";
            }
            elseif ($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2)) {
                $pagination.= "<li><a href='{$url}" . $old_data . "&page=1'>1</a></li>";
                $pagination.= "<li><a href='{$url}" . $old_data . "&page=2'>2</a></li>";
                $pagination.= "<li class='dot'>...</li>";
                for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>$counter</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}" . $old_data . "&page=$counter'>$counter</a></li>";
                }
                $pagination.= "<li class='dot'>..</li>";
                $pagination.= "<li><a href='{$url}" . $old_data . "&page=$lpm1'>$lpm1</a></li>";
                $pagination.= "<li><a href='{$url}" . $old_data . "&page=$lastpage'>$lastpage</a></li>";
            }
            else {
                $pagination.= "<li><a href='{$url}" . $old_data . "&page=1'>1</a></li>";
                $pagination.= "<li><a href='{$url}" . $old_data . "'&page=2'>2</a></li>";
                $pagination.= "<li class='dot'>..</li>";
                for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++) {
                    if ($counter == $page)
                        $pagination.= "<li><a class='current'>$counter</a></li>";
                    else
                        $pagination.= "<li><a href='{$url}" . $old_data . "&page=$counter'>$counter</a></li>";
                }
            }
        }

        if ($page < $counter - 1) {
            $pagination.= "<li><a href='{$url}" . $old_data . "&page=$next'>Next</a></li>";
            $pagination.= "<li><a href='{$url}" . $old_data . "&page=$lastpage'>Last</a></li>";
        } else {
            $pagination.= "<li><a class='current'>Next</a></li>";
            $pagination.= "<li><a class='current'>Last</a></li>";
        }
        $pagination.= "</ul>\n";
    }


    return $pagination;
}

function friendlyURL($inputString) {
    $url = strtolower($inputString);
    $patterns = $replacements = array();
    $patterns[0] = '/(&amp;|&)/i';
    $replacements[0] = '-and-';
    $patterns[1] = '/[^a-zA-Z01-9]/i';
    $replacements[1] = '-';
    $patterns[2] = '/(-+)/i';
    $replacements[2] = '-';
    $patterns[3] = '/(-$|^-)/i';
    $replacements[3] = '';
    $url = preg_replace($patterns, $replacements, $url);
    return $url;
}

function getCategory($catID) {
    $sql = new sql();
    $catIDRow = $sql->fetch('category', array('uid' => $catID));
    return $catIDRow['text'];
}

function getSubcategory($catID) {
    $sql = new sql();
    $catIDRow = $sql->fetchAll('menu', array('parent' => $catID));
    echo '<ul class="">';
    foreach ($catIDRow as $row) {
        echo '<a href=' . magicKeyword(links($row['link'])) . '><li>' . stripcslashes($row['label']) . '<li></a>';
    }
    echo '</ul>';
}

function getMenu($ManuID) {
    $sql = new sql();
    $catIDRow = $sql->fetch('menu', array('uid' => $ManuID));

    return $catIDRow['label'];
}

function getAdmin($adminID) {
    $sql = new sql();
    $adminIDRow = $sql->fetch('admin', array('uid' => $adminID));
    return $adminIDRow['username'];
}

function permalink($pageId) {
    $sql = new sql();
    $pageTitle = $sql->fetch('page', array('uid' => $pageId));

    $permalink = str_replace(' ', '-', strtolower(trim($pageTitle['title'])));

    $check = $sql->check('page', array("permalink" => $permalink));
    if ($check) {
        $permalink = $permalink . '-' . rand(10, 99);
    }
    return $permalink;
}

function getPermission($permission) {
    $permission = str_split($permission);
    return array("permission_blog" => $permission[0],
        "premission_page" => $permission[1],
        "premission_site" => $permission[2],
        "premission_filemanager" => $permission[3],
        "premission_user" => $permission[4],
        "permission_other" => $permission[5],
        "permission_other1" => $permission[6],
        "permission_other2" => $permission[7],
        "permission_other3" => $permission[8],
        "permission_other4" => $permission[9],
    );
}

function getModule($moduleID) {
    $sql = new sql();
    $sql->connect();
    $fetch = $sql->check('modules', array('uid' => $moduleID, 'active' => '1'));
    if ($fetch) {
        $module = $sql->fetch('modules', array('uid' => $moduleID, 'active' => '1'));
        echo magicKeyword($module['source']);
    }
}

function links($data) {

    if (EXTENSION != "" && $data != URL) {
        $data = preg_replace('{/$}', '', $data);
        return $data . EXTENSION;
    } else {
        return $data;
    }
}

function magicKeyword($data) {
    return preg_replace_callback('/\{([A-Z]+)\}/', "magicKeywordCallback", $data);
}

function magicKeywordCallback($matches) {
    if (defined($matches[1])) {
        return constant($matches[1]);
    } else {
        return $matches[0];
    }
}

function permalinkGrabber() {
    $permalinkquery = explode('?', $_SERVER['REQUEST_URI']);
    $permalink = explode('/', $permalinkquery[0]);
    $permalinks = $permalink[count($permalink) - 1];
    $newpermalink = ($permalinks == "") ? $permalink[count($permalink) - 2] : $permalink[count($permalink) - 1];
    if (EXTENSION != "") {
        $permalinks = explode(EXTENSION, $newpermalink);
        return $permalinks[0];
    } else {
        return $newpermalink;
    }
}

function isHome() {
    $isHome = getId();

    if ($isHome[0] == 'index') {
        return true;
    }
    if ($isHome[0] == 'index' . EXTENSION) {
        return true;
    } elseif (!$isHome[0]) {
        return true;
    } else {
        return false;
    }
}

function breadcrumb($currentpage) {
    echo '<div class="pagenation">&nbsp;<a href="' . URL . '">Home</a> <i>/</i> <a href="' . $_SERVER['REQUEST_URI'] . '">' . $currentpage . '</a></div>';
}

function getMeta($array = null) {
    if (isset($array)) {
        if (isset($array['title'])) {
            $title = $array['title'] . " | " . TITLEPOSTFIX;
        } else {
            $title = SITENAME;
        }
        if (isset($array['keywords'])) {
            $keywords = $array['keywords'];
        } else {
            $keywords = "";
        }
        if (isset($array['description'])) {
            $description = $array['description'];
        } else {
            $description = "";
        }

        return '<title>' . $title . '</title>
    <meta name="language" content="en-us" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="' . $description . '" />
    <meta name="keywords" content="' . $keywords . '" />
    <meta name="distribution" content="Global" />
    <meta name="robots" content="index, follow" />
    <meta name="creator" content="' . AUTHOR . '" />
    <meta name="publisher" content="' . AUTHOR . '" />
    <meta name="author" content="' . AUTHOR . '" />
    <base href="' . URL . '">';
    } else {
        if (isHome()) {
            return '<title>' . TITLE . '</title>
    <meta name="language" content="en-us" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="' . DESCRIPTION . '" />
    <meta name="keywords" content="' . KEYWORDS . '" />
    <meta name="distribution" content="Global" />
    <meta name="robots" content="index, follow" />
    <meta name="creator" content="' . AUTHOR . '" />
    <meta name="publisher" content="' . AUTHOR . '" />
    <meta name="author" content="' . AUTHOR . '" />
    <base href="' . URL . '">';
        } else {
            $permalinkGrabber = permalinkGrabber();
            $sql = new sql();
            $check = $sql->check("page", array("permalink" => $permalinkGrabber));
            if ($check) {
                $row = $sql->fetch("page", array("permalink" => $permalinkGrabber));
                $title = ($row['seoTitle'] != "") ? $title = $row['seoTitle'] : $title = $row['title'];
                return '<title>' . $title . '</title>
    <meta name="language" content="en-us" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="' . $row['description'] . '" />
    <meta name="keywords" content="' . $row['keywords'] . '" />
    <meta name="distribution" content="Global" />
    <meta name="robots" content="index, follow" />
    <meta name="creator" content="' . AUTHOR . '" />
    <meta name="publisher" content="' . AUTHOR . '" />
    <meta name="author" content="' . AUTHOR . '" />
    <base href="' . URL . '">';
            } else {
                return '<title>' . SITENAME . '</title>
    <meta name="language" content="en-us" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="distribution" content="Global" />
    <meta name="robots" content="index, follow" />
    <meta name="creator" content="' . AUTHOR . '" />
    <meta name="publisher" content="' . AUTHOR . '" />
    <meta name="author" content="' . AUTHOR . '" />
    <base href="' . URL . '">';
            }
        }
    }
}

function mailer($type, $to, $mailData) {

    if (isset($mailData['name'])) {
        $name = $mailData['name'];
    } else {
        $name = "System";
    }
    if (isset($mailData['email'])) {
        $email = $mailData['email'];
    } else {
        $email = 'noreply@infitechnology.com';
    }

    $subject = "Message from: $email";
    $from = $email;
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
    $headers .= 'From: ' . $name . '<' . $email . '>' . "\r\n";
    $headers .= 'Reply-To: ' . $email;


//client mail
    $clientto = $email;
    $clientSub = "Thanks for contacting " . SITENAME;
    $clientBody = "Hi " . $name . ",
<p>Thanks for contacting us. You will be contacted shortly.</p>
<br>
Thanks & Regards,  <br>  
Customer Support Team  <br>  
" . SITENAME;

    $Clientheaders = "MIME-Version: 1.0" . "\r\n";
    $Clientheaders .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
    $Clientheaders .= 'From: ' . SITENAME . '<' . MAIL . '>' . "\r\n";
    $Clientheaders .= 'Reply-To: ' . MAIL;

    $body = "";
    if (isset($mailData['name'])) {
        $body .="<b>Name:</b>&nbsp; " . $mailData['name'] . "<br>";
    }
    if (isset($mailData['email'])) {
        $body .="<b>Email:</b>&nbsp; " . $mailData['email'] . "<br>";
    }
    if (isset($mailData['country'])) {
        $body .="<b>Country:</b>&nbsp; " . $mailData['country'] . "<br>";
    }
    if (isset($mailData['website'])) {
        $body .="<b>Website:</b>&nbsp; " . $mailData['website'] . "<br>";
    }
    if (isset($mailData['phone'])) {
        $body .="<b>Phone:</b>&nbsp; " . $mailData['phone'] . "<br>";
    }
    if (isset($mailData['package'])) {
        $body .="<b>Package:</b>&nbsp; " . $mailData['package'] . "<br>";
    }
    if (isset($mailData['msg'])) {
        $body .="<b>Message:</b>&nbsp; " . $mailData['msg'] . "<br>";
    }

    $body .= "<b>IP:</b>&nbsp; <a href='http://newaycorp.com/ip/?ip=" . $_SERVER['REMOTE_ADDR'] . "'>" . $_SERVER['REMOTE_ADDR'] . "</a><br>";

    $sent = mail(MAIL, $subject, $body, $headers);
    $sent1 = mail($clientto, $clientSub, $clientBody, $Clientheaders);

    return $sent;
}

function fnRenderModule($modules) {
    if ($modules) {
        foreach ($modules as $module) {
            getModule($module);
        }
    }
}

function debug($array, $die = null, $vardump = null) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';

    echo '<br/><br/><br/>';
    if (isset($vardump)) {
        var_dump($array);
    }
    if (isset($die)) {
        die();
    }
}

function ShowPage($permalink) {
    $sql = new sql();
    $sql->connect();
    $query = $sql->fetch("page", array("permalink" => $permalink));
    if (is_array($query)) {
        return $query;
    } else {
        return false;
    }
}

function ModulePath() {
    $getUrl = getPage();
    return $getUrl[0] . '/' . $getUrl[1] . '/' . $getUrl[1] . '/';
}

?>
