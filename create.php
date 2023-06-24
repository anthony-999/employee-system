<?php
require './database.php';
// ADD EMPLOYEEE
if (isset($_POST['create']) && isset($_FILES['my_image'])) {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $middlename = $_POST['middlename'];
    $age = $_POST['age'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $position = $_POST['position'];

    include 'database.php';
    // IMAGE 1
    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    // IMAGE 2
    $img_name2 = $_FILES['my_image2']['name'];
    $tmp_name2 = $_FILES['my_image2']['tmp_name'];

    // IMAGE 3
    $img_name3 = $_FILES['my_image3']['name'];
    $tmp_name3 = $_FILES['my_image3']['tmp_name'];

    if ($error === 0) {
        if ($img_size < 325000) {
            $em = 'Sorry your file is too large!';
        } else {
            // IMAGE 1
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            // IMAGE 2
            $img_ex2 = pathinfo($img_name2, PATHINFO_EXTENSION);
            $img_ex_lc2 = strtolower($img_ex2);
            // IMAGE 3
            $img_ex3 = pathinfo($img_name3, PATHINFO_EXTENSION);
            $img_ex_lc3 = strtolower($img_ex3);

            $allowed_exs = ['jpeg', 'jpg', 'png'];

            if (
                in_array($img_ex_lc, $allowed_exs) &&
                in_array($img_ex_lc2, $allowed_exs) &&
                in_array($img_ex_lc3, $allowed_exs)
            ) {
                $new_img_name = uniqid('IMG-', true) . '.' . $img_ex_lc;
                $new_img_name2 = uniqid('IMG-', true) . '.' . $img_ex_lc2;
                $new_img_name3 = uniqid('IMG-', true) . '.' . $img_ex_lc3;
                // IMAGE FOR NBI
                $img_upload_path = 'upload/' . $new_img_name;
                // IMAGE FOR SSS
                $img_upload_path2 = 'upload/' . $new_img_name2;

                // IMAGE FOR PAG-IBIG
                $img_upload_path3 = 'upload/' . $new_img_name3;

                move_uploaded_file($tmp_name, $img_upload_path);
                move_uploaded_file($tmp_name2, $img_upload_path2);
                move_uploaded_file($tmp_name3, $img_upload_path3);

                //INSERT  INTO DATABASE
                // $sql = "INSERT INTO tbl_addemployee(my_NBI) VALUES ('$new_img_name')";
                $queryCreate = "INSERT INTO tbl_addEmployee VALUES ('$id', '$firstname', '$lastName',  '$middlename',  '$age', '$birthdate', '$gender', '$address', '$contact', '$position', '$new_img_name', '$new_img_name2','$new_img_name3')";
                $sqlCreate = mysqli_query($connection, $queryCreate);

                echo '<script>alert("Successfully Created!")</script>';
                echo '<script>window.location.href = "/employee-system/home.php"</script>';
            } else {
                $em = "You cant' upload files of this type!";
            }
        }
    } else {
        $em = 'unknown error occured!';
    }
}

?>
