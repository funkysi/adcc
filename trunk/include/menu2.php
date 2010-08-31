<ul class="m first-level">
<li class="m"><a href="/" <?php if ($area=="index") echo "class=\"x\""; ?>>The Club</a>

</li>
<li class="m"><a href="/purpose/" <?php if ($area=="purpose") echo "class=\"x\""; ?> >Our Purpose</a>

</li>
<li class="m"><a href="/news/" <?php if ($area=="new") echo "class=\"x\""; ?> >Latest News</a>

</li>
<li class="m"><a href="/news/" <?php if ($area=="membership") echo "class=\"x\""; ?>>Membership</a>

</li>
<li class="m"><a  href="/schedule/" <?php if ($area=="schedule") echo "class=\"x\""; ?>>Schedule</a>

</li>
<li class="m"><a  href="/gall/" <?php if ($area=="gall") echo "class=\"x\""; ?>>Club Gallery</a>
<ul class="m second-level">

<?php 
	$ans = getallusers();
	$count = getusercount();

	echo "<li class=\"m\"><a href=\"/gall/slideshow.php?image=0&amp;status=1\">Slide Show</a></li>";
	echo "<li class=\"m\"><a href=\"/gall/top10.php\">Top 10</a></li>";
	echo "<li class=\"m\"><a href=\"/gall/top10new.php\">New Images</a></li>";
	#loop through all records
	for ($i =0;$i<$count;$i++) 
	{
		echo "<li class=\"m\"><a href=\"/gall/1/".$ans[$i]['username']."/\">".$ans[$i]['displayname']." ".$ans[$i]['lastname']."</a></li>"; 
	}
?>
</ul>
</li>
<li class="m"><a  href="/committee/" <?php if ($area=="contact") echo "class=\"x\""; ?>>Committee</a>

</li>
<li class="m"><a  href="/competition/" <?php if ($area=="competition") echo "class=\"x\""; ?>>Competition</a>

</li>
<li class="m"><a  href="/location/" <?php if ($area=="location") echo "class=\"x\""; ?>>Where We Are</a>

</li>
<li class="m"><a  href="/download/" <?php if ($area=="download") echo "class=\"x\""; ?>>Download Area</a>

</li>
<li class="m"><a  href="/links/" <?php if ($area=="links") echo "class=\"x\""; ?>>Links Page</a>

</li>

<li class="m"><a  href="/admin/access.php" <?php if ($area=="members") echo "class=\"x\""; ?>><?php echo $name; ?></a>
<ul class="m second-level">
<li class="m"><a href="/admin/pass.php">Change Password</a></li>

<li class="m"><a href="/admin/logout.php">Log Out</a></li>
</ul>

</li>
</ul>
