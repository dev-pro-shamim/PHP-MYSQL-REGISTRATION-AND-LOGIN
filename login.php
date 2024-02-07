<?php
session_start();
$connect = mysqli_connect("localhost","root","","new_register");
$msg = "";
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];


    $select = "SELECT * FROM register WHERE email = '$email' AND pass = '$pass' ";
    $ex = mysqli_query($connect,$select);
    $row = mysqli_fetch_array($ex);
    if($row){
        $msg = "Login Success";
        header("location:welcome.php");
        $_SESSION['email'] = $row['email'];


    }else{
        $msg = "Email and Password does not match";

    }

}



?>



<!DOCTYPE html>
<html lang="en">
<head>


    <title>Document</title>


    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <form method = "POST">


        <h1>Login Now..</h1><br>
        <h4><?php echo $msg  ?></h4>




                     <span>Email : </span>
                    <div>
                    <input placeholder = "Enter Email" type="text" name ="email"><br><br>
                    </div>


                    <span>Password : </span>
                    <div>
                    <input placeholder = "Enter Password" type="text" name ="pass"><br><br>
                    </div>
                    <div class="btn">
                        <button id = "submit" name = "login">Login</button>
                    </div>




                    <div class="center">
                    <a  id = "log" href="register.php">Create Account</a>
                    </div>


        </form>


    </div>
   
</body>
</html>
