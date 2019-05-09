<?php

echo 
"
<hr>
<div class='container'>
  <div class='row tabelnaam'>
      <div class='col-md project' style='background-color: darkgray'>
          Maandag
        </div>
      <div class='col-md begin' style='background-color: darkgray'>
        Begin
      </div>
      <div class='col-md eind' style='background-color: darkgray'>
        Eind
      </div>
      <div class='col-md pauze' style='background-color: darkgray'>
        Pauze
      </div>
      <div class='col-md status' style='background-color: darkgray'>
          Status
        </div>
      <div class='col-md opslaan' style='background-color: darkgray'>
        Opslaan
      </div>
    </div>

<!-- inputvelden-->
    <div class='row inputvelden'>
        <div class='col-md project-select' style='background-color: rgb(236, 236, 236)'>
            <select>
              <option value='1'>Project 1</option>
              <option value='2'>Project 2</option>
              <option value='3'>Project 3</option>
            </select>
        </div>
        <div class='col-md begin-input' style='background-color: rgb(236, 236, 236)'>
            <input class='time' type='text' placeholder='Begin'></input>
        </div>
        <div class='col-md eind-input' style='background-color: rgb(236, 236, 236)'>
            <input class='time' type='text' placeholder='Eind'></input>
        </div>
        <div class='col-md pauze-input' style='background-color: rgb(236, 236, 236)'>
            <input type='text' placeholder='Minuten'></input>
        </div>
        <div class='col-md status-label' style='background-color: rgb(236, 236, 236)'>
            <label class='goedkeuring'>In afwachting</label>
        </div>
        <div class='col-md opslaan-button' style='background-color: rgb(236, 236, 236)'>
            <button>Opslaan</button>
        </div>
      </div>
</div>
<hr>
</div>
";
?>