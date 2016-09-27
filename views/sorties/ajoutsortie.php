<?php
/**
 * Created by PhpStorm.
 * User: Trah
 * Date: 27/09/2016
 * Time: 08:48
 */

include_once  'views/header.inc'; ?>
<style>
	.formgroup{
		margin-top: 10px;
		margin-bottom: 15px;
	}
	
	.formgroup p{
		font-size: 15pt !important;
		
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-5 col-xs-1">
			<form>
				<div class="formgroup">
					<p>Titre de la randonnée</p>
					<input name="title" type="text" required>
				</div>
				<div class="formgroup">
					<p>Nombre de personnes max</p>
					<input name="maxParticipants" type="number" min="1" required>
				</div>
				<div class="formgroup">
					<p>Difficulté</p>
					<select name="difficulty" required>
						<option value="1">Débutant</option>
						<option value="2">Modéré</option>
						<option value="3">Avancé</option>
						<option value="4">Très Avancé</option>
						<option value="5">Professionnel</option>
					</select>
				</div>
				<div class="formgroup">
					<p>Date/Heure de début</p>
					<input id="startDate" name="startDate" type="date" required> 
					<input name="startTime" type="time" required>
				</div>
				<div class="formgroup">
					<p>Date/Heure de fin</p>
					<input id="#endDate" name="endDate" type="date" required>
					<input name="endTime" type="time">
				</div>
				<div class="formgroup">
					<p>Description</p>
					<textarea rows="6" cols="50" name="description"></textarea>
				</div>
		</div>
		<div class="col-md-7 col-xs-10 text-center">
			<div class="formgroup">
				<h2>Parcours</h2>
				<p>cliquez sur la carte pour dessiner le parcours</p>
				<p/>
				<input id="geocodeInput" type=text placeholder="Entrer un lieu"></textarea><button id="searchGeo">Go</button>
				<div id="map" style="width:100%; height:400px; margin-top:10px"></div>
			</div>
		</div>
	</div>
	<div class="row" style="margin-bottom:50px">
		<div class="col-md-12 text-center">
			<input type="submit">
			</form>
		</div>
	</div>
</div>
<script>
      function initMap() {
		  
		  	var mapCanvas = document.getElementById('map');
			var mapOptions = {
				center: {lat: 46.307174, lng: 7.473367},
				zoom: 9,
				mapTypeId: 'terrain'
			};
		  	var map = new google.maps.Map(mapCanvas, mapOptions);
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfHSiXZQseH8j-pPHb9PiWwvGvpOUSDGw&callback=initMap"
    async defer></script>


<?php
include_once 'views/footer.inc';