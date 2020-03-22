<?php
session_start();
require_once "connection.php";
$id = $_SESSION["userId"];
if (!empty($id)) {
    $sqlQuery = "SELECT * FROM information WHERE ID =" . $id;
    $sqlResult = mysqli_query($conn, $sqlQuery);
    if (mysqli_num_rows($sqlResult) == 1) {
        while ($row = mysqli_fetch_assoc($sqlResult)) {
            $status = $row["status"];
            $userName = $row["Name"];
            if ($status == "true") {
                $author = $_POST["writerName"];
                $blogPost = $_POST["inputBlog"];
                if (isset($_POST["Post"])) {
                    if (empty($blogPost)) {
                        header("Location: ../home.php");
                        $conn->close();
                        exit();
                    } else {
                        $sqlQuery = "INSERT INTO blogspot (author, blog,userName)
                                                VALUES ('$author', '$blogPost','$userName')";
                        if ($conn->query($sqlQuery) === TRUE) {
                            header("Location: ../home.php");
                            $conn->close();
                            exit();
                        } else {
                            header("Location: ../home.php");
                            $conn->close();
                            exit();
                        }
                    }
                }
                exit();
            } else {
                header("Location: ../index.php");
                $conn->close();
                exit();
            }
        }
    }
    exit();
} else {
    header("Location: ../index.php");
}
