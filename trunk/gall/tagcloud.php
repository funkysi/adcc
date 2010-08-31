<?php
$terms = array(); // create empty array
$maximum = 0; // $maximum is the highest counter for a search term
include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php'; 
$query = mysql_query("SELECT count(tags.tag) as count,tags.tag FROM `imageJtag` join tags on imageJtag.tag = tags.id group by tags.tag order by count desc");

while ($row = mysql_fetch_array($query))
{
    $term = ucfirst($row['tag']);
    $counter = $row['count'];
   //strtolower() ao strtoupper()
    // update $maximum if this term is more popular than the previous terms
    if ($counter> $maximum) $maximum = $counter;
   
    $terms[] = array('term' => $term, 'counter' => $counter);

}

// shuffle terms unless you want to retain the order of highest to lowest
sort($terms);

echo "
<div id=\"tagcloud\">
<div>\n";

foreach ($terms as $k) // start looping through the tags
{
    // determine the popularity of this term as a percentage
    $percent = floor(($k['counter'] / $maximum) * 100);
	$value = floor($k['counter']);
    // determine the class for this term based on the percentage
	
    if ($percent <10)
    {
        $class = 'tag-10';
    } elseif ($percent>= 10 and $percent <20) {
        $class = 'tag-20';
    } elseif ($percent>= 20 and $percent <30) {
        $class = 'tag-30';
    } elseif ($percent>= 30 and $percent <40) {
        $class = 'tag-40';
		    } elseif ($percent>= 40 and $percent <50) {
        $class = 'tag-50';
		    } elseif ($percent>= 50 and $percent <60) {
        $class = 'tag-60';
		    } elseif ($percent>= 60 and $percent <70) {
        $class = 'tag-70';
		    } elseif ($percent>= 70 and $percent <80) {
        $class = 'tag-80';
		    } elseif ($percent>= 80 and $percent <90) {
        $class = 'tag-90';
    } else {
        $class = 'tag-100';
    }
	if ($value ==1) {$class .= ' tag-hide';}
   
    // output this term
    echo "<span class=\"$class\"><a href=\"../gall/viewimagetag.php?tag=" . urlencode($k['term']) . "\">" . $k['term'] . "</a></span>\n ";
}

// close the output
echo "</div>
</div>\n";
?>