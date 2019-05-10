<?php

  class Header {

    public function getHeader() {
      return '
        <header>
          <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <ul class="navbar-nav">
              <li class="nav-item d-flex align-items-center mr-2">
                <img src="images/trentonlogo.png" style="width: 150px; height 200px;">
              </li>
              <li class="nav-item mr-1">
                <a class="nav-link" href="urenregistratieView.php">Urenadministratie</a>
              </li>
              <li class="nav-item mr-1">
                <a class="nav-link" href="#">Projectbeheer</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Accountbeheer</a>
              </li>
            </ul>
          </nav>
        </header>
      ';
    }

  }


  
