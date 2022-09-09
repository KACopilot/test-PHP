<?php
//session start 
session_start();
//write username to the page
echo "Welcome " . $_SESSION['username'] . "!";

// if the user is not logged in, they cannot access this page
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: loginpage.php');
}

?>