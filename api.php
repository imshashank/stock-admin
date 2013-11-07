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



  $query="SELECT * FROM $tableName WHERE user_name= '$user' ";
  $res=mysql_query($query);
  
  $count=mysql_num_rows($res);
  
  $HTML='';
  
if($count > 0){
	$post="";
   while($row=mysql_fetch_array($res)){

//arranges the elements in rows of 6
	$c=0;
	if ($c%6 ==0 ) $post.= '<div class="row-fluid">';
       $post.= '<div id="parent" class="span2">';
       $post.= '<div id="'.$row['company'].'" class="tile black-tooltip" data-toggle="tooltip" title="Sector:';
       $post.= $row['sector'];
       $post.= 'Industry:';
       $post.= $row['industry'];
       $post.= '"><h2>';
       $post.= $row['company'];
       $post.= '</h2><span class="cmp-name">'.$row['title'].'</span></div>';
       $post.= "</div>";
	$c++;
	if ($c%6 ==0 && $count!=0) 
	{
	$post.='</div><div class="separator"></div>';
	}
//echo $post;
//       $HTML.='</div>';
}
}
       $HTML=$post;	
echo $HTML;




?>
