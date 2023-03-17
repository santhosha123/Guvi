<?php
header("Access-Control-Allow-Origin: *");
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $email=$_POST['email'];
    $password=$_POST['password'];
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $dbname="user_details_db";
    if(!$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
    {
        die("failed to connect!");
    }
    $query1="select * from users where email='$email'limit 1";
    $result1=mysqli_query($con,$query1);
        if(mysqli_num_rows($result1)>0)
        {
               echo "email already exists";
               die;
        }
//    else
//    {
    $stmt = $con->prepare("INSERT INTO users (email,password) VALUES (?, ?)");
    $stmt->bind_param("si",$email,$password);
    $result=$stmt->execute();
    // $query="insert  into users (email,password) values ('$email','$password')";
    // $result=mysqli_query($con,$query);
    if($result)
    {
        echo "Success";
    }
    else{
        echo "Failed";
    }
// }
}   
?>