<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php
    include ('../../includes/tinymce_addon_scripts.php');
    ?>
    <!--
    <script type="text/javascript" src="../../tinymce/tiny_mce_popup.js"></script>
    -->
    <script type="text/javascript" src="jscripts/embed.js"></script>
    <script type="text/javascript"><!--
    document.write('<base href="' + tinyMCEPopup.getWindowArg("base") + '">');
    // -->
    </script>
    <title>{#preview.preview_desc}</title>
</head>
<body id="content">
<script type="text/javascript">
	document.write(tinyMCEPopup.editor.getContent());
</script>
</body>
</html>
