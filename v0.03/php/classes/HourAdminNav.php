<?php
  class HourAdminNav {

    public function getNav() {
      return "
        <nav>
          <a href='urenregistratie.php'>Urenregistratie</a> |
          <a href='urenoverzicht.php'>Urenoverzicht</a> |
          <a href='urenvalidatie.php'>Urenvalidatie</a> |
          <a href=''>Verlof</a>
        </nav>
      ";
    }

  }