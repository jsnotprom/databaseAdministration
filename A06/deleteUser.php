<?php
include("connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userInfoID = $_POST["userInfoID"];

    $sql = "DELETE FROM userinfo WHERE userInfoID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userInfoID);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
