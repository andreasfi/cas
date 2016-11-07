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
		<div class="container" style="margin-top:10px">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-2">
					<img src="../img/hikeicon.png" width="15px">
					<?php echo $lang['RANDONNEES'];?>
				</div>
				<div class="col-md-2">
					<img src="../img/tripicon.png" width="15px">
					<?php echo $lang['SORTIES'];?>
				</div>
				<div class="col-md-2">
					<img src="../img/oldicon.png" width="15px">
					<?php echo $lang['ANCIENEVENT'];?>
				</div>
				<div class="col-md-3"></div>
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
			//check if event has a trail mapped
			if(startPoints[point].path != null){
				addPoint(startPoints[point]);	
			}
		}
	}
	
	function addPoint(event){
		var icon = '';
		
		if(event.event_type == 'rando')
			icon = '../img/hikeicon.png';
		else
			icon = '../img/tripicon.png';
		
		var date = Date.parse(event.start_date);

		if(date < Date.now()){
			icon = '../img/oldicon.png';
		}
		
		var pin = new google.maps.Marker({
					position: event.path[0],
					map: map,
					title: decodeHTML(event.title),
					icon : icon
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
		output += '<a href="details/' + event.id +'"> Plus d\'informations</a><br>'; 
		//add image to infowindow
		calculateElevation(event.path)
		return output;
	}
	
	function decodeHTML(html){
		var txt = document.createElement("textarea");
    	txt.innerHTML = html;
    	return txt.value;
	}
	
	function calculateElevation(points){
		//first, find highest point along route
		var max = {lat: 0, lng:0};
		var elevator = new google.maps.ElevationService();
		if(points.length > 2){
			elevator.getElevationAlongPath({
				'path': points,
				'samples': 256
			}, calculateSummit);
		}else{
			//if we just have one point, calculate point elevation
			elevator.getElevationForLocations({
				'locations': [points[0]]
			}, calculateSummit);
		}
	}
	
	function calculateSummit(elevations, status){
		//find maximum
		var max = 0;
		for(var i = 0 ; i < elevations.length; i++){
			if(elevations[i].elevation > elevations[max].elevation)
				max = i;
		}
		
		setSummitPicture(elevations[max]);
	}
	
	function setSummitPicture(point){
		
		//send coordinates of summit to google to find the name
		var service = new google.maps.places.PlacesService(map);
		service.nearbySearch({
			location : point.location,
			radius : 500,
			type : ['natural_feature']
		}, findAndDisplayImage);
	}
	
	function findAndDisplayImage(results, status){
		var regex = new RegExp('" "', 'g');
		var searchTerm = (results[0].name + '+' +results[0].vicinity).replace(regex, '+');
		$.get('https://www.googleapis.com/customsearch/v1?q='+ searchTerm +'&cx=006299086801710193067%3A5_sbtpwr7km&searchType=image&key=AIzaSyAu8ca8nVd7JUvLV4RuGQJZC12tQCBVJgE', function(data, status){
			
			var image = '<a href="'+ data.items[0].link+'" target="_blank"><img style="textalign:center" src="'+ data.items[0].link +'" width="200"></a>';
			infowindow.setContent(infowindow.getContent() + image);
			infowindow.setContent(infowindow.getContent() + '<p>' +results[0].name + (results[0].vicinity != undefined ? ", " + results[0].vicinity : "") + '</p>');
			
		});

	}
	
	
	
	//street view API Key :AIzaSyAu8ca8nVd7JUvLV4RuGQJZC12tQCBVJgE
	//search engine id: 006299086801710193067:5_sbtpwr7km

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfHSiXZQseH8j-pPHb9PiWwvGvpOUSDGw&libraries=places&callback=initMap"
    async defer></script>
<?php include_once ROOT_DIR.'views/footer.inc';
?>


