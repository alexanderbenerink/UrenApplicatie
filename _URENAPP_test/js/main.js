function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}

var time = document.getElementsByClassName('time');
for (var i = 0; i < time.length; i++) { 
  time[i].addEventListener('keyup', function (e) {; 
        var reg = /[0-9]/;
        if (this.value.length == 2 && reg.test(this.value)) this.value = this.value + ":";  
        if (this.value.length > 5) this.value = this.value.substr(0, this.value.length - 1);
    });
};
