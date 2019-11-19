
<!DOCTYPE html>

<html>

<body>


<h1>GeeksForGeeks</h1>  
  
    <h2>DOM Input Text value Property</h2>  
  
    <input type="text" id="text_id" value="holi">  
      
  
      
    <button onclick="myGeeks()">Click Here!</button>  
      
    <p id="GFG" style="font-size:20px;"></p>  
      
    <!-- Script to set Input Text value Property-->
     


<button onclick="getLocation()">Obtener Coordenadas</button>

<p hidden id="demo" ></p>
<!--<button onclick="myFunction()">Try it</button>-->
<script>
var y = document.getElementById("demo");

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(myFunction);
  } else { 
    y.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function myGeeks() {  
            var txt = document.getElementById("text_id").value 
                    = "hola";  
        }
function myFunction(position) {

	var x = document.createElement("INPUT");
   	x.setAttribute("type", "text");
  	x.setAttribute("value", y.innerHTML=(position.coords.latitude +"  "+ position.coords.longitude));
  	document.body.appendChild(x);
}


</script>

</body>
</html>
