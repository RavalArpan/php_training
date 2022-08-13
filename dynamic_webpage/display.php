<!DOCTYPE html>
<html>
    <head>
        <title> Display Data </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    </head>
    <body>
        <h1><center> Display table Data </center></h1>
        
        <table>
            <tr>
                <th> Sr.No. </th>
                <th> Name </th>
                <th> Password </th>
                <th> Phone Number </th>
                <th> Email ID </th>
                <th> Gender </th>
                <th> Hobbies </th>
                <th> Delete </th>
                <th> Update </th>
            </tr>

            <?php
                require 'connect.php';

                $sql = "SELECT * FROM reg_form_data";
                $result = $conn->query($sql);
                $index = 0;
                while($row = mysqli_fetch_array($result)){
                    $index++;
            ?>

            <tr>
                <th> <?php echo $index; ?> </th>
                <th> <?php echo $row['name']; ?> </th>
                <th> <?php echo $row['password']; ?> </th>
                <th> <?php echo $row['phone']; ?> </th>
                <th>  <?php echo $row['email']; ?> </th>
                <th>  <?php echo $row['gender']; ?> </th>
                <th>  <?php echo $row['hobbies']; ?> </th>
                <th> <button><a href="delete.php?id=<?php echo $row['id'] ?>">Delete</a></button> </th>
                <th> <button><a href="edit.php?id=<?php echo $row['id'] ?>">Edit</a></button> </th>
            </tr>

            <?php } ?>
        </table>
    </body>
</html>




