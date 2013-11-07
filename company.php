<?php
 
require('includes/db.php');

// query the database table for zip codes that match 'term'
//$rs = mysql_query('select zip, city, state from zipcode where zip like "'. mysql_real_escape_string($_REQUEST['term']) .'%" order by zip asc limit 0,10', $dblink);

$rs = mysql_query('select * from new where title like "'. mysql_real_escape_string($_REQUEST['term']) .'%" order by title asc limit 0,10', $dblink);
 
// loop through each zipcode returned and format the response for jQuery
$data = array();
if ( $rs && mysql_num_rows($rs) )
{
	while( $row = mysql_fetch_array($rs, MYSQL_ASSOC) )
	{
		$data[] = array(
			'label' => $row['title'] .', '. $row['city'] .' '. $row['state'] ,
			'value' => $row['symbol']
		);
	}
}
 
// jQuery wants JSON data
echo json_encode($data);
flush();
