<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
    <!-- Override Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- Override Bootstrap JS -->
    <script src="js/main.js"></script>
</head>
<body>
  
<?php
  require_once "php/classes/Header.php";
  require_once "php/classes/Head.php";
  require_once "php/classes/HourAdminNav.php";
  require_once "js/cdn.php";
  /* require_once "php/classes/DB.php"; */
  $header = new Header();
  $head = new Head();
  $nav = new HourAdminNav();
?>

<!-- Navigation -->
  <nav>
  	<!-- Side navigation -->
  	<div id="mySidenav" class="sidenav">
  	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  	  <a href="#">Log in</a>
  	  <a href="#">Registreer</a>
  	</div>
  	<!-- Header navigation -->
  	<div id="main">
  	<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  	  <ul class="navbar-nav">
  	  	<li class="nav-item">
  	  		<span class="nav-link" style="font-size:15px;cursor:pointer" onclick="openNav()">&#9776;</span>
  	  	</li>
        <li>
          <img src="images/trentonlogo.png" class="col-md mu-2" style="width: 150px; height 200px;">
        </li>
  	    <li class="nav-item">
  	      <a class="nav-link" href="landing.php">Urenadministratie</a> 
  	    </li>
  	    <li class="nav-item">
  	      <a class="nav-link" href="#">Projectbeheer</a>
  	    </li>
  	    <li class="nav-item">
  	      <a class="nav-link disabled" href="#">Accountbeheer</a>
  	    </li>
  	  </ul>
      </nav>
  	
      <!-- body -->
      <h1>Urenregistratie</h1>
      <button class="collapsible">Week 1</button>
      <div class="content">
        <!--Urenregistratie code-->
        <?php
        include "php/urenregistratie_code.php";
        ?>
      </div>

      <script type="text/javascript">
        var coll = document.getElementsByClassName("collapsible");
      var i;

      for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
          this.classList.toggle("active");
          var content = this.nextElementSibling;
          if (content.style.maxHeight){
            content.style.maxHeight = null;
          } else {
            content.style.maxHeight = content.scrollHeight + "px";
          } 
        });
      }
      </script>
    </div>
  </nav>




<!-- OtherJavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"crossorigin="anonymous"></script>
  </body>
</html>
