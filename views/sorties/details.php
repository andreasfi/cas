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


include_once 'views/header.inc'; ?>
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
                <h1 style="margin-top: 6px;"><?php if (isset($title)) {echo $title;} else {echo "No Data";}; ?></h1>
            </div>
            <div class="col-lg-6">
                <a href="sorties/inscription/<?php if (isset($eventId)) {echo $eventId;}; ?>" class="btn btn-danger btn-large pull-right">Je veux participer <i class="fa fa-angle-double-right"></i></a>
                <a href="#" class="btn btn-info btn-large pull-right">Trouver itinéraire <i class="fa fa-angle-double-right"></i></a>
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
                                Distance <span class="pull-right">
                                    <?php if (isset($distance)) { echo round($distance,2);} else { echo "No Data";}; ?> km
                                </span>
                            </div>
                            <div class="service-box bviolet">
                                Denivele <span id="elevation" class="pull-right">500m</span>
                            </div>
                            <div class="service-box bviolet">
                                Difficulté <span class="pull-right">
                                <?php if (isset($difficulty)) { echo $difficulty;} else { echo "No Data";}; ?>
                            </span>
                            </div>
                            <div class="service-box bblue">
                                Max participants <span class="pull-right">
                                <?php if (isset($maxParticipants)) { echo $maxParticipants;} else { echo "No Data";}; ?>
                            </span>
                            </div>
                            <div class="service-box bblue">
                                Categorie <span class="pull-right">
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
                            <a href="#"><h3>Responsable sortie</h3></a>
                            <ul class="list-unstyled">
                                <li>
                                    Name: <?php if (isset($owner)) {echo $owner->getFirstname();} else {echo "No Data";}; ?>
                                    <?php if (isset($owner)) {echo $owner->getLastname();} else {echo "No Data";}; ?>
                                </li>
                                <li>Email: <a href="mailto:<?php if (isset($owner)) {echo $owner->getMail();} else {echo "No Data";}; ?>"><?php if (isset($owner)) {echo $owner->getMail();} else {echo "No Data";}; ?></a></li>
                                <li>Tél:<?php if (isset($owner)) {echo $owner->getPhone();} else {echo "No Data";}; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 no-col-margin">

                </div>
            </div>
        </div>
        </div>
    </div>


    <script>

        var map = null;
        var geocoder = null;
        var trailShape = null;
        var elevator = null;
        var PlanCoordinates = null;

        function initMap() {
            var mapCanvas = document.getElementById('map');
            geocoder = new google.maps.Geocoder();
            elevator = new google.maps.ElevationService();
            google.charts.load('current', {'packages': ['corechart'], 'callback': drawCharts});
            PlanCoordinates = <?php echo $path; ?>;

            var mapOptions = {
                center: PlanCoordinates[1],
                zoom: 14,
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


            var chart = new google.visualization.LineChart(chartCanvas);
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Sample');
            data.addColumn('number', 'Altitude');

            for (var i = 0; i < elevations.length; i++) {
                data.addRow(['', elevations[i].elevation]);
            }

            chart.draw(data, {
                height: 150,
                legend: 'none',
                titleY: 'Altitude (m)',
                series: {
                    0: {color: '#1171A3'},
                },
                backgroundColor: '#E4E4E4'
                });

        }

    </script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js" async defer></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfHSiXZQseH8j-pPHb9PiWwvGvpOUSDGw&callback=initMap"
            async defer></script>


<?php


include_once 'views/footer.inc';