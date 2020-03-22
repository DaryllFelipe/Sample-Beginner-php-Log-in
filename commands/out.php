<?php
session_start();
include "connection.php";
if (isset($_POST["logout"])) {
    $id = $_SESSION["userId"];
    $status = "false";
    $sqlQuery = "UPDATE information SET status ='$status' WHERE ID =" . $id;
    if ($conn->query($sqlQuery) === TRUE) {
        setcookie("userId", $id, time() - 3600 * 24, "/");
        setcookie("userName", $name, time() - 3600 * 24, "/");
        $_SESSION = array();
        session_destroy();
        header("Location: ../index.php");
        $conn->close();
        exit();
    } else {
        header("Location: ../home.php");
        $conn->close();
        exit();
    }
} else {
    header("Location: ../index.php");
    exit();
}
