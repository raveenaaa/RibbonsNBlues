<?php
session_start() ;
?>

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
<body>
<A HREF="Home.html">Home page</A>
<div class="modal fade login" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- body (form) -->
            <div class="modal-body">
                <form role="form" method="POST" id="fl"  action="Home.html">
                    <h4 align="center">You have logged out successfully</h4>
                    <div class="modal-footer">
                        <button class="btn btn-default btn-block" type="submit">Back to Home page</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script> $('#login').modal('show');</script>
</body>
</html>
<?php
unset($_SESSION['username']);
unset($_SESSION['SID']);
unset($_SESSION['email']);
unset($_SESSION['logged']);
session_destroy();
?>