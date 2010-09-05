<?php
	include $_SERVER["DOCUMENT_ROOT"].'/db/dbconfig.php';
	$url = getconfig('url');

	echo "<meta http-equiv=\"refresh\" content=\"0 URL=".$url."\">";
?>