
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
		<div class="col-md-5 col-xs-1">
				<div class="row">
					<div class="col-md-6 formgroup">
						<p><?php echo $lang['TRAIL_TITLE'] ?></p>
						<input id="title" name="title" type="text" required style="width:100%" value="<?php echo ($event==null ? "" : $event->getTitle()); ?>">
					</div>
					<div class="col-md-6 formgroup">
						<p><?php echo $lang['TRAIL_MAX_PEOPLE'] ?></p>
						<input id="maxParticipants" name="maxParticipants" type="number" min="1" required style="width:50px" value="<?php echo($event==null?"":$event->getMaxParticipants()); ?>">
					</div>
				</div>
				<div class="row">
					<div class="formgroup col-sm-6">
						<p><?php echo $lang['TRAIL_CATEGORY'] ?></p>
						
						<select id="category" name="category" required>
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
						<p><?php echo $lang['TRAIL_DIFFICULTY']?></p>
						<select id="difficulty" name="difficulty" required>
							<option value="1" <?php echo($event!=null && $event->getDifficulty() == 'débutant' ? "selected='selected'": ""); ?>><?php echo $lang['TRAIL_DIFF_1'] ?></option>
							<option value="2" <?php echo($event!=null && $event->getDifficulty() == 'modéré' ? "selected='selected'": ""); ?>><?php echo $lang['TRAIL_DIFF_2'] ?></option>
							<option value="3" <?php echo($event!=null && $event->getDifficulty() == 'avancé' ? "selected='selected'": ""); ?>><?php echo $lang['TRAIL_DIFF_3'] ?></option>
							<option value="4" <?php echo($event!=null && $event->getDifficulty() == 'très avancé' ? "selected='selected'": ""); ?>><?php echo $lang['TRAIL_DIFF_4'] ?></option>
							<option value="5" <?php echo($event!=null && $event->getDifficulty() == 'professionnel' ? "selected='selected'": ""); ?>><?php echo $lang['TRAIL_DIFF_5'] ?></option>
						</select>
					</div>
				</div>
				<div class="formgroup">
					<p><?php echo $lang['TRAIL_STARTDATE']?></p>
					<input id="startDate" name="startDate" type="text" required onchange="adjustEndTime()" value="<?php echo($event==null?"":$event->getStartDateFormattedJS()); ?>">
				</div>
				<div class="formgroup">
					<p><?php echo $lang['TRAIL_ENDDATE']?></p>
					<input id="endDate" name="endDate" type="text" required required value="<?php 
	echo($event==null?"":$event->getEndDateFormattedJS()); ?>">
				</div>
				<div class="formgroup">
					<p><?php echo $lang['TRAIL_DESCRIPTION']?></p>
					<textarea id="description" rows="6" cols="50" name="description"><?php 
	echo($event==null?"":$event->getDescription()); ?></textarea>
				</div>
		</div>
		<div class="col-md-7 col-xs-10 text-center">
			<div class="formgroup">
				<h2><?php echo $lang['TRAIL_MAP']?></h2>
				<div id="trailIndication">
					<p style="font-size:12px !important;"><?php echo $lang['TRAIL_MAP_INSTRUCTIONS']?></p>
					<button type="button" onclick="removeLastPoint()"><?php echo $lang['TRAIL_MAP_DELETELAST']?></button>
					<button type="button" onclick="removeAllPoints()"><?php echo $lang['TRAIL_MAP_DELETEALL']?></button>
				</div>
				<div id="map" class="graphical"></div>
				<div id="chart" class="graphical" style="height:150px;"></div>
			</div>
		</div>
	</div>
	<div class="row" style="margin-bottom:50px">
		<div class="col-md-4"></div>
		<div class="col-md-<?php echo(isset($event) ? 2 : 4) ?> text-center">
			<input id="form_json" name="JSON" type="hidden" value='<?php echo($event==null?"":$event->getPath()); ?>'>
			<?php if ($event!= null){ ?>
			<input name="edit_event" type=hidden value="<?php echo $event->getId(); ?>">
			<?php } ?>
			<input type="submit" <?php echo(isset($event) ? "value='UPDATE'" : ""); ?>>
			</form>
		</div>
		<?php if(isset($event)){ ?>
			<div class="col-md-2 text-center">
				<form method="post" action="<?php echo URL_DIR.'/sorties/ajoutsortie'?>">
					<input type=hidden name="delete_event" value="<?php echo $event->getId(); ?>">
					<input type="submit" value="DELETE">
				</form>
			</div>
		<?php } ?>
	</div>
</div>

<!-- Google Visualizations -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script>
	
	var map = null;
	var geocoder = null;
	var addressMarker = null;
	var trailPoints = [];
	var trailShape = null;
	var elevator = null;
	var chart = null;
	
	$(document).ready(function(){
		jQuery('#startDate').datetimepicker({
			minDate: '0'
		});
		
		jQuery('#endDate').datetimepicker({
			minDate: '0'
		});
		if($('#form_json').val() != null){
			trailPoints = loadJSON($('#form_json').val());
			drawCoordinates();
		}
	});
	
	//all things Google Maps:
	function initMap() {
		  
		  var mapCanvas = document.getElementById('map');
		  geocoder = new google.maps.Geocoder();
		  elevator = new google.maps.ElevationService();
		  var mapOptions = {
				center: {lat: 46.307174, lng: 7.473367},
				zoom: 9,
				mapTypeId: 'terrain'
		  };
		  map = new google.maps.Map(mapCanvas, mapOptions);
		google.maps.event.addListener(map, 'click', function(event){
			clickMap(event.latLng);
		});
		      google.charts.load('current', {'packages':['corechart']});

		
      }
	
	function drawCoordinates(){
		if(trailShape)
			trailShape.setMap(null);
		trailShape = new google.maps.Polyline({
			path: trailPoints,
			strokeColor: '#FF0000',
			map: map
		});
		
		if(addressMarker)
			addressMarker.setMap(null);
		addressMarker = new google.maps.Marker({
			position: trailPoints[trailPoints.length-1],
			map: map
		});
		
		document.getElementById('form_json').value = JSON.stringify(trailPoints);
		
		
		if (trailPoints.length >= 2)
			calculateElevation(getJSON(trailPoints));
	}
    
	function clickMap(clickedPoint){
		trailPoints.push(clickedPoint);
		drawCoordinates();
	}
	
	function getJSON(points){
		var output = [];
		for(var i = 0; i < points.length; i++){
			var line = null;
			line = {
				lat: points[i].lat(),
				lng: points[i].lng()
			};
			output.push(line);
		}
		return output;
	}
	
	function loadJSON(points){
		var output = [];
		var pointsJSON = JSON.parse(points);
		for(var i = 0; i < pointsJSON.length; i++){
			var pt = new google.maps.LatLng(pointsJSON[i].lat, pointsJSON[i].lng)
			output.push(pt);
		}
		return output;
	}
	
	function calculateElevation(points){
		if(elevator){
			elevator.getElevationAlongPath({
				'path': points,
				'samples': 256
			}, plotElevation);
		}
	}
	
	function plotElevation(elevations, status) {
            var chartCanvas = document.getElementById("chart");
            if (status !== 'OK') {
                chartCanvas.innerHTML = "error " + status;
                return;
            }

            var chart = new google.visualization.ComboChart(chartCanvas);
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Sample');
            data.addColumn('number', 'Altitude');
            data.addColumn('number', 'Sommet');
			
			//get highest point
			var max = 0;
			for (var i = 0; i < elevations.length; i++)
				if(elevations[i].elevation > elevations[max].elevation)
					max = i;
			
			//draw chart
            for (var i = 0; i < elevations.length; i++) {
                data.addRow([(i == max ? 'Altitude' : ''), elevations[i].elevation, (i == max ? elevations[max].elevation : null)]);
            }

            chart.draw(data, {
                height: 150,
                legend: 'none',
                titleY: 'Altitude (m)',
				seriesType: 'line',
                series: {
                    0: {color: '#1171A3'},
					1: {type: 'scatter',
						pointShape: 'star',
						pointSize: 15,}
						},
                backgroundColor: '#E4E4E4'
            });

        }
	
	function removeLastPoint(){
		trailPoints.pop();
		drawCoordinates();
		if (trailPoints.length >= 2)
			calculateElevation(getJSON(trailPoints));
		else
			chart.clearChart();
	}
	
	function removeAllPoints(){
		trailPoints = [];
		drawCoordinates();
		chart.clearChart();
	}

	//all things date time
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