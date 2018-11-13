<?php
session_start();
//just a random name for the image file
$random = rand(100, 1000);

//$_POST[data][1] has the base64 encrypted binary codes. 
//convert the binary to image using file_put_contents
$savefile = @file_put_contents("output/$random.jpg", base64_decode(explode(",", $_POST['data'])[1]));

$connection = mysqli_connect("localhost", "root") or header('Location: Customization.php');
$db = "project";
mysqli_select_db($connection,$db) or  header('Location: error.html');
$location = "output/$random.jpg";

$query = "INSERT into cards(name, image, greeting,location) VALUES('Card_$random.jpg', 'output/$random.jpg', '','$location')";
mysqli_query($connection,$query) or header('Location: Customization.php');
$_SESSION['location']=$location;

?>