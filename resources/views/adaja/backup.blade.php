<!DOCTYPE HTML>
<html>
   <head>
      <script type = "text/javascript">
         var x = document.getElementById("demo");
         function showLocation(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            var latlongvalue = position.coords.latitude + ","
                              + position.coords.longitude;
            var img_url = "https://maps.googleapis.com/maps/api/staticmap?center="+latlongvalue+"&zoom=16&size=400x500&markers="+latlongvalue+"&key=AIzaSyBEhznriNnQ-tR1xx3bCax6Nv348pQ-0Qk";
            document.getElementById("mapholder").innerHTML =
            "<img src ='"+img_url+"'>";
            x.innerHTML="Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;
         }
         function errorHandler(err) {
            if(err.code == 1) {
               alert("Error: Access is denied!");
            }else if( err.code == 2) {
               alert("Error: Position is unavailable!");
            }
         }
         function getLocation(){
            if(navigator.geolocation){
               // timeout at 60000 milliseconds (60 seconds)
               var options = {timeout:60000};
               navigator.geolocation.getCurrentPosition
               (showLocation, errorHandler, options);
            }else{
               alert("Sorry, browser does not support geolocation!");
            }
         }
      </script>
   </head>
   <body>
      <div id="mapholder"></div>
    
      <form>
         <input type="button" onclick="getLocation();" value="Your Location"/>
      </form>
      
   </body>
</html>