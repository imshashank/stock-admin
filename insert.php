<?php
//Configure and Connect to the Databse

 //Pull data from home.php front-end page
 $id=$_POST['ID'];
 $name=$_POST['Name'];
 $title=$_POST['Title'];

$hostname="localhost";
$username="user";
$password="leapstock123";
$db="user";

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
or die("Unable to connect to MySQL");

//select a database to work with
$selected = mysql_select_db($db,$dbhandle) 
or die("Could not select databasename");

 //Insert Data into mysql
$query=mysql_query("SELECT * from selected where user_name='$name' AND company ='$id';");
$count=mysql_num_rows($query);

if ($count==0){
	$query="INSERT INTO selected(user_name,company,name) VALUES('".$name."','".$id."','".$title."');";
	echo $query;
	$res=mysql_query($query);

		if($res){
			echo "Data for $name inserted successfully!";
		}
		else 
			echo "An error occurred!"; 
	}
else {
	$query=mysql_query("DELETE from selected where user_name='$name' AND company ='$id';");
	echo $query;
	$res=mysql_query($query);

	if($res){
	echo "Data for $name inserted successfully!";
	}
	else{ 
	echo "An error occurred in 2"; 
	}

}

?>
