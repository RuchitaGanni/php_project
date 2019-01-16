<?php

include('establish.php');

 $row_count="SELECT count(*) as count FROM users" ;
 $result =  mysqli_query($conn,$row_count);

 if($result->num_rows>0){
 	$data=$result->fetch_assoc();
 	echo $data['count'];
 }else{
 	echo 0;
 }


?>
