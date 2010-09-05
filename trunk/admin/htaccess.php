<?php
	$filename = $_SERVER["DOCUMENT_ROOT"].'/include/config.php';
	include $filename;
	$filename =$cfg['path']."/.htaccess";
	$ToDayDate1 = date("m-d-Y"); 
		if( file_exists( $filename ) )
		{
			unlink($filename);
		}
			$contents = "RewriteEngine on
			RewriteRule (.*)\.xml(.*) $1.php$2 [nocase]   
			RewriteRule ^gall/(.+)/(.+)/$ gall/view.php?id=$1&username=$2
RewriteRule ^gall/(.+)/(.+)$ gall/view.php?id=$1&username=$2
			RewriteRule ^image/(.+)/(.+)/$ gall/viewpic.php?id=$2&username=$1
RewriteRule ^image/(.+)/(.+)$ gall/viewpic.php?id=$2&username=$1
			RewriteRule ^author/(.+)/$ gall/author.php?username=$1
RewriteRule ^author/(.+)$ gall/author.php?username=$1
			
			RewriteRule ^news/(.+)/$ news/index.php?id=$1&CurrentMonth=".$ToDayDate1."

			RewriteRule ^news/(.+)/(.+)/$ news/index.php?id=$1&CurrentMonth=$2

			RewriteRule ^schedule/(.+)/$ schedule/index.php?id=$1

			RewriteRule ^articles/(.+)/$ articles/varticle.php?link=$1
RewriteRule ^articles/(.+)$ articles/varticle.php?link=$1
			ExpiresActive On
			ExpiresByType image/gif A2592000
			ExpiresByType image/png A2592000
			ExpiresByType image/jpg A2592000
			ExpiresByType image/jpeg A2592000
			ExpiresByType text/css A2592000
			ExpiresByType text/html A2592000
			ExpiresByType text/php A2592000
			FileETag MTime Size
			ErrorDocument 400 /error/error.php
			ErrorDocument 401 /error/error.php
			ErrorDocument 402 /error/error.php
			ErrorDocument 403 /error/error.php
			ErrorDocument 404 /error/error.php
			ErrorDocument 500 /error/error.php

			Redirect /schedule.php http://".$_SERVER["HTTP_HOST"]."/schedule/
			Redirect /schedule/schedule2.php http://".$_SERVER["HTTP_HOST"]."/schedule/
			Redirect /new.php http://".$_SERVER["HTTP_HOST"]."/news/
			Redirect /news/new2.php http://".$_SERVER["HTTP_HOST"]."/news/			
			Redirect /contact.php http://".$_SERVER["HTTP_HOST"]."/committee/
			Redirect /committee/contact2.php http://".$_SERVER["HTTP_HOST"]."/committee/
			Redirect /gall.php http://".$_SERVER["HTTP_HOST"]."/gall/
			Redirect /download.php http://".$_SERVER["HTTP_HOST"]."/download/
			Redirect /location.php http://".$_SERVER["HTTP_HOST"]."/location/
			Redirect /location/location2.php http://".$_SERVER["HTTP_HOST"]."/location/
			Redirect /links.php http://".$_SERVER["HTTP_HOST"]."/links/
			Redirect /links/links2.php http://".$_SERVER["HTTP_HOST"]."/links/
			Redirect /download/download2.php http://".$_SERVER["HTTP_HOST"]."/download/
			Redirect /purpose.php http://".$_SERVER["HTTP_HOST"]."/purpose/
			Redirect /purpose/purpose2.php http://".$_SERVER["HTTP_HOST"]."/purpose/
			Redirect /membership.php http://".$_SERVER["HTTP_HOST"]."/membership/
			Redirect /membership/membership2.php http://".$_SERVER["HTTP_HOST"]."/membership/
			Redirect /schedule/home/fsi.php http://".$_SERVER["HTTP_HOST"]."/fsi.php
			Redirect /news/home/fsi.php http://".$_SERVER["HTTP_HOST"]."/fsi.php
			Redirect /gall/9/home/fsi.php http://".$_SERVER["HTTP_HOST"]."/fsi.php
			Redirect /gall/1/home/fsi.php http://".$_SERVER["HTTP_HOST"]."/fsi.php
			Redirect /author/home/fsi.php http://".$_SERVER["HTTP_HOST"]."/fsi.php
			Redirect /authenticate.php http://".$_SERVER["HTTP_HOST"]."/admin/
			Redirect /articles/home/fsi.php http://".$_SERVER["HTTP_HOST"]."/fsi.php
			Redirect /article.php http://".$_SERVER["HTTP_HOST"]."/home/
			Redirect /articles/ http://".$_SERVER["HTTP_HOST"]."/home/
			Redirect /gallery/ http://".$_SERVER["HTTP_HOST"]."/gall/
			Redirect /rss/adcc_gall.xml http://".$_SERVER["HTTP_HOST"]."/adcc_gall.xml
			Redirect /adcc_gall.xml http://".$_SERVER["HTTP_HOST"]."/home/
			Redirect /rss/adcc_schedule.xml http://".$_SERVER["HTTP_HOST"]."/adcc_schedule.xml
			Redirect /adcc_schedule.xml http://".$_SERVER["HTTP_HOST"]."/home/
			Redirect /rss/adcc_news.xml http://".$_SERVER["HTTP_HOST"]."/adcc_news.xml
			Redirect /adcc_news.xml http://".$_SERVER["HTTP_HOST"]."/home/
			Redirect /home/guidelinesfordigitalcompetitions/ http://".$_SERVER["HTTP_HOST"]."/home/
			Redirect /htaccess.php http://".$_SERVER["HTTP_HOST"]."/admin/htaccess.php
			Redirect /home/guidelinesfordigitalimagesforprojectioninclubcompetitions/ http://".$_SERVER["HTTP_HOST"]."/home/
			Redirect /home/index.php http://".$_SERVER["HTTP_HOST"]."/index.php
			Redirect /home/index2.php http://".$_SERVER["HTTP_HOST"]."/index.php
			Redirect /home/testarticle/ http://".$_SERVER["HTTP_HOST"]."/home/
			Redirect /view.php http://".$_SERVER["HTTP_HOST"]."/gall/view.php\n";
			
		if($_SERVER["HTTP_HOST"]=="funkysi.co.uk" or $_SERVER["HTTP_HOST"]=="www.funkysi.co.uk" or $_SERVER["HTTP_HOST"]=="adcc.arnoldanddistrictcameraclub.org.uk")
			{
				$contents.="			AuthUserFile 	/usr/local/psa/home/vhosts/funkysi.co.uk/httpdocs/.htpasswd
AuthGroupFile /dev/null
AuthName \"Simon Test Website\"
AuthType Basic

<Limit GET>
require valid-user
</Limit>";
			}
		else {
			}
				$file = fopen( $filename, "w");
				fwrite( $file, $contents);
				fclose( $file);
				
	header("Location:../index.php");
?>