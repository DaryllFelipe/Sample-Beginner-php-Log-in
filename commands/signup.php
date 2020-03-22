<?php
session_start();
require "connection.php";
if (isset($_POST["signup"])) {
    if ($_POST['password'] !== $_POST['confirmpassword']) {
        $_SESSION["signuperror"] = "Password does not match";
        header('Location:../index.php');
        exit();
    } else {

        $username = $_POST["username"];
        $sqlQuery = "SELECT * FROM information WHERE username = '$username'";
        $sqlResult = mysqli_query($conn, $sqlQuery);
        $result = mysqli_num_rows($sqlResult);
        if ($result == 1) {
            $_SESSION["signuperror"] = "Username is not available";
            header("Location: ../index.php");
            $conn->close();
            exit();
        } else {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $name = $_POST['name'];
            $status = "true";
            $sqlQuery = "INSERT INTO information (username,password,name,status)
                        VALUES('$username','$password','$name','$status')";
            if ($conn->query($sqlQuery) === TRUE) {
                header("Location: ../home.php");
                $conn->close();
                exit();
            } else {
                $_SESSION["signuperror"] = "Sign up error";
                header("Location: ../index.php");
                $conn->close();
                exit();
            }
        }
    }
}
