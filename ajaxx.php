<?php include("establish.php") ;
// if(isset($_POST['id'])){
session_start();
$id1=$_POST['id'];

//  $name1=$_REQUEST['name'];
// $age1=$_REQUEST['age'];
// $dob=$_REQUEST['dob'];
// $old_date = strtotime($dob);
// $new_date = date('d-m-Y H:i:s', $old_date); 


$get_data = "SELECT * FROM users WHERE id=".$id1;

$result = mysqli_query($conn,$get_data);

if(mysqli_num_rows($result)>0)
{
	$details =array();
	$details=mysqli_fetch_assoc($result);

	print_r(json_encode($details));
}
else
{
	return 0;
}
 // }
?>

