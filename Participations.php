<?php
include 'dbConfig.php';
session_start();
$Type=$_POST['field3'];
$Topic=$_POST['field31'];
$Level=$_POST['field32'];
$Venue=$_POST['field33'];
$FromDate=$_POST['from'];
$ToDate=$_POST['to'];
$Days=$_POST['field36'];
$file=$_FILES["file"]["name"]; 
$uid=$_SESSION['userid'];

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["file"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {?>
    <script>
    alert( "Sorry, your file was not uploaded.kindly Re-submit the Record");
        window.location.href = "Participation.html";</script><?php
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {?><script>
        alert( "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.");</script><?php
        $sql = "INSERT INTO participations  VALUES ('$uid','$Type',
'$Topic',
'$Level',
'$Venue',
'$FromDate',
'$ToDate',
'$Days',
'$file')";

if ($db->query($sql) === TRUE) { ?>
	<script>
    window.location.href = "Participation.html";
     alert("One  Record Uploaded Successfully. ");</script><?php
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
    } else {?>
    <script>
    alert( "Sorry there was an error uploading your file");
        window.location.href = "Participation.html";</script><?php
    }
    echo '<img src="uploads/'.$_FILES["file"]["name"].'" width="80" height="70">';
}



$db->close();
?>