<?php

function getcontent2($table,$where,$limit="")
{
				include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
				$ans="";
				$sql = "select * from ".$table." where ".$where." order by id asc ".$limit;
			    $rs = @mysql_query($sql) or die("Could not execute SQL query");
			    while ($row=mysql_fetch_array($rs))
			    {   
					srand(microtime()*1000000);
					$num=rand(1,2);
					$text=str_replace("\n","<br/>",$row['text']);
					if ($row['image']=="")
					{
						if($where=="page = 'location'") $ans .="".$text."";
						else if($where=="page = 'gallery'") 
						{
							if($row['title']=='') $hide =" hide"; else $hide ="";
							$ans .= "<h2 class=\"bold red".$hide."\">".$row['title']."</h2>";
							$ans .= "<p>" . $text . "</p>";
						}
						else {
						$ans .= "<h2 class=\"bold\">".$row['title']."</h2>";
						$ans .= "<p>" . $text . "</p>";
						}
					}
					else if ($row['image']!="")
					{
						if($where=="page = 'location'") $ans .="<a href=\"".$row['link']."\"><img class=\"location\" alt=\"".$row['image']."\" src=\"".$row['image']."\" /></a>".$text."";
						else {
						if ($num==1) $ans .= "<a href=\"".$row['link']."\"><img class=\"left\" alt=\"".$row['image']."\" src=\"../gall/250.php?".$row['image']."\" /></a><p class=\"big-padding\">".$text."</p><hr/>";
						else if ($num==2) $ans .= "<a href=\"".$row['link']."\"><img class=\"right\" alt=\"".$row['image']."\" src=\"../gall/250.php?".$row['image']."\" /></a><p class=\"big-padding\">".$text."</p><hr/>";
						}
					}
				}
	return $ans;
}
function getcontent($table,$where,$limit="")
{	
					include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$ans="";
					$sql = "select * from ".$table." where ".$where." order by id asc ".$limit;
				    $rs = @mysql_query($sql) or die("Could not execute SQL query");
					$ans=array();
					$i=0;
				    while ($row=mysql_fetch_array($rs))
				    {
						$ans[$i]['text']=str_replace("\n","<br/>",$row['text']);
						$ans[$i]['id']=$row['id'];
						$ans[$i]['title']=$row['title'];
						$ans[$i]['link']=$row['link'];
						$ans[$i]['image']=$row['image'];
						$i++;
					}
					return $ans;
}	
function getcount($table,$where,$limit="")
{	
					include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$ans="";
					$sql = "select count(*) as count from ".$table." where ".$where." order by id asc ".$limit;
				    $rs = @mysql_query($sql) or die("Could not execute SQL query");
				    while ($row=mysql_fetch_array($rs))
				    {
						$ans = $row['count'];
					}
					return $ans;
}	
function updatecontent($text,$image,$link,$id)
{
					include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$sql = "UPDATE content SET text='$text',  image='$image', link='$link' WHERE id='$id'"; 
					$rs = mysql_query($sql) or die ("Could not execute SQL query update content".$sql);
}
function setcontent($text,$image,$link,$page)
{
					include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$sql = "insert into content (text,image,link,page) 
						values (\"$text\",\"$image\",\"$link\",\"$page\")"; 
					$rs = mysql_query($sql) or die ("Could not execute SQL query");
					return $rs;
}
function deletecontent($id)
{
					include $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
					$sql = "DELETE FROM content WHERE id='$id'";
					$rs = mysql_query($sql) or die ("Could not execute SQL query");
}
?>