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
//$id = 1;
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
  <h1 class="w3-margin w3-jumbo">Your Listings</h1>
</header>


<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
<?php
include("connect.inc.php");
include("auth.inc.php");

$id=$_SESSION['id'];

$count = 0;
$query = "SELECT listing_id,listing_name, street_address, price, description, parking, bedrooms, pets, bathrooms, user_id FROM listing WHERE (user_id = '$id')";
$result = mysqli_query($conn, $query);

if (!$result) {
	die(mysqli_error($conn));
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
	echo "<td> Add Images </td>";
	echo "<td> Delete Post </td></tr>";
	for ($i=0;$i<$num;$i++) {
		while ($row = mysqli_fetch_assoc($result)) {
			if ($count==0) {
				echo "<tr>";
				echo "<td> <form method = 'post' action = 'myListings.php'>
				<input type = 'hidden' value = ".$row["listing_id"]." name = 'listingID' id = 'listingID'>
				<input type = 'submit' name = 'listingResult' class='w3-bar-item w3-button w3-padding-large' value = ".$row["listing_name"]."></form></td>";
				echo "<td>".$row["street_address"]."</td>";
				echo "<td>".$row["description"]."</td>";
				echo "<td>".$row["bedrooms"]."</td>";
				echo "<td>".$row["bathrooms"]."</td>";
				echo "<td>".$row["price"]."</td>";
				echo "<td> <form method = 'post' action = 'addImages.php'>
				<input type = 'hidden' value = ".$row["listing_id"]." name = 'listingIDimg' id = 'listingIDimg'>
				<input type = 'submit' name = 'addImages' class='w3-bar-item w3-button w3-padding-large' value = 'Add Images'></form></td>";
				echo "<td> <form method = 'post' action = 'myListings.php'>
				<input type = 'hidden' value = ".$row["listing_id"]." name = 'listingIDdel' id = 'listingIDdel'> "?>
				<input type = 'submit' name = 'deletePost' class='w3-bar-item w3-button w3-padding-large' onclick = "return confirm('Are you sure you want to delete this post?')" value = 'Delete Post'></form></td> <?php
				$count = 1;
			}
			else {
				echo "<tr bgcolor='#ff9696'>";
				echo "<td> <form method = 'post' action = 'myListings.php'>
				<input type = 'hidden' value = ".$row["listing_id"]." name = 'listingID' id = 'listingID'>
				<input type = 'submit' name = 'listingResult' class='w3-bar-item w3-button w3-padding-large' value = ".$row["listing_name"]."></form></td>";
				echo "<td>".$row["street_address"]."</td>";
				echo "<td>".$row["description"]."</td>";
				echo "<td>".$row["bedrooms"]."</td>";
				echo "<td>".$row["bathrooms"]."</td>";
				echo "<td>".$row["price"]."</td>";
				echo "<td> <form method = 'post' action = 'addImages.php'>
				<input type = 'hidden' value = ".$row["listing_id"]." name = 'listingIDimg' id = 'listingIDimg'>
				<input type = 'submit' name = 'addImages' class='w3-bar-item w3-button w3-padding-large' value = 'Add Images'></form></td>";
				echo "<td> <form method = 'post' action = 'myListings.php'>
				<input type = 'hidden' value = ".$row["listing_id"]." name = 'listingIDdel' id = 'listingIDdel'> "?>
				<input type = 'submit' name = 'deletePost' class='w3-bar-item w3-button w3-padding-large' onclick = "return confirm('Are you sure you want to delete this post?')" value = 'Delete Post'></form></td> <?php
				$count = 0;
			}
		}
	}
}
else {
	echo "You have not posted any listings yet!";
}

if (isset($_POST['listingResult'])) {
	$listingID = $_POST['listingID'];
	$_SESSION['listingID'] = $listingID;
	$_SESSION['link'] = 'myListings.php';
	echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=listingResult.php\"> ";
}

if (isset($_POST['addImages'])) {
	$listingID = $_POST['listingIDimg'];
	$_SESSION['listingID'] = $listingID;
	$_SESSION['link'] = 'myListings.php';
	echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=addImages.php\"> ";
}

if (isset($_POST['deletePost'])) {
	$listingID = $_POST['listingIDdel'];
	$delquery = "DELETE FROM listing WHERE listing_id = '$listingID'";
	$delresult = mysqli_query($conn, $delquery);
	if (!$delresult) {
		die(mysqli_error($conn));
	}
	echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=myListings.php\"> ";
}
	

mysqli_close($conn);
?>
</div>
</div>
</div>

</body>
</html>