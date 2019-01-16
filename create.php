<?php
include 'establish.php';
//$dob=' ';
  // if(isset($_POST)) 
  // { 
$name1=$_POST['name'];
$age1=$_POST['age'];
$dob=$_POST['dob'];
$password=$_POST['password'];
// print_r("hai");
//generate date as an array//
 //echo $dob;
// $old_date_timestamp = strtotime($dob);
// $new_date = date('Y-m-d H:i:s', $old_date_timestamp); 
// print_r($new_date);exit;  

// $new_dob=explode("/", $dob);


// $date=$new_dob[2];
// $month=$new_dob[1];
// $year=$new_dob[0];

// $new_DOB= $date.'-'.$month.'-'.$year;
// print_r($new_DOB);exit;

// $new_DOB=date("d-m-Y",strtotime($dob));
// print_r($new_DOB);

//$new_DOB= $new_dob[2].'-'.$new_dob[1].'-'.$new_dob[0];


//print_r($new_DOB);exit;
$sql="INSERT INTO users (name, age, dob,password) VALUES ('$name1',$age1,'$dob','$password') ";
$result =  mysqli_query($conn,$sql);

if(empty($result))
	echo 'Something went wrong!Please try again!';
else
	echo 'Successfully created!';

// }
?>