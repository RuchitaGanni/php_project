<?php
include("establish.php");

session_start();

if(isset($_POST))
{
	// $id=$_GET['id'];
	// echo $id;exit;
	$key=$_POST['key'];
	//print_r($_POST);exit;
    $val1=$_POST['val'];
    //when search filter is cleared for further search//
    //changing date format as of database//
    if($key=='dob') {
    	$val1 = date('Y-m-d',strtotime($val1));
    }

    if(empty($val1))
    {

    	// limiting search and now //
    	$query = "SELECT * FROM users limit 10 offset 0";
    }
    else
    {
		$query = "SELECT * FROM users WHERE ".$key." LIKE '%".$val1."%' ";
	}
	$result=mysqli_query($conn,$query);
	if($result->num_rows>0){
	 	// while($output->fetch_assoc()){
	 	$dataArray= array();
	 	$i=0;
	    while($row = $result->fetch_assoc()) { 
	    	// print_r($row);

	        $dataArray[$i]['id']   = 	$row["id"];
	        $dataArray[$i]['name'] =	$row["name"];
	        $dataArray[$i]['age']  = 	$row["age"];

	        $temp=strtotime($row['dob']);
                $newdate =date('d-m-Y',$temp);

            $dataArray[$i]['dob'] = $newdate;
                    
	        // $dataArray[$i]['dob'] = 	$row["dob"];
	        
	        $i++;
	      
	    }
	    print_r( json_encode( $dataArray ) ); 
	} 
	else
	{
		// return 0;
			 	//$dataArray2= array();
		print_r(json_encode(array()));
		

	}
}
?>