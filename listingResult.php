<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listing</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
</head>

<style>
/* .box{
    height: 400px;
} */
#img{
    height: 300px;
} 
</style>

<body>
<?php
include("connect.inc.php");
include("auth.inc.php");
$link = $_SESSION['link'];
?>
    <!-- Navbar -->
    <div class="w3-top">
        <div class="w3-bar w3-red w3-card w3-left-align w3-large">
            <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
            <?php echo "<a href=".$link." class='w3-bar-item w3-button w3-padding-large w3-white'>Return to Listings</a>"; ?>
        </div>
    
        <!-- Navbar on small screens -->
        <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
            <?php echo "<a href=".$link." class='w3-bar-item w3-button w3-padding-large w3-white'>Return to Listings</a>"; ?>
        </div>
    </div>

    <!-- small header -->

    <header class="w3-container w3-red w3-center" style="padding:24px 12px">
<?php

$listingID = $_SESSION['listingID'];
$id = $_SESSION['id'];
$query = "SELECT listing_id,listing_name, street_address, price, description, parking, bedrooms, pets, bathrooms, zip, date_range, user_id FROM LISTING WHERE listing_id = $listingID";
$result = mysqli_query($conn, $query);
if (!$result) {
		die("Cannot process select query");
}
while ($row = mysqli_fetch_assoc($result)) {
	$userid = $row['user_id'];
	$query2 = "SELECT phone_num, user_email FROM user WHERE (user_id = $userid)";
	$result2 = mysqli_query($conn, $query2);
	if (!$result) {
		die("Cannot process select query");
	}
	while ($row2 = mysqli_fetch_assoc($result2)) {
?>
	
	<h4 class="w3-margin w3-jumbo"><?php echo "".$row['listing_name'].""; ?></h4>
        <h2 class="w3-margin"><?php echo "".$row['description'].""; ?></h2>
        <h2 class="w3-margin"><?php echo "".$row['street_address'].", ".$row['zip'].""; ?></h2>
		<h2 class="w3-margin"><?php echo "".$row2['phone_num']." or ".$row2['user_email'].""; ?></h2>

    </header>
    <!-- top row: images -->
    <!-- How Do I 
      show all images and make containers per n images? -->

      <br><div class="section2">
        <div class="columns">
            <div class="column is-one-third has-text-centered">
                <ul>
                    <li><b>Bathrooms available:</b> 1 </li><br>
                    <li><b>Bedrooms available:</b> 1 </li>
                </ul>
            </div>

            <div class="column is-one-third has-text-centered">
                <ul>
                    <li><b>Bathrooms total:</b> <?php echo "".$row['bathrooms'].""; ?> </li><br>
                    <li><b>Bedrooms total:</b> <?php echo "".$row['bedrooms'].""; ?> </li>
                </ul>
            </div>

            <div class="column is-one-third has-text-centered">
                <ul>
                    <li><b>Pets allowed?</b> <?php 
					if ($row['pets'] == 1) {
						$pets = "Yes";
					}
					else {
						$pets = "No";
					}
					echo "$pets"; ?> </li><br>
                    <li><b>Parking available?</b> <?php 
					if ($row['parking'] == 1) {
						$parking = "Yes";
					}
					else {
						$parking = "No";
					}
					echo "$parking";
	?> </li>
                </ul>
            </div>
        </div>
    </div>

    <br><div class="section3">
        <div class="has-text-centered"> <b>When will unit be available? Additional notes:</b> <?php echo "".$row['date_range'].""; ?></div>
    </div>
    
<?php
	}
}
$queryImages = "SELECT * FROM images where listing_id = $listingID";
$resultImages = mysqli_query($conn, $queryImages);
if (!$resultImages) {
	die("Cannot process select query");
}
$numImages = mysqli_num_rows($resultImages);
$count = 0;
if ($numImages > 0) {
	echo " <div class='section'>
			    <div class='columns'>";
	for ($j=0;$j<$numImages;$j++) {
		while ($rowImages = mysqli_fetch_assoc($resultImages)) {
			if ($count % 2 == 0){
				echo "
					<div class='column is-one-third'>
						<div class='box'>

							<div class='image'>
								<img id='img".$j."' src='upload/".$rowImages['imagelink']."' alt='No image to display!'>
							</div>";
			$count++;
			}
			else {
					echo   "<br><div class='image'>
								<img id='img".$j."' src='upload/".$rowImages['imagelink']."' alt='No image to display!'>
							</div>
						</div>
					</div>";
			$count++;
			}
			
		}
	}
}
else {
	echo "<br><br><br> <h1 class='w3-margin w3-jumbo' align='center'> No images to display! </h1>";
}


?>
		
		
		
		
		
		
		
		<!--
		
            <div class="column is-one-third">
                    <div class="box">

                        <div class="image">
                            <img id="img" src="example/img1.jpg" alt="oops">
                        </div>
                        
                        <br><div class="image">
                            <img id="img" src="example/img4.jpg" alt="oops">
                        </div>
                        <!-- <div class="middle">
                            <div class="text">Full Listing</div>
                        </div> --
                    </div>
            </div>
        

            <div class="column is-one-third">
                
                <div class="box">
                        <div class="image">
                            <img id="img" src="example/img2.jpg" alt="oops">
                        </div>

                        <br><div class="image">
                            <img id="img" src="example/img5.jpg" alt="oops">
                        </div>

                <!-- <div class="middle">
                    <div class="text">Full Listing</div>
                </div> --
                </div>

            </div>

            <div class="column is-one-third">
                
                <div class="box">
                        <div class="image">
                            <img id="img" src="example/img3.jpg" alt="oops">
                        </div>

                        <br><div class="image">
                            <img id="img" src="example/img6.jpg" alt="oops">
                        </div>
                
                </div>

            </div> -->
            
        </div>
    </div>

    
</body>
</html>