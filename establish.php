<?php


// USE THIS FILE ONLY WHEN DATA IS TO BE RETRIEVED AND DISPLAYED ON WEBPAGE//


$server="localhost";
$username="root";
$password="";


// created database name in phpmyadmin//
//change database name accordingly//
$database="ruchita";


//establishing connection //


$conn=mysqli_connect($server,$username,$password,$database);

//checking for connection establishment//
if(!$conn)
{
die("connection failed".connect_error);
}
else
{
	//echo " connection established successfully";
}

?>