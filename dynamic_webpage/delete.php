<?php
    require 'connect.php';
    $sql = "DELETE FROM reg_form_data WHERE id=".$_GET['id'];
    if ($conn->query($sql) === TRUE) {
        header("Location: display.php");
    } else {
        echo "Error";
    }
?>