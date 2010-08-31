<?php

	include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php';
	$sql = "SELECT count( * ) AS number, DATE_FORMAT( date, '%Y %m' ) AS newdate
			FROM image_store
			GROUP BY newdate
			ORDER BY newdate;";
	$i=0;
	$rs = @mysql_query( $sql ) or die( "Could not execute SQL query" );
	while ( $row = mysql_fetch_array( $rs ) ) 
	{
		$num[$i]=$row['number'];
		$date[$i]=$row['newdate'];
		$i++;
	}
	#echo $date[0];

include_once( $_SERVER["DOCUMENT_ROOT"].'/charts/php-ofc-library/open-flash-chart.php' );
$g = new graph();

//
// PIE chart, 60% alpha
//
$bar = new bar_outline( 50, '#aabbff', '#abc' );
#$bar->key( 'Page views', 10 );
//
// pass in two arrays, one of data, the other data labels
//
$data=array();
for($j=0;$j<$i;$j++)
{
$bar->data[] = $num[$j];
}
//
// Colours for each slice, in this case some of the colours
// will be re-used (3 colurs for 5 slices means the last two
// slices will have colours colour[0] and colour[1]):
//
#$g->pie_slice_colours( array('#aabbff','#090397','#f70400') );

#$g->set_tool_tip( '#x_label#<br>Value: #val#%' );
$g->bg_colour = '#efefff';
#$g->set_x_labels( $date );
$g->set_y_max( max($num) );
$g->title( 'Uploads Per Month', '{font-size:18px; color: #090397}' );
$g->data_sets[] = $bar;
echo $g->render();
?>