<?php
	$s=0;
	
	if(!isset($type))
	{
	    $type = 1;
	}
	if(isset($_GET['date']))
	{
	    $type = $_GET['date'];
	}
	$title="Error".substr($type, 2, 4);
	if(substr($type, 0, -4)=="01") 
	{
		$mon="January";
		$lmon=31;
	}	
	if(substr($type, 0, -4)=="02") 
	{
		$mon="February";
		$lmon=28;
	}	
	if(substr($type, 0, -4)=="03") 
	{
		$mon="March";
		$lmon=31;
	}
	if(substr($type, 0, -4)=="04") 
	{
		$mon="April";
		$lmon=30;
	}	
	if(substr($type, 0, -4)=="05") 
	{
		$mon="May";
		$lmon=31;
	}
	if(substr($type, 0, -4)=="06") 
	{
		$mon="June";
		$lmon=30;
	}
	if(substr($type, 0, -4)=="07") 
	{
		$mon="July";
		$lmon=31;
	}
	if(substr($type, 0, -4)=="08") 
	{
		$mon="August";
		$lmon=31;
	}
	if(substr($type, 0, -4)=="09") 
	{
		$mon="September";
		$lmon=30;
	}
	if(substr($type, 0, -4)=="10") 
	{
		$mon="October";
		$lmon=31;
	}
	if(substr($type, 0, -4)=="11") 
	{
		$mon="November";
		$lmon=30;
	}
	if(substr($type, 0, -4)=="12") 
	{
		$mon="December";
		$lmon=31;
	}
	if($type=="022008") $lmon=29; 
	$title=$mon." ".substr($type, 2, 4);
	for($year=substr($type, 2, 4);$year<=substr($type, 2, 4);$year++)
	{
		for($month=substr($type, 0, -4);$month<=substr($type, 0, -4);$month++)
		{
			for($day=1;$day<=$lmon;$day++)
			{
				$s++;
				if($day<10) $nday="0".$day; 
				else $nday=$day;
				//if($month<10) $nmonth="0".$month; 
				$nmonth=$month;
				$dom = new DomDocument();
				$dom -> load($year."/".$nmonth."/".$year.$nmonth.$nday.".php");
				
				$xp = new DomXPath( $dom);
				$date = $xp -> query("/AnalyticsReport/Report/Title/PrimaryDateRange");
				$i=0;
				foreach($date as $node)
				{
					$data['date'][$i] = $node->textContent;
					$i++;
				}
				$date = $xp -> query("/AnalyticsReport/Report/ItemSummary/Item/SummaryValue");
				$i=0;
				foreach($date as $node)
				{
					$data['value'][$i] = $node->textContent;
					$i++;
				}
				$date = $xp -> query("/AnalyticsReport/Report/ItemSummary/Message");
				$i=0;
				foreach($date as $node)
				{
					$data['desc'][$i] = $node->textContent;
					$i++;
				}
				#echo "<h2>".$data['date'][0]."</h2>";
				
					$visits[$s]=$data['value'][0];
					$datetime[$s]=$data['date'][0];
					$lab[$s]=$s;
					//$data['desc'][$i]." ".$data['value'][$i]." ".$data['date'][0]."<br/>";
					//echo "<br/>";
					//echo $s."<br/>";
				
			}
		}
	}
	include_once( 'php-ofc-library/open-flash-chart.php' );
$g = new graph();

// // Spoon sales, March 2007

$g->set_data( $visits );

$g->line( 2, '0x0000CC', 'Visits '.$title, 10 );
$g->bg_colour = '#efefff';
// // label each point with its value
$g->set_x_labels( $lab );
$g->set_tool_tip( '#key#: #val# <br>#x_label#' );

// // set the Y max
$g->set_y_max( max($visits) );
//label every 20 (0,20,40,60)
$g->y_label_steps( max($visits) );
//$g->x_axis_steps=1;
// // display the data
$g->title( array_sum($visits).' Visits in '.$title, '{font-size: 18px;color: #090397}' );
echo $g->render();
$total = array_sum($visits);
?>	