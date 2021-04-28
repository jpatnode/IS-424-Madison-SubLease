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
$listingID = $_SESSION['listingID'];
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


<!-- Header -->
 <div class="w3-row-padding w3-padding-64 w3-container" <div class="w3-padding-64 w3-container" style="background-image: url(./statest.jpg); background-size: cover;">
  <div class="w3-content">
    <div class="w3-container w3-white" style="padding: 1em; opacity:.875">
      <h1 align="center" text-color="black"> Upload the Images for Your Post</h1>
	  <table style="text-align: center" align="center">
	  <tr>
	  <td>
	  <form method = "post" action = "addImages.php" enctype='multipart/form-data'>
		<h4 class='w3-padding-24' align='center'> Image 1:</h4>
		<input type="file" id="file1" name="file1">
		<br>
		<h4 class='w3-padding-24' align='center'> Image 2:</h4>
		<input type="file" id="file2" name="file2">
		<br> 
		<h4 class='w3-padding-24' align='center'> Image 3:</h4>
		<input type="file" id="file3" name="file3">
		<br>
		<h4 class='w3-padding-24' align='center'> Image 4:</h4>
		<input type="file" id="file4" name="file4">
		<br>
		<h4 class='w3-padding-24' align='center'> Image 5:</h4>
		<input type="file" id="file5" name="file5">
		<br>
		<h4 class='w3-padding-24' align='center'> Image 6:</h4>
		<input type="file" id="file6" name="file6">
		<br> <br>
	   <input type="submit" name = "imgSubmit" value="Add These Images to Your Post">
	   </form>
	   </td>
    </div>
	</tr></table>
  </div>
  <br> <br> <br>
  

</div>

<?php
$postCheck = false;
if (isset($_POST['imgSubmit'])) {
	if (is_uploaded_file($_FILES['file1']['tmp_name'])) {
		$targetDir1 = "upload/";
		$targetFile1 = $targetDir1 . basename($_FILES["file1"]["name"]); // found this online, images were tough to figure out
		$imageFileType1 = strtolower(pathinfo($targetFile1,PATHINFO_EXTENSION));
		move_uploaded_file($_FILES['file1']['tmp_name'], $targetFile1);
		$image1 = basename($_FILES["file1"]["name"]);
		$imgQuery1 = "INSERT INTO images (image_id, imagelink, listing_id) VALUES (NULL, '$image1', $listingID)";
		$result1 = mysqli_query($conn, $imgQuery1);

		if (!$result1) {
			die("Cannot process select query1");
		}
		
		$postCheck = true;
	}
	else {
		echo "WTF1.";
	}
	if (is_uploaded_file($_FILES['file2']['tmp_name'])) {
		$targetDir2 = "upload/";
		$targetFile2 = $targetDir2 . basename($_FILES["file2"]["name"]); // found this online, images were tough to figure out
		$imageFileType2 = strtolower(pathinfo($targetFile2,PATHINFO_EXTENSION));
		move_uploaded_file($_FILES['file2']['tmp_name'], $targetFile2);
		$image2 = basename($_FILES["file2"]["name"]);
		$imgQuery2 = "INSERT INTO images (image_id, imagelink, listing_id) VALUES (NULL, '$image2', $listingID)";
		$result2 = mysqli_query($conn, $imgQuery2);
		
		if (!$result2) {
			die("Cannot process select query2");
		}
		$postCheck = true;
	}
	else {
		echo "WTF2.";
	}
	if (is_uploaded_file($_FILES['file3']['tmp_name'])) {
		$targetDir3 = "upload/";
		$targetFile3 = $targetDir3 . basename($_FILES["file3"]["name"]); // found this online, images were tough to figure out
		$imageFileType3 = strtolower(pathinfo($targetFile3,PATHINFO_EXTENSION));
		move_uploaded_file($_FILES['file3']['tmp_name'], $targetFile3);
		$image3 = basename($_FILES["file3"]["name"]);
		$imgQuery3 = "INSERT INTO images (image_id, imagelink, listing_id) VALUES (NULL, '$image3', $listingID)";
		$result3 = mysqli_query($conn, $imgQuery3);

		if (!$result3) {
			die("Cannot process select query3");
		}
		$postCheck = true;
	}
	else {
		echo "WTF3.";
	}
	if (is_uploaded_file($_FILES['file4']['tmp_name'])) {
		$targetDir4 = "upload/";
		$targetFile4 = $targetDir4 . basename($_FILES["file4"]["name"]); // found this online, images were tough to figure out
		$imageFileType4 = strtolower(pathinfo($targetFile4,PATHINFO_EXTENSION));
		move_uploaded_file($_FILES['file4']['tmp_name'], $targetFile4);
		$image4 = basename($_FILES["file4"]["name"]);
		$imgQuery4 = "INSERT INTO images (image_id, imagelink, listing_id) VALUES (NULL, '$image4', $listingID)";
		$result4 = mysqli_query($conn, $imgQuery4);

		if (!$result4) {
			die("Cannot process select query4");
		}
		$postCheck = true;
	}
	else {
		echo "WTF4.";
	}
	if (is_uploaded_file($_FILES['file5']['tmp_name'])) {
		$targetDir5 = "upload/";
		$targetFile5 = $targetDir5 . basename($_FILES["file5"]["name"]); // found this online, images were tough to figure out
		$imageFileType5 = strtolower(pathinfo($targetFile5,PATHINFO_EXTENSION));
		move_uploaded_file($_FILES['file5']['tmp_name'], $targetFile5);
		$image5 = basename($_FILES["file5"]["name"]);
		$imgQuery5 = "INSERT INTO images (image_id, imagelink, listing_id) VALUES (NULL, '$image5', $listingID)";
		$result5 = mysqli_query($conn, $imgQuery5);

		if (!$result5) {
			die("Cannot process select query5");
		}
		$postCheck = true;
	}
	else {
		echo "WTF5.";
	}
	if (is_uploaded_file($_FILES['file6']['tmp_name'])) {
		$targetDir6 = "upload/";
		$targetFile6 = $targetDir6 . basename($_FILES["file6"]["name"]); // found this online, images were tough to figure out
		$imageFileType6 = strtolower(pathinfo($targetFile6,PATHINFO_EXTENSION));
		move_uploaded_file($_FILES['file6']['tmp_name'], $targetFile6);
		$image6 = basename($_FILES["file6"]["name"]);
		$imgQuery6 = "INSERT INTO images (image_id, imagelink, listing_id) VALUES (NULL, '$image6', $listingID)";
		$result6 = mysqli_query($conn, $imgQuery6);

		if (!$result6) {
			die("Cannot process select query6");
		}
		$postCheck = true;
	}
	else {
		echo "WTF6.";
	}
	if ($postCheck == true) {
		echo "<META HTTP-EQUIV=\"refresh\" content=\"0; URL=imageConfirm.php\"> ";
	}
	else {
		echo "<h4 class='w3-padding-24' align='center'> You need to upload pictures before submitting! </h4>";
		echo '<pre>' . print_r($_FILES, TRUE) . '</pre>';
	}
}

?>

</body>
</html>