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
$owner = $this->vars['owner'];
$title = $this->vars['title'];
$description = $this->vars['description'];
$difficulty = $this->vars['difficulty'];
$maxParticipants = $this->vars['maxParticipants'];
$eventCategory = $this->vars['eventCategory'];
$path = $this->vars['path'];
$distance = $this->vars['distance'];
$eventId = $this->vars['eventId'];
$startDate = $this->vars['startDate'];
$endDate = $this->vars['endDate'];


$from =$this->vars['from'];
$to = $this->vars['to'];
$via = $this->vars['via'];
$datetime = $this->vars['datetime'];
$c = $this->vars['c'];
$stationsFrom = $this->vars['stationsFrom'];
$stationsTo = $this->vars['stationsTo'];
$search = $this->vars['search'];
$response = $this->vars['response'];
$userLevel = $this->vars['userLevel'];

$allParticipants = $this->vars['allParticipants'];
$participating = $this->vars['participating'];

include_once 'views/header.inc'; ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.13.0/moment.min.js"></script>
    <style>
        .graphical {
            width: 100%;
            height: 292px;
        }

        .graphicalalt {
            height: auto;
            width: 100%;
        }
    </style>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">

                </div>
                <div class="col-lg-6">
                    <?php if($participating){ ?>
                        <button data-toggle="tooltip" data-placement="top" title="You are already attending this event" style="" class="btn btn-default btn-large pull-right"><?php echo 'Already participating';?> <i class="fa fa-angle-double-right"></i></button>
                    <?php } else if(isset($userLevel) && $userLevel >= 2 ) { ?>
                        <a href="<?php echo URL_DIR ?>/sorties/inscription/<?php if (isset($eventId)) {echo $eventId;}; ?>" class="btn btn-danger btn-large pull-right"><?php echo $lang['BUTTON_PARTICIPATION_REQUEST'];?><i class="fa fa-angle-double-right"></i></a>
                    <?php } else { ?>
                            <button data-toggle="tooltip" data-placement="top" title="Vous devez être membre pour vous inscrire" style="" class="btn btn-default btn-large pull-right"><?php echo $lang['BUTTON_PARTICIPATION_REQUEST'];?> <i class="fa fa-angle-double-right"></i></button>
                    <?php } ?>
					
                    <a href="#" data-toggle="modal" data-target="#itineraire" class="btn btn-info btn-large pull-right"><?php echo $lang['BUTTON_FIND_ROUTE'];?> <i class="fa fa-angle-double-right"></i></a>
                </div>
            </div>
            <div class="service-home">
                <div class="row">
                    <div class="features-two">
                        <div class="col-md-9 no-col-margin">
                            <div id="map" class="graphical"></div>
                        </div>
                        <div class="col-md-3 no-col-margin">
                            <div class="service-social bblack">
                                <div class="service-box bviolet">
                                    <?php echo $lang['FIELD_DISTANCE'];?> <span class="pull-right">
                                    <?php if (isset($distance)) { echo round($distance,2);} else { echo "No Data";}; ?> km
                                </span>
                                </div>
                                <div class="service-box bviolet">
                                    <?php echo $lang['FIELD_ALTITUDE'];?> <span id="elevation" class="pull-right"></span>
                                </div>
                                <div class="service-box bviolet">
                                    <?php echo $lang['FIELD_DIFFICULTY'];?> <span class="pull-right">
                                <?php if (isset($difficulty)) { echo $difficulty;} else { echo "No Data";}; ?>
                            </span>
                                </div>
                                <div class="service-box bblue">
                                    <?php echo $lang['FIELD_MAX_PARTICIPANT'];?> <span class="pull-right">
                                <?php if (isset($maxParticipants)) { echo $maxParticipants;} else { echo "No Data";}; ?>
                            </span>
                                </div>
                                <div class="service-box bblue">
                                    <?php echo $lang['FIELD_CATEGORY'];?> <span class="pull-right">
                                <?php if (isset($eventCategory)) {echo $eventCategory;} else {echo "No Data";}; ?>
                            </span>
                                </div>

                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 no-col-margin">
                        <div id="chart" class="graphicalalt"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="features-two ">
                        <div class="col-md-12 col-sm-12 no-col-margin borange">
                            <div class="col-md-9 f-blockno bblue">
                                <a href="#"><i class="fa fa-briefcase"></i></a>
                                <a href="#"><h3><?php if (isset($title)) {echo $title;} else {echo "No Data";}; ?></h3></a>
                                <p>
                                    <?php if (isset($description)) {echo $description;} else {echo "No Data";}; ?>

                                </p>
                            </div>
                            <div class="col-md-3 f-block no-col-margin borange">
                                <a href="#"><i class="fa fa-envelope"></i></a>
                                <a href="#"><h3><?php echo $lang['FIELD_TRAIL_MASTER'];?></h3></a>
                                <ul class="list-unstyled">
                                    <li>
                                        <?php echo $lang['FIELD_NAME'];?>: <?php if (isset($owner)) {echo $owner->getFirstname();} else {echo "No Data";}; ?>
                                        <?php if (isset($owner)) {echo $owner->getLastname();} else {echo "No Data";}; ?>
                                    </li>
                                    <li><?php echo $lang['FIELD_EMAIL'];?>: <a href="mailto:<?php if (isset($owner)) {echo $owner->getMail();} else {echo "No Data";}; ?>"><?php if (isset($owner)) {echo $owner->getMail();} else {echo "No Data";}; ?></a></li>
                                    <li><?php echo $lang['FIELD_TELEPHONE'];?>:<?php if (isset($owner)) {echo $owner->getPhone();} else {echo "No Data";}; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <?php
                if($this->checkUser(2,"")){
                    if($this->checkEventOwner($owner->getId(),"")){ ?>
                    <div class="row">
                        <div class="col-md-12 service-list col-no-margin">
                            <form>
                                <?php
                                foreach ($allParticipants as $key=>$item){
                                    if(isset($item)){
                                        foreach ($item as $keyuser=>$it){
                                            ?>
                                            <div class="service-icon">
                                                <i class="fa fa-user bblue"></i>
                                            </div>
                                            <div class="service-content">
                                                <div class="service-home-meta">Participant <?php echo $keyuser+1;?></div>
                                                <h4><?php echo $it->getFirstname()." ".$it->getLastname();?></h4>
                                                <p>
                                                    Tel.: <?php echo $it->getPhone();?>,
                                                    Email: <a href="mailto:<?php echo $it->getMail();?>"><?php echo $it->getMail();?></a>
                                                    <select>
                                                        <option value="1" <?php if($key==1){ echo "selected";}?>>Submitted</option>
                                                        <option value="2" <?php if($key==2){ echo "selected";}?>>Accepted</option>
                                                        <option value="3" <?php if($key==3){ echo "selected";}?>>Refused</option>
                                                    </select>
                                                </p>
                                            </div>
                                            <hr />
                                        <?php }
                                    }
                                } ?>
			
                            </form>
	<!-- EDIT EVENT -->							
							<?php
						if($_SESSION['user']->getId() == $owner->getId()){ ?>
							<form action="<?php echo URL_DIR.'/sorties/ajoutsortie' ?>" method="post">
								<input type=hidden name="id" value="<?php echo $eventId;?>">
								<button type="submit" class="btn btn-large bgreen ">Modifier la course <i class="fa fa-angle-double-right"></i></button>
							</form>
						<?php } ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
				<?php
                    } else {
                        ?>
                        <div class="row">
                            <div class="col-md-12 service-list col-no-margin">
                                    <?php
                                    foreach ($allParticipants as $key=>$item){
                                        if(isset($item)){
                                            foreach ($item as $keyuser=>$it){
                                                ?>
                                                <div class="service-icon">
                                                    <i class="fa fa-user bblue"></i>
                                                </div>
                                                <div class="service-content">
                                                    <div class="service-home-meta">Participant <?php echo $keyuser+1;?></div>
                                                    <h4><?php echo $it->getFirstname()." ".$it->getLastname();?></h4>
                                                    <p></p>
                                                </div>
                                                <hr />
                                            <?php }
                                        }
                                    } ?>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                <?php
                    }

                }  ?>
            </div>
        </div>
    </div>


    <!-- Transport -->

<?php
if($response != false){
    ?>
    <script type="text/javascript">
        $(window).load(function(){
            $('#itineraire').modal('show');
        });
    </script>
<?php } ?>

    <script>
        $(function () {

            function reset() {
                $('table.connections tr.connection').show();
                $('table.connections tr.section').hide();
            }
            $('table.connections tr.connection').bind('click', function (e) {
                reset();
                var $this = $(this);
                $this.hide();
                $this.nextAll('tr.section').show();
                if ('replaceState' in window.history) {
                    history.replaceState({}, '', '?' + $('.pager').serialize() + '&c=' + $this.data('c'));
                }
            });
            $('.station input').bind('focus', function () {
                var that = this;
                setTimeout(function () {
                    that.setSelectionRange(0, 9999);
                }, 10);
            });
            $('#itineraire').on('shown.bs.modal', function () {
                if (navigator.geolocation) {
                    if (!$('input[name=from]').val()) {
                        $('input[name=from]').attr('placeholder', 'Locating...');
                        var i = 0;
                        var interval = setInterval(function () {
                            i = (i + 1) % 4;
                            var message = 'Locating';
                            for (var j = 0; j < i; j++) {
                                message += '.';
                            }
                            $('input[name=from]').attr('placeholder', message);
                        }, 400);
                        // get location for from

                        var watch = navigator.geolocation.watchPosition(function (position) {
                            if (position.coords.accuracy < 100) {
                                // stop locating
                                navigator.geolocation.clearWatch(watch);
                                var lat = position.coords.latitude;
                                var lng = position.coords.longitude;
                                $.get('http://transport.opendata.ch/v1/locations', {x: lat, y: lng}, function(data) {
                                    clearInterval(interval);
                                    $('input[name=from]').attr('placeholder', 'From');
                                    $(data.stations).each(function (i, station) {
                                        if (!$('input[name=from]').val()) {
                                            $('input[name=from]').val(station.name);
                                        }
                                        return false;
                                    });
                                });
                            }
                        }, function(error) {

                        }, {
                            enableHighAccuracy:true,
                            maximumAge: 10000,
                            timeout: 30000
                        });
                    }
                }

            })
        });

    </script>

    <div id="itineraire" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Trouver itinéraire</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="from" value="<?php echo htmlentities($from, ENT_QUOTES, 'UTF-8'); ?>" placeholder="From" autocapitalize="on" />
                                    <?php $i = count($stationsFrom); if ($i > 0): ?>
                                        <p>
                                            Did you mean:
                                            <?php foreach ($stationsFrom as $station): ?>
                                                <a href="details?<?php echo htmlentities(http_build_query(['from' => $station, 'to' => $to, 'datetime' => $datetime]), ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlentities($station, ENT_QUOTES, 'UTF-8'); ?></a><?php if ($i-- > 1): ?>, <?php endif; ?>
                                            <?php endforeach ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <input type="text" name="to" class="form-control" value="<?php echo htmlentities($to, ENT_QUOTES, 'UTF-8'); ?>" placeholder="To" autocapitalize="on" autofocus />
                                    <?php $i = count($stationsFrom); if ($i > 0): ?>
                                        <p>
                                            Did you mean:
                                            <?php foreach ($stationsTo as $station): ?>
                                                <a href="details?<?php echo htmlentities(http_build_query(['from' => $from, 'to' => $station, 'datetime' => $datetime]), ENT_QUOTES, 'UTF-8'); ?>"><?php echo htmlentities($station, ENT_QUOTES, 'UTF-8'); ?></a><?php if ($i-- > 1): ?>, <?php endif; ?>
                                            <?php endforeach ?>
                                        </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <input type="datetime-local" class="form-control" name="datetime" value="<?php echo htmlentities($datetime, ENT_QUOTES, 'UTF-8'); ?>" placeholder="Date and time (optional)" step="300" />
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Search" />
                                    <!--<a class="btn btn-link" href="sorties/details/<?php if (isset($eventId)) {echo $eventId;} else {echo "";}; ?>">Clear</a>-->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <?php if ($search && $response->connections): ?>
                    <table class="table connections">
                        <colgroup>
                            <col width="20%">
                            <col width="57%">
                            <col width="23%">
                        </colgroup>
                        <thead>
                        <tr>
                            <th>Time</th>
                            <th>Journey</th>
                            <th>
                                <span class="visible-xs-inline">Pl.</span>
                                <span class="hidden-xs">Platform</span>
                            </th>
                        </tr>
                        </thead>
                        <?php $j = 0; ?>
                        <?php foreach ($response->connections as $connection): ?>
                            <?php $j++; ?>
                            <tbody>
                            <tr class="connection"<?php if ($j == $c): ?> style="display: none;"<?php endif; ?> data-c="<?php echo $j; ?>">
                                <td>
                                    <?php echo date('H:i', strtotime($connection->from->departure)); ?>
                                    <?php if ($connection->from->delay): ?>
                                        <span style="color: #a20d0d;"><?php echo '+'.$connection->from->delay; ?></span>
                                    <?php endif; ?>
                                    <br/>
                                    <?php echo date('H:i', strtotime($connection->to->arrival)); ?>
                                    <?php if ($connection->to->delay): ?>
                                        <span style="color: #a20d0d;"><?php echo '+'.$connection->to->delay; ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php echo (substr($connection->duration, 0, 2) > 0) ? htmlentities(trim(substr($connection->duration, 0, 2), '0')).'d ' : ''; ?>
                                    <?php echo htmlentities(trim(substr($connection->duration, 3, 1), '0').substr($connection->duration, 4, 4)); ?>′<br/>
                                    <span class="muted">
                                    <?php echo htmlentities(implode(', ', $connection->products)); ?>
                                    </span>
                                </td>
                                <td>
                                    <?php if ($connection->from->prognosis->platform): ?>
                                        <span style="color: #a20d0d;"><?php echo htmlentities($connection->from->prognosis->platform, ENT_QUOTES, 'UTF-8'); ?></span>
                                    <?php else: ?>
                                        <?php echo htmlentities($connection->from->platform, ENT_QUOTES, 'UTF-8'); ?>
                                    <?php endif; ?>
                                    <br/>
                                    <?php if ($connection->capacity2nd > 0): ?>
                                        <small title="Expected occupancy 2nd class">
                                            <?php for ($i = 0; $i < 3; $i++): ?>
                                                <?php if ($i < $connection->capacity2nd): ?>
                                                    <span class="glyphicon glyphicon-user text-muted"></span>
                                                <?php else: ?>
                                                    <span class="glyphicon glyphicon-user text-disabled"></span>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                        </small>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php $i = 0; foreach ($connection->sections as $section): ?>
                                <tr class="section"<?php if ($j != $c): ?> style="display: none;"<?php endif; ?>>
                                    <td rowspan="2">
                                        <?php echo date('H:i', strtotime($section->departure->departure)); ?>
                                        <?php if ($section->departure->delay): ?>
                                            <span style="color: #a20d0d;"><?php echo '+'.$section->departure->delay; ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php echo htmlentities($section->departure->station->name, ENT_QUOTES, 'UTF-8'); ?>
                                    </td>
                                    <td>
                                        <?php if ($section->departure->prognosis->platform): ?>
                                            <span style="color: #a20d0d;"><?php echo htmlentities($section->departure->prognosis->platform, ENT_QUOTES, 'UTF-8'); ?></span>
                                        <?php else: ?>
                                            <?php echo htmlentities($section->departure->platform, ENT_QUOTES, 'UTF-8'); ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr class="section"<?php if ($j != $c): ?> style="display: none;"<?php endif; ?>>
                                    <td style="border-top: 0; padding: 4px 8px;">
                                        <span class="muted">
                                        <?php if ($section->journey): ?>
                                            <?php echo htmlentities($section->journey->name, ENT_QUOTES, 'UTF-8'); ?>
                                        <?php else: ?>
                                            Walk
                                        <?php endif; ?>
                                        </span>
                                    </td>
                                    <td style="border-top: 0; padding: 4px 8px;">
                                        <small title="Expected occupancy 2nd class">
                                            <?php if ($section->journey && $section->journey->capacity2nd > 0): ?>
                                                <?php for ($i = 0; $i < 3; $i++): ?>
                                                    <?php if ($i < $section->journey->capacity2nd): ?>
                                                        <span class="glyphicon glyphicon-user text-muted"></span>
                                                    <?php else: ?>
                                                        <span class="glyphicon glyphicon-user text-disabled"></span>
                                                    <?php endif; ?>
                                                <?php endfor; ?>
                                            <?php endif; ?>
                                        </small>
                                    </td>
                                </tr>
                                <tr class="section"<?php if ($j != $c): ?> style="display: none;"<?php endif; ?>>
                                    <td style="border-top: 0;">
                                        <?php echo date('H:i', strtotime($section->arrival->arrival)); ?>
                                        <?php if ($section->arrival->delay): ?>
                                            <span style="color: #a20d0d;"><?php echo '+'.$section->arrival->delay; ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td style="border-top: 0;">
                                        <?php echo htmlentities($section->arrival->station->name, ENT_QUOTES, 'UTF-8'); ?>
                                    </td>
                                    <td style="border-top: 0;">
                                        <?php if ($section->arrival->prognosis->platform): ?>
                                            <span style="color: #a20d0d;"><?php echo htmlentities($section->arrival->prognosis->platform, ENT_QUOTES, 'UTF-8'); ?></span>
                                        <?php else: ?>
                                            <?php echo htmlentities($section->arrival->platform, ENT_QUOTES, 'UTF-8'); ?>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        <?php endforeach; ?>
                    </table>

                    <?php $datetime = $datetime ?: date('Y-m-d H:i:s'); ?>
                </div>
                <form class="pager">
                    <input type="hidden" name="from" value="<?php echo htmlentities($from, ENT_QUOTES, 'UTF-8'); ?>" />
                    <input type="hidden" name="to" value="<?php echo htmlentities($to, ENT_QUOTES, 'UTF-8'); ?>" />
                    <input type="hidden" name="datetime" value="<?php echo htmlentities($datetime, ENT_QUOTES, 'UTF-8'); ?>" />
                    <input type="hidden" name="page" value="<?php echo htmlentities($page + 1, ENT_QUOTES, 'UTF-8'); ?>" />
                </form>
                <?php endif; ?>
            </div>
        </div>

    </div>
    </div>
    <script>

        var map = null;
        var trailShape = null;
        var elevator = null;
        var PlanCoordinates = null;

        function initMap() {
            var mapCanvas = document.getElementById('map');
            elevator = new google.maps.ElevationService();
            google.charts.load('current', {'packages': ['corechart'], 'callback': drawCharts});
            PlanCoordinates = <?php echo(strlen($path) > 0 ? $path : '[]'); ?>;

            var mapOptions = {
                center: (PlanCoordinates.length > 0 ? PlanCoordinates[0] : {lat: 46.307174, lng: 7.473367}),
                mapTypeId: 'terrain'
				
            };

            map = new google.maps.Map(mapCanvas, mapOptions);
        }
		
        function drawCharts(){
            trailShape = new google.maps.Polyline({
                path: PlanCoordinates,
                strokeColor: '#FF0000',
                map: map
            });
			
			//center map and zoom to fit path
			var bounds = new google.maps.LatLngBounds();
			for(var i = 0; i < PlanCoordinates.length; i++){
				bounds.extend(PlanCoordinates[i]);
			}
			if(bounds.length > 0){
				
			}
			map.setCenter(bounds.getCenter());
			map.fitBounds(bounds);

            elevator.getElevationAlongPath({
                'path': PlanCoordinates,
                'samples': 256
            }, plotElevation);

        }


        function plotElevation(elevations, status) {
            var chartCanvas = document.getElementById("chart");
            if (status !== 'OK') {
                chartCanvas.innerHTML = "error " + status;
                return;
            }

            var chart = new google.visualization.ComboChart(chartCanvas);
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'title');
            data.addColumn('number', 'Altitude');
            data.addColumn('number', 'Sommet');
            data.addColumn('number', 'Départ');
			
			//get highest point
			var max = 0;
			for (var i = 0; i < elevations.length; i++)
				if(elevations[i].elevation > elevations[max].elevation)
					max = i;
			
			//draw chart
            for (var i = 0; i < elevations.length; i++) {
                data.addRow([(i == max || i == 0 ? 'Altitude' : ''), 
							 Math.round(elevations[i].elevation), 
							 (i == max ? Math.round(elevations[max].elevation) : null), 
							 (i == 0 ? Math.round(elevations[0].elevation) : null)]);	
			}
			

            chart.draw(data, {
                height: 150,
                legend: 'none',
                titleY: 'Altitude (m)',
				hAxis: {title: ''},
				seriesType: 'line',
                series: {
                    0: {color: '#1171A3'},
					
					1: {
						type: 'scatter',
						pointShape: 'star',
						pointSize: 15
						},
					2: {
						type: 'scatter',
						color: 'green',
						pointShape: 'circle',
						pointSize: 10}
						},
                backgroundColor: '#E4E4E4'
            });
			
			this.calculateDenivele(elevations);

        }
		
		function calculateDenivele(elevations){
			if(elevations.length > 0){
				var lowest = elevations[0].elevation;
				var highest = lowest;

				for(var i = 0; i < elevations.length ; i++){
					if(elevations[i].elevation > highest)
						highest = elevations[i].elevation;
					else if(elevations[i].elevation < lowest){
						lowest = elevations[i].elevation;
					}
				}
				document.getElementById('elevation').innerHTML = Math.round(highest-lowest) + "m";
			}
		}

    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js" async defer></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfHSiXZQseH8j-pPHb9PiWwvGvpOUSDGw&callback=initMap"
            async defer></script>

<?php
include_once 'views/footer.inc';