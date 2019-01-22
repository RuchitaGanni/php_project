<?php
include("establish.php");
session_start();

if(isset($_POST['id']))
{
	$id=$_POST['id'];

$delete="DELETE FROM users WHERE id=".$id;
$result=mysqli_query($conn,$delete);
if($result == 1)
{
	echo true;
}
else
{
  echo false;
}
}
?>


