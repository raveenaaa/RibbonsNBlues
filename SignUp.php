<?php
session_start();
$username = $_POST['username'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];

$connection = mysqli_connect("localhost", "root") or header('Location: SignUp.html');
$dbase_name = "project";
mysqli_select_db($connection,$dbase_name) or  header('Location: SignUp.html');

$querry = " INSERT INTO user(username,firstname,lastname,email,password) VALUES('$username','$firstname', '$lastname', '$email','$password')";
mysqli_query($connection,$querry) or header('Location: SignUp.html');
$_SESSION['SID'] = session_id();
$_SESSION['email'] = $email;
$_SESSION['logged'] = true;
$_SESSION['username'] = $username;
header('Location: Registered.php');

mysqli_close();
?>