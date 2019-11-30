<!-- Include jQuery, jQuery UI, elFinder (REQUIRED) -->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
		<link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css">
		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" media="screen" href="css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="css/theme.css">
		
			<script type="text/javascript" src="js/elfinder.min.js"></script>
<script type="text/javascript">
  var FileBrowserDialogue = {
    init: function() {
      // Here goes your code for setting your custom things onLoad.
    },
    mySubmit: function (URL) {
      // pass selected file path to TinyMCE
      parent.tinymce.activeEditor.windowManager.getParams().setUrl(URL);

      // close popup window
      parent.tinymce.activeEditor.windowManager.close();
    }
  }

  $().ready(function() {
    var elf = $('#elfinder').elfinder({
      // set your elFinder options here
      url: 'php/connector.php',  // connector URL
      getFileCallback: function(file) { // editor callback
// actually file.url - doesnt work for me, but file does. (elfinder 2.0-rc1)
        FileBrowserDialogue.mySubmit(file); // pass selected file path to TinyMCE 
      }
    }).elfinder('instance');      
  });
</script>

<div id="elfinder" style="height:430px;"></div>