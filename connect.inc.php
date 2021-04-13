<?php
$myUsername = "wisco";
$myPassword = "subleasebucky21";
$myLocalhost = "localhost";

$conn = mysqli($myLocalHost, $myUsername, $myPassword);
if (!$conn) {
	die("Connection failed: ");
}
?>