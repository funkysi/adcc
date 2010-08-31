<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Add/Remove child: Javascript</title>
<script type="text/javascript" src="../scripts/addremovejs.js">

</script>

<script type="text/javascript" src="../scripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript" src="../scripts/tiny_mce/plugins/AtD/editor_plugin.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "style,layer,table,save,advhr,advimage,advlink,emotions,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,AtD",

		// Theme options
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,link,unlink,|,cut,copy,paste,|,bullist,numlist,|,outdent,indent,|,undo,redo,|,forecolor,backcolor,|,blockquote,AtD,help,preview",
		
theme_advanced_buttons2 : "",		
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,
		/* the URL to the button image to display */
		atd_button_url              : "../scripts/tiny_mce/plugins/AtD/atdbuttontr.gif",

		/* the URL of your proxy file */
		atd_rpc_url                 : "../scripts/tiny_mce/plugins/AtD/server/proxy.php?url=",

		/* set your API key */
		atd_rpc_id                  : "dashnine",

		/* edit this file to customize how AtD shows errors */
		atd_css_url                 : "../css/AtD_content.css",
 
		// Example content CSS (should be your site CSS)
		content_css : "../css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
</head>
 
<body>

 
	<input type="hidden" value="0" id="theValue" />
	<p><a href="javascript:;" onclick="addEvent();">Add Some Elements</a></p>
	<div id="myDiv"> </div>
<form method="post" action="">
	

	<!-- Gets replaced with TinyMCE, remember HTML in a textarea should be encoded -->
	<textarea id="elm1" name="elm1" rows="15" cols="80" style="width: 80%">
		
	</textarea>

	<br />
	<input type="submit" name="save" value="Submit" />
	<input type="reset" name="reset" value="Reset" />
</form>
</body>
</html>
