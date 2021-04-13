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
<header class="w3-container w3-white w3-center" style="padding:64px 16px">
  <h1 class="w3-margin w3-jumbo">Search for Your Perfect Sublease</h1>
</header>

<br>
 <div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-container w3-red">
	<table>
	<tr>
	<td>
	<h2 align="center">Choose Your Filters</h2>
	<form method="post" action="listingreport.php">
	<h4> Choose your price range: </h4>
	<select id="price" name="price"> 
		<option value="0250">$0-$250</option>
		<option value="250500">$250-$500</option>
	    <option value="500750">$500-$750</option>
        <option value="7501000">$750-$1000</option>
		<option value="10001200">$1000-$1200</option>
		<option value="1200more">$1200+</option>
	</select>
	<br>
	<h4> Choose your preferred part of Madison: </h4>
	<select id="location" name="location"> 
		<option value="statelangdon">State-Langdon</option>
		<option value="southcamp">South Campus</option>
	    <option value="mifflin">Mifflin</option>
        <option value="capitol">Capitol Square</option>
		<option value="regent">Regent</option>
		<option value="universityave">University Ave</option>
	</select>
	<br>
	<h4> Choose your preference for parking: </h4>
	<select id="parking" name="parking"> 
		<option value="yes">Yes</option>
		<option value="no">No</option>
	</select>
	<br>
	<h4> Choose your preferred number of bedrooms: </h4>
	<select id="bedrooms" name="bedrooms"> 
		<option value="0">0</option>
		<option value="1">1</option>
	    <option value="2">2</option>
        <option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
	</select>
	<br>
	<h4> Will you be bringing pets? </h4>
	<select id="pets" name="pets"> 
		<option value="yes">Yes</option>
		<option value="no">No</option>
	</select>
	<br>
	<h4> Choose your preferred number of bathrooms: </h4>
	<select id="bathrooms" name="bathrooms"> 
		<option value="0">0</option>
		<option value="1">1</option>
	    <option value="2">2</option>
        <option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
	</select>
	<br> <br>
	<input type="submit" name="searchResult" value="Search">
	</form>
	<br>
	</td>
	<td align="right">
	<img src="marling.jpg" width=400 align="right">
	</td> </tr> </table>
    </div>

  </div>
</div>


<?php
include("connect.inc.php");
include("auth.inc.php");

$id=$_SESSION['id'];

$count = 0;
if ($_POST['searchResult']) {
	$price=trim($_POST['price']);
	$location=trim($_POST['location']);
	$parking=trim($_POST['parking']);
	$bedrooms=trim($_POST['bedrooms']);
	$pets=trim($_POST['pets']);
	$bathrooms=trim($_POST['bathrooms']);
	$query = "SELECT rent, address, parking, bedrooms, pets, bathrooms FROM LISTING WHERE rent='$price' AND address='$location' AND parking='$parking' AND bedrooms='$bedrooms' AND pets='$pets' AND bathrooms='$bathrooms'";
	$result = mysqli_query($conn, $query);

	if (!result) {
		die("Cannot process select query");
	}
	
	$num = mysqli_num_rows($result);
	if ($num>0) {
		echo "<table border=1 width=1000> <tr>";
		echo "<td> Address </td>";
		echo "<td> Lease Type </td>";
		echo "<td> Bedrooms </td>";
		echo "<td> Bathrooms </td>";
		echo "<td> Rent Per Month </td";
		echo "<td> Posted By </td>";
		for ($i=0;$i<$num;$i++) {
			if ($count==0) {
				while ($row1 = mysqli_fetch_assoc($resultcon)) {
					echo "<tr>";
					echo "<td>".$row["address"]."</td>";
					echo "<td>".$row["bedrooms"]."</td>";
					echo "<td>".$row["bathrooms"]."</td>";
					echo "<td>".$row["rent"]."</td>";
					echo "<td>".$row["user_name"]."</td>";
					$count = 1;
				}
			}
			else {
				while ($row1 = mysqli_fetch_assoc($resultcon)) {
					echo "<tr bgcolor=CCD1AB>";
					echo "<td>".$row["address"]."</td>";
					echo "<td>".$row["bedrooms"]."</td>";
					echo "<td>".$row["bathrooms"]."</td>";
					echo "<td>".$row["rent"]."</td>";
					echo "<td>".$row["user_name"]."</td>";
					$count = 0;
				}
			}
		}
	}
	else {
		echo "Unfortunately, no listings match! Please try again with new specifications.";
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
 <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>

</body>
</html>