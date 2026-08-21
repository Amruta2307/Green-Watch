<?php
$servername="localhost";
$username="root";
$password="";
$database="greenwatch";

$sql_Query="CREATE TABLE issues(id INT AUTO_INCREMENT PRIMARY KEY,title VARCHAR(255),description TEXT,location VARCHAR(255),image_before VARCHAR(255),image_after VARCHAR(255),feedback varchar(50),status VARCHAR(50) DEFAULT 'Pending',date_reported DATETIME DEFAULT CURRENT_TIMESTAMP)";

$Conn=mysqli_connect($servername,$username,$password,$database);

if(!mysqli_query($Conn,$sql_Query))
{
	echo "Table is not created";
}
else
{
	echo "Table created successfully !!";
}
mysqli_close($Conn);
?>