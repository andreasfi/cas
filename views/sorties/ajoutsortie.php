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
		margin-bottom: 25px;
	}
	
	.formgroup p{
		font-size: 15pt !important;
		
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-3 col-xs-1"></div>
		<div class="col-md-6 col-xs-10 text-center">
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
				<div id="#map" style="width:100%; height:250px;"></div>
			</form>
		</div>
		<div class="col-ms-3 col-xs-1"></div>
	</div>
</div>
<script>
	var map;
	function initMap() {
		map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: -34.397, lng: 150.644},
			zoom: 8
		});
	}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAR9yaAK5avHng7msvuDKUMtWGa_hDnAVA&callback=initMap"
    async defer></script>
<?php
include_once 'views/footer.inc';