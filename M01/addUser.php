<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") 
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $birthday = $_POST["birthday"];

    $sql = "INSERT INTO userinfo (firstName, lastName, birthday) VALUES ('$firstName', '$lastName', '$birthday')";

    if (executeQuery($sql)) {
        header("Location: index.php");
        exit(); /
    }

?>
