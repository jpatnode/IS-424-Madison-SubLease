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
include("connect.inc.php");
include("auth.inc.php");
$link = $_SESSION['link'];
$id = $_SESSION['id'];
$listingID = $_SESSION['id'];
?>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars" style="background-image: url(./statest.jpg); background-size: cover;"></i></a>
    <?php echo "<a href=".$link." class='w3-bar-item w3-button w3-padding-large w3-white'>Return to Listings</a>"; ?>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <?php echo "<a href=".$link." class='w3-bar-item w3-button w3-padding-large w3-white'>Return to Listings</a>"; ?>
  </div>
</div>


<!-- Header -->
 <div class="w3-row-padding w3-padding-64 w3-container" <div class="w3-padding-64 w3-container" style="background-image: url(./statest.jpg); background-size: cover;">
  <div class="w3-content">
    <div class="w3-container w3-white" style="padding: 1em; opacity:.875">
      <h1 align="center" text-color="black"> Upload the Images for Your Post</h1>
	  <table style="text-align: center" align="center">
	  <tr>
	  <td>
	  <h4 class='w3-padding-24' align='center'> Images uploaded successfully! </h4>
	  <p class="w3-text-grey"> You will now be redirected back to the My Listings Page. </p>
	  <?php echo "<META HTTP-EQUIV=\"refresh\" content=\"3; URL=myListings.php\"> "; ?>
	  </td>
    </div>
	</tr></table>
  </div>
  <br> <br> <br>
  

</div>


</body>
</html>