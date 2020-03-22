<?php
session_start();
if (isset($_COOKIE["userId"])) {
    $_SESSION["userId"] = $_COOKIE["userId"];
    $_SESSION["userName"] = $_COOKIE["userName"];
    header("Location: home.php");
    exit();
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" type="text/css" href="css_pages/index.css" />
        <title>Your Blogpost | Login </title>
    </head>

    <body>
        <div id="header">
            <a href="index.php">
                <div id="sitecontainer">
                    <h1 id="h1text">
                        Your Blogpost
                    </h1>
                </div>
            </a>
            <div id="link">
                <nav class="navbar">
                    <ul class="ul">
                        <li class="li">
                            <a href="contactus.php">
                                Contact us</a>
                        </li>
                        <li class="li">
                            <a href="aboutus.php">About us</a>
                        </li>
                        <li class="li">

                            <a href="index.php">Home</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <form action="commands/login.php" method="POST">
            Username:
            <input type="text" name="username" placeholder="Enter Username" required>
            Password:
            <input type="password" name="password" placeholder="Enter Password" required>
            <input class="button" type="submit" name="login" value="Log-in">
        </form>
        </div>
        </div>
        <?php
        if (isset($_SESSION["loginerror"])) {
            echo $_SESSION["loginerror"];
            exit();
        } else {
            echo "";
            exit();
        }

        ?>
    </body>

    </html>
<?php
}
?>