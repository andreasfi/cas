
<?php
/**
 * Created by PhpStorm.
 * User: Trah
 * Date: 27/09/2016
 * Time: 08:48
 */
$msg = $this->vars['msg'];
$pageTitle = $this->vars['pageTitle'];
$pageMessage = $this->vars['pageMessage'];
include_once ROOT_DIR.'views/header.inc'; 
$event = null;
if(isset($_SESSION['event'])){
	$event = $_SESSION['event'];
	unset($_SESSION['event']);
}
?>


<style>
	.formgroup{
		margin-top: 	10px;
		margin-bottom: 	15px;
	}
	
	.formgroup p{
		font-size: 15pt !important;
		
	}
	
	.graphical{
		width:	100%;
		height:	300px; 
		margin:	10px 0
	}
</style>

<div class="container">
	
	<form method="post" action="<?php echo URL_DIR.'/sorties/ajoutsortie' ?>">
	<div class="row">
		<br>
		<div class="col-md-5 col-xs-1 cwell">

				<div class="row">
					<div class="col-md-8 formgroup">
						<label><?php echo $lang['TRAIL_TITLE'] ?></label>
						<input id="title" class="form-control" name="title" type="text" required style="width:100%" value="<?php echo ($event==null ? "" : $event->getTitle()); ?>">
					</div>
					<div class="col-md-4 formgroup">
						<label><?php echo $lang['TRAIL_MAX_PEOPLE'] ?></label>
						<input id="maxParticipants" class="form-control" name="maxParticipants" type="number" min="1" required style="width:100%;" value="<?php echo($event==null?"":$event->getMaxParticipants()); ?>">
					</div>
				</div>
				<div class="row">
					<div class="formgroup col-sm-6">
						<label><?php echo $lang['TRAIL_CATEGORY'] ?></label>
						
						<select id="category" class="form-control pick-input" name="category" required>
							<option value="1" <?php echo($event!=null && $event->getEventCategory() == 'Marche' ? "selected='selected'": ""); ?>><?php echo $lang['TRAIL_CAT_1'] ?></option>
							<option value="2" <?php echo($event!=null && $event->getEventCategory() == 'Peau de Phoque' ? "selected='selected'": ""); ?>><?php echo $lang['TRAIL_CAT_2'] ?></option>
							<option value="3" <?php echo($event!=null && $event->getEventCategory() == 'Grimpe' ? "selected='selected'": ""); ?>><?php echo $lang['TRAIL_CAT_3'] ?></option>
							<option value="4" <?php echo($event!=null && $event->getEventCategory() == 'Raquettes' ? "selected='selected'": ""); ?>><?php echo $lang['TRAIL_CAT_4'] ?></option>
							<option value="5" <?php echo($event!=null && $event->getEventCategory() == 'Ski' ? "selected='selected'": ""); ?>><?php echo $lang['TRAIL_CAT_5'] ?></option>
							<option value="6" <?php echo($event!=null && $event->getEventCategory() == 'Snowboard' ? "selected='selected'": ""); ?>><?php echo $lang['TRAIL_CAT_6'] ?></option>
							<option value="7" <?php echo($event!=null && $event->getEventCategory() == 'Télémark' ? "selected='selected'": ""); ?>><?php echo $lang['TRAIL_CAT_7'] ?></option>
							<option value="8" <?php echo($event!=null && $event->getEventCategory() == 'Ski de fond' ? "selected='selected'": ""); ?>><?php echo $lang['TRAIL_CAT_8'] ?></option>
						</select>
					</div>
					<div class="formgroup col-sm-6">
						<label><?php echo $lang['TRAIL_DIFFICULTY']?></label>
						<select id="difficulty" class="form-control pick-input" name="difficulty" required>
							<option value="1" <?php echo($event!=null && $event->getDifficulty() == 'débutant' ? "selected='selected'": ""); ?>><?php echo $lang['TRAIL_DIFF_1'] ?></option>
							<option value="2" <?php echo($event!=null && $event->getDifficulty() == 'modéré' ? "selected='selected'": ""); ?>><?php echo $lang['TRAIL_DIFF_2'] ?></option>
							<option value="3" <?php echo($event!=null && $event->getDifficulty() == 'avancé' ? "selected='selected'": ""); ?>><?php echo $lang['TRAIL_DIFF_3'] ?></option>
							<option value="4" <?php echo($event!=null && $event->getDifficulty() == 'très avancé' ? "selected='selected'": ""); ?>><?php echo $lang['TRAIL_DIFF_4'] ?></option>
							<option value="5" <?php echo($event!=null && $event->getDifficulty() == 'professionnel' ? "selected='selected'": ""); ?>><?php echo $lang['TRAIL_DIFF_5'] ?></option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="formgroup col-sm-6">
						<p><?php echo $lang['TRAIL_STARTDATE']?></p>
						<input id="startDate" class="form-control" name="startDate" type="text" required onchange="adjustEndTime()" value="<?php echo($event==null?"":$event->getStartDateFormattedJS()); ?>">
					</div>
					<div class="formgroup col-sm-6">
						<p><?php echo $lang['TRAIL_ENDDATE']?></p>
						<input id="endDate" class="form-control" name="endDate" type="text" required required value="<?php
						echo($event==null?"":$event->getEndDateFormattedJS()); ?>">
					</div>
				</div>

				<div class="formgroup">
					<p><?php echo $lang['TRAIL_DESCRIPTION']?></p>
					<textarea id="description" class="form-control" rows="6" cols="50" name="description"><?php
	echo($event==null?"":$event->getDescription()); ?></textarea>
				</div>
		</div>
		<div class="col-md-7 col-xs-10 text-center">
			<div class="formgroup">
				<h2><?php echo $lang['TRAIL_MAP']?></h2>
				<div id="trailIndication">
					<p style="font-size:12px !important;"><?php echo $lang['TRAIL_MAP_INSTRUCTIONS']?></p>
					<button type="button" class="btn btn-warning" onclick="removeLastPoint()"><?php echo $lang['TRAIL_MAP_DELETELAST']?></button>
					<button type="button" onclick="removeAllPoints()" class="btn btn-danger"><?php echo $lang['TRAIL_MAP_DELETEALL']?></button>
				</div>
				<div id="map" class="graphical"></div>
				<div id="chart" class="graphical" style="height:150px; display: none"></div>
			</div>
		</div>
	</div>
	<div class="row" style="margin-bottom:50px">
		<div class="col-md-4"></div>
		<div class="col-md-<?php echo(isset($event) ? 2 : 4) ?> text-center">
			<input id="form_json" name="JSON" type="hidden" value='<?php echo($event==null?"":$event->getPath()); ?>'>
			<?php if ($event!= null){ ?>
			<input class="btn btn-success" name="edit_event" type=hidden value="<?php echo $event->getId(); ?>">
			<?php } ?>
			<input class="btn btn-success" type="submit" value="<?php echo(isset($event) ? $lang['TRAIL_MAP_UPDATETRAIL']  : $lang['TRAIL_MAP_SAVETRAIL']); ?>">
			</form>
		</div>
		<?php if(isset($event)){ ?>
			<div class="col-md-2 text-center">
				<form method="post" action="<?php echo URL_DIR.'/sorties/ajoutsortie'?>">
					<input type=hidden name="delete_event" value="<?php echo $event->getId(); ?>">
					<input type="submit" class="btn btn-danger" value="<?php echo $lang['TRAIL_MAP_DELETETRAIL'];?>">
				</form>
			</div>
		<?php } ?>
	</div>
</div>

<!-- Google Visualizations -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
	
	
	//declare all our JS objects for the map and elevation chart
	var map = null;
	var addressMarker = null;
	var trailPoints = [];
	var trailShape = null;
	var elevator = null;
	var chart = null;

	//on document load, do a few things:
	$(document).ready(function(){
		
		//datepickers set to current day
		jQuery('#startDate').datetimepicker({
			minDate: '0'
		});
		
		jQuery('#endDate').datetimepicker({
			minDate: '0'
		});
		
		//look if we already have some data in the JSON trail (we are editing the event)
		if($('#form_json').val() != ""){
			
			//load them into the trailPoints
			trailPoints = loadJSON($('#form_json').val());
			
			//draw elevation chart
			google.charts.load('current', {'packages':['corechart'], 'callback': drawCoordinates});//drawCoordinates();
			
			//fit map to bounds
			fitMapToBounds();
		}
		
	});
	
	//all things Google Maps:
	function initMap() {
		//initialize map canvas, and elevation services
		var mapCanvas = document.getElementById('map');
		elevator = new google.maps.ElevationService();
		
		//center map in center of valais, and zoom to fit
		var mapOptions = {
			center: {lat: 46.307174, lng: 7.473367},
			zoom: 9,
			mapTypeId: 'terrain' //so we can see altitude lines (better for mountaineers)
		};
		
		//create map from options
		map = new google.maps.Map(mapCanvas, mapOptions);
		
		//add click listeners to add points
		google.maps.event.addListener(map, 'click', function(event){
			clickMap(event.latLng);
		});
		      
		//load google charts library to draw elevation chart
		google.charts.load('current', {'packages':['corechart']});
      }
	
	function drawCoordinates(){
		//draw the trail on the map, first check if trail exists
		//if it does, set map to null so we get a clean start
		if(trailShape)
			trailShape.setMap(null);
			
		//draw the line again with the new path
		trailShape = new google.maps.Polyline({
			path: trailPoints,
			strokeColor: '#FF0000',
			map: map
		});
		
		//same with the address marker, clean start
		if(addressMarker)
			addressMarker.setMap(null);
		
		//set it to the last point of the list of points
		addressMarker = new google.maps.Marker({
			position: trailPoints[trailPoints.length-1],
			map: map
		});
		
		//update the JSON in the HTML form if the user wants to save.
		document.getElementById('form_json').value = JSON.stringify(trailPoints);
		
		//if we have more than 2 points, we calculate the elevation graph
		if (trailPoints.length >= 2){
			$("#chart").slideDown(100);
			calculateElevation(getJSON(trailPoints));
		}
	}
    
	//listener for click
	function clickMap(clickedPoint){
		//add point to list of points
		trailPoints.push(clickedPoint);
		
		//update the trail drawing on the map
		drawCoordinates();
	}
	
	//method to convert the list of GooglePoints to a properly formatted JSON.
	function getJSON(points){
		var output = [];
		
		//convert each point to a nice JSON object
		for(var i = 0; i < points.length; i++){
			var line = null;
			line = {
				lat: points[i].lat(),
				lng: points[i].lng()
			};
			//add it to the array
			output.push(line);
		}
		return output;
	}
	
	//inverse of the previous method, load JSON into GooglePoints.
	function loadJSON(points){
		var output = [];
		var pointsJSON = JSON.parse(points);
		//loop over each point, and load lat / lng 
		for(var i = 0; i < pointsJSON.length; i++){
			var pt = new google.maps.LatLng(pointsJSON[i].lat, pointsJSON[i].lng)
			output.push(pt);
		}
		return output;
	}
	
	/*this method calls the google elevation service, asking
	to get the elevation along the path we have. the service returns
	256 points and their respective elevation. The callback method 
	will do the actual plotting of the elevation.
	*/
	function calculateElevation(points){
		//if we have more than 512 points, we trim the data to have only 512 points.
		if(points.length > 512)
			points = trimTo512(points);
		if(elevator){
			elevator.getElevationAlongPath({
				'path': points,
				'samples': 256
			}, plotElevation);
		}
	}
	
	
		function trimTo512(coordinates){
			//since google elevation services only allows 512 points, if there are more, we have to remove points
			//evenly throughout the data to still represent it as evenly as possible
			
			//figure out how many data points are overflow
			var overflow = coordinates.length - 512;
			
			//we're going to divide the data into n chunks, for each chunk, we remove the middlemost value.
			var chunksize = 512 / overflow;
			
			for(var i = 0 ; i < overflow; i++){
				coordinates.pop(i*chunksize - chunksize/2);
			}
			
			return coordinates;
		}
	
	function plotElevation(elevations, status) {
		//get the canvas
		var chartCanvas = document.getElementById("chart");
		
		//if the response is not ok, write the error in the canvas
		if (status !== 'OK') {
			chartCanvas.innerHTML = "error " + status;
			return;
		}

		//we use a comboChart to combine line and scatter plots.
		var chart = new google.visualization.ComboChart(chartCanvas);
		
		//and the data needs to be fed into a dataTable before being plotted
		var data = new google.visualization.DataTable();
		data.addColumn('string', 'Sample'); 	//name
		data.addColumn('number', 'Altitude'); 	//altitude
		data.addColumn('number', 'Sommet');		//only summit gets a value in there

		//get highest point of elevations
		var max = 0;
		for (var i = 0; i < elevations.length; i++)
			if(elevations[i].elevation > elevations[max].elevation)
				max = i;

		//draw chart, with name, elevation, and if we're at the summit, the top
		for (var i = 0; i < elevations.length; i++) {
			data.addRow([(i == max ? 'Altitude' : ''), elevations[i].elevation, (i == max ? elevations[max].elevation : null)]);
		}

		//customize the plots to make the scatter prettier
		chart.draw(data, {
			height: 150,
			legend: 'none',
			titleY: 'Altitude (m)',
			seriesType: 'line',
			series: {
				0: {color: '#1171A3'},
				1: {type: 'scatter',
					pointShape: 'star',		//make it a star!
					pointSize: 15,}
					},
			backgroundColor: '#E4E4E4'
		});
	}
	
	function removeLastPoint(){
		//remove last point, redraw coordinates, and if we're above two points, recalculate charts.
		trailPoints.pop();
		drawCoordinates();
		if (trailPoints.length >= 2)
			calculateElevation(getJSON(trailPoints));
		else{
			$("#chart").slideUp();
			chart.clearChart();
		}
	}
	
	function removeAllPoints(){
		//clear array, map, and chart
		trailPoints = [];
		$("#chart").slideUp();
		drawCoordinates();
		chart.clearChart();
	}
	
	//fits the map to show all the points on the map
	function fitMapToBounds(){
		var bounds = new google.maps.LatLngBounds();
		
			//if we have many points, add points to bounds, and extend bounds
			if(trailPoints.length > 1){
				for(var i = 0; i < trailPoints.length; i++){
					bounds.extend(trailPoints[i]);
				}
				map.fitBounds(bounds);
			}else if(trailPoints.length == 1){
				
				//if we have just one point, center and zoom on that point.
				map.setCenter({lat:trailPoints[0].lat(), lng: trailPoints[0].lng()});
				map.setZoom(12);
			}
		
	}

	//when startTime is set, adjust end time to not go below start time.
	function adjustEndTime(){
		jQuery('#endDate').datetimepicker({
			minDate: $('#startDate').val()
		});
	}
	
	
	
</script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfHSiXZQseH8j-pPHb9PiWwvGvpOUSDGw&callback=initMap"
    async defer></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>



<?php
include_once 'views/footer.inc';