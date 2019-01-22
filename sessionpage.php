<?php
// print_r($_SESSION);exit;
if(isset($_SESSION["id"]))
{ 
	//header("location:showdata_html.php");
}
else{
 	header("location:loginform.php"); 
	}

?>
