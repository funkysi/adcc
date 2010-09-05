<?php

// generate some random data:
if( isset( $_GET['id'] ) )
{
  $user = intval( $_GET['id'] );
  $sqlvalues = 'SELECT * FROM GA order by date';
  $sql = 'SELECT * FROM GA order by date';
  $sqlmax = 'SELECT max(`IE7.0`) FROM GA';
  $sqlmin = 'SELECT min(`IE6.0`) FROM GA';
}
$db = mysql_connect("localhost", "bugs","bugs") or die("oh no!");

mysql_select_db("adcc_live",$db) or die("Could not select database");

$res = mysql_query($sql,$db) or die("Bad SQL 1".$sql);

while( $row = mysql_fetch_array($res) )
{
  $ie5[] = ( $row[1]+$row[2]+$row[3]+$row[4] );

  $ie6[] = ( $row[5] );
  $ie7[] = ( $row[6] );
  $ie8[] = ( $row[7] );
  $ff1[] = ( $row[8]+$row[9]+$row[10]+$row[11]+$row[12]+$row[13]+$row[14]+$row[15] );

 
  $ff2[] = ( $row[16]+$row[17]+$row[18]+$row[19]+$row[20]+$row[21]+$row[22]+$row[23]+$row[24]+$row[25]+$row[26]+$row[27]+$row[28]+$row[29]+$row[30]+$row[31]+$row[32] );
 
  $ff3[] = ( $row[33]+$row[34] );
  $op[] = ( $row[35]+$row[36]+$row[37]+$row[38]+$row[39]+$row[40]+$row[41]+$row[42]+$row[43]+$row[44]+$row[45] );
  $other[] = ( $row[46]+$row[47]+$row[48]+$row[49]+$row[50]+$row[51]+$row[52]+$row[53]+$row[54]+$row[55]+$row[56]+$row[57]+$row[58]+$row[59]+$row[60]+$row[61] );
}
$res = mysql_query($sqlmax,$db) or die("Bad SQL 2".$sql);

while( $row = mysql_fetch_array($res) )
{
  $max = floatval( $row[0] );
}
$res = mysql_query($sqlmin,$db) or die("Bad SQL 3".$sql);

while( $row = mysql_fetch_array($res) )
{
  $min = floatval( $row[0] );
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
$g->title( 'Browsers ', '{font-size: 26px;}' );
$g->set_data( $ie5 );
$g->set_data( $ie6 );
$g->set_data( $ie7 );
$g->set_data( $ie8 );
$g->set_data( $ff1 );
$g->set_data( $ff2 );
$g->set_data( $ff3 );
$g->set_data( $op );
$g->set_data( $other );
$g->line( 2, '0x0000CC', 'IE 5.0', 10 );
$g->line_dot( 2,5, '0x00FF00', 'IE 6.0', 10 );

$g->line( 2, '0xCC0000', 'IE 7.0', 10 );
$g->line( 2, '0xCCCC00', 'IE 8.0', 10 );
$g->line( 2, '0x00CCCC', 'FF 1.5', 10 );

$g->line( 2, '0xCC00CC', 'FF 2.0', 10 );

$g->line( 2, '0xCCCCCC', 'FF 3.0', 10 );
$g->line( 2, '0x000000', 'Opera', 10 );
$g->line( 2, '0x00CC00', 'Other', 10 );
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