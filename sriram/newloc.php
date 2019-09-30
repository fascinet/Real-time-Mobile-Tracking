<?php
$id=(isset($_POST['id']))?$_POST['id']:0;
?>
<!DOCTYPE html>
<html lang="en">
<body onload="getLocation()">
<div id="one">
<p id="demo">THANKS FOR SHARING YOUR LOCATION</p>
<p id="demo1">Click the below button to Stop Sharing location<br></p>
<button id="stop" onclick="stopCount()">Stop Sharing!</button>
</div>
<script>
var x = document.getElementById("demo");



function getLocation() {
	    if (navigator.geolocation) {
		            navigator.geolocation.getCurrentPosition(insert_data);
			        } else { 
					        x.innerHTML = "Geolocation is not supported by this browser.";
						    }
                t = setTimeout(getLocation, 3000);

}

// function redirectToPosition(position) {
// 	    document.write(position.coords.latitude);
	   
// }
function insert_data(position){

	if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
       var loc="get.php?id=1234&lat="+position.coords.latitude+'&long='+position.coords.longitude;
       xmlhttp.open("GET",loc,true);
       xmlhttp.send();
       
}

function stopCount() {
  clearTimeout(t);
  document.getElementById("demo").innerHTML="Stopped Sharing";
  document.getElementById("demo1").innerHTML="Click the below button to close the Page";
  var parent = document.getElementById("one");
  var child = document.getElementById("stop");  
  parent.removeChild(child);
  var element=document.createElement("button");
  element.type="button";
  element.innerHTML="CLOSE";
  element.onclick = function(){
    window.close();
    }
  parent.appendChild(element);

  }
</script>

</body>
</html>