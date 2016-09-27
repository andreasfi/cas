<?php
include_once ROOT_DIR.'views/header.inc';

?>

<br><br>
<div class="content">
    <div class="container">
        <h2>Inscription</h2>
        <br>
        <h4>Nombre de participants</h4>
        <input type="number" id="participantsNumber" name="participantsNumber" >
        <br>
        <br>
    </div>

</div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="cwell">
                        <!-- Inscription form -->
                        <h3 class="title">Participant</h3>
                        <div class="form">
                            <!-- Inscription form (not working)-->
                            <form class="form-horizontal" action="<?php echo URL_DIR.'sorties/inscription';?>" method="post">
                                <!-- Name -->
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="name">Nom</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="name" type="text">
                                    </div>
                                </div>
                                <!-- Lastname -->
                                <div class="form-group">
                                    <label class="control-label col-md-3" for="lastname">Prénom</label>
                                    <div class="col-md-9">
                                        <input class="form-control" id="lastname" type="text">
                                    </div>
                                </div>
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
            <h3>Prix CHF 120</h3>
            <!-- Buttons -->
            <div class="form-group">
                <!-- Buttons -->
                <div class="col-md-9 col-md-offset-3">
                    <button type="submit" class="btn btn-info">Envoyer la demande de participation</button>
                    <button type="reset" class="btn btn-warning">Captcha</button>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
unset($_SESSION['msg']);
include_once ROOT_DIR.'views/footer.inc';
?>