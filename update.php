

<?php

include('establish.php');


if (isset($_POST['id'])){


	$name1=$_POST['name'];
	$age1=$_POST['age'];
	$id=$_POST['id'];

    //passing table name in database//
    $dob=$_POST['dob'];
    
    $query = "UPDATE users SET name = '$name1', age = $age1 , dob ='$dob'  WHERE id=$id";

     // always include  $conn in mysqli_query  along with other queries
    $result = mysqli_query($conn,$query);
    if ($result) {
       // die("<strong>Updated</strong>");
    	$data['status']=true;
    	echo json_encode($data);
    } else {
    	$data['status']=false;
    	echo json_encode($data);
        //die("<strong>Error ".mysqlI_error()."</strong>");
    }
}
?>
