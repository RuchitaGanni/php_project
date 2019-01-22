<?php 

   
session_start();
session_destroy(); 
header("location:loginform.php"); //to redirect back to "loginform.php" after logging out
// exit();
?>
