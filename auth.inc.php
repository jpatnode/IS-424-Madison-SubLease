<html>
<head>
</head>
<body>
<?php
session_start();
if ($_SESSION['logABC'] != "FREE") {
	echo "Access denied! You will now be redirected to the login page.";
	echo "<META HTTP-EQUIV=\"refresh\" content=\"3; URL=login.php\"> ";
	exit;
}
?>
</body>
</html>