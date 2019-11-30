<?php

//Template Works
function fnGetHeader($metas = null, $links = null, $scripts = null, $sidebar = true, $htmlclass = "app") {
    if (!isset($meta)) {
        global $MetaTitle;
        global $MetaKeywords;
        global $MetaDescription;
        global $AddScript;
        global $AddCSS;
        if (isset($MetaTitle) && trim($MetaTitle) != "") {
            $metas['title'] = $MetaTitle;
        }
        if (isset($MetaKeywords) && trim($MetaKeywords) != "") {
            $metas['keywords'] = $MetaKeywords;
        }
        if (isset($MetaDescription) && trim($MetaDescription) != "") {
            $metas['description'] = $MetaDescription;
        }
        if (isset($AddScript) && $AddScript != null) {
            $scripts = $AddScript;
        }
        if (isset($AddCSS) && $AddCSS != null) {
            $links = $AddCSS;
        }
        $meta = getMeta($metas);
    }
    include(BASEURL . VIEW . 'include/header.php');
}

function fnGetMeta() {
    include(BASEURL . VIEW . 'include/meta.php');
}

function fnGetFooter($scriptsfooter = null) {
    global $AddFooterScript;
     if (isset($AddFooterScript) && $AddFooterScript != null) {
            $scriptsfooter = $AddFooterScript;
        }
    include(BASEURL . VIEW . 'include/footer.php');
}

function fnGetSidebar() {
    include(BASEURL . VIEW . 'include/sidebar.php');
}

?>