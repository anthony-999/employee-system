<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'db_employee';

// DATABASE FOR ADD EMPLOYEEs
$connection = mysqli_connect($host, $user, $password, $database);
$queryUser = 'SELECT * FROM tbl_addEmployee';
$sqlUser = mysqli_query($connection, $queryUser);

if (mysqli_connect_error()) {
    echo 'Failed to Connect to Database';
    echo 'Message: ' . mysqli_connect_error() . '<br>';
}

// DATABASE FOR ADMIN account
$connection = mysqli_connect($host, $user, $password, $database);
$queryAccount = 'SELECT * FROM tbl_accountEmployees';
$sqlAccount = mysqli_query($connection, $queryAccount);

if (mysqli_connect_error()) {
    echo 'Failed to Connect';
    echo 'Message: ' . mysqli_connect_error() . '<br>';
}
?>
