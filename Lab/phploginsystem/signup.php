<?php
    session_start();
    include("connection.php");
    include("function.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        
        $user_name = $_POST['User_name'];
        $user_email = $_POST['User_email'];
        $password = $_POST['password'];

        if( !empty($user_name) && !empty($user_email) && !empty($password) )
        {
            //save to database
            $user_id = random_num(20);
            $query = "insert into users (user_id,user_email,user_name,user_password) values ('$user_id','$user_email','$user_name','$password')";

            mysqli_query($con, $query);

            header("Location: login.php");
            die;
        }
        else
        {
            echo "Please enter some valid information !";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
</head>
<body>
    <div style="text-align:center;background-color: gray;padding: 20px; width:400px; margin: auto">
    <h1>SignUp Page</h1>
        <form method="post">
            <input type="text" name="User_name" placeholder="Enter Your Name.."><br><br>
            <input type="text" name="User_email" placeholder="Enter Your Email.."><br><br>
            <input type="password" name="password" placeholder="Enter Your Password.."><br><br>
            <button type="submit" style="padding: 10px;color: white;background-color: green;">SignUp</button><br><br>
            <a href="login.php">Click to Login</a>
        </form>
    </div>
</body>
</html>