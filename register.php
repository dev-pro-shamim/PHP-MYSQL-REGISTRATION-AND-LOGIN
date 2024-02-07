
<?php
$connect = mysqli_connect("localhost","root","","new_register");
$msg = $name = $roll = $fname= $mname = $d_birth = $email = $pass=$c_pass = " ";

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $roll = $_POST['roll'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $d_birth = $_POST['d_birth'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $c_pass = $_POST['c_pass'];
   




    // check duplicate Email
    $email_check = "SELECT * FROM register WHERE email = '$email' ";
    $email_query= mysqli_query($connect,$email_check);
    $num_row = mysqli_num_rows($email_query);
    if($num_row>0){
        // $msg = "Email Already Exists, Please Try Another again";
        $msg ="Email Already Exists ,Please try another Email";

    }else{
        //check password and comfirm password
        if($pass == $c_pass){
        //    echo "<script>alert('Success')</script>";
        // preg_match('@[^\w]@', $pass);
        // check special Character....
        $specialChars = preg_match('@[^\w]@', $pass);

         // check special Character || Password Length. ==8 pass<8...
        if(!$specialChars || strlen($pass) == 8 || strlen($pass)<8 ){
            $msg = "***Please one special Charcter and more than 8 sens!***";


        }else{
                // insert Query Exicute...
                $insert = "INSERT INTO register(name, roll,fname,mname,d_birth,email,pass,c_pass)
                 VALUES('$name','$roll',' $fname',' $mname ','$d_birth',' $email','$pass','$c_pass') ";
                $query = mysqli_query($connect,$insert);
                header("location:register.php");
                if($query){
                    $msg = "Register Success";
                }else{
                    $msg = "Register Failed.";

                }


        }
        }
        else{
            // echo  = "password and confirm password does not match";
            $msg =  "Password and confirm password does not match";


        }
    



    }




}



?>

<!DOCTYPE html>
<html lang="en">
<head>
 
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>PHP MYSQL AND REGISTRATION NOW....</h1>


    <div class="container"><br>
        <h4 style = "color:blue; border:1px solid red; padding:5px; text-align:center" ><?php  echo $msg ?></h4>

        <form  method ="POST">
            <div class="left-div">
                <span>Name : </span>
                    <div>
                    <input placeholder = "Enter Name" value ="<?php echo $name ?>" type="text" name ="name"><br><br>
                    </div>


                    <span>Roll :</span>
                    <div>
                    <input placeholder = "Enter Roll" value ="<?php echo $roll ?>"  type="text" name ="roll"><br><br>
                    </div>


                    <span>Father Name :</span>
                    <div>
                    <input placeholder = "Enter Father Name" value ="<?php echo $fname ?>" type="text" name ="fname"><br><br>
                    </div>
               
                   
                    <span>Mother Name :</span>
                    <div>
                    <input placeholder = "Enter Mother Name" value ="<?php echo $mname ?>"  type="text" name ="mname"><br><br>
                    </div>
               
               
            </div>
            <div class="left-div">


            <span>Date of Birth : </span>
                    <div>
                    <input placeholder = "Enter Data Birth" value ="<?php echo $d_birth ?>" type="date" name ="d_birth"><br><br>
                    </div>


                    <span>Your Email :</span>
                    <div>
                    <input placeholder = "Enter Email" value ="<?php echo $email ?>"  type="email" name ="email"><br><br>
                    </div>


                    <span>Password:</span>
                    <div>
                    <input placeholder = "Enter Password" value ="<?php echo $pass ?>" type="text" name ="pass"><br><br>
                    </div>
               
                   
                    <span>Confirm Password :</span>
                    <div>
                    <input placeholder = "Enter Confirm Password" value ="<?php echo $c_pass ?>" type="text" name ="c_pass"><br><br>
                    </div>






            </div>


            <div class="btn">
                <button id = "submit" name = "submit">Submit</button>
            </div>

            <div class="center">
            <a  id = "log" href="login.php">Login</a>
        </div>
        </form>
    
     
    </div>
   
</body>
</html>
