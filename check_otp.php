<?php
session_start();
$con = mysqli_connect('localhost:3306', 'root', 'root', 'otplogin');
$otp = $_POST['otp'];
$email=$_SESSION['Email'];
$res=mysqli_query($con,"SELECT * FROM users WHERE email='$email' AND otp=$otp");
$count=mysqli_num_rows($res);
if($count>0){
    mysqli_query($con,"UPDATE users SET otp='' WHERE email='$email'");
    $_SESSION['is_login']=$email;
   echo "yes";
}else{
    echo "not";
}

?>
