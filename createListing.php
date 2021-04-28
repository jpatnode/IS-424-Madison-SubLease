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
  <h1 class="w3-margin w3-jumbo">Create Your Sublease Posting</h1>
</header>
  
<div class="w3-row-padding w3-light-grey w3-padding-24 w3-container">
  <div class="w3-content">
      <h4 class="w3-padding-24">Here, you will be able to post your listing and help notify people of its availability. Below, you will need to provide
  us with a series of answers so that people can find your posting when they search with specific preferences.</h4>
  </div>
</div>

<br>
 <div class="w3-row-padding w3-padding-64 w3-container" style="background-image: url(./statest.jpg); background-size: cover;" >
  <div class="w3-content">
    <div class="w3-container w3-white" style="padding: 1em; opacity:.875">
	<table style="text-align: center" align="center">
	<tr>
        <td>
        <!-- <h2 align="center">Choose Your Filters</h2> -->
        <form method="post" action="createListing.php">
        
        <!-- Title -->
          <h4> Create Listing Title: </h4>     
        <div class="control">
          <input type="text" size="30" class="input" name="listing_name" id="listing_name" placeholder="Ex: Hub, 1bd & bath, June-Aug15">
        </div>
		
		<br>
		<h4>Rent Price Per Month</h4>
        <div class="control">
          $<input type="text" size="5" class="input" name="price" id="price" placeholder="895">
        </div>
        
        <!-- Pictures --
        <br>
        <h4>Pictures</h4>
        <p>Select all necessary image files at once</p>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="my_image[]" multiple>
            <input type="submit" value="Upload Images">
        </form>
		
        <!-- Address -->
        <br>
        <h4>Address</h4>
        <div class="control">
          <input type="text" size="35" class="input" name="address" id="address" placeholder="123 W Mifflin St">
        </div>
        <!-- Region -->
        <br>
        <h4> Select region: </h4>
        <select id="location" name="location"> 
            <option value="statelangdon">State-Langdon</option>
            <option value="southcamp">South Campus</option>
            <option value="mifflin">Mifflin</option>
            <option value="capitol">Capitol Square</option>
            <option value="regent">Regent</option>
            <option value="universityave">University Ave</option>
            <option value="other">Other</option>
        </select>
        <!-- Bd available -
        <br><br>
        <h4> Bedrooms Available: </h4>
        <select id="bedrooms" name="bedrooms"> 
          <!-- Why would anyone make/search 0bd?
            <option value="0">0</option> --
            <option value=".5">.5 (shared) </option>
            <option value="1">1</option>
            <option value="1.5">1.5</option>
            <option value="2">2</option>
            <option value="2.5">2.5</option>
            <option value="3">3</option>
            <option value="3+">3+</option>
        </select>
        <!-- Br available 
        <br><br>
        <h4>Bathrooms Available:</h4>
        <select name="bathrooms" id="bathrooms">
          <option value=".5">.5 (shared) </option>
          <option value="1">1</option>
            <option value="1.5">1.5</option>
            <option value="2">2</option>
            <option value="2+">2+</option>
        </select>
        <!-- bd total -->
        <br><br>
        <h4>Total Bedrooms:</h4>
        <select name="totalbd" id="totalbd">
          <option value=1>1</option>
          <option value=2>2</option>
          <option value=3>3</option>
          <option value=4>4</option>
          <option value=5>5</option>
          <option value=6>6</option>
        </select>
        <!-- br total -->
        <br><br>
        <h4>Total Bathrooms</h4>
        <select name="totalbr" id="totalbr">
          <option value=1>1</option>
          <option value=2>2</option>
          <option value=3>3</option>
          <option value=4>4</option>
          <option value=5>5</option>
          <option value=6>6</option>
        </select>
		
		 <!-- Parking? -->
        <br><br>
        <h4> Parking available? </h4>
        <select id="parking" name="parking"> 
            <option value=1>Yes</option>
            <option value=0>No</option>
        </select>
		
        <!-- Pets? -->
        <br><br>
        <h4> Pets allowed? </h4>
        <select id="pets" name="pets"> 
            <option value=1>Yes</option>
            <option value=0>No</option>
        </select>
        <!-- dates -->
        <br><br>
        <h4> When will the unit be available? </h4> 
        <div class="control">
          <input type="text" size= 50 class="input" name="time" id="time" placeholder="Available August 2021, lease ends Aug15">
        </div>

        <!-- post -->
        <br> <br>
        <input type="submit" class = "w3-button w3-black w3-padding-large w3-large w3-margin-top" name="postListing" value="Post">
        </form>
		</tr> </td> </table>
        <br>
	
    </div>

  </div>
</div>

<?php

if (isset($_POST['postListing'])) {
	$price=trim($_POST['price']);
	$listingname = trim($_POST['listing_name']);
	$address = trim($_POST['address']);
	$location=trim($_POST['location']);
	$parking=trim($_POST['parking']);
	$bedrooms=trim($_POST['totalbd']);
	$pets=trim($_POST['pets']);
	$bathrooms=trim($_POST['totalbr']);
	$time = trim($_POST['time']);
	$query = "SELECT street_address, price, description, parking, bedrooms, pets, bathrooms, date_range FROM listing WHERE price = '$price' AND street_address = '$address'
	AND description='$location' AND parking='$parking' AND bedrooms='$bedrooms' AND pets='$pets' AND bathrooms='$bathrooms' AND date_range = '$time'";
	$result = mysqli_query($conn, $query);

	if (!$result) {
		die("Cannot process select query");
	}
	$zip = '00000';
	if ($location == 'statelangdon') {
		$zip = '53703';
		$location = "State-Langdon";
	}
	else if ($location == 'southcamp') {
		$zip = '53715';
		$location = "South Campus";
	}
	else if ($location == 'mifflin') {
		$zip = '53703';
		$location = "Mifflin";
	}
	else if ($location == 'capitol') {
		$zip = '53703';
		$location = "Capitol Square";
	}
	else if ($location == 'regent') {
		$zip = '53715';
		$location = "Regent";
	}
	else if ($location == 'universityave') {
		$zip = '53715';
		$location = "University Ave";
	}
	else {
		$zip = '12345';
	}
	$numAdd = mysqli_num_rows($result);
	if ($numAdd == 0) {
		$sqladd="INSERT INTO listing (listing_id,listing_name,street_address,description,zip,pets,bathrooms,bedrooms,parking,price,user_id,date_range) VALUES (NULL,'$listingname','$address','$location','$zip',$pets,$bathrooms,$bedrooms,$parking,$price,$id,'$time')";
		$resultadd=mysqli_query($conn,$sqladd);
		if (!$resultadd) {
			die(mysqli_error($conn));
		}		
		echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=listingConfirm.php\"> ";
		//echo "<script type=\'text/javascript\'>
            //alert('Listing created successfully!');
            //</script>";
	}
	else {
		echo "<script type=\'text/javascript\'>
           alert('A listing with these specifications has already been created!');
           </script>";
	}
}

mysqli_close($conn);
?>
</div>
</div>
</div>

</body>
</html>