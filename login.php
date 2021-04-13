<!DOCTYPE html>
<html lang="en">
<title>Madison SubLeases</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
</style>
<body>
<?php
session_start();
?>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="index.html" class="w3-bar-item w3-button w3-padding-large w3-white">Return to the Home Page</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="index.html" class="w3-bar-item w3-button w3-padding-large">Return to the Home Page</a>
  </div>
</div>

<!-- Header -->
<header class="w3-container w3-red w3-center" style="padding:32px 16px">
  <h1 class="w3-margin w3-jumbo">Begin Your Search</h1>
</header>
 <div class="w3-row-padding w3-padding-64 w3-container" <div class="w3-padding-64 w3-container" style="background-image: url(./picnicpoint.jpeg); background-size: cover;">
  <div class="w3-content">
    <div class="w3-container w3-white" style="padding: 1em; opacity:.875">
      <h1 align="center" text-color="black"> Sign In</h1>
	  <table align="center">
	  <tr>
	  <td>
		<form action="login.php" method="post" align="center">
		Username:
		<input name="username" type="text" id="username" size="20">  
		<br /> <br />
		Password:
		<input name="password" type="password" id="password" size="20">
		<br /> <br />
		<button class="w3-button w3-black w3-padding-large w3-large w3-margin-center" name="submit">Login</button>

		</form>
	   </td>
    </div>
	</tr>
	<tr>
	<td>
	<h4 align="center">Don't have an account? Click here to sign up! </h4>
	<form method="post" action="signup.php" align="center">
    <button class="w3-button w3-black w3-padding-large w3-large w3-margin-top">Sign Up</button>
    </form>
	</td></tr></table>
  </div>
  <br> <br> <br>
  


</div>

<?php
include("connect.inc.php");
$user=trim($_POST['username']);
$pass=trim($_POST['password']);

if ($_POST['username'] && $_POST['password']) {
	$query = "SELECT fac_ID, passwd FROM FACULTY WHERE fac_ID='$user' AND passwd='$pass'";
	$result = mysqli_query($conn, $query);

	if (!result)
		die("Cannot process select query");

	$num = mysqli_num_rows($result);
	if ($_POST['submit']) {
		if ($num==1) {
			$_SESSION['id'] = $user;
			$_SESSION['logABC'] = "FREE";
			
			echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=searchPage.php\"> ";
		}
	}
	else {
		echo "Invalid username/password!" ;
	}
	}
mysqli_close($conn);
?>
<footer class="w3-container w3-padding-64 w3-center w3-opacity">  
  <div class="w3-xlarge w3-padding-32">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
 </div>
</footer>
</body>
</html>
