
<!DOCTYPE html>
<html>
<head>
    <title style="font-family:'Dancing Script';color:#11003c; align :center">Sign Up</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-------------Jquery---------------->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!-----------Bootstrap---------------->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!--Font-->
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">

    <!------------------Sidebar-------------------->
    <link rel="stylesheet" href="sidebar.css">
    <script type="text/javascript" src="sidebar.js"></script>

    <link rel="icon" type="image/png" href="test3.png">


    <style>

        body {
            background-image: url("Pictures/Sunset.jpg");
        }
        fieldset {
            border: thin solid #ccc;
            border-radius: 4px;
            padding: 20px;
            padding-left: 40px;
            background: #fbfbfb;
            margin:0 auto;
        }
        legend {
            color: #678;
        }

        .form-control {
            width: 95%;
        }

        label small {
            color: #678 !important;
        }
        span.req {
            color:red;
            font-size: 112%;
        }

        .row{
            /* H E R E*/
            margin-left:250px ;
            margin-top: 100px;
        }

        .container{
            opacity: 0.7;
        }

        .button{
            margin-left: 130px;
        }

        .purple{
            color: #554383;
        }

        .button-primary:active{
           color: black;
        }
    </style>

</head>
<body>

<!---------------------------------N A V B A R---------------------------------->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">

        <!--LOGO-->
        <div class="navbar-header">
            <a href="#" class="navbar-brand">
                <div>
                    <img alt="RibbonsNBlues" src="test2.png" class="img img-circle" style="max-width:45px;margin-top:-6px;">
                </div>
                <div class="purple" style="font-family:'Dancing Script',Cursive;margin-top:-25px;margin-left:50px;font-size:25px;">Ribbons N Blues</div>
            </a>
        </div>
        <!-- Menu Items-->
        <div style="font-size:17px;">
            <ul class="nav navbar-nav">
                <li><a href="Registered.php"><span class="glyphicon glyphicon-home"></span>  HOME</a></li>

                <li><a href="Customization.php"><span class="glyphicon glyphicon-picture"></span>  Create Cards</a></li>

                <li><a href="#" data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-user"></span>  Log In</a></li>

                <li class="active"><a href="SignUp.html"><span class="glyphicon glyphicon-check"></span>  Sign Up</a></li>
            </ul>
        </div>

        <!--<ul class="nav navbar-nav navbar-right">-->
        <!--<li><a href="#"><div style="margin-right:18px;font-size:17px"><span class="glyphicon glyphicon-log-out"></span>  Log Out</div></a></li>-->
        <!--</ul>-->
    </div>
</nav>
<!----------------------------------N A V B A R  E N D------------------------------------>
<!-------------------------------------L O G I N -------------------------------------------->

<div class="modal fade login" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Login -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button> <!--- close button -->
                <h3 class="modal-title">Log In</h3>
            </div>

            <!-- body -->
            <div class="modal-body">
                <form role="form" method="POST" id="fl" action="login.php">
                    <div class="form-group">
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email" required />
                        <span id="result"></span>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <!-- button -->
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-block" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#email").keyup(function(){
            var name = $(this).val();

            if(name.length > 3){
                $("#result").html('checking...'); // changing span to Checking...
                $.ajax({

                    type : 'POST',   // Form method
                    url  : 'test.php', // PHP to test the email exists in database
                    data : $(this).serialize(), // data passed to the php file
                    success : function(data)  // data that is returned from php file
                    {
                        $("#result").html(data);  // Change the span accordingly
                    }
                });
                return false;
            }
            else{
                $("#result").html('');
            }
        });

    });
</script>
<!------------------------------L O G I N  E N D S-------------------------------->
<?php
session_start();
$email = $_SESSION['email'];

$connection = mysqli_connect("localhost", "root") or header('Location: SignUp.html');
$dbase_name = "project";
mysqli_select_db($connection,$dbase_name) or  header('Location: SignUp.html');

$query = "SELECT * FROM user WHERE email = '$email'";
$result = mysqli_query($connection,$query);
$result = mysqli_fetch_assoc($result);
$username = $result['username'];
$firstname = $result['firstname'];
$lastname = $result['lastname'];

?>
<!----------------------------U S E R  I N F O--------------------------------->
<div class="container">
    <div class="row">
        <div class="col-md-8" style="font-size: 18px;">
            <form id="fileForm" role="form">
                <fieldset>

                    <div class="form-group">
                        <label for="firstname">First name: </label><br>
                        <div><?php echo "$firstname";?></div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="lastname">Last name: </label><br>
                        <div><?php echo "$lastname";?></div>
                     </div>
                    <br>
                    <div class="form-group">
                        <label for="email">Email Address: </label><br>
                        <div><?php echo "$email";?></div>
                     </div>
                    <br>
                    <div class="form-group">
                        <label for="username">User name:</label><br>
                        <div><?php echo "$username";?></div>
                    </div>

                    <div class="button">
                        <button id="pass" class="btn btn-primary" type="button">Change Password</button>
                    </div>
                    </fieldset>
              </form><!-- ends register form -->
            <br><br>
                                   <form  id="passChange" method="POST" role="form" action="Passcheck.php" >
                                   <fieldset>
                               <div class="form-group">
                                   <label for="pass1">Old Password: </label>
                                   <input required name="pass1" type="password" class="form-control inputpass" placeholder="Enter old password" minlength="4" maxlength="16"  id="pass1" /> </p>

                                   <label for="pass2">New Password: </label>
                                   <input required name="pass2" type="password" class="form-control inputpass" minlength="4" maxlength="16" placeholder="Enter new password"  id="pass2" />
                                   <span id="confirmMessage" class="confirmMessage"></span>
                               </div>
                                       <div class="button">
                                           <input class="btn btn-primary" type="submit" name="submit_reg" value="Submit">
                                       </div>
                                   </fieldset>
                               </form>
                                      </div>
                                      </div>

</div>
<script>
    $(document).ready(function(){

        $("#passChange").hide();

        $("#pass").click(function(){
            $("#passChange").show();
        });
    });
</script>
</body>
</html>

