    <?php
    require './session.php';
    require './read.php';
    require './database.php';

    // SEARCH FUNCTION
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    if (empty($search)) {
        $searchSQL = 'SELECT * FROM tbl_addEmployee';
    } else {
        $searchSQL = "SELECT * FROM tbl_addEmployee WHERE id LIKE '%$search%' || firstName LIKE '%$search%' || lastName LIKE '%$search%'";
    }
    $sqlEmployee = mysqli_query($connection, $searchSQL);
    ?>

    

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link href="https://fonts.cdnfonts.com/css/genty-demo" rel="stylesheet">
        <link rel="stylesheet" href="./styling/home.css">
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/dab3c82309.js" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    </head>
    <body>
        <div class="header">
            <div class="logo">Tams</div>
            <div class="navbar">

            <ul><a href="/employee-system/home.php" id="home">Home</a></ul>
            <ul><a href="./addemployee.php/">Add Employee</a></ul>
            <ul><a href="/employee-system/logout.php" id="logout">Log-Out</a></ul>
            </div>
        </div>
        <div class="content-wrapper">
            <div class="head-content">
                <p>List of Employee</p>
                <!-- SEARCH BUTTON -->
                <div class="search">
                    <form action="result.php" method="get">
                    <input type="text" name="search" placeholder="Employee ID" value="<?php echo $search; ?>">
                    <!-- <i class="fa-solid fa-magnifying-glass"></i> -->
                    <button type="submit">Search</button>
                    </form>
                </div>
            </div>    
                <div  class="employee">
                    <table>
                
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Action</th>
                            
                        </tr>
                        <?php while (
                            $results = mysqli_fetch_array($sqlEmployee)
                        ) { ?> 
                        
                            <tr data-aos="zoom-in">
                            <td><?php echo $results['id']; ?></td>
                            <td><?php echo $results['firstName']; ?></td>
                            <td><?php echo $results['lastName']; ?></td>                          
                            
                            <td id="action">
                                <form action="/employee-system/update.php" method="post">
                                    <!-- EDIT BUTTON -->
                                <input type="submit" name="edit" value="EDIT">    
                                <input type="hidden" name="edit_Id" value="<?php echo $results[
                                    'id'
                                ]; ?>">  
                                <input type="hidden" name="edit_firstname" value="<?php echo $results[
                                    'firstName'
                                ]; ?>">  
                                <input type="hidden" name="edit_lastname" value="<?php echo $results[
                                    'lastName'
                                ]; ?>">  
                                <input type="hidden" name="edit_middlename" value="<?php echo $results[
                                    'middleName'
                                ]; ?>"> 
                                <input type="hidden" name="edit_age" value="<?php echo $results[
                                    'age'
                                ]; ?>">  
                                <input type="hidden" name="edit_birthdate" value="<?php echo $results[
                                    'birthdate'
                                ]; ?>">  
                                <input type="hidden" name="edit_gender" value="<?php echo $results[
                                    'gender'
                                ]; ?>">  
                                <input type="hidden" name="edit_address" value="<?php echo $results[
                                    'address'
                                ]; ?>">  
                                <input type="hidden" name="edit_contact" value="<?php echo $results[
                                    'contact'
                                ]; ?>">   
                                <input type="hidden" name="edit_position" value="<?php echo $results[
                                    'position'
                                ]; ?>">
                                <input type="hidden" name="edit_NBI" value="<?php echo $results[
                                    'NBI'
                                ]; ?>">   
                                <input type="hidden" name="edit_SSS" value="<?php echo $results[
                                    'SSS'
                                ]; ?>">   
                                <input type="hidden" name="edit_my_PagIBIG" value="<?php echo $results[
                                    'PAG_IBIG'
                                ]; ?>">                                                              
                                </form> 

                                
                                <form action="/employee-system/delete.php" method="post" >
                                <input type="submit" name="delete" value="DELETE" >      
                                <input type="hidden" name="deleteId" value="<?php echo $results[
                                    'id'
                                ]; ?>">                              
                                </form> 
                                <button onclick="toggleDetailsContainer('<?php echo $results['id'];?>')">VIEW</button>
                            <div class="details-container" id="details-<?php echo $results['id']; ?>">
                                <p><strong>Employee ID:</strong> <?php echo $results['id']; ?></p>
                                <p><strong>First Name:</strong> <?php echo $results['firstName']; ?></p>
                                <p><strong>Last Name:</strong> <?php echo $results['lastName']; ?></p>
                                <p><strong>Age:</strong> <?php echo $results['age']; ?></p>
                                <p><strong>Gender:</strong> <?php echo $results['gender']; ?></p>
                                <p><strong>Contact:</strong> <?php echo $results['contact']; ?></p>
                                <p><strong>Position:</strong> <?php echo $results['position']; ?></p>
                                <img src="upload/<?php echo $results['NBI']; ?>" alt="NBI"><br>
                                <img src="upload/<?php echo $results['SSS']; ?>" alt="SSS"><br>
                                <img src="upload/<?php echo $results['PAG_IBIG']; ?>" alt="Pag-IBIG"><br>

                                <button onclick="toggleDetailsContainer('<?php echo $results['id']; ?>')">Close</button>
                            </div> 
                            
                            </td>
                            
                        
                            </tr>
                        <?php } ?>
                    </table>
                            
                </div>
        
        
        </div>
        
        <style>
                    #action button{
    background-color: black;;
    border: none;
    color: white;
    padding: 5px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    border-radius: 5px;
    margin: 4px 2px;
    cursor: pointer;
}
        .search button{
        background-color: black;;
        border: none;
        color: white;
        padding: 4px;
        border-radius: 5px;
        text-transform: uppercase;
        }

        .details-container img{
           
           width: 80px;
       }
       .details-container img:hover{
          
           scale: 10;
      }
               .search button{
       background-color: black;;
       border: none;
       color: white;
       padding: 4px;
       border-radius: 5px;
       text-transform: uppercase;
       }
     
       .details-container {
           display: none;
           position: fixed;
           top: 50%;
           left: 50%;
           transform: translate(-50%, -50%);
           width: 900px;
           height: 600px;
           padding: 20px;
           background-color: gray;
           border-radius: 25px;
           z-index: 999;
           color: white;
       }

       .details-container p {
           margin-bottom: 10px;
       }

       .details-container button {
           background-color: black;
           color: white;
           border: none;
           padding: 10px;
           cursor: pointer;
           border-radius: 5px;
           font-size: 16px;
       }
       .details-container img {
       max-width: 25%;
       margin-bottom: 10px;
       }
        </style>

        <script>
            // JavaScript code to detect changes in the search input field
    document.addEventListener('DOMContentLoaded', function() {
        var searchInput = document.querySelector('input[name="search"]');
        
        searchInput.addEventListener('input', function() {
            if (searchInput.value.trim() === '') {
                searchInput.closest('form').submit();
            }
        });
    });

     // Function to toggle the visibility of the details container
     function toggleDetailsContainer(id) {
            var detailsContainer = document.getElementById('details-' + id);
            detailsContainer.style.display = (detailsContainer.style.display === 'none') ? 'block' : 'none';
        }
        AOS.init();
        </script>
    </body>
    </html>