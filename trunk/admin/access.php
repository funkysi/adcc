<?php  
	$title=" - Access"; 
	include $_SERVER["DOCUMENT_ROOT"].'/include/header2.php'; 
	require_once '../include/getcookie.php';
?>
<body>
<?php 
	$area="members";
	include $_SERVER["DOCUMENT_ROOT"].'/include/menu.php'; 

	#connect to MySQL
	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
			
	$sql = "select * from users where username='$auth'";

	#execute the query
	$rs = @mysql_query( $sql ) or die( "Could not execute SQL query" );
	while ( $row = mysql_fetch_array( $rs ) ) 
	{
		$name=$row['displayname']." ".$row['lastname'];
		$pass=$row['passw'];
		$username=md5($row['username']);
		$role=$row['role'];
		$image=$row['image'];
		$gall_null=$row['gall_null'];
		$about=$row['about'];
		$email=$row['email'];
	}		
?>
<div class="left-content padding">
	<a name="content"></a>
	<h2 class="middle bold">You are Logged into the ADCC Website</h2>
<?php 
	if( $level == "0") // Level 0 Superuser accounts ie me and Dad and possibly a few others
	{
		echo "<p>Welcome <span class=\"bold\">".$name."</span>. You have full access to edit the content of the site, please be careful when making changes. </p>";
		if($username==$pass) echo "<p class=\"red bold\">Please note that you have not changed your password. This means that anyone that knows your username can log in and alter your gallery. To do so now please click <a href=\"pass.php\">here</a>.</p>";
		echo "<div id=\"help\"><p><span class=\"red bold\">Help and Support: </span>Are you a new member of the club or an experienced user? Read our detailed help articles or email our knowledgeable webmasters Simon and Greg.</p>";
		echo "<ul class=\"help middle\"><li>Help Pages (arriving soon)</li>
		<li><a href=\"../admin/ADCC_Competition.pdf\">Help with Competitions</a></li>
		<li><a href=\"../admin/html.php\">Guide to HTML</a></li>
		<li><a href=\"mailto:club@arnoldanddistrictcameraclub.org.uk\">email the Club</a></li>
		<li><a href=\"mailto:funkysi1701@gmail.com\">email Simon</a></li>
		<li><a href=\"mailto:greg.foster3@ntlworld.com\">email Greg</a></li>
		<li><a href=\"https://www.google.com/analytics/home/?hl=en\">View our web traffic via Google Analytics</a> (Requires login details)</li>
		<li><a href=\"../admin/image_report.php\">View Site Usage Report</a></ul></div>";
		
		echo "<div id=\"gall\"><p><span class=\"red bold\">Gallery and User Accounts: </span>All members have access to upload images to our gallery, but did you know that members can also create a page about themselves.</p>";
		echo "<ul class=\"help middle\"><li><a href=\"../gall/all_gall_edit.php\">Edit any Users Gallery</a></li>
		<li><a href=\"../admin/pass.php\">Change your password</a></li>
		<li><a href=\"../admin/users_edit.php\">Edit User Accounts</a></li>
		<li><a href=\"../admin/create.php\">Add new member to the club</a></li>
		<li><a href=\"../admin/delete.php\">Delete members who have left the club</a></li>
		<li><a href=\"../admin/reset.php\">Reset a Users Password</a></li>
		<li><a href=\"/admin/logout.php\">Log Out</a></li></ul></div>";
		
		echo "<div id=\"other\"><p><span class=\"red bold\">News and other Pages: </span>All sections of the website can be easily updated or deleted.</p>";
		echo "<ul class=\"padding help middle\">";/*<li><a href=\"../install\">Site Config Options</a></li>*/
		echo "<li><a href=\"../home/index2.php\">Edit Home Page</a></li>
		<li><a href=\"../purpose/purpose2.php\">Edit Our Purpose Page</a></li>
		<li><a href=\"../news/new2.php\">Edit News Pages</a></li>
		<li><a href=\"../competition/comp2.php\">Edit Competition Pages</a></li>
		<li><a href=\"../membership/membership2.php\">Edit Membership Page</a></li>
		<li><a href=\"../schedule/schedule2.php\">Edit Events Schedule</a></li>
		<li><a href=\"../committee/contact2.php\">Edit Committee Page</a></li>
		<li><a href=\"../location/location2.php\">Edit Location Page</a></li>
		<li><a href=\"../download/download2.php\">Edit Downloads Page</a></li>
		<li><a href=\"../links/links2.php\">Edit Links Page</a></li>
		<li><a href=\"http://webmail.arnoldanddistrictcameraclub.org.uk\">Check the Committee email mailbox</a> (Requires login details)</li>
		</ul></div>";	
	}
	if ($level =="2") //Level 2 is Programme Secretary Account
	{
		echo "<p>Welcome ".$name.". You have access to edit the Programme Only.</p>";
		if($username==$pass) echo "<p class=\"redtext\">Please note that you have not changed your password. This means that anyone that knows your username can log in and alter your gallery. To do so now please click <a href=\"pass.php\">here</a>.</p>";
		
		echo "<div id=\"help\"><p><span class=\"redtext\">Help and Support: </span>Are you a new member of the club or an experienced user? Read our detailed help articles or email our knowledgeable webmasters Simon and Greg.</p>";
		echo "<ul class=\"help middle\"><li>Help Pages (arriving soon)</li>
		<li><a href=\"../admin/html.php\">Guide to HTML</a></li>
		<li><a href=\"mailto:club@arnoldanddistrictcameraclub.org.uk\">email the Club</a></li>
		<li><a href=\"mailto:funkysi1701@gmail.com\">email Simon</a></li>
		<li><a href=\"mailto:greg.foster3@ntlworld.com\">email Greg</a></li>
		<li><a href=\"https://www.google.com/analytics/home/?hl=en\">View our web traffic via Google Analytics</a> (Requires login details)</li></ul></div>";
		
		echo "<div id=\"gall\"><p><span class=\"redtext\">Gallery and User Accounts: </span>All members have access to upload images to our gallery, but did you know that members can also create a page about themselves.</p>";
		echo "<ul class=\"help middle\">
		<li><a href=\"../admin/pass.php\">Change your password</a></li>
		<li><a href=\"/admin/logout.php\">Log Out</a></li>
		</ul></div>";
		
		echo "<div id=\"other\"><p><span class=\"redtext\">News and other Pages: </span>All sections of the website can be easily updated or deleted.</p>";
		echo "<ul class=\"help middle\">
		<li><a href=\"../schedule/schedule2.php\">Edit Events Schedule</a></li>
		<li><a href=\"http://webmail.arnoldanddistrictcameraclub.org.uk\">Check the Committee email mailbox</a> (Requires login details)</li>
		
		</ul></div>";	
	}
	if ($level =="1") // Level 1 is club members upload accounts
	{
		$query="SELECT COUNT(*) AS numrows FROM image_store where author_id='$auth'";
	    $result=mysql_query($query) or die('Error, query failed');
	    $row=mysql_fetch_array($result, MYSQL_ASSOC);
	    $numrows=$row['numrows'];
	
		echo "<p>Welcome ".$name.". You have upload access. ";
	
	
		if($numrows==0) echo "You don't have any images in our gallery, <a href=\"../gall/upload.php\">click here</a> to upload some now. </p>";
		else echo "You have ".$numrows." Images in your gallery.</p>"; 
	
		if($about=='' and $gall_null==0) echo "<p>Why not write something about yourself, such as why you joined the club or why you like photography. <a href=\"../admin/edit_about.php\">Click here</a> to do this now.</p>";
		if($username==$pass) echo "<p class=\"redtext\">Please note that you have not changed your password. This means that anyone that knows your username can log in and alter your gallery. To do so now please click <a href=\"pass.php\">here</a>.</p>";
		if($email==null or $email=="funkysi1701@gmail.com") echo "<p class=\"redtext\">We do not have your email address in our database. If you forget your password you will not be able to reset it without contacting the webmasters. To add your email please click <a href=\"../admin/users_edit.php\">here</a>.</p>";
		
		echo "<div class=\"sidebarfix\"><div id=\"help\"><p><span class=\"redtext\">Help and Support: </span>Are you a new member of the club or an experienced user? Read our detailed help articles or email our knowledgeable webmasters Simon and Greg.</p>";
		echo "<ul class=\"help middle\"><li>Help Pages (arriving soon)</li>
		<li><a href=\"../admin/html.php\">Guide to HTML</a></li>
		<li><a href=\"mailto:club@arnoldanddistrictcameraclub.org.uk\">email the Club</a></li>
		<li><a href=\"mailto:funkysi1701@gmail.com\">email Simon</a></li>
		<li><a href=\"mailto:greg.foster3@ntlworld.com\">email Greg</a></li>
		</ul></div>";
		
		echo "<div id=\"gall\"><p><span class=\"redtext\">Gallery and User Accounts: </span>All members have access to upload images to our gallery, but did you know that members can also create a page about themselves.</p>";
		echo "<ul class=\"help middle\"><li><a href=\"../gall/all_gall_edit.php\">Edit your Gallery</a></li>
		<li><a href=\"../gall/all_upload.php?type=$auth\">Upload Images</a></li>
		<li><a href=\"../admin/pass.php\">Change your password</a></li>
		<li><a href=\"../admin/edit_about.php\">Edit About Me Page</a></li>
		<li><a href=\"/admin/logout.php\">Log Out</a></li>
		</ul></div></div>";
	
		if($role!='0')
		{
			echo "<div id=\"other\"><p><span class=\"redtext\">News and other Pages: </span></p><ul class=\"help middle\"><li><a href=\"http://webmail.arnoldanddistrictcameraclub.org.uk\">Check the Committee email mailbox</a> (Requires login details)</li></ul></div>";
		}	
	}
?>
<hr />
</div>
<?php 
	include $_SERVER["DOCUMENT_ROOT"].'/include/footer.php';
?>
</div>
</body>
</html>