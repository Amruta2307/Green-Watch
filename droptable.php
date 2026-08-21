<?php
$servername="localhost";
$username="root";
$password="";
$database="greenwatch";
$sql_Query="drop Table issues";

$Conn=mysqli_connect($servername,$username,$password,$database);

if(!mysqli_query($Conn,$sql_Query))
{
	echo "Table droped unsuccessful";
}
else
{
	echo "Table droped successfully !!";
}
mysqli_close($Conn);
?>