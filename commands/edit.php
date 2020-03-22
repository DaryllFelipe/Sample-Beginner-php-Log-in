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
            if ($status == "true") {
?>

                <!DOCTYPE html>
                <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    <title>Edit Blog</title>
                </head>

                <body>
                    <?php
                    $sqlQuery = "SELECT * FROM blogspot WHERE blogSpotID = " . $_GET["blogno"];
                    $sqlResult = mysqli_query($conn, $sqlQuery);
                    $result = mysqli_num_rows($sqlResult);


                    if ($result == 1) {
                        while ($row = mysqli_fetch_assoc($sqlResult)) {
                            $Blogno = $row["blogSpotID"];
                            $Blog = $row["blog"];
                    ?>
                            <table>
                                <tr>
                                    <th>Edit Blog
                                    <th>
                                </tr>
                                <tr>
                                    <td>
                                        <form action='' method='post'>
                                            <textarea rows='10' cols='187%' name='editedtext'> <?php echo $Blog; ?> </textarea>
                                            <a href='edit.php?blogno=$Blogno'><input type='Submit' name='editText' value='Edit' /></a>
                                        </form>
                                    <td>
                                </tr>
                            </table>
                    <?php
                        }
                    }

                    if (isset($_POST["editText"])) {
                        $sqlQuery = "UPDATE blogspot SET blog = '$_POST[editedtext]'  WHERE blogSpotID = " . $_GET["blogno"];
                        if ($conn->query($sqlQuery) === TRUE) {
                            header("Location: ../home.php");
                            mysqli_close($conn);
                            exit();
                        } else {
                            header("Location: ../home.php");
                            mysqli_close($conn);
                            exit();
                        }
                    }

                    ?>
                </body>

                </html>
<?php
                exit();
            } else {
                header("Location: ../index.php");
                mysqli_close($conn);
                exit();
            }
        }
    }
    exit();
} else {
    header("Location: ../index.php");
    exit();
}
