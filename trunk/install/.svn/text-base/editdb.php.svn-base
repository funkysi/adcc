<?php
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); // Date in the past

$filename = $_SERVER["DOCUMENT_ROOT"].'/include/config.php';
include $filename;

$rs = @mysql_connect( $cfg['host'], $cfg['dbuser'], $cfg['dbpass'] ) or die( "Could not connect to MySQL" );


$rs1 = mysql_query( 'use '.$cfg['dbname'] ) or die( "Could not use db ".mysql_error() );
$sql0="drop table config";
$sql1="CREATE TABLE IF NOT EXISTS competition (
  id int(11) NOT NULL auto_increment,
  type varchar(255) NOT NULL default '',
  date timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  judge varchar(255) NOT NULL default '',
  round int(11) NOT NULL default 0,
  PRIMARY KEY  (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
$sql2="CREATE TABLE IF NOT EXISTS config (
  id int(11) NOT NULL auto_increment,
  name varchar(255) NOT NULL default '',
  setting varchar(255) NOT NULL default '',
  PRIMARY KEY  (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
$sql3="CREATE TABLE IF NOT EXISTS content (
  id int(11) NOT NULL auto_increment,
  title varchar(255) NOT NULL default '',
  text text NOT NULL,
  date timestamp NOT NULL default CURRENT_TIMESTAMP,
  image varchar(255) NOT NULL default '',
  link varchar(255) NOT NULL default '',
  page varchar(255) NOT NULL default '',
  additional tinyint(4) NOT NULL default 0,
  PRIMARY KEY  (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
$sql4="CREATE TABLE IF NOT EXISTS download (
  id int(11) NOT NULL auto_increment,
  ufile text NOT NULL,
  comment text NOT NULL,
  size int(11) NOT NULL default 0,
  disp text NOT NULL,
  count tinyint(4) NOT NULL default 0,
  PRIMARY KEY  (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
$sql5="CREATE TABLE IF NOT EXISTS entries (
  id int(11) NOT NULL auto_increment,
  image_title varchar(255) NOT NULL default '',
  score varchar(255) NOT NULL default '',
  users varchar(255) NOT NULL default '',
  compid int(11) NOT NULL default 0,
  PRIMARY KEY  (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
$sql6="CREATE TABLE IF NOT EXISTS imageJtag (
  image int(11) NOT NULL,
  tag int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8";
$sql7="CREATE TABLE IF NOT EXISTS image_store (
  id int(11) NOT NULL auto_increment,
  name varchar(255) NOT NULL default '',
  image varchar(255) NOT NULL default '',
  caption varchar(255) NOT NULL default '',
  info text NOT NULL,
  author_id varchar(11) NOT NULL default '',
  date timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
$sql8="CREATE TABLE IF NOT EXISTS links (
  id int(11) NOT NULL auto_increment,
  link varchar(255) NOT NULL default '',
  description text NOT NULL,
  linktext varchar(255) NOT NULL default '',
  pri int(255) NOT NULL default 0,
  cat text NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
$sql9="CREATE TABLE IF NOT EXISTS schedule (
  id int(11) NOT NULL auto_increment,
  date datetime NOT NULL default '0000-00-00 00:00:00',
  event text NOT NULL,
  misc varchar(255) NOT NULL default '',
  seconds int(11) NOT NULL default 0,
  PRIMARY KEY  (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
$sql10="CREATE TABLE IF NOT EXISTS tags (
  id int(11) NOT NULL auto_increment,
  tag varchar(100) NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8";
$sql11="CREATE TABLE IF NOT EXISTS users (
  id int(2) NOT NULL auto_increment,
  username varchar(255) NOT NULL default '',
  displayname varchar(255) NOT NULL default '',
  passw varchar(255) default NULL,
  level int(11) NOT NULL default 0,
  lastname varchar(255) NOT NULL default '',
  image varchar(255) NOT NULL default '',
  about text NOT NULL,
  gall_null int(11) NOT NULL default 0,
  email varchar(255) NOT NULL default '',
  role varchar(255) NOT NULL default '',
  order_nu int(11) NOT NULL default 0,
  PRIMARY KEY  (id),
  UNIQUE KEY username (username)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
$rs1 = mysql_query( $sql0 ) or die( "Could not drop db table ".mysql_error() );
$rs1 = mysql_query( $sql1 ) or die( "Could not create db tables ".mysql_error() );
$rs1 = mysql_query( $sql2 ) or die( "Could not create db tables ".mysql_error() );
$rs1 = mysql_query( $sql3 ) or die( "Could not create db tables ".mysql_error() );
$rs1 = mysql_query( $sql4 ) or die( "Could not create db tables ".mysql_error() );
$rs1 = mysql_query( $sql5 ) or die( "Could not create db tables ".mysql_error() );
$rs1 = mysql_query( $sql6 ) or die( "Could not create db tables ".mysql_error() );
$rs1 = mysql_query( $sql7 ) or die( "Could not create db tables ".mysql_error() );
$rs1 = mysql_query( $sql8 ) or die( "Could not create db tables ".mysql_error() );
$rs1 = mysql_query( $sql9 ) or die( "Could not create db tables ".mysql_error() );
$rs1 = mysql_query( $sql10 ) or die( "Could not create db tables ".mysql_error() );
$rs1 = mysql_query( $sql11 ) or die( "Could not create db tables ".mysql_error() );
$sql ="INSERT INTO config (id,name,setting) VALUES (NULL,'email','".$cfg['email']."')";
$rs1 = mysql_query( $sql ) or die( "Could not update db ".mysql_error().$sql );
$sql ="INSERT INTO config (id,name,setting) VALUES (NULL,'url','".$cfg['url']."')";
$rs1 = mysql_query( $sql ) or die( "Could not update db ".mysql_error().$sql );
$sql ="INSERT INTO config (id,name,setting) VALUES (NULL,'title','".$cfg['title']."')";
$rs1 = mysql_query( $sql ) or die( "Could not update db ".mysql_error().$sql );
$sql ="INSERT INTO config (id,name,setting) VALUES (NULL,'location','".$cfg['location']."')";
$rs1 = mysql_query( $sql ) or die( "Could not update db ".mysql_error().$sql );
$sql ="INSERT INTO config (id,name,setting) VALUES (NULL,'details','".$cfg['details']."')";
$rs1 = mysql_query( $sql ) or die( "Could not update db ".mysql_error().$sql );
$passw=md5('password');
unlink('../rss/adcc_changes.xml');
unlink('../rss/adcc_gall.xml');
unlink('../rss/adcc_schedule.xml');
unlink('../rss/adcc_news.xml');
unlink('../rss/adcc_news.xml');
unlink('../.htaccess');
header("Location:../admin/htaccess.php");exit();
?>
