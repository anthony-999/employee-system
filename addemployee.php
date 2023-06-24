<?php
require './session.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link rel="stylesheet" href="/employee.css">
    <script src="https://kit.fontawesome.com/dab3c82309.js" crossorigin="anonymous"></script>
 
</head>
<body>
   <div class="header">
   <a href="http://localhost/employee-system/home.php"><i class="fa-solid fa-arrow-left"></i></a>
   </div>

    <form class="create-main" action="/employee-system/create.php" method="post" enctype="multipart/form-data" >
        <h1>Add Employee</h1>
        <input type="number" name="id" placeholder="Employee ID" required>
        <input type="text" name="firstname" id="" placeholder="First Name" required >
        <input type="text" name="lastname" id="" placeholder="Last Name" required>
        <input type="text" name="middlename" id="" placeholder="Middle Name" >
        <input type="number" name="age" id="" placeholder="Age" required>
        <input type="date" name="birthdate" id="" placeholder="Birthdate" required>
        <label for="gender"> </label>
        <select name="gender" id="gender" required>
        <option value="--Gender--">--Gender--</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Others">Others</option>
        </select>
        <input type="text" name="address" id="" placeholder="Address" required >
        <input type="number" name="contact" id="" placeholder="Contact Number" required >      
        <input type="text" name="position" id="" placeholder="Position" required >
        <!-- UPLOAD -->
        <label for="NBI">Upload NBI</label>
        <input type="file" name="my_image" required >
        <label for="SSS">Upload SSS</label>
        <input type="file" name="my_image2" required>
        <label for="Pag-IBIG">Upload Pag-IBIG</label>
        <input type="file" name="my_image3" required>
     
        <input name="create" type="submit" value="Submit" >

       
        
    </form>
    
        <style>
        
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;900&display=swap');
            *{
            font-family: 'Poppins', sans-serif;
            }
            .header{
            margin-left: 20px;
            padding: 5px;
            font-size: 25px;
          
           
            }
            .header a{
                color: black;
            }
            .create-main {
            display: flex;
            flex-direction: column;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
            
            }

            .create-main input[type="number"],
            .create-main input[type="date"],
            .create-main input[type="file"],
            .create-main input[type="text"] {
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            
            }

            .create-main input[type="submit"] {
            background-color: black;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            }
            #gender{
                padding: 12px;
                margin-bottom: 10px;
                border-radius: 5px;
            }
        </style>





</body>
</html>