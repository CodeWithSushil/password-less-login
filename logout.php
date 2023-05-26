<?php
session_start();
unset($_SESSION['is_login']);
unset($_SESSION['Email']);
header('location:index.html');
die();
?>