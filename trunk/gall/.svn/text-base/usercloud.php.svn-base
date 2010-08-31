<?php
$terms = array(); // create empty array
$maximum = 0; // $maximum is the highest counter for a search term
include_once $_SERVER["DOCUMENT_ROOT"].'/include/connect.php'; 
$query = mysql_query("SELECT count( image_store.image ) AS count, users.username,users.displayname, users.lastname
FROM `users`
JOIN image_store ON image_store.author_id = users.username
GROUP BY users.username
ORDER BY users.lastname");

while ($row = mysql_fetch_array($query))
{
    $term = ucfirst($row['displayname']."&nbsp;".$row['lastname']);
    $counter = $row['count'];
	$username = $row['username'];
   //strtolower() ao strtoupper()
    // update $maximum if this term is more popular than the previous terms
    if ($counter> $maximum) $maximum = $counter;
   
    $terms[] = array('username' => $username,'term' => $term, 'counter' => $counter);

}

// shuffle terms unless you want to retain the order of highest to lowest
#sort($terms);

echo "
<div id=\"usercloud\">
<div><ul class=\"access\">\n";

foreach ($terms as $k) // start looping through the tags
{
    // determine the popularity of this term as a percentage
    $percent = floor(($k['counter'] / $maximum) * 100);

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
   
    // output this term
    echo "<li><span class=\"$class\"><a href=\"1/".$k['username']."/\">" . $k['term'] . "</a></span></li>\n ";
}

// close the output
echo "</ul></div>
</div>\n";
?>