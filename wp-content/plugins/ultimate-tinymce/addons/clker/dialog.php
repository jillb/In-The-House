<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Clker.com - The online royalty free public domain clip art</title>
    <?php
	include ('../../includes/tinymce_addon_scripts.php');
	?>
    <!--
    <script type="text/javascript" src="../../tinymce/tiny_mce_popup.js"></script>
    -->
    <script type="text/javascript" src="js/dialog.js"></script>
  </head>
  <body>
      <form onSubmit="ClkerDialog.search();return false;" action="#">
	<table width='100%'>
	  <tr>
	    <td valign='middle'>
	      <input type="text" style='font-size:1.5em' id="search" size='30' name="searchtext"/>&nbsp;&nbsp;&nbsp;
	    </td>
	    <td valign='middle'>
	      <div class="mceActionPanel">
		<input type="button" id="insert" name="searchbut" value="Search" onClick="ClkerDialog.search();" />
		<input type="button" id="cancel" name="cancel" value="{#cancel}" onClick="tinyMCEPopup.close();" />	  
	      </div>
	    </td>
	    <td valign='middle'>
	    </td>
	  </tr>
	</table>
      </form>

    <div id='results'>
    </div>

  </body>
</html>
