<?php
require_once "connection.php";
$userid = $_GET["id"];
require_once "functions/global.php";
checklog($checkid);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CREDENTIALS</title>
</head>

<body>
    <?php
    $sqlQuery = "SELECT * FROM information";
    $result = mysqli_query($conn, $sqlQuery);
    $resultShow = mysqli_num_rows($result);
    if ($resultShow > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $Username = $row["username"];
            $Password = $row["password"];
            $ID = $row["ID"];
            $Name = $row["Name"];
    ?>
            <table border='1px' cellpadding='10'>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
                <tr>
                    <td><?php echo "$Username"; ?></td>
                    <td><?php echo "$Password"; ?></td>
                    <td><?php echo "$ID"; ?></td>
                    <td><?php echo "$Name"; ?></td>
                </tr>
            </table>
    <?php
        }
    } else {
        echo "0 results";
    }
    mysqli_close($conn);
    ?>
</body>

</html>