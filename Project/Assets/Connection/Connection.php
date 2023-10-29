<?php 
$servername="localhost";	
$username="root";
$password="";
$db="db_pupil";

$con=mysqli_connect($servername,$username,$password,$db);

if(!$con)
{
 echo "ERROR CONNECTION";	
}

?>