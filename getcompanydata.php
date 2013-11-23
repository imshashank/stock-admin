<?php 

  //--------------------------------------------------------------------------
  // Example php script for fetching data from mysql database
  //--------------------------------------------------------------------------
  $host = "localhost"; //Host address (most likely localhost)
  $databaseName = "user"; //Name of Database
  $user = "user"; //Name of database user
  $pass = "leapstock123"; //Password for database user
  $tableName = "selected";
  $con = mysql_connect($host,$user,$pass);
  $selected = mysql_select_db($databaseName,$con) 
  or die("Could not select databasename");
 
  if(isset($_POST['user']) && !empty($_POST['user'])){

    $user=$_POST['user'];

}else{

    $user='';

}


$user='shashank';
  $query="SELECT * FROM $tableName WHERE user_name= '$user' order by company ";
  $res=mysql_query($query);
  $count=mysql_num_rows($res);
  $HTML='';
$companies=array();  
if($count > 0){
	$post="";
   while($row=mysql_fetch_array($res)){
	array_push ($companies, $row['company']);
}
}

//var_dump($companies);
$hostname="localhost";
$username="companies";
$password="stockleap";
$db='companies';

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
or die("Unable to connect to MySQL");
$selected = mysql_select_db($db,$dbhandle) ;

$authors=array();

for($i=0;$i<sizeof($companies);$i++){
$query="SELECT * FROM  `artlcles` WHERE  `company` = '".$companies[$i]."'";
if ($i==0 || $i%3 ==0){
$post.= '<div class="row-fluid">';
}
$res=mysql_query($query);
$c=mysql_num_rows($res);
if($c > 0){
$post.='<div class="span3 company_details" style="border: 1px solid black;padding: 7px;">';
$post.= "<h3>".$companies[$i]."</h3>";
$q2= 'SELECT title, AVG(finn),AVG(valence),AVG(arousal),AVG(dominance) FROM `artlcles` WHERE  `company` = "'.$companies[$i].'" GROUP BY company';
$r=mysql_query($q2);
while($result=mysql_fetch_array($r))
{
$post.='<table class="table table-bordered table-condensed">

				<thead>
					<tr>
						<th width="50" class="center">Metrics</th>
						<th>Score</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td class="center">Finn</td>
						<td>'.$result[1].'</td>
					</tr>
					<tr>
						<td class="center">Valence</td>
						<td>'.$result[2].'</td>
					</tr>
					<tr>
						<td class="center">Arousal</td>
						<td>'.$result[3].'</td>
					</tr>
					<tr>
						<td class="center">Dominance</td>
						<td>'.$result[4].'</td>
					</tr>
				</tbody>
			</table>';
}


$post.= '<table class="dynamicTable table table-striped table-bordered table-primary table-condensed dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">';

$post.= '<thead><tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering eng.: activate to sort column descending" style="width: 119px;">Article</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 176px;">Author</th></tr></thead>';
	while($row=mysql_fetch_array($res)){
	$authors = unserialize($row['author']);
	$post.= '<tr><td><a href="'.$row['link'].'">'.$row['title'].'</a> </td><td>'.$authors[0].'</td></tr>';

	}
$post.= "</table></div>";
if ($i%2 ==0 && $i!=0){
$post.= '</div><div class="row-fluid">';
}
}
}
$post.='</div>';
$HTML=$post;	
echo $HTML;




?>
