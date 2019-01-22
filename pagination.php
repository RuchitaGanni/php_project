<?php
include('establish.php');
session_start();
$offset=$_POST['offset'];
$limit=$_POST['limit'];
$paginate="SELECT  id,name,age,dob FROM users limit ". $limit ." offset ".$offset;
$output=mysqli_query($conn,$paginate);

 if($output->num_rows>0){
 	// while($output->fetch_assoc()){
 	$dataArray= array();
 	$i=0;
    while($row = $output->fetch_assoc()) { 

    	
    	//never hide the row id value in pagination.
        $dataArray[$i]['id']   = 	$row["id"];
        $dataArray[$i]['name'] =	$row["name"];
        $dataArray[$i]['age']  = 	$row["age"];

        //changing date format in pagnation//
            $temp=strtotime($row['dob']);
            $newdate =date('d-m-Y',$temp);
        // $dataArray[$i]['dob']  = 	$row["dob"];
        
        $dataArray[$i]['dob']= $newdate;
        
        $i++;
      
    }
    print_r( json_encode( $dataArray ) );

   
}else{
	return 0;
}

?>


