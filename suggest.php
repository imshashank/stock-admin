<?php
 
// if the 'term' variable is not sent with the request, exit
if ( !isset($_REQUEST['term']) )
	exit;
//$term ="app";
 
$hostname="localhost";
$username="companies";
$password="stockleap";
$db=$username;

// connect to the database server and select the appropriate database for use
$dblink = mysql_connect($hostname, $username, $password) or die( mysql_error() );
mysql_select_db('companies');
 
// query the database table for zip codes that match 'term'
$rs = mysql_query('select title,symbol from new where title like "%'. mysql_real_escape_string($_REQUEST['term']) .'%" order by title asc limit 0,10', $dblink);
 
// loop through each zipcode returned and format the response for jQuery
$data = array();
if ( $rs && mysql_num_rows($rs) )
{
	while( $row = mysql_fetch_array($rs, MYSQL_ASSOC) )
	{
		$data[] = array(
			'label' => $row['title'] ,
			'value' => $row['symbol']
		);
	}
}
 
// jQuery wants JSON data
echo json_encode($data);
flush();
