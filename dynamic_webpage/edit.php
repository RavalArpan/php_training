<?php
require 'connect.php';

$id = $_GET['id'];

$sql = "SELECT * FROM reg_form_data WHERE id=" . $id;
$result = mysqli_fetch_array($conn->query($sql));
$hobbies = $result['hobbies'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $phone = (int)$_POST['phone'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    if ($gender == "Male")
        $gender = true;
    else
        $gender = false;

    $hobbies = null;
    foreach ($_POST['hobbies'] as $val) {
        $hobbies = $hobbies . "," . $val;
    }
    $id = $_GET['id'];

    $sql = "UPDATE reg_form_data SET name='$name', password='$password', phone='$phone', email='$email', gender='$gender', hobbies='$hobbies' WHERE id=" . $id;
    if ($conn->query($sql) === TRUE) {
        header("Location: display.php");
    } else {
        echo "Error";
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title> Registration Form </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>

<body>
    <form method='POST'>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <lable>
            Name:
            <input type="text" name="name" value="<?php echo $result['name']; ?>">
        </lable>

        <lable>
            Password:
            <input type="text" name="password" value="<?php echo $result['password']; ?>">
        </lable>

        <lable>
            Phone No:
            <input type="tel" name="phone" pattern="[0-9]{10}" value="<?php echo $result['phone']; ?>">
        </lable>

        <lable>
            Email:
            <input type="email" name="email" value="<?php echo $result['email']; ?>">
        </lable>
        <lable>
            Gender:
                <input type="radio" name="gender" value="Male" <?php if ((bool)$result['gender']){ echo "checked"; }?> >Male
                <input type="radio" name="gender" value="Female" <?php if (!(bool)$result['gender']){ echo "checked" ; } ?>>Female

        </lable><br><br>

        <lable>
            Hobbies:<br>
            
            <input type="checkbox" name="hobbies[]" value="reading" <?php if (strpos("$hobbies","reading")){ echo "checked" ; }?> >Reading<br>
            <input type="checkbox" name="hobbies[]" value="swimming" <?php if (strpos("$hobbies","swimming")){ echo "checked" ;} ?> >Swimming<br>
            <input type="checkbox" name="hobbies[]" value="drawing" <?php if (strpos("$hobbies","drawing")){ echo "checked" ; }?> >Drawing<br>
        </lable><br>

        <input type="submit" value='Update' name='submit'>
    </form>
</body>

</html