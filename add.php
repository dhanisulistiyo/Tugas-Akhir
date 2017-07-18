<?php
   	include("connect.php");
   	
   	$link=Connection();
   	$date = date('Y-m-d H:i:s');
	
   $sql ="INSERT INTO tbl_datasensor (temperature , pH,time) VALUES  ('$_POST[temperature]','$_POST[pH]',now())";
   
	if(!@mysql_query($sql))
{
    echo "&Answer; SQL Error - ".mysql_error();
    return;
}
	mysql_close($link);

   	//header("Location: index.php");
?>

