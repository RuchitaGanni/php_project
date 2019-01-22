<!-- http://localhost/loginform.html -->

<?php
session_start();
// print_r($_SESSION);
if(isset($_SESSION["id"])) 
{
	header("Location:showdata_html.php");
}		
?>

<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> -->
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

<head>
<title>
Login page
</title>

<style type="text/css">
	#formback{
		margin-top: 27px;
		margin-left: 501px;
		width: 25%;
		height:229px;
		/*background-color:lightgrey;*/
		position: relative;
	    position: center;
	}
	#form{
		width:200px;
		margin:auto;
	}
	#reset_button{
		margin-left:20px;
	}
	#label1{
		margin-top: 10px;
	}
</style>

</head>
<body>
	<!-- background-color: lightgrey; -->
<h1 style="text-align: center; ">User Login Page</h1>
<div id="formback" class="modal-content">
<form  method="POST" action="check.php"   name="login" id="form" onsubmit="return validateform()"  >
<label  id="label1"style="font-size:20px;">Username</label><br><input type="text" name="name" class="form-control" id="name1"/><br>
<label style="font-size:20px;">Password</label><br><input type="password" name="password" class="form-control" id="password1"/><br>
<input type="submit" class="btn btn-success"  value="Login"/>
<button type="reset" class="btn btn-success"  id="reset_button" value="Cancel">Cancel</button>
</form>
</div>


<script type="text/javascript"> 
		function validateform(){  
		var name=document.login.name.value;  
		var newpassword=document.login.password.value;  
		  
		if (name==null || name=="")
		{  
			alert("Name can't be blank");  
			return false;  
		}else if(newpassword.length<6)
		{  
			alert("Password empty or invalid or length less than 6 ");  
			return false;  
		}  
		}  
</script>

</body>
</html>




