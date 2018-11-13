<html lang="en">
<head>
    <title>Ribbons N Blues</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.cs">
    <!-- Icon -->
    <link rel="icon" type="image/png" href="test3.png">
</head>

<?php
session_start();
$email = $_SESSION['email'];
$password=$_POST['pass1'];
$password12=$_POST['pass2'];

if ($password12&&$password)
{
    $connect = mysqli_connect("localhost","root","");

    mysqli_select_db($connect,"Project") or die("couldn't find database");
    $query = mysqli_query($connect,"select * from user where email='$email'");
    $row=mysqli_fetch_assoc($query);
    $dbpassword = $row['password'];
     if($password==$dbpassword)
        {
            $sql2 ="UPDATE user SET password= '$password12' WHERE email= '$email'";
            if(mysqli_query($connect,$sql2))
            {
               ?>
                <body>
                <a href="Account.php">Account Page</a>
                <div class="modal fade login" id="success" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- body (form) -->
                            <div class="modal-body">
                                <form role="form" method="POST" id="fl"  action="Account.php">
                                    <h4 align="center">Password Changed Successfully</h4>
                                    <div class="modal-footer">
                                        <button class="btn btn-default btn-block" type="submit">Back to Account page</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script> $('#success').modal('show');</script>
                </body>
              <?php
            }
            else
            {
                echo "Could not change record: ". mysqli_error($connect);
            }
        }
        else {
           ?>
            <body>
            <a href="Account.php">Account Page</a>
            <div class="modal fade login" id="fail" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- body (form) -->
                        <div class="modal-body">
                            <form role="form" method="POST" id="fl"  action="Registered.php">
                                <h4 align="center">Invalid Password<br><br>Please try again</h4>
                                <div class="modal-footer">
                                    <button class="btn btn-default btn-block" type="submit">Back to Account page</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script> $('#fail').modal('show');</script>
            </body>
       <?php
        }
    }

else {
       ?>
            <body>
            <a href="Account.php">Account Page</a>
            <div class="modal fade login" id="enter" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- body (form) -->
                        <div class="modal-body">
                            <form role="form" method="POST" id="fl"  action="Registered.php">
                                <h4 align="center">Please enter the passwords</h4>
                                <div class="modal-footer">
                                    <button class="btn btn-default btn-block" type="submit">Back to Account page</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script> $('#enter').modal('show');</script>
            </body>
            <?php

}
exit;
?>
</html>

