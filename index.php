<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Phone Book</title>
</head>
<body>
    <header>
        <h1>Contact Application</h1>
    </header>

    <form action="add_data.php" method="post">
        <div class="main">
            <label for="name">Name:</label> <br>
            <input type="text" name="name"  required > <br> <br>
            <label for="contact">Number:</label> <br>
            <input type="text" name="contact"  required > <br> <br>
            <input type="submit" value="Save"> 
        </div>
    </form>
    <br>
    <hr>
    <table>
        <h2>List of contact</h2>
        <tr >
            <th>Name</th>
            <th>Phone No.</th>
            <th>Actions</th>
        </tr>
    <?php
    include 'db.php';
    $sql = "SELECT * FROM names";
    $result = mysqli_query($conn, $sql);
    
    if ($result){
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $name = $row['name'];
            $phone = $row['phone'];
            ?>
            <tr>
            <td><?php echo $name ?></td>
            <td><?php echo $phone ?></td>
            <td>
                <a href="edit.php?id=<?php echo $id ?>">Update</a>
                <a href="delete.php?id=<?php echo $id ?>">Delete</a>
            </td>
            
        </tr>

            <?php

        }

    }


    ?>
        
    </table>
</body>
</html>