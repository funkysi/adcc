<?php 
	setcookie( "auth_new", "ok", time()-604800, "/",$_SERVER["HTTP_HOST"] );
	setcookie( "level_new", "ok", time()-604800, "/",$_SERVER["HTTP_HOST"] );
	header("Location:index.php" ); 
	exit();
?>
