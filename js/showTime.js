const clockDiv =  document.getElementById('clock');

function updateClock() {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        clockDiv.innerHTML = this.responseText;
        setTimeout(updateClock, 1000);
      }
    };
    xmlhttp.open("GET","ajax/showTime.php",true);
    xmlhttp.send();
}
updateClock(); // initial call