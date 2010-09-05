<?php

// generate some random data:
if( isset( $_GET['id'] ) )
{
  $user = intval( $_GET['id'] );
  $sqlvalues = 'SELECT * FROM GA_ScreenRes_monthly order by date';
  $sql = 'SELECT * FROM GA_ScreenRes_monthly order by date';
  $sqlmax = 'SELECT max(`1024x768`) FROM GA_ScreenRes_monthly';

}
$db = mysql_connect("localhost", "bugs","bugs") or die("oh no!");

mysql_select_db("adcc_live",$db) or die("Could not select database");

$res = mysql_query($sql,$db) or die("Bad SQL 1".$sql);

while( $row = mysql_fetch_array($res) )
{
  $screen1[] = ( $row[1] );

  $screen2[] = ( $row[2] );
  $screen3[] = ( $row[3] );
  $screen4[] = ( $row[4] );
  $screen5[] = ( $row[5] );
  $screen6[] = ( $row[6] );
  $screen7[] = ( $row[7] );
  
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
$g->title( 'Screen Resolution ', '{font-size: 26px;}' );
$g->set_data( $screen1 );$g->set_data( $screen2 );$g->set_data( $screen3 );$g->set_data( $screen4 );$g->set_data( $screen5 );$g->set_data( $screen6 );$g->set_data( $screen7 );

$g->line( 2, '0x0000CC', '1024x768', 10 );
$g->line( 2, '0x00CC00', '1280x1024', 10 );
$g->line( 2, '0xCC0000', '1280x800', 10 );
$g->line( 2, '0xCC00CC', '1680x1050', 10 );
$g->line( 2, '0xCCCC00', '800x600', 10 );
$g->line( 2, '0x00CCCC', '1440x900', 10 );
$g->line( 2, '0xCCCCCC', '1152x864', 10 );

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