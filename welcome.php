<?php
session_start();
if($_SESSION['email']==true){
    echo "<h1>Welcome New Page $_SESSION[email]</h1>";
}else{
    header("location:login.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Welcome</title>
</head>
<body>
    <a href="logout.php">Logout</a>
</body>
</html>