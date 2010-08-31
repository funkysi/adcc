<?php
	$url=$_POST['url'];
	$sitetitle=$_POST['sitetitle'];
	$location=$_POST['location'];
	$email=$_POST['email'];
	$nemail=$_POST['nemail'];
	$sitemap=$_POST['sitemap'];
	$analytics=$_POST['analytics'];
	if(isset($_POST['bg']))
	{
		$bg=$_POST['bg'];
	}
	else $bg=null;
	if(isset($_POST['logo']))
	{
		$logo=$_POST['logo'];
	}
	else $logo=null;
	if(isset($_POST['delbg']))
	{
		$delbg=$_POST['delbg'];
	}
	else $delbg=null;
	if(isset($_POST['dellogo']))
	{	
		$dellogo=$_POST['dellogo'];
	}
	else $dellogo=null;
	$webmaster=$_POST['webmaster'];
	$awa=$_POST['awa'];
	if( $_FILES['bg']['name'] != "" )
	{
		if((substr($_FILES['bg']['name'],  -3)!="jpg" and substr($_FILES['bg']['name'],  -3)!="JPG") and (substr($_FILES['bg']['name'],  -3)!="png" and substr($_FILES['bg']['name'],  -3)!="PNG"))
		{
			header("Location:users_edit.php?type=$type&status=jpg");exit();
		}
		$unique_name = date("U")."0.".substr($_FILES['bg']['name'],  -3);
		copy ( $_FILES['bg']['tmp_name'], '../imgs/photos/' . $unique_name ) 
		or die( header("Location:users_edit.php?type=$type&status=toobig") );
		$bg = '../imgs/photos/' . $unique_name;
		include_once $_SERVER["DOCUMENT_ROOT"].'/gall/image_resize.php'; 
		image_resize(740,740,'740',$bg);
		image_resize(100,100,'100',$bg);
		image_resize(140,140,'140',$bg);
		image_resize(250,250,'250',$bg);
		image_resize(580,580,'580',$bg);
	}
	if( $_FILES['logo']['name'] != "" )
	{
		if((substr($_FILES['logo']['name'],  -3)!="jpg" and substr($_FILES['logo']['name'],  -3)!="JPG") and (substr($_FILES['logo']['name'],  -3)!="png" and substr($_FILES['logo']['name'],  -3)!="PNG"))
		{
			header("Location:users_edit.php?type=$type&status=jpg");exit();
		}
		$unique_name = date("U")."1.".substr($_FILES['logo']['name'],  -3);
		copy ( $_FILES['logo']['tmp_name'], '../imgs/photos/' . $unique_name ) 
		or die( header("Location:users_edit.php?type=$type&status=toobig") );
		$logo = '../imgs/photos/' . $unique_name;
		include_once $_SERVER["DOCUMENT_ROOT"].'/gall/image_resize.php'; 
		image_resize(740,740,'740',$logo);
		image_resize(100,100,'100',$logo);
		image_resize(140,140,'140',$logo);
		image_resize(250,250,'250',$logo);
		image_resize(580,580,'580',$logo);
	}
	include_once $_SERVER["DOCUMENT_ROOT"].'/db/dbconfig.php';
	if($awa=="on") $awa="<p>
<a href=\"http://www.awardsforall.org.uk/\">
<img class=\"afa\" src=\"http://".str_replace('www','imgs',$_SERVER['HTTP_HOST'])."/imgs/site/awards.jpg\" alt=\"Awards for All\" />
</a>
</p>";
	createconfig('url',$url);
	createconfig('title',$sitetitle);
	createconfig('location',$location);
	createconfig('email',$email);
	createconfig('notifyemail',$nemail);
	createconfig('Sitemap',$sitemap);
	createconfig('Analytics',$analytics);
	if($bg!='')
	createconfig('bg',$bg);
	if($delbg=="on")
	createconfig('bg','');
	if($logo!='')
	createconfig('logo',$logo);
	if($dellogo=="on")
	createconfig('logo','');
	createconfig('webmaster',$webmaster);
	createconfig('awa',$awa);
	Header("Location:/admin/htaccess.php");
?>