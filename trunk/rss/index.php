<?php 
if($_SERVER['SERVER_NAME']=="adcc.demo" or $_SERVER['SERVER_ADDR']=="192.168.24.128")
$name="http://adcc.demo/";
if($_SERVER['SERVER_NAME']=="adcclive.funkygoth" )
$name="http://adcclive.funkygoth/httpdocs/";
if($_SERVER['SERVER_NAME']=="adcc.funkygoth" )
$name="http://adcc.funkygoth/";
if($_SERVER['SERVER_ADDR']=="82.110.105.12")
$name="http://www.test.funky-si.co.uk/";
if($_SERVER['SERVER_ADDR']=="80.82.113.251")
$name="http://www.arnoldanddistrictcameraclub.org.uk/";
header("Location:$name"); exit;
//echo $name;
?>
