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

		infowindow = new google.maps.InfoWindow();
		
		for (var point in startPoints){
			if(startPoints[point].path != null){
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
					infowindow.setContent(event.title);
					infowindow.open(map, pin);
				});
	}
	
	function showEventDetails(event, map, marker){
		
	}
	
	function decodeHTML(html){
		var txt = document.createElement("textarea");
    	txt.innerHTML = html;
    	return txt.value;
	}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfHSiXZQseH8j-pPHb9PiWwvGvpOUSDGw&callback=initMap"
    async defer></script>
<?php include_once ROOT_DIR.'views/footer.inc';
?>