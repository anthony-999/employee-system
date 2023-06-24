<?php
require './database.php';

$queryEmployee = 'SELECT * FROM tbl_addEmployee';
$sqlEmployee = mysqli_query($connection, $queryEmployee);
?>
