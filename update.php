<?php
require './database.php';
require './session.php';
require './create.php';

if (isset($_POST['edit'])) {
    $edit_Id = $_POST['edit_Id'];
    $edit_firstname = $_POST['edit_firstname'];
    $edit_lastname = $_POST['edit_lastname'];
    $edit_middlename = $_POST['edit_middlename'];
    $edit_age = $_POST['edit_age'];
    $edit_birthdate = $_POST['edit_birthdate'];
    $edit_gender = $_POST['edit_gender'];
    $edit_address = $_POST['edit_address'];
    $edit_contact = $_POST['edit_contact'];
    $edit_position = $_POST['edit_position'];
}

if (isset($_POST['update'])) {
    $update_Id = $_POST['update_id'];
    $update_firstname = $_POST['update_firstname'];
    $update_lastname = $_POST['update_lastname'];
    $update_middlename = $_POST['update_middlename'];
    $update_age = $_POST['update_age'];
    $update_birthdate = $_POST['update_birthdate'];
    $update_gender = $_POST['update_gender'];
    $update_address = $_POST['update_address'];
    $update_contact = $_POST['update_contact'];
    $update_position = $_POST['update_position'];

    $queryUpdate = "UPDATE tbl_addEmployee SET id = '$update_Id', firstName = '$update_firstname', lastName = '$update_lastname', middleName = '$update_middlename',  age = '$update_age', birthdate = '$update_birthdate', gender = '$update_gender', address = '$update_address', contact = '$update_contact', position = ' $update_position' WHERE id = $update_Id";
    $sqlUpdate = mysqli_query($connection, $queryUpdate);

    echo '<script>alert("Successfully Updated!")</script>';
    echo '<script>window.location.href = "/employee-system/home.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee Information </title>
    <link rel="stylesheet" href="./styling/update.css">
    <script src="https://kit.fontawesome.com/dab3c82309.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header">
    <a href="http://localhost/employee-system/home.php"><i class="fa-solid fa-arrow-left"></i></a>
    </div>
    <form class="update-main" action="/employee-system/update.php" method="post" enctype="multipart/form-data">
        <h1>Update Employee Information</h1>
        
        <input type="number" id = "update_id" name="update_id" placeholder="Employee ID" value="<?php echo $edit_Id; ?>" disabled >
        <input type="text" name="update_firstname"  placeholder="First Name" value="<?php echo $edit_firstname; ?>"  >
        <input type="text" name="update_lastname"  placeholder="Last Name"  value="<?php echo $edit_lastname; ?>" >
        <input type="text" name="update_middlename"  placeholder="Middle Name" value="<?php echo $edit_middlename; ?>" >
        <input type="number" name="update_age"  placeholder="Age"   value="<?php echo $edit_age; ?>" >
        <input type="date" name="update_birthdate"  placeholder="Birthdate" value="<?php echo $edit_birthdate; ?>" >
        <input type="text" name="update_gender"  placeholder="Gender"   value="<?php echo $edit_gender; ?>" >
        <input type="text" name="update_address"  placeholder="Address" value="<?php echo $edit_address; ?>" >
        <input type="number" name="update_contact"  placeholder="Contact Number"  value="<?php echo $edit_contact; ?>"  >
        <input type="text" name="update_position"  placeholder="Position"  value="<?php echo $edit_position; ?>">

        <!-- UPLOAD -->
    
        <label for="NBI">Upload NBI</label>
        <input type="file" name="update_NBI" value="<?php echo $edit_NBI; ?>" >

        <label for="SSS">Upload SSS</label>
        <input type="file" name="update_my_image2" value="<?php echo $edit_SSS; ?>" >
        <label for="Pag-IBIG">Upload Pag-IBIG</label>
        <input type="file" name="update_my_image3" value="<?php echo $$edit_my_PagIBIG; ?>"  >


         <!-- UPDATE BUTTON -->

        <input name="update" type="submit" value="UPDATE" >       
        <input name="updateId" type="hidden" value="<?php echo $edit_Id; ?>" >
        
    </form>
    <style>
         .update-main input[type="file"]{
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
         }
         #update_id{
            background-color: white;
         }
    </style>

</body>
</html>