<?php
$pageTitle = $this->vars['pageTitle'];
$pageMessage = $this->vars['pageMessage'];
$eventId = $this->vars['eventId'];
include_once ROOT_DIR.'views/header.inc';

?>


    <script>
        function addBox()
        {
            //window.location.replace("sorties/inscription/"+$("#participantsNumber").val());
            var numberP = document.getElementById("participantsNumber").value;

            if(numberP > 6)
            {
                alert("Trop de participants, veuillez inscrire au maximum 5");
                document.getElementById("participantsNumber").value = null;
                for(i = 1; i <= numberP; i++)
                {
                    document.getElementById('blockP'+i).style.display = "none";
                }
            }

            else
            {
                for(i = 1; i <= numberP; i++)
                {
                    document.getElementById('blockP'+i).style.display = "block";
                    document.getElementById('inscriptionBlock').style.display = "block";
                }
            }


        }
		
		function sendRequest(){
			$.post($(location).attr('origin') + '/cas/sorties/details.php',{
					participantsNumber : $('#participantsNumber').val(),
					eventId : <?php echo $eventId;?>
				}, 
				function(){
					//$(location).attr("href", '/cas/sorties/details/' + <?php echo $eventId; ?>);
				});
		}
		

    </script>

    <br><br>
    <div class="content">
        <div class="container">
            <h4>Nombre de participants (maximum 5)</h4>
            <input type="number" id="participantsNumber" name="participantsNumber" min ="0" max="5">
            <br>
            <br>
            <button type="submit" class="btn btn-info" onclick="addBox()">Valider</button>
        </div>

    </div>

<form action="<?php echo URL_DIR.'sorties/inscription';?>" method="post">
    <div class="content" style="display: none;" id="blockP1">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="cwell">
                        <!-- Inscription form -->
                        <h3 class="title" id="participant1">Participant 1</h3>
                        <div class="form">
                            <!-- Inscription form (not working)-->
                            <form class="form-horizontal" action="<?php echo URL_DIR.'sorties/inscription';?>" method="post">
                                <!-- Age -->
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="age">Âge</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="age" type="text">
                                    </div>
                                </div>
                                <!-- Abonnement Type -->
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="abonnementType">Type d'abonnement</label>
                                    <div class="col-md-9">
                                        <select>
                                            <option value="none">Aucun</option>
                                            <option value="ag">Abonnement général</option>
                                            <option value="demi">Demi-tarif</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content" style="display: none;" id="blockP2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="cwell">
                        <!-- Inscription form -->
                        <h3 class="title" id="participant2">Participant 2</h3>
                        <div class="form">
                            <!-- Inscription form (not working)-->
                            <form class="form-horizontal" action="<?php echo URL_DIR.'sorties/inscription';?>" method="post">
                                <!-- Age -->
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="age">Âge</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="age" type="text">
                                    </div>
                                </div>
                                <!-- Abonnement Type -->
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="abonnementType">Type d'abonnement</label>
                                    <div class="col-md-9">
                                        <select>
                                            <option value="none">Aucun</option>
                                            <option value="ag">Abonnement général</option>
                                            <option value="demi">Demi-tarif</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content" style="display: none;" id="blockP3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="cwell">
                        <!-- Inscription form -->
                        <h3 class="title" id="participant3">Participant 3</h3>
                        <div class="form">
                            <!-- Inscription form (not working)-->
                            <form class="form-horizontal" action="<?php echo URL_DIR.'sorties/inscription';?>" method="post">
                                <!-- Age -->
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="age">Âge</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="age" type="text">
                                    </div>
                                </div>
                                <!-- Abonnement Type -->
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="abonnementType">Type d'abonnement</label>
                                    <div class="col-md-9">
                                        <select>
                                            <option value="none">Aucun</option>
                                            <option value="ag">Abonnement général</option>
                                            <option value="demi">Demi-tarif</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content" style="display: none;" id="blockP4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="cwell">
                        <!-- Inscription form -->
                        <h3 class="title" id="participant4">Participant 4</h3>
                        <div class="form">
                            <!-- Inscription form (not working)-->
                            <form class="form-horizontal" action="<?php echo URL_DIR.'sorties/inscription';?>" method="post">
                                <!-- Age -->
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="age">Âge</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="age" type="text">
                                    </div>
                                </div>
                                <!-- Abonnement Type -->
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="abonnementType">Type d'abonnement</label>
                                    <div class="col-md-9">
                                        <select>
                                            <option value="none">Aucun</option>
                                            <option value="ag">Abonnement général</option>
                                            <option value="demi">Demi-tarif</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content" style="display: none;" id="blockP5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="cwell">
                        <!-- Inscription form -->
                        <h3 class="title" id="participant5">Participant 5</h3>
                        <div class="form">
                            <!-- Inscription form (not working)-->
                            <form class="form-horizontal" action="<?php echo URL_DIR.'sorties/inscription';?>" method="post">
                                <!-- Age -->
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="age">Âge</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="age" type="text">
                                    </div>
                                </div>
                                <!-- Abonnement Type -->
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="abonnementType">Type d'abonnement</label>
                                    <div class="col-md-9">
                                        <select>
                                            <option value="none">Aucun</option>
                                            <option value="ag">Abonnement général</option>
                                            <option value="demi">Demi-tarif</option>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content" id="inscriptionBlock" style="display: none;" method="post">
        <div class="container">
            <h3>Prix CHF 120</h3>
            <!-- Buttons -->
            <div class="form-group">
                <!-- Buttons -->
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-success" name="send" onclick="sendRequest()">Envoyer la demande de participation</button>
                </div>
            </div>
        </div>
    </div>

    </div>
</form>








<?php
unset($_SESSION['msg']);
include_once ROOT_DIR.'views/footer.inc';
?>