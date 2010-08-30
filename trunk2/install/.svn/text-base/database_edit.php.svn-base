<?php
$dbhost=$_POST['dbhost'];
$dbname=$_POST['dbname'];
$dbuser=$_POST['dbuser'];
$dbpass=$_POST['dbpass'];
$email=$_POST['email'];
$name=$_POST['name'];
$path=$_POST['path'];
$url=$_POST['url'];
$title=$_POST['title'];
$location=$_POST['location'];
$details=$_POST['details'];
$description=$_POST['description'];
$bgimg=$_POST['bgimg'];
$logoimg=$_POST['logoimg'];
$awa=$_POST['awa'];
$col0=$_POST['col0'];
$col1=$_POST['col1'];
$col2=$_POST['col2'];
$col3=$_POST['col3'];
$col4=$_POST['col4'];
$col5=$_POST['col5'];
$col6=$_POST['col6'];
$col7=$_POST['col7'];
$col8=$_POST['col8'];
$col9=$_POST['col9'];
$unique_name1 = date("U")."bg.jpg";
$unique_name2 = date("U")."logo.jpg";
if($dbhost==null or $dbname==null or $dbuser==null or $dbpass==null)
	header("Location:index.php");
$ans= "\$cfg['host']='".$dbhost."';\n";
$ans.= "\$cfg['dbname']='".$dbname."';\n";
$ans.= "\$cfg['dbuser']='".$dbuser."';\n";
$ans.= "\$cfg['dbpass']='".$dbpass."';\n";
$ans.= "\$cfg['email']='".$email."';\n";
$ans.= "\$cfg['name']='".$name."';\n";
$ans.= "\$cfg['path']='".$path."';\n";
$ans.= "\$cfg['url']='".$url."';\n";
$ans.= "\$cfg['title']='".$title."';\n";
$ans.= "\$cfg['location']='".$location."';\n";
$ans.= "\$cfg['details']='".$details."';\n";
$ans.= "\$cfg['description']='".$description."';\n";
if( substr($_FILES['bgimg']['name'],  -3)!="jpg" and substr($_FILES['bgimg']['name'],  -3)!="JPG" and substr($_FILES['logoimg']['name'],  -3)!="jpg" and substr($_FILES['logoimg']['name'],  -3)!="JPG") header("Location:install/index.php");
if( $_FILES['bgimg']['name'] != "" )
	{

	  copy ( $_FILES['bgimg']['tmp_name'], 
	  '../imgs/' . $unique_name1 ) 
	  or die( "Could not copy file" );

	}
	
	if( $_FILES['logoimg']['name'] != "" )
	{

	  copy ( $_FILES['logoimg']['tmp_name'], 
	  '../imgs/' . $unique_name2 ) 
	  or die( "Could not copy file" );

	}
$ans.= "\$cfg['logo']='".$unique_name2."';\n";
$ans.= "\$cfg['bg']='".$unique_name1."';\n";
if($awa==true)
$ans.= "\$cfg['awa']='<p>
<a href=\"http://www.awardsforall.org.uk/\">
<img class=\"afa\" src=\"http://".$_SERVER['HTTP_HOST']."/imgs/awards.jpg\" alt=\"Awards for All\" />
</a>
</p>';\n";
$filename = substr($_SERVER['SCRIPT_FILENAME'],0,-26).'/include/config.php';

unlink($filename);
$file = fopen ($filename, "w");
$ans=utf8_encode($ans);
fwrite ($file, "<?php\n ".$ans." \n?>");
fclose ($file);

	
$ans="/*
Style Sheet for the ADCC website
Version: 1.5
Author:  Simon Foster
website: www.arnoldanddistrictcameraclub.org.uk
*/

* {
  font-weight: bold;
  padding:0;
  margin:0;
}
html{
  background: url(../imgs/".$unique_name1.") left top fixed;
 
}
body{
	
	width:780px;
	position:relative;
	left:50%;
	margin-left:-390px;
	
	
	background:".$col0.";
	padding-bottom:15px;
	border-top:1px solid #ccc;
	border-left:1px solid #888;
	border-right:1px solid #bbb;
	border-bottom:1px solid #555;
	color: ".$col1.";
	margin-bottom:5px;
	margin-top:5px;
}
div.title{
  background: url(../gall/140.php?../imgs/".$unique_name2.") no-repeat left center;
  height:195px;
  padding-left:150px;
  margin-left:10px;
}
h1 {
  font-size:40.0pt;
  padding-top: 15px;
  text-align:center;
}
h2 {
  font-size:20.0pt;
  padding-bottom: 15px;
  padding-top:5px;
}
.middle{
text-align:center;
}
h3 {
  font-size:16.0pt;
  font-weight: normal;
  text-align:center;
  padding-top:15px;
  
}
.gall p.title{
	text-align:center;
	font-weight:bold;
	padding-top:15px;
	padding-bottom:15px;
	border-top: 1px dashed ".$col5.";
}
.gall p{
	text-align:center;
}
#schedule p.title{
	text-align:center;
	padding-bottom:15px;
	color:".$col1.";
}
#schedule p{
	padding-bottom:15px;
}
#menubit{
	float:left;
	padding-right:10px;
	margin-left:5px;
}

#schedule{
	width:260px;
	float:right;
	background: ".$col6.";
	padding-left:10px;
	padding-right:5px;
	padding-top:10px;
	padding-bottom:10px;
	border-top:1px solid #ccc;
	border-left:1px solid #888;
	border-right:1px solid #bbb;
	border-bottom:1px solid #555;
	margin-right:5px;
	margin-left:15px;
	color:".$col3.";
}
#right{
	
	float:right;
}
#main{
	padding-left:15px;
	padding-right:15px;
	margin-bottom:15px;
}
#main2{
	padding-left:0px;
	padding-right:0px;
	margin-bottom:15px;
	width:595px;
	float:right;

}
#author{
	clear:both;
	font-weight:normal;
	width:510px;
	font-size:10pt;
	padding-left:15px;
	margin: 0 auto;
	padding-top:15px;
	padding-bottom:5px;
	background: ".$col7.";
	border-top:1px solid #ccc;
	border-left:1px solid #bbb;
	border-right:1px solid #888;
	border-bottom:1px solid #555;
	color:".$col3.";
}

/* Link Formatting */
a {
  color: ".$col3.";
  text-decoration:none;
}
a:hover{
  text-decoration:underline;
}
a[href^=\"mailto:\"] {
  background: url(../imgs/email.png) no-repeat right bottom;
  padding-right: 15px;
}
.redtext {
  color: ".$col2.";
  clear:both;
}
img{
	border-top:1px solid #ccc;
	border-left:1px solid #bbb;
	border-right:1px solid #888;
	border-bottom:1px solid #555;
	
}
img.news{
	float:left;
	margin-right:10px;
}
	
img.afa{
	float:left;
	margin-left:1px;
	margin-right:10px;
	margin-bottom:10px;
}
p img.afa{
	margin-top:15px;
	margin-bottom:15px;
}
img.about{
	float:left;
	margin-right:15px;
}
.left{
	float:left;
	margin:0 15px 15px 0;
}
.right{
	float:right;
	margin:0 15px 0 15px;
}
#news{
	clear:both;
	border-top:1px dashed ".$col8.";
	margin-top:5px;
}
hr{
	clear:both;
	visibility:hidden;
}
p{
	padding-top:15px;
	padding-bottom:15px;
}
.first, .last, .prev, .next{
	padding-right:50px;
}
ul.help{
list-style:none;
padding-top:5px;
}
ul.help li{


}
ul.committee{
	list-style-type:none;
	margin-left:120px;

}
ul.committee li{
	padding-right:20px;
	padding-bottom:10px;

	float:left;
}
ul.access {
	list-style-type:none;

}
ul.access li a{
	float:left;
	padding:5px;
	margin-right:15px;
	text-align:center;
	width:150px;
	background:".$col6.";
	border-top:1px solid #ccc;
	border-left:1px solid #bbb;
	border-right:1px solid #888;
	border-bottom:1px solid #555;
}
ul.access li a:hover{
	padding:5px;
	text-decoration:none;
	color:".$col3.";
	background:".$col9.";
	border-top:1px solid #555;
	border-left:1px solid #bbb;
	border-right:1px solid #888;
	border-bottom:1px solid #ccc;
}
ul.access li {
	float:left;
	margin-top:20px;
	margin-bottom:20px;
}
ul.thumb {
	list-style-type:none;
}
ul.thumb li {
	float:left;
	padding-right:25px;
	padding-bottom:5px;
	height:300px;
}
label{
	display:block;
	float:left;
	width:15em;

	clear:both;
}
input, select{

	margin-bottom:5px;
}
select#day{
width:50px;
}
select#level{
width:150px;
}
input#year{

	margin-bottom:0px;
}
input#update{
	width:5em;


}
input#del{
	width:5em;

}
input#submit{
	width:10em;
}
fieldset{

	border:0px solid ".$col3.";
}
ul.comm{
	list-style:none;
}
ul.comm li{
	float:left;
	padding-right:0px;
	padding-left:20px;
	width:200px;
}
fieldset.right {
	float:none;
	margin-left:162px;
}
dl.sch dt{
	color:".$col2.";
	padding-bottom:15px;
	float:left;
}
dl.sch dd{
	padding-left:190px;
	padding-bottom:15px;
}
dl.d dt{
	
	padding-bottom:15px;
	padding-right:10px;
	float:left;
}
dl.d dd{
	padding-left:190px;
	padding-bottom:15px;
}
span.misc{
	color:".$col3.";
}
ul.sch li{
	float:left;
	width:50px;


}
ul.link li{
	float:left;
	padding-right:15px;
}
ul.link li.desc{
	clear:both;
}
ul.sch, ul.link{
	float:left;

	list-style:none;
}
ul.sch li.desc{
	width:300px;
padding-left:10px;
padding-bottom:0px;
}
ul.sch li.redtext{
	width:130px;
	padding-left:10px;
padding-bottom:15px;
	float:right;
}
.gallcount{
	border-top: 1px dashed ".$col5.";
	padding-top:15px;
	color:".$col2.";
}
span.resend a{
	color: ".$col2.";
}
p.email{
	padding-bottom:10px;
	border-bottom:1px dashed ".$col3.";
}
table {
	border-collapse:collapse;
	border: solid 0px ".$col3.";
	
}
thead {
	font-size: 1.2em;
	font-weight:bold;
}
tr.odd {
	background-color: ".$col4.";
}

td {
	border-left: solid 0px ".$col3.";
	padding-left:5px;
}
table img.com{
position:absolute;

}
tr p{
position:relative;
height:300px;
}
tr td p {

position:relative;
width:300px;
}
div#help, div#gall, div#other{
	width:45%;
	padding-right:4px;
	padding-left:4px;
	padding-bottom:4px;
	margin-top:20px;
	margin-right:6px;
	margin-left:6px;
	float:left;
	background-color: ".$col6.";
	border-bottom:1px solid #555;
	border-left:1px solid #bbb;
	border-right:1px solid #888;
	border-top:1px solid #ccc;
}
div#help p, div#gall p, div#other p{
padding-top:4px;
}
div#help, div#gall{
height:275px;
}
div#other{
width:94%;
height:auto;
}
ul.edit{
	list-style:none;
	
}
ul.edit li{
	float:left;
	margin-right:0px;
	margin-left:20px;
	margin-bottom:20px;
	width:20%;
	text-align:center;
	background-color: ".$col6.";
	border-bottom:1px solid #555;
	border-left:1px solid #bbb;
	border-right:1px solid #888;
	border-top:1px solid #ccc;
}
ul.edit li:hover{

background:".$col9.";
border-top:1px solid #555;
border-left:1px solid #bbb;
border-right:1px solid #888;
border-bottom:1px solid #ccc;
}
ul.edit li:hover a{
text-decoration:none;
}";

$filename = substr($_SERVER['SCRIPT_FILENAME'],0,-26).'/css/home.css';
unlink($filename);
$ans=utf8_encode($ans);
$file = fopen ($filename, "w");
fwrite ($file, $ans);
fclose ($file);

	header("Location:editdb.php");
	

?>