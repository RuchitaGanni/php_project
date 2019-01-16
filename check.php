<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>



<?php include("establish.php");

if(isset($_POST['name'],$_POST['password']))
// $id=$_REQUEST['id'];
$name1=$_POST['name'];
$password1=$_POST['password'];

$checking="SELECT  name,password FROM users WHERE name='".$name1."' AND password='".$password1."' ";
//print_r($checking);
$result=mysqli_query($conn,$checking);


// Mysqli_num_row is counting table rows
$count=$result->num_rows;
// If result matched $name and $password, table row must be 1 row


if($count>0){
    $row = mysqli_fetch_assoc($result);
    
    //$name1 --- data from/ in database            $row['name'] --data entered into from 
    if ($name1  == $row['name'] && $password1 == $row['password']){
 
        // echo "<a href=\"http://localhost/showdata_html.php\" >link</a>" ;
        echo '<script>
           window.location = "http://localhost/showdata_html.php"
      </script>';  
    }
    elseif($name1 != $row['name'] || $password1 != $row['password'])
    {
            echo "Wrong Username or Password";
    }
      else 
      {
        echo 'Wrong Username or Password';
      }
    

    }

?>