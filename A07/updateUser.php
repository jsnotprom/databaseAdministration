<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInfoID = $_POST["userInfoID"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $birthday = $_POST["birthday"];

    $sql = "UPDATE userinfo SET firstName = ?, lastName = ?, birthday = ? WHERE userInfoID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $firstName, $lastName, $birthday, $userInfoID);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
