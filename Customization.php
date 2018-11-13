<?php
session_start();
if($_SESSION['logged']==false)
    header("Location: test.html")
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-------------Jquery---------------->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <!-----------Bootstrap---------------->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!---------------This helpas capture any div ----------------->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="Div_to_Image/html2canvas.js"></script>


    <!------------------Sidebar-------------------->
    <link rel="stylesheet" href="sidebar.css">
    <script type="text/javascript" src="sidebar.js"></script>

    <!---------------Color----------------->
    <script src="Color/jscolor.js"></script>

<!-------------------Fonts------------------>
    <link href="https://fonts.googleapis.com/css?family=Abel|Architects+Daughter|Cookie|Handlee|Indie+Flower|Poiret+One|Quicksand|Shadows+Into+Light+Two|Tangerine|Tulpen+One|Dancing+Script|Catamaran" rel="stylesheet">

  <link rel="stylesheet" href="style.css">

<!------------------ Icon --------------------->
<link rel="icon" type="image/png" href="test3.png">

<title>Ribbons N Blues</title>

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

    input[type=range]{
        -webkit-appearance: none;
    }

    input[type=range]::-webkit-slider-runnable-track {
        width: 300px;
        height: 5px;
        background: #ddd;
        border: none;
        border-radius: 3px;
    }

    input[type=range]::-webkit-slider-thumb {
        -webkit-appearance: none;
        border: none;
        height: 16px;
        width: 16px;
        border-radius: 50%;
        background: #7881b5;
        margin-top: -4px;
    }

    input[type=range]:focus {
        outline: none;
    }

    input[type=range]:focus::-webkit-slider-runnable-track {
        background: #ccc;
    }
</style>

<body>

<!------------------------------------N A V B A R----------------------------------->
<nav class="navbar navbar-default navbar-fixed-top" id="navbar">
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
        <li><a href="Registered.php"><span class="glyphicon glyphicon-home"></span>  HOME</a></li>

      <li class="active"><a href="Customization.php"><span class="glyphicon glyphicon-picture"></span>  CREATE CARDS</a></li>

      <li><a href="#" data-toggle="modal" data-target="#login"><span class="glyphicon glyphicon-user"></span>  LOG IN</a></li>

      <li><a href="SignUp.html"><span class="glyphicon glyphicon-check"></span>  SIGN UP</a></li>
            <li>
                <?php
                if($_SESSION['logged']==true){
                    $username = $_SESSION['username'];
                }
                ?>
                <div class="username"><?php
                    echo "You  can  customize  your  cards  here   $username!!!";
                    ?></div>

            </li>
      </ul>
     </div>

      <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><div style="margin-right:18px;font-size:17px"><span class="glyphicon glyphicon-log-out"></span>  LOG OUT</div></a></li>
      </ul>
</div>
</nav>
<!------------------------------N A V B A R   E N D----------------------------------->

      <!---------------------------L O G I N   M O D A L-------------------------------->

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
                  $( document ).ready(function() {
    $('#greeting').keyup(function () {
    var left = 140 - $(this).val().length;
    if (left < 0) {
        left = 0;
    }
    $('#counter').text('Characters left: ' + left);
});
  });
  </script>
  </div>
  </div>
  </div>
<!--------------------------------L O G I N   E N D---------------------------------->

  <!-------------------------------- U P L O A D------------------------------------>

  <div style="margin-left:225px; margin-top: 100px;">
   <form  id="upload" action="Customization.php" method="POST" enctype="multipart/form-data" name="cust">
    
    <input id="uploadFile" style="background-color: white;border-radius: 5px;" placeholder="Choose File" disabled="disabled"/>
    <div class="fileUpload btn btn-primary">
    <input type="file" class="upload" name="image" id="uploadBtn" />
    <span>Choose file</span>
    </div> 

<script type="text/javascript">
  document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};
</script>

        <div class="text">

        <input  placeholder="Enter your Greeting here.." class="form-control fileUpload" id="greeting" name="greeting" rows="5" cols="5" maxlength="140" style="width:300px;height:50px;"/>

    <p id="counter"></p>
      </div>
      
       <div class="fileUpload btn btn-primary up">
    <input class="upload" type="submit" id="cust"/> <span>Upload</span>
    </div> 
    </form>
    </div>

    <?php
     include("resize-class.php"); 
    $_SESSION['location']='';
    // connect to Databse
   $connection=mysqli_connect("localhost", "root");
   mysqli_select_db( $connection,"project") or die(mysqli_error($connection));

   // file properties
  
     if(!isset($_FILES['image']['tmp_name'])){
      ;
   }

   else{
  
   $greeting =  $_POST['greeting'];
   $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
   $image_name = addslashes($_FILES['image']['name']);
   $image_size = getimagesize($_FILES['image']['tmp_name']); 
   $image_tmp=$_FILES['image']['tmp_name'];
   $tmp=explode(".", $image_name);
   $fileExt = end($tmp);
 
     //Resize Image start
    $target_file =  $image_tmp;
    $resized_file = "Pictures/resized_$image_name";
    $location = "Pictures/resized_$image_name";
        $wmax = 500;
        $hmax = 500;    
        ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);  // REsizing

    //Resize Image end``

   if($image_size == FALSE){
   echo "That's not an image";
   }

   else {

    $insert = "INSERT into cards(name, image, greeting,location) VALUES('resized_$image_name', '$resized_file', '$greeting', '$location')";

        if($connection->query($insert)==FALSE) 
        echo "Problem uploading image";  

    
      else{
      $lastid = mysqli_insert_id($connection); // From here it gets the id of the last image added to the database

        $result = mysqli_query($connection,"SELECT * FROM cards WHERE id=".$lastid);  // SQL query
         $result = mysqli_fetch_assoc($result);  // Fetches the row and puts in array form
         $image = $result['image'];
         $fin_greeting=$result['greeting'];
         // echo "Image Uploaded";
           ?>
<!-------------------------U P L O A D  E N D-------------------------------------->
          <script>                  <!--  COLOR  -->
              function update(jscolor) {
                  // 'jscolor' instance can be used as a string
                  document.getElementById('canvas').style.backgroundColor = '#' + jscolor
                   }

              function fontcolor(jscolor) {
                  // 'jscolor' instance can be used as a string
                  document.getElementById('movable_div').style.color = '#' + jscolor
              }
          </script>
          <!---------------------------C A N V A S----------------------------------->

              <div id="canvas" class="myCanvas" style="background: url('<?php echo $image;?>') no-repeat center">
              <br>
              <div class="movable_div" id="movable_div"><?php echo $fin_greeting;?></div>
              </div>


         <script>
             $(document).ready(function() {
                 $('.movable_div').draggable({   // To make a div draggable

                     containment: "#canvas", scroll: false

                                 });

                 });
         </script>

      <?php

      }
     }

   }
   ?>
<!------------------------------C A N V A S  E N D------------------------------>

<!----------------------------------- S I D E B A R --------------------------------->
 <div id="wrapper">


    <nav class='sidebar sidebar-menu-collapsed'>
      <a href='#' id='justify-icon'>
        <span class='glyphicon glyphicon-menu-hamburger'></span>
      </a>
      <ul>
         <li class="dropdown">
          <a class="dropdown-toggle expandable " data-toggle="dropdown" href="#" title="Font">
            <span class='glyphicon glyphicon-font collapsed-element'></span>
            <span class='expanded-element'>Font</span>
              <span class="caret"></span>
          </a>

             <ul class="dropdown-menu font">
                 <li><a href="#" value="'Abel',sans-serif" style="font-family: 'Abel', sans-serif; font-weight: 400; font-size: 25px;">Abel</a></li>
                 <li><a href="#" value="'Architects Daughter',cursive" style="font-family: 'Architects Daughter', cursive; font-weight: 400; font-size: 25px ;">Architects Daughter</a></li>
                 <li><a href="#" value="'Cookie',cursive" style="font-family: 'Cookie', cursive;  font-weight: 400; font-size: 25px ;">Cookie</a></li>
                 <li><a href="#" value="'Handlee',cursive" style="font-family: 'Handlee', cursive;  font-weight: 400; font-size: 25px ;">Handlee</a></li>
                 <li><a href="#" value="'Indie Flower',sans-serif" style="font-family: 'Indie Flower', sans-serif; font-weight: 400; font-size: 25px ;">Indie Flower</a></li>
                 <li><a href="#" value="'Poiret One', cursive" style="font-family: 'Poiret One', cursive; font-weight: 400; font-size: 25px ;">Poiret One</a> </li>
                 <li><a href="#" value="'Quicksand',sans-serif" style="font-family: 'Quicksand', sans-serif; font-weight: 400; font-size: 25px ;">Quicksand</a></li>
                 <li><a href="#" value="'Shadows Into Light Two',cursive" style="font-family: 'Shadows Into Light Two', cursive; font-weight: 400; font-size: 18px ;">Shadows into Light Two</a></li>
                 <li><a href="#" value="'Tangerine',cursive" style="font-family: 'Tangerine', cursive; font-weight: 400; font-size: 25px ;">Tangerine</a></li>
                 <li><a href="#" value="'Tulpen One',cursive" style="font-family: 'Tulpen One', cursive; font-weight: 400; font-size: 25px ;">Tulphen One</a></li>
             </ul>
        </li>

          <li class="dropdown">
              <a class="dropdown-toggle expandable " data-toggle="dropdown" href='#' title='Font-colour'>
                  <span class='glyphicon glyphicon-text-color collapsed-element'></span>
                  <span class='expanded-element'>Font colour</span>
                  <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                  <input class="jscolor {onFineChange:'fontcolor(this)'}" value="333">
              </ul>

          </li>
          <li class="dropdown">
              <a class="dropdown-toggle expandable " data-toggle="dropdown" href='#' title='Font-size'>
                  <span class='glyphicon glyphicon-text-size collapsed-element'></span>
                  <span class='expanded-element'>Text size</span>
                  <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                   <input id="slider" type ="range" min ="25" max="50" value ="0"/>
              </ul>

          </li>

          <li class="dropdown">
          <a class="dropdown-toggle expandable " data-toggle="dropdown" href='#' title='Background-colour'>
            <span class='glyphicon glyphicon-text-background collapsed-element'></span>
            <span class='expanded-element'>Background colour</span>
              <span class="caret"></span>
          </a>
              <ul class="dropdown-menu">
                  <input class="jscolor {onFineChange:'update(this)'}" value="FFFFFF">
              </ul>

        </li>
        <li>
          <a id="capture" class='expandable' href='#' title='Save'>
            <span class='glyphicon glyphicon-floppy-disk collapsed-element'></span>
            <span class='expanded-element'>Save</span>
          </a>
        </li>

          <li>
              <a id="download" class='expandable' href="Div_to_Image/Download.php"  title='Download'>
                  <span class='glyphicon glyphicon-download-alt collapsed-element'></span>
                  <span class='expanded-element'>Download</span>
              </a>
          </li>
      </ul>
      
      </nav>

<!---------------------------------------S I D E B A R  E N D--------------------------------------->
 <!-------------------------------SCRIPT TO CHANGE FONT------------------------------------------->
     <script>
               $(document).ready(function() {
             $('.dropdown-menu.font li a').click(function(){   // To change font when clicked

                 $('div.movable_div').css('font-family',$(this).attr('value'));
                 $('div.movable_div').css('font-size',"30px");


             });
         });

         $(document).ready(function() {

             $('.dropdown-menu.font li a').hover(function(){   // To change font when hovered

                 $('div.movable_div').css('font-family',$(this).attr('value'));
                 $('.div.movable_div').css('font-weight',"400");

             });

              //font size handler here.
             $('#slider').change(function(){
                 fontSize = $(this).val();
                 $('.movable_div').css('font-size', fontSize+'px');
             });
         });
     </script>
<!-----------------------END------------------------------------->
<!----------------------CONVERT DIV TO IMAGE--------------------->
     <script>

         $(document).ready(function() {
             //here is the hero, after the capture button is clicked
             //he will take the screen shot of the div and save it as image.
             $('ul li a#capture').click(function () {
                 //get the div content
                 div_content = document.querySelector("#canvas")
                 //make it as html5 canvas
                 html2canvas(div_content).then(function (canvas) {
                     //change the canvas to jpeg image
                     data = canvas.toDataURL('image/jpeg');

                     save_img(data);   //then call a super hero php to save the image
                 });
             });
         });

             //to save the canvas image
             function save_img(data){
                 //ajax method.
                 $.post('Div_to_Image/save_jpg.php', {data: data}, function(res){
                     //if the file saved properly, trigger a popup to the user.
                     if(res == ''){
                         yes = confirm('Your file has been saved');

                     }
                     else {
                         alert("Your file didn't get saved. Please try again");
                     }
                 });
             }

        </script>
</body>
</html>










