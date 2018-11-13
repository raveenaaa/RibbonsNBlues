<?php
session_start();
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" href="sidebar.css">
    <script type="text/javascript" src="sidebar.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!--Font-->
    <link href="https://fonts.googleapis.com/css?family=Abel|Architects+Daughter|Cookie|Handlee|Indie+Flower|Poiret+One|Quicksand|Shadows+Into+Light+Two|Tangerine|Tulpen+One|Dancing+Script|Catamaran" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

    <!-- Icon -->
    <link rel="icon" type="image/png" href="test3.png">


    <title style="font-family:'Dancing Script';">Ribbons N Blues</title>
</head>

<style>
    .username{
        color: #FFFFFF;
        padding-left: 100px;
        font-size: 25px;
        font-family:'Catamaran',sans-serif;
        font-weight: 100;
        margin-top: 7px
            }


</style>
<body>

<!--Navbar-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">

        <!--LOGO-->
        <div class="navbar-header">
            <a href="#" class="navbar-brand">
                <div>
                    <img alt="RibbonsNBlues" src="test2.png" class="img img-circle" style="max-width:45px;margin-top:-6px;">
                </div>
                <div style="font-family:'Dancing Script',Cursive;margin-top:-25px;margin-left:50px;font-size:25px;">Ribbons N Blues</div>
            </a>
        </div>
        <!-- Menu Items-->
        <div style="font-size:17px">
            <ul class="nav navbar-nav">
                <li class="active"><a href="Registered.php"><span class="glyphicon glyphicon-home"></span>  HOME</a></li>

                <li><a href="Customization.php"><span class="glyphicon glyphicon-picture"></span>  Create Cards</a></li>

                <!--<li><a href="#" data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-user"></span>  Log In</a></li>-->
                <li><a href="SignUp.html"><span class="glyphicon glyphicon-check"></span>  Sign Up</a></li>

                <li>
                    <?php
                    if($_SESSION['logged']==true)
                        $username = $_SESSION['username'];
                    ?>
                    <div class="username"><?php
                        echo " Welcome   $username!!!";
                        ?></div>

                </li>


            </ul>


        </div>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php"><div style="margin-right:18px;font-size:17px"><span class="glyphicon glyphicon-log-out"></span>  Log Out</div></a></li>
        </ul>
    </div>
</nav>

<!--Login Modal-->

<div class="modal fade login" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button> <!--- close button -->
                <h3 class="modal-title">Log In</h3>
            </div>

            <!-- body (form) -->
            <div class="modal-body">
                <form role="form" method="POST" id="fl"  action="login.php" autocomplete="off">
                    <div class="form-group">
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email" required autocomplete="off" />
                        <span id="result"></span>
                        <!-- <div class="status" id="status"></div> -->
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" minlength="4" maxlength="16">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-block" type="submit">Submit</button>
                    </div>
                </form>
            </div>

            <script>
                $(document).ready(function(){
                    $("#email").keyup(function(){
                        var name = $(this).val();

                        if(name.length > 3){
                            $("#result").html('checking...'); // changing span to Checking...

                            $.ajax({

                                type : 'POST',
                                url  : 'test.php',
                                data : $(this).serialize(),
                                success : function(data){
                                    $("#result").html(data);
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



        </div>
    </div>
</div>

<div id="wrapper">

    <!-- Sidebar -->
    <nav class='sidebar sidebar-menu-collapsed'>
        <a href='#' id='justify-icon'>
            <span class='glyphicon glyphicon-menu-hamburger'></span>
        </a>
        <ul>
            <li>
                <a class='expandable' href='Account.php' title='Account'>
                    <span class='glyphicon glyphicon-user collapsed-element'></span>
                    <span class='expanded-element'>Account</span>
                </a>
            </li>

            <li>
                <a class='expandable' href='About.html' title='APIs'>
                    <span class='glyphicon glyphicon-info-sign collapsed-element'></span>
                    <span class='expanded-element'>About Us</span>
                </a>
            </li>
        </ul>
    </nav>

    <!---J U M B O T R O N-->
    <div class="jumbotron" style="background-image: url(Pictures/Mountains.png); background-size: cover; height:400px;">
        <div class="container text-center" style="line-height: 20px;"><br>
            <h1>Greeting Cards for your loved ones</h1>
            <p style="font-size:175%;">Here,you can make and choose from a variety of E-cards you like </p>
        </div >

    </div>
    <!-- End jumbotron-->


    <!-- Page content -->
    <div id="page-content-wrapper" style="margin: 0 auto; width: 27%; margin-top: 80px;">
        <div class="container-fluid " >
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                    <li data-target="#myCarousel" data-slide-to="3"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="Pictures/resized_Christmas_01.jpg" alt="Chania">
                        <div class="carousel-caption">Be it Christmas...</div>
                    </div>

                    <div class="item">
                        <img src="Pictures/resized_Diwali_01.jpg" alt="Chania">
                        <div class="carousel-caption">Or Diwali...</div>
                    </div>

                    <div class="item">
                        <img src="Pictures/resized_Birthday_05.jpg"alt="Flower">
                        <div class="carousel-caption">Or Birthdays...</div>
                    </div>

                    <div class="item">
                        <img src="Pictures/resized_card_06.jpg" alt="Flower">
                        <div class="carousel-caption" style="color: black; top: 0; bottom: auto;">We have just the right designs for you and your family.</div>
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </div>

</div>
</body>
</html>
