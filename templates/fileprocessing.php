
<form action="" method="post" enctype="multipart/form-data">
    Select a CVS file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload" name="submit" class="btn btn-primary">
</form>

<?php

// Config
//$currentDirectory = getcwd();
$uploadDirectory = "uploads/";
$fileExtensionsAllowed = ['csv']; // These will be the only file extensions allowed
$fileLimitMb = 5; // File limit in MB
$uploadOk = true;

$fileName = $_FILES['fileToUpload']['name'];
//echo $fileName;
$fileSize = $_FILES['fileToUpload']['size'];
$fileTmpName  = $_FILES['fileToUpload']['tmpName'];
$fileType = $_FILES['fileToUpload']['type'];
$fileExtension = strtolower(end(explode('.',$fileName)));
$fileType = strtolower(pathinfo($fileName,PATHINFO_EXTENSION));

$uploadPath = $currentDirectory . $uploadDirectory . basename($fileName);


// Check if image file is an actual image or fake image
if (isset($_POST["submit"])) {
	if (getimagesize($fileTmpName) !== false) {         //or 0 or null
		echo "The CSV file - " . $check["mime"] . ".";
		$uploadOk = true;
	} else {
		echo "File is not a CSV.";
		$uploadOk = false;
	}
}

// Check file size
if ($fileSize > ($fileLimitMb * 100000)) {
	echo "File must be less than" . $fileLimitMb . "MB.";
	$uploadOk = false;
}

/*
// Allow certain file formats; needs to do foreach from array fileExtensionsAllowed
if($imageFileType != $fileExtensionsAllowed  {
	echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	$uploadOk = false;
}*/

// Check if $uploadOk then process
if ($uploadOk == false) {
	echo "File couldn't be uploaded.";

} else {
	if (move_uploaded_file($fileTmpName, $target_file)) {
		echo "The file ". basename($fileName). " has been uploaded.";
	} else {
		echo "Sorry, there was an error uploading your file.";
	}
}



?>