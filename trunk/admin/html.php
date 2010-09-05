<?php 
	$title=" - HTML Guide"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
?>
<body>
<?php 
	$area="members";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php';
?>
<div class="left-content padding">
	<a name="content"></a>
	<h2 class="middle bold">Quick Guide to Formatting with HTML tags </h2>
	<p>When writing your news items for this site the following codes will not be displayed but with allow you to change the look of the page. All codes can be combined, Its not as user friendly as page plus but for the moment its the best I can think of.</p>
	<table  >
		<tr><td >&lt;h1>Title h1&lt;/h1>  </td><td ><h1>Title&nbsp;h1</h1></td></tr>
		<tr><td >&lt;h2>Title h2&lt;/h2>  </td><td ><h2>Title h2</h2></td></tr>
		<tr><td >&lt;h3>Title h3&lt;/h3>  </td><td ><h3>Title h3</h3></td></tr>
		<tr><td >No tags  </td><td >No tags</td></tr>
		<tr><td >&lt;strong>Bold Text&lt;/strong>  </td><td ><strong>Bold Text</strong></td></tr>
		<tr><td >&lt;em>Italic Text&lt;/em>  </td><td ><em>Italic Text</em></td></tr>
		<tr><td >Line breaks &lt;br/>&lt;br/>are accomplished &lt;br/>with</td><td >Line breaks <br/><br/>are accomplished <br/>with</td></tr>
		<tr><td >&lt;div class="right">Right Justified&lt;/div>  </td><td ><div class="right">Right Justified</div></td></tr>
		<tr><td >&lt;div class="middle">Middle Justified&lt;/div>  </td><td ><div class="middle">Middle Justified</div></td></tr>
		<tr><td >&lt;div class="left">Left Justified&lt;/div>  </td><td ><div class="left">Left Justified</div></td></tr>
		<tr><td >&lt;div class="red">Red Text&lt;/div>  </td><td ><div class="red">Red Text</div></td></tr>
		<tr><td >&lt;div class="black">Black Text&lt;/div>  </td><td ><div class="black">Black Text</div></td></tr>
		<tr><td >&lt;a href="http://www.google.com">Link&lt;/a>  </td><td ><a href="http://www.google.com">Link</a></td></tr>

		<tr><td >&lt;a href="html.php">Link&lt;/a>  </td><td ><a href="html.php">Link</a></td></tr>
		<tr><td >&lt;img src="imgs/adccnew_ie6.png"/></td><td ><img src="../imgs/adccnew_ie6.png" alt="ADCC Logo" /></td></tr>
		<tr><td colspan="2">Please can you try and avoid using the last two if it all possible and stick with putting links and images in the boxes I have provided. Other codes are available but I have tried to keep it simple and still give you some options when writing news items. <br/><br/>Any question/problems please let me know.</td></tr>
	</table>
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>