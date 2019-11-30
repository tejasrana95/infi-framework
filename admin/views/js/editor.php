<script>
//    tinymce.init({
////    selector: "textarea",
//        mode: "textareas",
//        editor_selector: "mceEditor",
//        content_css: "mycontent.css",
//        plugins: [
//            "advlist autolink lists link image charmap print preview anchor",
//            "searchreplace visualblocks code fullscreen",
//            "insertdatetime media table contextmenu paste"
//        ],
//        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
//        file_browser_callback: elFinderBrowser
//    });

    tinymce.init({
        // selector: "textarea",
        mode: "textareas",
        editor_selector: "mceEditor",
        // content_css : "../css/main.css" ,
        plugins: [
            "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons template textcolor paste  textcolor"
        ],
        toolbar1: "newdocument  | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
        toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | inserttime preview | forecolor backcolor",
        toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
        menubar: false,
        verify_html: false,
        toolbar_items_size: 'small',
        file_browser_callback: elFinderBrowser
    });


    function elFinderBrowser(field_name, url, type, win) {
        tinymce.activeEditor.windowManager.open({
            file: '<?php echo TEMPLATE ?>filemanger-Plugin/elfinder.php', // use an absolute path!
            title: 'File Manager',
            width: 900,
            height: 450,
            resizable: 'yes'
        }, {
            setUrl: function(url) {
                win.document.getElementById(field_name).value = url;
            }
        });
        return false;
    }
</script>