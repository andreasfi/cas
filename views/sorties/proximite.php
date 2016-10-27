<?php
/**
 * Created by PhpStorm.
 * User: andreasfi
 * Date: 27.09.16
 * Time: 15:18
 */


$pageTitle = $this->vars['pageTitle'];
$pageMessage = $this->vars['pageMessage'];
include_once ROOT_DIR.'views/header.inc';
?>

<style>
	#map{
		height: 500px;
		background-color: darkgrey;
	}
</style>
    <div class="content">
        <div class="container">
            <div class="row" id="map">
                
            </div>
        </div>
    </div>
<script>
	var infowindow;
	var map;
	function initMap(){
		var startPoints = '<?php echo ($this->vars['events']);?>';
		startPoints = startPoints.replace(/(?:\r\n|\r|\n)/g, '&nbsp');
		startPoints = JSON.parse(startPoints);
		var mapCanvas = document.getElementById('map');
		var mapOptions = {
				center: {lat: 46.307174, lng: 7.473367},
				zoom: 9,
				mapTypeId: 'terrain'
		  }
		  map = new google.maps.Map(mapCanvas, mapOptions);

		infowindow = new google.maps.InfoWindow({maxWidth: 300});
		
		for (var point in startPoints){
			//check if event has a trail mapped, and if it is in the future
			if(startPoints[point].path != null && Date.parse(startPoints[point].start_date) > Date.parse(new Date)){
				addPoint(startPoints[point]);	
			}
		}
	}
	
	function addPoint(event){
		var pin = new google.maps.Marker({
					position: event.path[0],
					map: map,
					title: decodeHTML(event.title)
				});
				
				google.maps.event.addListener(pin, 'click', function(){
					infowindow.close();
					infowindow.setContent(getPrettyInfo(event));
					infowindow.open(map, pin);
				});
	}
	
	function getPrettyInfo(event){
		var output = '<h3>' + decodeHTML(event.title) + '</h3>';
		output += '<p>' + event.description + '</p>';
		output += '<a href="details/' + event.id +'"> Plus d\'informations</a>'; 
		output += '<img src="https://maps.googleapis.com/maps/api/streetview?size=400x400&location='+event.path[0].lat+','+event.path[0].lng + '&fov=90&heading=235&pitch=10&key=AIzaSyAu8ca8nVd7JUvLV4RuGQJZC12tQCBVJgE">'
		return output;
	}
	
	function decodeHTML(html){
		var txt = document.createElement("textarea");
    	txt.innerHTML = html;
    	return txt.value;
	}
	
	
	
	//street view API Key AIzaSyAu8ca8nVd7JUvLV4RuGQJZC12tQCBVJgE
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfHSiXZQseH8j-pPHb9PiWwvGvpOUSDGw&callback=initMap"
    async defer></script>
<?php include_once ROOT_DIR.'views/footer.inc';
?>


