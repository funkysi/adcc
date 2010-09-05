<?php
function sendemail($page,$name='',$image='',$info='',$caption='',$type='',$auth='')
{
	include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	if($_SERVER["HTTP_HOST"]!="www.arnoldanddistrictcameraclub.org.uk") $header=" (TEST)";
	else $header="";
	$sql2 = "select * from config where name='notifyemail'";
	$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
	while ( $row = mysql_fetch_array( $rs2 ) ) 
	{
		$to=$row['setting'].", funkysi1701@googlemail.com, ";
	}
	if($page=="search")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$link="http://".$_SERVER["SERVER_NAME"]."/gall/gall_search.php?search=".$image;
		if($name=="") $name="Unknown";
		$sub=$image." Searched for by ".$name;
		$sub.=$header;
		
		$date=date("H:i:s d-m-Y");
		
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nSearch: ".$image;
		$msg.="\nDate: ".$date;
		$msg.="\nLink: ".$link;
	}
	if($page=="upload")
	{
		$sql2 = "select id,author_id from image_store where image='$image'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$id=$row['id'];
			$name2=$row['author_id'];
		}
		$link="http://".$_SERVER["SERVER_NAME"]."/image/".$type."/".$id."/";
		$sql2 = "select displayname,lastname from users where username='$auth'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sql2 = "select displayname,lastname from users where username='$name2'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name2=$row['displayname']." ".$row['lastname'];
		}
		$sub="Photo ".$caption." Uploaded by ".$name;
		$sub.=$header;
		
		$date=date("H:i:s d-m-Y");
		
		$msg="\n";
		$msg.="User: ".$name2;
		if($name!=$name2)
		$msg.="\nAdmin: ".$name;
		$msg.="\nImage Title: ".$caption;
		$msg.="\nImage Details: ".$info;
		$msg.="\nDate: ".$date;
		$msg.="\nLink: ".$link;
	}
	if($page=="resetpass")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sub="Password Reset for ".$name;
		$sub.=$header;
		
		$date=date("H:i:s d-m-Y");
		
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nPassword: ".$image;
		$msg.="\nDate: ".$date;
	}
	if($page=="resetpwd")
	{
		$sql2 = "select * from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$type=$row['username'];
			$name=$row['displayname']." ".$row['lastname'];
			$to.=$row['email'];
			
		}
		$sub="Password Reset for ".$name;
		$sub.=$header;
		
		$date=date("H:i:s d-m-Y");
		
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nUsername: ".$type;
		$msg.="\nPassword: ".$image;
		$msg.="\nDate: ".$date;
	}
	if($page=="aboutme")
	{
		$link="http://".$_SERVER["SERVER_NAME"]."/author/".$name."/";
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		
		$sub="About Me Updated by ".$name;
		$sub.=$header;
		
		$date=date("H:i:s d-m-Y");
		
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nAbout You: ".$image;
		$msg.="\nEmail: ".$info;
		$msg.="\nDate: ".$date;
		$msg.="\nLink: ".$link;
	}
	if($page=="createuser")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		
		$sub=$image." ".$info." Created by ".$name;
		$sub.=$header;
		
		$date=date("H:i:s d-m-Y");
		
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nNew User: ".$image." ".$info;
		$msg.="\nUsername: ".$caption;
		$msg.="\nDate: ".$date;
	}
	if($page=="deleteuser")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sql20 = "select * from users where username='$image'";
		$rs20 = @mysql_query( $sql20 ) or die( "Could not execute SQL query" );
		while ( $row2 = mysql_fetch_array( $rs20 ) ) 
		{
			$username=$row2['username'];
			$image=$row2['displayname'];
			$info=$row2['lastname'];
		}
		$sub=$image." ".$info." Deleted by ".$name;
		$sub.=$header;
		
		$date=date("H:i:s d-m-Y");
		
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nNew User: ".$image." ".$info;
		$msg.="\nUsername: ".$username;
		$msg.="\nDate: ".$date;
	}
	if($page=="comedit")
	{
		$link="http://".$_SERVER["SERVER_NAME"]."/committee/";
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sql2 = "select displayname,lastname from users where id='$image'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name2=$row['displayname']." ".$row['lastname'];
		}
		
		$sub="About Me for ".$name2." Updated by ".$name;
		$sub.=$header;
		
		$date=date("H:i:s d-m-Y");
		
		$msg="\n";
		$msg.="User: ".$name2;
		$msg.="\nAdmin: ".$name;
		$msg.="\nAbout You: ".$info;
		$msg.="\nDate: ".$date;
		$msg.="\nLink: ".$link;
	}
	if($page=="editphoto")
	{
		$sql2 = "select id,author_id from image_store where caption='$image'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$id=$row['id'];
			$name2=$row['author_id'];
		}
		$link="http://".$_SERVER["SERVER_NAME"]."/image/".$name2."/".$id."/";
		
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sql2 = "select displayname,lastname from users where username='$name2'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name2=$row['displayname']." ".$row['lastname'];
		}
		$sub="Photo ".$image." Updated by ".$name;
		$sub.=$header;
		
		$date=date("H:i:s d-m-Y");
		
		$msg="\n";
		$msg.="User: ".$name2;
		if($name!=$name2)
		$msg.="\nAdmin: ".$name;
		$msg.="\nImage Title: ".$image;
		$msg.="\nImage Details: ".$info;
		$msg.="\nDate: ".$date;
		$msg.="\nLink: ".$link;
	}
	if($page=="delphoto")
	{
		$sql2 = "select * from image_store where author_id='$name' and id='$image'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['name'];
			$caption=$row['caption'];
			$info=$row['info'];
		}
		$sub="Photo ".$caption." Deleted by ".$name;
		$sub.=$header;
		
		$date=date("H:i:s d-m-Y");
		
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nImage Title: ".$caption;
		$msg.="\nImage Details: ".$info;
		$msg.="\nDate: ".$date;
	}
	if($page=="addtag")
	{
		$sql2 = "select * from image_store where id='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['name'];
			$caption=$row['caption'];
			$info=$row['info'];
		}
		$sub="Photo ".$caption." tagged by ".$name." with ".$image;
		$sub.=$header;
		
		$date=date("H:i:s d-m-Y");
		
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nImage Title: ".$caption;
		$msg.="\nImage Details: ".$info;
		$msg.="\nTag: ".$image;
		$msg.="\nDate: ".$date;
	}
	if($page=="deltag")
	{
		$sql2 = "select * from image_store where id='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['name'];
			$caption=$row['caption'];
			$info=$row['info'];
		}
		$sub="Photo ".$caption." untagged by ".$name." with ".$image;
		$sub.=$header;
		
		$date=date("H:i:s d-m-Y");
		
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nImage Title: ".$caption;
		$msg.="\nImage Details: ".$info;
		$msg.="\nTag: ".$image;
		$msg.="\nDate: ".$date;
	}
	if($page=="newevent")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sub="Event added by ".$name;
		$sub.=$header;
		$link="http://".$_SERVER["SERVER_NAME"]."/schedule/";
		
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nEvent Details: ".$image;
		$msg.="\nFurther Details: ".$info;
		$msg.="\nDate: ".$caption;
		$msg.="\nLink: ".$link;
	}
	if($page=="newnews")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sub="News added by ".$name;
		$sub.=$header;
		
		$date=date("H:i:s d-m-Y");
		$link="http://".$_SERVER["SERVER_NAME"]."/news/";
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nText: ".$image;
		$msg.="\nImage Caption: ".$info;
		$msg.="\nDate: ".$date;
		$msg.="\nLink: ".$link;
	}
	if($page=="newhome")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sub="Home added by ".$name;
		$sub.=$header;
		
		$date=date("H:i:s d-m-Y");
		$link="http://".$_SERVER["SERVER_NAME"]."/";
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nTitle: ".$info;		
		$msg.="\nText: ".$image;
		$msg.="\nDate: ".$date;
		$msg.="\nLink: ".$link;
	}
	if($page=="newmem")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sub="Membership added by ".$name;
		$sub.=$header;
		
		$date=date("H:i:s d-m-Y");
		$link="http://".$_SERVER["SERVER_NAME"]."/membership/";
		$msg="\n";
		$msg.="User: ".$name;	
		$msg.="\nText: ".$image;
		$msg.="\nDate: ".$date;
		$msg.="\nLink: ".$link;
	}
	if($page=="newdownload")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sub="Download added by ".$name;
		$sub.=$header;
		
		$date=date("H:i:s d-m-Y");
		$link="http://".$_SERVER["SERVER_NAME"]."/download/";
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nFile: ".$image;
		$msg.="\nDescription: ".$info;
		$msg.="\nDate: ".$date;
		$msg.="\nLink: ".$link;
	}
	if($page=="newloc")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sub="Location added by ".$name;
		$sub.=$header;
		
		$date=date("H:i:s d-m-Y");
		$link="http://".$_SERVER["SERVER_NAME"]."/location/";
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nText: ".$image;
		$msg.="\nDate: ".$date;
		$msg.="\nLink: ".$link;
	}
	if($page=="advloc")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sub="Advanced Location Settings changed by ".$name;
		$sub.=$header;
		
		$date=date("H:i:s d-m-Y");
		$link="http://".$_SERVER["SERVER_NAME"]."/location/";
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nDate: ".$date;
		$msg.="\nLink: ".$link;
	}
	if($page=="newcommittee")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sql2 = "select displayname,lastname from users where username='$image'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name2=$row['displayname']." ".$row['lastname'];
		}
		$sub="Committee Member added by ".$name;
		$sub.=$header;
		
		$date=date("H:i:s d-m-Y");
		$link="http://".$_SERVER["SERVER_NAME"]."/committee/";
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nCommittee Member: ".$name2;
		$msg.="\nRole: ".$info;
		$msg.="\nDate: ".$date;
		$msg.="\nLink: ".$link;
	}
	if($page=="newlinks")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sub="Links added by ".$name;
		$sub.=$header;
		
		$date=date("H:i:s d-m-Y");
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nLink: ".$info;
		$msg.="\nText: ".$image;
		$msg.="\nDescription: ".$caption;		
		$msg.="\nDate: ".$date;
	}
	if($page=="newpurpose")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sub="Purpose added by ".$name;
		$sub.=$header;
		
		$date=date("H:i:s d-m-Y");
		$link="http://".$_SERVER["SERVER_NAME"]."/purpose/";
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nText: ".$image;
		$msg.="\nDate: ".$date;
		$msg.="\nLink: ".$link;
	}
	if($page=="editevent")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sub="Event edited by ".$name;
		$sub.=$header;
		
		
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nEvent Details: ".$image;
		$msg.="\nFurther Details: ".$info;
		$msg.="\nDate: ".$caption;
	}
	if($page=="editnews")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sub="News edited by ".$name;
		$sub.=$header;
		$link="http://".$_SERVER["SERVER_NAME"]."/news/";
		$date=date("H:i:s d-m-Y");
		
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nText: ".$image;
		$msg.="\nImage Caption: ".$info;
		$msg.="\nDate: ".$date;
		$msg.="\nLink: ".$link;
	}
	if($page=="editlinks")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sub="Links edited by ".$name;
		$sub.=$header;
		$date=date("H:i:s d-m-Y");
		
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nLink: ".$info;
		$msg.="\nText: ".$image;
		$msg.="\nDescription: ".$caption;		
		$msg.="\nDate: ".$date;
	}
	if($page=="editdownloads")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sub="Downloads edited by ".$name;
		$sub.=$header;
		$link="http://".$_SERVER["SERVER_NAME"]."/download/";
		$date=date("H:i:s d-m-Y");
		
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nFile: ".$image;
		$msg.="\nDescription: ".$info;
		$msg.="\nLink: ".$link;
		$msg.="\nDate: ".$date;
	}
	if($page=="editloc")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sub="Location edited by ".$name;
		$sub.=$header;
		$link="http://".$_SERVER["SERVER_NAME"]."/location/";
		$date=date("H:i:s d-m-Y");
		
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nText: ".$image;
		$msg.="\nLink: ".$link;
		$msg.="\nDate: ".$date;
	}
	if($page=="edithome")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sub="Home edited by ".$name;
		$sub.=$header;
		$link="http://".$_SERVER["SERVER_NAME"]."/";
		$date=date("H:i:s d-m-Y");
		
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nTitle: ".$info;		
		$msg.="\nText: ".$image;
		$msg.="\nDate: ".$date;
		$msg.="\nLink: ".$link;
	}
	if($page=="editpurpose")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sub="Purpose edited by ".$name;
		$sub.=$header;
		$link="http://".$_SERVER["SERVER_NAME"]."/purpose/";
		$date=date("H:i:s d-m-Y");
		
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nText: ".$image;
		$msg.="\nDate: ".$date;
		$msg.="\nLink: ".$link;
	}
	if($page=="editmem")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sub="Membership edited by ".$name;
		$sub.=$header;
		$link="http://".$_SERVER["SERVER_NAME"]."/membership/";
		$date=date("H:i:s d-m-Y");
		
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nText: ".$image;
		$msg.="\nDate: ".$date;
		$msg.="\nLink: ".$link;
	}
	if($page=="delevent")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sql20 = "select * from schedule where id='$image'";
		$rs20 = @mysql_query( $sql20 ) or die( "Could not execute SQL query" );
		while ( $row2 = mysql_fetch_array( $rs20 ) ) 
		{
			$date=$row2['date'];
			$image=$row2['event'];
			$info=$row2['misc'];
		}
		$sub="Event deleted by ".$name;
		$sub.=$header;
		
		
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nEvent Details: ".$image;
		$msg.="\nFurther Details: ".$info;
		$msg.="\nDate: ".$date;
	}
	if($page=="delnews")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sql20 = "select * from content where id='$image'";
		$rs20 = @mysql_query( $sql20 ) or die( "Could not execute SQL query" );
		while ( $row2 = mysql_fetch_array( $rs20 ) ) 
		{
			$date=$row2['date'];
			$image=$row2['text'];
			$info=$row2['title'];
		}
		$sub="News deleted by ".$name;
		$sub.=$header;
		
		
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nNews Text: ".$image;
		$msg.="\nCaption Details: ".$info;
		$msg.="\nDate: ".$date;
	}
	if($page=="delhome")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sql20 = "select * from content where id='$image'";
		$rs20 = @mysql_query( $sql20 ) or die( "Could not execute SQL query" );
		while ( $row2 = mysql_fetch_array( $rs20 ) ) 
		{
			$date=$row2['date'];
			$image=$row2['text'];
			$info=$row2['title'];
		}
		$sub="Home deleted by ".$name;
		$sub.=$header;
		
		
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nTitle: ".$info;		
		$msg.="\nText: ".$image;
		$msg.="\nDate: ".$date;
	}
	if($page=="dellinks")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sql20 = "select * from links where id='$image'";
		$rs20 = @mysql_query( $sql20 ) or die( "Could not execute SQL query" );
		while ( $row2 = mysql_fetch_array( $rs20 ) ) 
		{
			$link=$row2['link'];
			$linktext=$row2['linktext'];
			$desc=$row2['description'];
		}
		$sub="Links deleted by ".$name;
		$sub.=$header;
		
		$date=date("H:i:s d-m-Y");
		
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nLink: ".$link;
		$msg.="\nText: ".$linktext;
		$msg.="\nDescription: ".$desc;		
		$msg.="\nDate: ".$date;
	}
	if($page=="delpurpose")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sql20 = "select * from content where id='$image'";
		$rs20 = @mysql_query( $sql20 ) or die( "Could not execute SQL query" );
		while ( $row2 = mysql_fetch_array( $rs20 ) ) 
		{
			$date=$row2['date'];
			$image=$row2['text'];
			$info=$row2['title'];
		}
		$sub="Purpose deleted by ".$name;
		$sub.=$header;
		
		
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nText: ".$image;
		$msg.="\nDate: ".$date;
	}
	if($page=="delmem")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sql20 = "select * from content where id='$image'";
		$rs20 = @mysql_query( $sql20 ) or die( "Could not execute SQL query" );
		while ( $row2 = mysql_fetch_array( $rs20 ) ) 
		{
			$date=$row2['date'];
			$image=$row2['text'];
			$info=$row2['title'];
		}
		$sub="Membership deleted by ".$name;
		$sub.=$header;
		
		
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nText: ".$image;
		$msg.="\nDate: ".$date;
	}
	if($page=="delcommittee")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sql20 = "select * from users where id='$image'";
		$rs20 = @mysql_query( $sql20 ) or die( "Could not execute SQL query" );
		while ( $row2 = mysql_fetch_array( $rs20 ) ) 
		{
			$role=$row2['role'];
			$name2=$row2['displayname']." ".$row2['lastname'];
		}
		$sub="Committee Member deleted by ".$name;
		$sub.=$header;
		
		$date=date("H:i:s d-m-Y");
		
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nCommittee Member: ".$name2;
		$msg.="\nRole: ".$role;
		$msg.="\nDate: ".$date;
	}
	if($page=="delloc")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sql20 = "select * from content where id='$image'";
		$rs20 = @mysql_query( $sql20 ) or die( "Could not execute SQL query" );
		while ( $row2 = mysql_fetch_array( $rs20 ) ) 
		{
			$image=$row2['text'];
			
		}
		$sub="Location deleted by ".$name;
		$sub.=$header;
		
		$date=date("H:i:s d-m-Y");
		
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nText: ".$image;		
		$msg.="\nDate: ".$date;
	}
	if($page=="deldownload")
	{
		$sql2 = "select displayname,lastname from users where username='$name'";
		$rs2 = @mysql_query( $sql2 ) or die( "Could not execute SQL query" );
		while ( $row = mysql_fetch_array( $rs2 ) ) 
		{
			$name=$row['displayname']." ".$row['lastname'];
		}
		$sql20 = "select * from download where id='$image'";
		$rs20 = @mysql_query( $sql20 ) or die( "Could not execute SQL query" );
		while ( $row2 = mysql_fetch_array( $rs20 ) ) 
		{
			if(isset($row2['comment']))
			{
				$comment = $row2['comment'];
			}
			else $commment="";
			$disp=$row2['disp'];
		}
		$sub="Download deleted by ".$name;
		$sub.=$header;
		
		$date=date("H:i:s d-m-Y");
		
		$msg="\n";
		$msg.="User: ".$name;
		$msg.="\nFile: ".$disp;
		$msg.="\nDescription: ".$comment;		
		$msg.="\nDate: ".$date;
	}
	$msg=$msg."\n\nThis is an automatically generated email created by the Arnold and District Camera Club website.\nhttp://www.arnoldanddistrictcameraclub.org.uk.\nIf you believe you have received this email in error please contact funkysi1701@googlemail.com.";

	$from="From: club@arnoldanddistrictcameraclub.org.uk \r\n";
	$from.="Bcc: ".$to;
	mail (null, $sub, $msg,$from);
	$msg=htmlspecialchars($msg);
	$sql = "insert into log (subject,message,header,page) 
			values (\"$sub\",\"$msg\", \"$from\",\"$page\")"; 
			$rs = mysql_query($sql) or die ("Could not execute log SQL query ".$sql);
}


?>