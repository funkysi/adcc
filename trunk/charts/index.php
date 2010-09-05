<html>
<head>
</head>
<body>
<?php
	include_once $_SERVER["DOCUMENT_ROOT"].'/charts/php-ofc-library/open_flash_chart_object.php';

	#open_flash_chart_object( 1200, 500, 'http://'. $_SERVER['SERVER_NAME'] .'/charts/ie6.php?id=1' );
	#open_flash_chart_object( 1200, 500, 'http://'. $_SERVER['SERVER_NAME'] .'/charts/os.php?id=1' );
	#open_flash_chart_object( 1200, 500, 'http://'. $_SERVER['SERVER_NAME'] .'/charts/screenres.php?id=1' );
	open_flash_chart_object( 1200, 500, 'http://'. $_SERVER['SERVER_NAME'] .'/charts/images.php' );

	?>
</body>
</html>