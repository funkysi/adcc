<?php 
	setcookie( "auth_new", "ok", time()-604800, "/" );
	setcookie( "level_new", "ok", time()-604800, "/");
	header("Location:index.php" ); 
	exit();
?>
