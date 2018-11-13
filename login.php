<?php
$email = $_POST['email'];
$password = $_POST['password'];
$connection = mysqli_connect("localhost", "root") or header('Location: Home.html');

$dbase_name = "Project";
mysqli_select_db($connection,$dbase_name) or  header('Location: Home.html');


$result = mysqli_query($connection," SELECT * FROM user WHERE email = '$email'") or die(mysqli_error($connection));
$counter = mysqli_num_rows($result);


if ( $counter == 1 ) {
    $row = mysqli_fetch_assoc($result);
    $name = $row['username'];
    if ($row['password']!= $password)
    {
           header("Location: display.html");
     }

     else {
          session_start();
         $_SESSION['SID'] = session_id();
         $_SESSION['email'] = $email;
         $_SESSION['logged'] = true;
         $_SESSION['username'] = $name;
         $_SESSION['location'] = '';
        header("Location: Registered.php");
  }
     }
?>