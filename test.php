<?php 

  $host="localhost";
  $user="root";
  $pass="";
  $dbname="Project";
  
  $dbcon = new PDO("mysql:host={$host};dbname={$dbname}",$user,$pass);

 if($_POST) 
  {
      $name     = strip_tags($_POST['email']);
      
   $stmt=$dbcon->prepare("SELECT email FROM user WHERE email = '$name'");
   $stmt->execute(array(':name'=>$name));
   $count=$stmt->rowCount();
   
   if($count == 1)
   {
    echo "<span style='color:green;'>Valid email</span>";
   }
   else
   {
    
    echo "<span style='color:brown;'>Email doesn't exist. Sign Up first</span>";
   }
  }
?>
