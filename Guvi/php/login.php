<?php
header("Access-Control-Allow-Origin: *");
// include("register.php");
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
    if(!empty($email)&&!empty($password))
   {
    //read from database
    $sql = "SELECT * FROM users WHERE email=?"; // SQL with parameters
    $stmt = $con->prepare($sql); 
    $stmt->bind_param("s", $email);
    // get the mysqli result
    // $query="select * from users where email='$email'limit 1";
    // $result=mysqli_query($con,$query);
    if($stmt->execute())
    {
    $res= $stmt->get_result();
    if($res && mysqli_num_rows($res)>0)
        {
            $user_data = $res->fetch_assoc();
            // $user_data=mysqli_fetch_assoc($result);
            if($user_data['password']==$password)
            {
            //    $text="";
            //    $len=rand(4,20);
            //    for($i=0;$i<$len;$i++)
            //     {
            //         $text.=rand(0,9);
            //     }
            //     $sql1="update users set token=? where email=?";
            //     $stmt1=$con->prepare($sql1);
            //     $stmt1->bind_param("is",$text,$email);
            //     $stmt1->execute();
                echo "Logged in";
            }
            else
            {
                echo "Wrong Password";
            }
            die;
        }
   }
    echo"WRONG USER NAME OR PASSWORD";
}
   else
   {
    echo"WRONG USER NAME OR PASSWORD";
   }
}
    // header("Location: http://localhost/Guvi/login.html");
    // header("Location: login.php");
