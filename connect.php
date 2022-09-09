<?php

$host = 'localhost';
$user = 'root';
$passwd = '';

$schema = 'copilot_test';

$mysqli = mysqli_connect($host, $user,$passwd, $schema);

if (!$mysqli)
{
   echo 'Connection failed<br>';
   echo 'Error number: ' . mysqli_connect_errno() . '<br>';
   echo 'Error message: ' . mysqli_connect_error() . '<br>';
   die();
}

?>