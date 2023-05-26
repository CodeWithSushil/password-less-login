<?php
session_start();
if(isset($_SESSION['is_login'])){
    echo "<h1>Welcome user</h1>";
} else {
    header('location:index.html');
    die();
}
?>
<a href="logout.php">Logout ?</a>