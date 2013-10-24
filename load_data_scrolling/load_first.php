<?php
$sql=mysql_query("SELECT * FROM companies ORDER BY symbol ASC LIMIT 20");
while($row=mysql_fetch_array($sql))
		{
		$msgID= $row['symbol'];
//		$msg= $row['msg'];

?>
<div id="<?php echo $msgID; ?>"  align="left" class="message_box" >
<span class="number"><?php echo $msgID; ?></span><?php echo $msg; ?> 
</div>

<?php
}
?>
