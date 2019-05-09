<?php

  class Header {

    public function getHeader() {
      return "
      <head>
      <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
      <link rel='stylesheet' href='css/style.css'>
      </head>
        <header>
          <nav class='navbar navbar-expand-sm bg-dark navbar-dark'>
            <ul class='navbar-nav'>
            <li class='nav-item mr-2'>
              <img src='images/trentonlogo.png' style='width: 150px; height; 200px;'>
            </li>
            <li class='nav-item mr-2'>
              <a href='index.php'>Home</a>
            </li>
            <li class='nav-item mr-2'>
              <a href='urenadministratie.php'>Urenadministratie</a>
            </li>
            <li class='nav-item mr-2'>
              <a href='accountbeheer.php'>Account beheer</a>
              </li>
            <li class='nav-item'>
              <a href='testpagina.php'>Test pagina</a>
              </li>
            </ul>
          </nav>
        </header>
      ";
    }
  }
?>