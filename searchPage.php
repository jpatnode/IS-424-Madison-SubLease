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
$id=$_SESSION['id'];
?>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="decisionPage.php" class="w3-bar-item w3-button w3-padding-large w3-white">Return to the Action Page</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="decisionPage.php" class="w3-bar-item w3-button w3-padding-large">Return to the Action Page</a>
  </div>
</div>

<!-- Header -->
<header class="w3-container w3-red w3-center" style="padding:32px 24px">
  <h1 class="w3-margin w3-jumbo">Begin Your Search</h1>
</header>
  
<div class="w3-row-padding w3-light-grey w3-padding-24 w3-container">
  <div class="w3-content">
      <h4 class="w3-padding-24">Here, you will be able to find the listing (or even listings!) that fulfill all of your needs and desires. Below, you will find
  a series of options that will help us filter your search and find these listings.</h4>
  </div>
</div>

<br>
 <div class="w3-row-padding w3-padding-64 w3-container" <div class="w3-padding-64 w3-container" style="background-image: url(./madison.jpg); background-size: cover;">
  <div class="w3-content">
    <div class="w3-container w3-white" style="padding: 1em; opacity:.875">
	<table style="text-align: center" align="center">
	<tr>
	<td>
	<h2 align="center">Choose Your Filters</h2>
	<form method="post" action="searchPage.php">
	<h4> Choose your price range: </h4>
	Minimum:
	<select id="minprice" name="minprice" align="center" style="width:100px; bgcolor:red;"> 
		<option value=0>$0</option>
		<option value=500>$500</option>
	    <option value=750>$750</option>
        <option value=1000>$1000</option>
		<option value=1500>$1500</option>
		<option value=2000>$2000</option>
	</select>
	Maximum:
	<select id="maxprice" name="maxprice" style="width:100px; bgcolor:red;"> 
		<option value=1200>$500</option>
		<option value=1500>$1000</option>
	    <option value=1800>$1500</option>
        <option value=2250>$2000</option>
		<option value=2500>$2500</option>
		<option value=3000>$3000</option>
		<option value=3500>$3500</option>
		<option value=4000>$4000</option>
	</select>
	<br>
	<h4> Choose your preferred part of Madison: </h4>
	<select id="location" name="location"> 
		<option value="State-Langdon">State-Langdon</option>
		<option value="South Campus">South Campus</option>
	    <option value="Mifflin">Mifflin</option>
        <option value="Capitol Square">Capitol Square</option>
		<option value="Regent">Regent</option>
		<option value="University Ave">University Ave</option>
	</select>
	<br>
	<h4> Choose your preferred number of bedrooms: </h4>
	<select id="bedrooms" name="bedrooms" style="width:100px; bgcolor:red;"> 
		<option value=0>0</option>
		<option value=1>1</option>
	    <option value=2>2</option>
        <option value=3>3</option>
		<option value=4>4</option>
		<option value=5>5</option>
	</select>
	<br>
	<h4> Choose your preferred number of bathrooms: </h4>
	<select id="bathrooms" name="bathrooms" style="width:100px; bgcolor:red;"> 
		<option value=0>0</option>
		<option value=1>1</option>
	    <option value=2>2</option>
        <option value=3>3</option>
		<option value=4>4</option>
		<option value=5>5</option>
	</select>
	<br>
	<h4> Choose your preference for parking: </h4>
	<select id="parking" name="parking" style="width:100px; bgcolor:red; "> 
		<option value=1>Yes</option>
		<option value=0>No</option>
	</select>
	<br>
	<h4> Will you be bringing pets? </h4>
	<select id="pets" name="pets" style="width:100px; bgcolor:red;"> 
		<option value=1>Yes</option>
		<option value=0>No</option>
	</select>
	<br> <br>
	<input type="submit" class = "w3-button w3-black w3-padding-large w3-large w3-margin-top" name="searchResult" value="Search">
	</form>
	<br>
	</td> </tr> </table>
    </div>

  </div>
</div>

<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
	<h3> Your Search Results </h3>
<?php

$count = 0;
if (isset($_POST['searchResult'])) {
	$minimum=trim($_POST['minprice']);
	$maximum=trim($_POST['maxprice']);
	$location=trim($_POST['location']);
	$parking=trim($_POST['parking']);
	$bedrooms=trim($_POST['bedrooms']);
	$pets=trim($_POST['pets']);
	$bathrooms=trim($_POST['bathrooms']);
	$query = "SELECT listing_id,listing_name, street_address, price, description, parking, bedrooms, pets, bathrooms FROM LISTING WHERE price BETWEEN '$minimum' AND '$maximum'
	AND description='$location' AND parking='$parking' AND bedrooms='$bedrooms' AND pets='$pets' AND bathrooms='$bathrooms'";
	$result = mysqli_query($conn, $query);

	if (!$result) {
		die("Cannot process select query");
	}
	
	$num = mysqli_num_rows($result);
	if ($num>0) {
		echo "<table width=950> <tr bgcolor='#ff0000'>";
		echo "<td> Listing Title </td>";
		echo "<td> Address </td>";
		echo "<td> General Location </td>";
		echo "<td> Bedrooms </td>";
		echo "<td> Bathrooms </td>";
		echo "<td> Rent Per Month </td>";
		echo "<td> Parking </td>";
		echo "<td> Pets </td></tr>";
		for ($i=0;$i<$num;$i++) {
			while ($row = mysqli_fetch_assoc($result)) {
				if ($count==0) {
					echo "<tr>";
					echo "<td> <form method = 'post' action = 'searchPage.php'>
					<input type = 'hidden' value = ".$row["listing_id"]." name = 'listingID' id = 'listingID'>
					<input type = 'submit' name = 'listingResult' class='w3-bar-item w3-button w3-padding-large' value = ".$row["listing_name"]."></form></td>";
					echo "<td>".$row["street_address"]."</td>";
					echo "<td>".$row["description"]."</td>";
					echo "<td>".$row["bedrooms"]."</td>";
					echo "<td>".$row["bathrooms"]."</td>";
					echo "<td>".$row["price"]."</td>";
					$parkingYN = $row["parking"];
					if ($parkingYN == 1) {
						echo "<td> Yes </td>";
					}
					else {
						echo "<td> No </td>";
					}
					$petsYN = $row["pets"];
					if ($petsYN == 1) {
						echo "<td> Yes </td>";
					}
					else {
						echo "<td> No </td>";
					}
					$count = 1;
				}
				else {
					echo "<tr bgcolor='#ff9696'>";
					echo "<td> <form method = 'post' action = 'searchPage.php'>
					<input type = 'hidden' value = ".$row["listing_id"]." name = 'listingID' id = 'listingID'>
					<input type = 'submit' name = 'listingResult' class='w3-bar-item w3-button w3-padding-large' value = ".$row["listing_name"]."></form></td>";
					echo "<td>".$row["street_address"]."</td>";
					echo "<td>".$row["description"]."</td>";
					echo "<td>".$row["bedrooms"]."</td>";
					echo "<td>".$row["bathrooms"]."</td>";
					echo "<td>".$row["price"]."</td>";
					$parkingYN = $row["parking"];
					if ($parkingYN == 1) {
						echo "<td> Yes </td>";
					}
					else {
						echo "<td> No </td>";
					}
					$petsYN = $row["pets"];
					if ($petsYN == 1) {
						echo "<td> Yes </td>";
					}
					else {
						echo "<td> No </td>";
					}
					$count = 0;
				}
			}
		}
	}
	else {
		echo "Unfortunately, no listings match! Please try again with new specifications.";
	}
}
if (isset($_POST['listingResult'])) {
	$listingID = $_POST['listingID'];
	$_SESSION['listingID'] = $listingID;
	$_SESSION['link'] = 'searchPage.php';
	echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=listingResult.php\"> ";
}

mysqli_close($conn);
?>
</div>
</div>
</div>

</body>
</html>