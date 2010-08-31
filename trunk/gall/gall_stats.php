<?php 
	$query="SELECT COUNT(*) AS numrows FROM image_store";
    $result=mysql_query($query) or die('Error, query failed');
    $row=mysql_fetch_array($result, MYSQL_ASSOC);
    $numrows=$row['numrows'];
	$query2="SELECT COUNT(*) AS numrows FROM users where gall_null = 0 and level = 1";
    $result2=mysql_query($query2) or die('Error, query failed');
    $row2=mysql_fetch_array($result2, MYSQL_ASSOC);
    $numrows2=$row2['numrows'];
	echo "<p class=\"bold red padding\">The Members Gallery now contains <a href=\"gall/\">" .$numrows."</a> images from <a href=\"gall/\">".$numrows2."</a> members.</p>"; 
?>