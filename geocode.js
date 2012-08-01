var geocoder, map, marker,congressInitialized = false;

function congressInitialize(){

	/*if(!congressInitialized)
	{*/
	var latlng = new google.maps.LatLng(38.8987149,-77.03765550000003);
	var options = {
		zoom: 15,
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
		
	map = new google.maps.Map(document.getElementById("map_canvas"), options);
		
	//GEOCODER
	geocoder = new google.maps.Geocoder();
		
	marker = new google.maps.Marker({
		map: map,
		draggable: true
	});
	
	marker.setPosition(latlng);
	
	  //Add listener to marker for reverse geocoding
	  google.maps.event.addListener(marker, 'drag', function() {
		document.getElementById('jloader').style.visibility = "visible";
		
		geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
		  if (status == google.maps.GeocoderStatus.OK) {
			if (results[0]) {
				  document.getElementById("congress_address").value = results[0].formatted_address;
				   var url = geo_json+"?lat="+results[0].geometry.location.lat()+"&lon="+results[0].geometry.location.lng();
				 getCongressData(url);
			}
		  }
		});
	  });
  
			

	document.getElementById("congress_address").onkeyup = function(){
		document.getElementById("congress_address").className = "";
	};
	
		/*congressInitialized = true;
	}*/
	
}

function getCongressFromAddress(f)
{
	var address = f.congress_address.value;
	
	if(!address || address == "" || address.length == 0)
	{
		document.getElementById("congress_address").className = "error";
		alert("Missing Address!");
		return false;
	}
	
	
	document.getElementById('jloader').style.visibility = "visible";
	
	geocoder.geocode( { 'address': address}, function(results, status) {
		  if (status == google.maps.GeocoderStatus.OK)
		  {
			
			//var location = new google.maps.LatLng(results[0].geometry.location.$a, results[0].geometry.location.ab);
			marker.setPosition(results[0].geometry.location);
			map.setCenter(results[0].geometry.location);
			
			 var url = geo_json+"?lat="+results[0].geometry.location.lat()+"&lon="+results[0].geometry.location.lng();
			 getCongressData(url);
		  }
		  else
		  {
			document.getElementById('jloader').style.visibility = "hidden";
			alert('Couldn\'t find the address');
		  }
	});
	
	return false;
}

function getCongressData(url)
{
	var xhr = false;
	
	if (window.ActiveXObject)
		xhr = new ActiveXObject("Microsoft.XMLHTTP");
	else 
		xhr = new XMLHttpRequest();

	xhr.open("GET",url,true); 
	xhr.send(null);
	
	xhr.onreadystatechange = function () {
		if (xhr.readyState == 4 && xhr.status == 200)
		{
			if(xhr.responseText != "Error1" && xhr.responseText != "Error2")
			{
				document.getElementById('jloader').style.visibility = "hidden";
				document.getElementById('congress_holder').innerHTML = xhr.responseText;
			}
			else
			{
				document.getElementById('jloader').style.visibility = "hidden";
				alert('Address or zip code not found.  Please try again..');
			}
		}
	};
}



window.onload = function()
{
	congressInitialize();
};