<?php
	function getSCID() {
    $svnid = '$Rev: 146 $';
    $scid = substr($svnid, 6);
    return intval(substr($scid, 0, strlen($scid) - 2));
}
	function getSVNDate() {
    $svndate = '$Date: 2010-06-13 17:48:59 +0100 (Sun, 13 Jun 2010) $';
    $scdate = substr($svndate, 6,21);
    return (substr($scdate, 0, strlen($scdate)));
}
?>   
 
