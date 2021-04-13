<html>
<head>
</head>
<body>
<?php
session_start();
if ($_SESSION['logABC'] != "FREE") {
	echo "Access denied! You will now be redirected to the login page.";
	echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=../Project/loginAppt.php\"> ";
	exit;
}
?>
</body>
</html>