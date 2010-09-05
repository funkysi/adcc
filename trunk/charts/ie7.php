<?php

// generate some random data:
if( isset( $_GET['id'] ) )
{
  $user = intval( $_GET['id'] );
  $sqlvalues = 'SELECT date FROM googlestats where type =\'IE 7.0\' order by date';
  $sql = 'SELECT value FROM googlestats where type =\'IE 7.0\' order by date';
  $sql2 = 'SELECT value FROM googlestats where type =\'IE 6.0\' order by date';
  $sqlmax = 'SELECT max(value) FROM googlestats where type =\'IE 7.0\'';
  $sqlmin = 'SELECT min(value) FROM googlestats where type =\'IE 7.0\'';
}
$db = mysql_connect("localhost", "bugs","bugs") or die("oh no!");

mysql_select_db("adcc_live",$db) or die("Could not select database");
$data = array();
$data2 = array();
$res = mysql_query($sql,$db) or die("Bad SQL 1".$sql);

while( $row = mysql_fetch_array($res) )
{
  $data[] = floatval( $row[0] );
}
$res = mysql_query($sql2,$db) or die("Bad SQL 1".$sql);

while( $row = mysql_fetch_array($res) )
{
  $data2[] = floatval( $row[0] );
}
$res = mysql_query($sqlmax,$db) or die("Bad SQL 1".$sql);

while( $row = mysql_fetch_array($res) )
{
  $max = floatval( $row[0] );
}
$res = mysql_query($sqlmin,$db) or die("Bad SQL 1".$sql);

while( $row = mysql_fetch_array($res) )
{
  $min = floatval( $row[0] );
}
$values = array();
$res = mysql_query($sqlvalues,$db) or die("Bad SQL 1".$sql);

while( $row = mysql_fetch_array($res) )
{
  $values[] = ( $row[0] );
}
// // use the chart class to build the chart:
include_once( 'php-ofc-library/open-flash-chart.php' );
$g = new graph();

// // Spoon sales, March 2007
$g->title( 'IE', '{font-size: 26px;}' );

$g->set_data( $data );
$g->set_data( $data2 );
// // label each point with its value
$g->line( 2, '0x0000CC', 'IE 7.0', 10 );
$g->line( 2, '0xCC0000', 'IE 6.0', 10 );
$g->set_x_labels( $values );

// // set the Y max
$g->set_y_max( (intval($max/10))*10+10 );
//label every 20 (0,20,40,60)
$g->y_label_steps( ((intval($max/10))*10+10)/10 );
$g->x_axis_steps=1;
// // display the data
echo $g->render();

?>