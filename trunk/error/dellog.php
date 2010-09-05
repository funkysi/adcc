<?php
$date=date("d-m-Y_H-i-s");
$to="funkysi1701@googlemail.com";
$filename = '/usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/error/log.csv';
$file = fopen( $filename, "r");
$content = fread($file, filesize($filename));
fclose($file);

rename($filename, '/usr/local/psa/home/vhosts/arnoldanddistrictcameraclub.org.uk/httpdocs/error/log'.$date.'.csv');
$url='http://www.arnoldanddistrictcameraclub.org.uk/error/log'.$date.'.csv';
mail($to,"Web Log ".$date,$url);
?>
