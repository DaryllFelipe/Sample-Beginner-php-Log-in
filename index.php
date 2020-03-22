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
		<link rel="stylesheet" type="text/css" href="css_pages/bootstrap.css" />
		<title>Your Blogpost | Sign-up </title>
	</head>

	<body>
		<!-- header -->
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
		<!-- body & signup form -->
		<div id="mainbody">
			<div id="content">
				<h2>
					Your opinion matters the most
				</h2>
			</div>
			<div>
			</div>
			<div id="signup">
				<form action="commands/signup.php" method="post" accept-charset="utf-8" class="form-group">
					<table>
						<caption>SIGN UP TO READ AND WRITE STORIES</caption>
						<tbody>
							<tr>
								<td class="td">Name:</td>
								<td class="td1"><input type="text" required name="name" placeholder="Enter your name" required /></td>
							</tr>
							<tr>
								<td class="td">Username:</td>
								<td class="td1"><input type="text" required name="username" placeholder="Enter your username" required /></td>
							</tr>
							<tr>
								<td class="td">Password:</td>
								<td class="td1"><input type="password" name="password" placeholder="Enter your password" required /></td>
							</tr>
							<tr>
								<td class="td">Confirm <br> Password:</td>
								<td class="td1"><input type="password" name="confirmpassword" placeholder="Confirm your password" required /></td>
							</tr>
						</tbody>
					</table>
					<br>
					<br>
					<input class="btn btn-primary btn-success"  type="submit" name="signup" value="Sign up" />
					<br>
					<br>
					<?php
					if (isset($_SESSION["signuperror"])) {
						echo $_SESSION["signuperror"];
						exit();
					} else {
						echo "";
						exit();
					}
					?>
				</form>
			</div>
			<div id="login">
				<label>
					Already have an account?
					<br>
					<br>
				</label>
				<div id="loginlink">
					<a href="loginpage.php"><button>Log-in</button></a>
				</div>
			</div>
		</div>

		<script src = "../js/jquery.js"></script>
		<script src = "../js/bootstrap.js"></script>
	</body>

	</html>
<?php
}
?>