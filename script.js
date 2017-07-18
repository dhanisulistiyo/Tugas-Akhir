setInterval(function(){
   


// The Google Geocoding API url used to get the JSON data
var server = "http://192.168.0.2:8080/";

$.getJSON(server, function (json) {

    // Set the variables from the results array
    var id = json[0].id;
    console.log('id : ', id);
    
    var temperature = json[0].temperature;
    console.log('temperature : ', temperature);
    
    var pH = json[0].pH;
    console.log('pH : ', pH);

    // Set the table td text
    $('#id').text(id);
    $('#temperature').text(temperature);
    $('#pH').text(pH);
});

$.get("date-real.php", function(Jam){
					var xJam = Jam;
					var x = document.getElementById('tempat_jam');
					x.innerHTML = xJam;
					});
					
	//setInterval(1000);
	//setTimeout("location.reload(true);",1000);
	//setTimeout(1000);
	
	}, 1000);