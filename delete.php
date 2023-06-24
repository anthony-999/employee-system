<?php
require './database.php';

if (isset($_POST['delete'])) {
    $deleteId = $_POST['deleteId'];

    $queryDelete = "DELETE FROM  tbl_addemployee WHERE id = $deleteId";
    $sqlDelete = mysqli_query($connection, $queryDelete);

    echo '<script>alert("Successfully Deleted!")</script>';
    echo '<script>window.location.href = "/employee-system/home.php"</script>';
} else {
    echo '<script>window.location.href = "/employee-system/home.php"</script>';
}

?>
