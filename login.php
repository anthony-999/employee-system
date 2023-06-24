<?php
require './database.php';
session_start();

if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])) {
    // SET DEFAULT INVALID
    $_SESSION['status'] = 'invalid';
}
if ($_SESSION['status'] == 'valid') {
    echo '<script>window.location.href = "/employee-system/home.php"</script>';
}

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        echo '<script>alert("Please fill-up all fields")</script>';
    } else {
        // VALIDATING DATA FOR LOG IN
        $queryValidate = "SELECT * FROM tbl_accountEmployees WHERE username = '$username' AND password = '$password'";
        $sqlValidate = mysqli_query($connection, $queryValidate);
        $rowValidate = mysqli_fetch_array($sqlValidate);

        if (mysqli_num_rows($sqlValidate) > 0) {
            $_SESSION['status'] = 'valid';
            $_SESSION['username'] = $rowValidate['username'];

            echo '<script>window.location.href = "/employee-system/home.php"</script>';
        } else {
            $_SESSION['status'] = 'invalid';
            echo '<script>alert("Incorrect username or password")</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Employee Information System Log In</title>
    <link rel="stylesheet" href="./styling/login.css">
    <link href="https://fonts.cdnfonts.com/css/genty-demo" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
                
</head>
<body>
    <div class="logo">Tams</div>
    <div class="wrapper">      
        <div class="content">
            <img src="images/interview.svg" alt="" srcset="">
          
        </div>
        <div data-aos="zoom-in"   data-aos-delay="120"  class="login-wrapper" >
            <h1>LOG IN</h1>
            <div  class="login-form">
                <form action="/employee-system/login.php" method="post">
                    <input type="text" name="username" placeholder="Enter username" class="username">
                    <input type="password" name="password" placeholder="Enter password" class="password">                       
                    <input type="submit" value="LOG IN" name="login" class="submitBtn"></a>
                </form>
            </div>
        </div>
        
    </div>

    <style>



    </style>
   
   <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>
