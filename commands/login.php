<?php
session_start();
include "connection.php";
if (isset($_POST["login"])) {
    if (empty($_POST["username"]) || empty($_POST["password"])) {
        header("Location: ../loginpage.php");
        exit();
    } else {
        $sqlQuery = "SELECT * FROM information WHERE username = '" . $_POST["username"] . "' AND password = '" . $_POST["password"] . "'";
        $sqlResult = mysqli_query($conn, $sqlQuery);
        $result = mysqli_num_rows($sqlResult);
        if ($result == 1) {

            while ($row = mysqli_fetch_assoc($sqlResult)) {
                $id = $row["ID"];
                $name = $row["Name"];
                setcookie("userId", $id, time() + 3600 * 24, "/");
                setcookie("userName", $name, time() + 3600 * 24, "/");
                $_SESSION["userId"] = $_COOKIE["userId"];
                $_SESSION["userName"] = $_COOKIE["userName"];
                $sqlQuery2 = "UPDATE information SET status = 'true' WHERE ID = " . $id;
                if ($conn->query($sqlQuery2) === TRUE) {
                    header("Location: ../home.php");
                    mysqli_close($conn);
                    exit();
                } else {
                    header("Location: ../loginpage.php");
                    mysqli_close($conn);
                    $_SESSION = array();
                    session_destroy();
                    setcookie($userId, $id, time() - 1, "/");
                    setcookie($userName, $name, time() - 1, "/");
                    exit();
                }
            }
            exit();
        } else {
            $_SESSION["loginerror"] = "Username or Password doesn't exist";
            header("Location: ../loginpage.php");
            mysqli_close($conn);
            exit();
        }
    }
} else {
    $_SESSION["loginerror"] = "";
    header("Location: ../loginpage.php");
    exit();
}
