<?php
    session_start();
    include("connection.php");
    include("function.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        
        $user_email = $_POST['User_email'];
        $password = $_POST['password'];

        if( !empty($user_email) && !empty($password) )
        {
            //read from database
            $query = "select * from users where user_email = '$user_email' limit 1";

            $result = mysqli_query($con, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {
                    $user_data = mysqli_fetch_assoc($result);
                    if ($user_data['user_password'] === $password)
                    {
                        $_SESSION['user_id'] = $user_data['id'];
                        header("Location: index.php");
                        die;
                    }
                }
            }

            echo "wrong username or password";
        }
        else
        {
            echo "wrong username or password";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div style="text-align:center;background-color: gray;padding: 20px; width:400px; margin: auto">
    <h1>Login Page</h1>
        <form method="post">
            <input type="text" name="User_email" placeholder="Enter Your Email.."><br><br>
            <input type="password" name="password" placeholder="Enter Your Password.."><br><br>
            <button type="submit" style="padding: 10px;color: white;background-color: green;">Login</button><br><br>
            <a href="signup.php">Click to SignUp</a>
        </form>
    </div>
</body>
</html>