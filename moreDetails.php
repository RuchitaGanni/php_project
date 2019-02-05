<?php

include("establish.php");

$id1=$_POST['ID'];
$get_data = "SELECT * FROM education WHERE ID=".$id1."";

$result = mysqli_query($conn,$get_data);

if(mysqli_num_rows($result)>0)
{
	$edu =array();
	$edu=mysqli_fetch_assoc($result);

	print_r(json_encode($edu));
}
else
{
	return 0;
}
?>



