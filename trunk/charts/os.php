<?php

// generate some random data:
if( isset( $_GET['id'] ) )
{
  $user = intval( $_GET['id'] );
  $sqlvalues = 'SELECT * FROM GA_OS_monthly order by date';
  $sql = 'SELECT * FROM GA_OS_monthly order by date';
  $sqlmax = 'SELECT max(`WINXP`) FROM GA_OS_monthly';

}
$db = mysql_connect("localhost", "bugs","bugs") or die("oh no!");

mysql_select_db("adcc_live",$db) or die("Could not select database");

$res = mysql_query($sql,$db) or die("Bad SQL 1".$sql);

while( $row = mysql_fetch_array($res) )
{
  $xp[] = ( $row[1] );

  $vista[] = ( $row[2] );
  $server03[] = ( $row[3] );
  $other[] = ( $row[4]+$row[5]+$row[6]+$row[7]+$row[8]+$row[9]+$row[10]+$row[11]+$row[12]);
  }
$res = mysql_query($sqlmax,$db) or die("Bad SQL 2".$sqlmax);

while( $row = mysql_fetch_array($res) )
{
  $max = floatval( $row[0] );
}

$values = array();
$res = mysql_query($sqlvalues,$db) or die("Bad SQL 4".$sql);

while( $row = mysql_fetch_array($res) )
{
  $values[] = ( $row[0] );
}
// // use the chart class to build the chart:
include_once( 'php-ofc-library/open-flash-chart.php' );
$g = new graph();

// // Spoon sales, March 2007
$g->title( 'Operating System ', '{font-size: 26px;}' );
$g->set_data( $xp );$g->set_data( $vista );$g->set_data( $server03 );$g->set_data( $other );

$g->line( 2, '0x0000CC', 'XP', 10 );
$g->line( 2, '0x00CC00', 'Vista', 10 );
$g->line( 2, '0xCC0000', 'Server 2003', 10 );$g->line( 2, '0xCC00CC', 'Other', 10 );

// // label each point with its value
$g->set_x_labels( $values );
$g->set_tool_tip( '#key#: #val# <br>#x_label#' );

// // set the Y max
$g->set_y_max( (intval($max/10))*10+10 );
//label every 20 (0,20,40,60)
$g->y_label_steps( ((intval($max/10))*10+10)/10 );
$g->x_axis_steps=1;
// // display the data
echo $g->render();
?>