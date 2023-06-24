<?php
session_start();
require './read.php';
if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])) {
    // SET STATUS TO INVALID
    $_SESSION['status'] = 'invalid';

    // UNSET USER DATA
    unset($_SESSION['username']);

    // REDIRECT TO LOG IN PAGE
    echo '<script>window.location.href = "/employee-system/login.php"</script>';
}
?> 