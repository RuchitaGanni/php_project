
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script> 
 -->

<?php include("establish.php");
session_start();

//header('location:showdata_html.php');
if(isset($_POST['name'],$_POST['password']))

// $id=$_REQUEST['id'];


$name1=$_POST['name'];
$password1=$_POST['password'];


// if(isset($_SESSION['name1']))
// {


    $checking="SELECT  * FROM users WHERE name='".$name1."' AND password='".$password1."' ";
    //print_r($checking);
    $result=mysqli_query($conn,$checking);


    // Mysqli_num_row is counting table rows
    $count=$result->num_rows;
    // If result matched $name and $password, table row must be 1 row
    if($count>0)
    {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['id']=$row['id'];
    //$name1 --- data from/ in database            $row['name'] --data entered into from 
        // if(isset($_SESSION['id']))
        
        if ($name1  == $row['name'] && $password1 == $row['password'])
        {
            // $_SESSION['name1']=$row['name'];
            echo '<script>
                    window.location = "http://localhost/task_1/showdata_html.php"
                </script>';  
        }
    
       

    }    
        else 
        {
            echo '<script>window.location="http://localhost/task_1/loginform.php" 
                alert( "Incorrect Username or Password")</script>';
            
        }

?>