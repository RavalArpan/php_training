<?php
require 'connect.php';

if (isset($_POST['submit'])){
    $name=$_POST['name'];
    $password=$_POST['password'];
    $phone=(int)$_POST['phone'];
    $email=$_POST['email'];
    $gender = $_POST['gender'];

    if ($gender == "Male")
        $gender = true;
    else
        $gender = false;
    
    $hobbies=null;
    foreach ($_POST['hobbies'] as $val){
        $hobbies = $hobbies . "," . $val;
    }

    $sql = "INSERT INTO reg_form_data(name, password, phone, email,gender,hobbies) VALUES ('$name','$password', '$phone','$email','$gender','$hobbies')";
    if ($conn->query($sql) === TRUE){
        echo "Data stored!";
    }else{echo "Error";}

}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Registration Form </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
    </head>
    <body>
        <form method='Post'>
            <lable>
                Name:
                <input type="text" name="name">
            </lable>

            <lable>
                Password:
                <input type="password" name="password">
            </lable>

            <lable>
                Phone No:
                <input type="tel" name="phone" pattern="[0-9]{10}">
            </lable>

            <lable>
                Email:
                <input type="email" name="email">
            </lable>

            <lable>
                Gender:
                <input type="radio" name="gender" value="Male" >Male
                <input type="radio" name="gender" value="Female" >Female
            </lable><br><br>

            <lable>
                Hobbies:<br>
                <input type="checkbox" name="hobbies[]" value="Reading">Reading<br>
                <input type="checkbox" name="hobbies[]" value="Swimming">Swimming<br>
                <input type="checkbox" name="hobbies[]" value="drawing">Drawing<br>
            </lable><br>

            <input type = "submit" value = 'submit' name='submit'>
        </form>
    </body>
</html