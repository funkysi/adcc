<?php

				$dom = new DomDocument();
				$dom -> load("total_brws.php");
				
				$xp = new DomXPath( $dom);
								$date = $xp -> query("/AnalyticsReport/Report/Scorecard/Group/Item/Line/Value");
				$i=0;
				foreach($date as $node)
				{
					$data['desc'][$i] = $node->textContent;
					$tot = $data['desc'][$i];
					$i++;
				}
				$date = $xp -> query("/AnalyticsReport/Report/Table/Row/Cell/Content/Value");
				$i=0;
				foreach($date as $node)
				{
					$data['value'][$i] = $node->textContent;
					if($i==0 or $i==5 or $i==10 or $i==15 or $i==20 or $i==25 or $i==30 or $i==35 or $i==40 or $i==45) $grandtotal[$i] = $data['value'][$i]/$tot;
					$i++;
				}
				$date = $xp -> query("/AnalyticsReport/Report/Table/Row/Key");
				$i=0;
				foreach($date as $node)
				{
					$data['desc'][$i] = $node->textContent;
					$user[$i] = $data['desc'][$i];
					$i++;
				}

				#echo "<h2>".$data['date'][0]."</h2>";
				
					//echo $data['value'][0];
					//$datetime[$s]=$data['date'][0];
					//$lab[$s]=$s;
					//$data['desc'][$i]." ".$data['value'][$i]." ".$data['date'][0]."<br/>";
					//echo "<br/>";
					//echo $s."<br/>";
				

	include_once( 'php-ofc-library/open-flash-chart.php' );
$g = new graph();
$g->bg_colour = '#efefff';
//
// PIE chart, 60% alpha
//
$g->pie(90,'#000','{display:none;}');
//
// pass in two arrays, one of data, the other data labels
//
$g->pie_values( $grandtotal, $user );
//
// Colours for each slice, in this case some of the colours
// will be re-used (3 colurs for 5 slices means the last two
// slices will have colours colour[0] and colour[1]):
//
$g->pie_slice_colours( array('#aabbff','#090397','#f70400') );

$g->set_tool_tip( '#x_label#<br>Value: #val#%' );

$g->title( 'Browser '.array_sum($grandtotal), '{font-size:18px; color: #090397}' );
echo $g->render();
?>	