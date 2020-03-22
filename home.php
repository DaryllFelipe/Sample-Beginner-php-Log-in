<?php
session_start();
require_once "commands/connection.php";
require_once "functions/global.php";
$userId = $_SESSION["userId"];
if (!empty($userId)) {
    checklog($userId);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="home.css" />
        <title>Your Blogpost | Home </title>
    </head>

    <body>
        <div class="myheader">
            <header>
                Your Blogpost
            </header>
        </div>
        <div>
            <main>
                <div>
                    <?php
                    echo 'Hello ' .  $_SESSION["userName"] . "<br>";
                    echo 'Hello ' .  $_SESSION["userId"];
                    ?>
                    <br />
                    <form method="post" action="commands/out.php">
                        <button name="logout">
                            Logout
                        </button>
                    </form>
                    <br />
                    <form method="post" action="commands/addpost.php">
                        <textarea rows="4" cols="189%" name="inputBlog" placeholder="What's on your mind?" required></textarea>
                        <br /><br />
                        <input type="text" size="30px" name="writerName" placeholder="Enter your name" required />
                        <br /><br />
                        <div>
                            <input class="button" type="submit" name="Post" value="Post" />
                        </div>
                    </form>
                </div>
                <hr />
                <div>
                    <table>
                        <tr>
                            <th id='writerSize1'>Writer</th>
                            <th id='blogSize'>Blog</th>
                        </tr>
                    </table>
                </div>
                <?php

                $sqlQuery = "SELECT * FROM blogspot order by rand()";
                $result = mysqli_query($conn, $sqlQuery);
                $showResult = mysqli_num_rows($result);
                if ($showResult > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $blogno = $row["blogSpotID"];
                        $writer = $row["author"];
                        $blog = $row["blog"];
                        $loginName = $row["userName"];
                        if ($_SESSION["userName"] == $loginName) {
                ?>
                            <table>
                                <tr>
                                    <td class='writerSize'><br /><?php echo $writer; ?><br /></td>
                                    <td class='blogSize'><br /><?php echo $blog; ?> <br />
                                        <!-- Edit -->
                                        <a href="commands/edit.php?blogno=<?php echo $blogno; ?>">
                                            <button class=' button'>
                                                Edit
                                            </button>
                                        </a>
                                        <br />
                                        <!-- Delete -->
                                        <a href="commands/delete.php?blogno=<?php echo $blogno; ?>">
                                            <button class='button'>
                                                Delete
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        <?php
                        } else {
                        ?>
                            <table>
                                <tr>
                                    <td class='writerSize'><br /><?php echo $writer; ?></td>
                                    <td class='blogSize'><br /><?php echo $blog; ?> <br /><br />
                                    </td>
                                </tr>
                            </table>
                <?php
                        }
                    }
                } else {
                    echo "No existing blogs!";
                }
                ?>
        </div>
        </main>
    </body>

    </html>
<?php
} else {
    header("Location: index.php");
    exit();
}
?>

