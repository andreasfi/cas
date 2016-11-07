<?php

//Collect data from controller
$msg = $this->vars['msg'];
$pageTitle = $this->vars['pageTitle'];
$pageMessage = $this->vars['pageMessage'];
$persistence = $this->vars['persistence'];
include_once ROOT_DIR . 'views/header.inc';

?>
    <section class="row">
        <div class="cwell col-md-offset-3 col-md-6">
            <div class="form">
                <form method="post" action="<?php echo URL_DIR . '/login/register'; ?>"
                      class="col-md-12 form-horizontal">
                    <h3 class="title">Formulaire d'inscription</h3>
                    <div class="form-group">
                        <label class="control-label col-md-3" for=""><?php echo $lang['FIRSTNAME']; ?></label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="firstname" placeholder="Patrick" min="2"
                                   max="100"
                                   value="<?php echo $persistence[0]; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3" for=""><?php echo $lang['LASTNAME']; ?></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="lastname" placeholder="Muster" min="2"
                                   max="100"
                                   value="<?php echo $persistence[1]; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3" for=""><?php echo $lang['EMAIL']; ?></label>
                        <div class="col-md-9">
                            <input type="email" class="form-control" name="mail" min="5"
                                   placeholder="jean.dujardin@exemple.fr"
                                   value="<?php echo $persistence[2]; ?>"></div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3" for=""><?php echo $lang['PHONE']; ?></label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="phone" placeholder="079XXXXXXX"
                                   value="<?php echo $persistence[3]; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3"
                               for=""><?php echo $lang['MEMBER_NUMBER_IF_EXISTS']; ?></label>
                        <div class="col-md-9">
                            <input type="number" class="form-control" placeholder="234" name="memberNumber"
                                   value="<?php echo $persistence[4]; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3" for=""><?php echo $lang['PASSWORD']; ?></label>
                        <div class="col-md-9">
                            <input class="form-control" type="password" name="password"
                                   value="<?php echo $persistence[5]; ?>">
                        </div>
                    </div>

                    <div class="col-md-9 col-md-offset-3">
                        <input type="submit" class="btn btn-info" name="action" value="Register">
                        <a href="<?php echo URL_DIR . 'login/login'; ?>"><?php echo $lang['LOGIN']; ?></a>
                    </div>
                </form>
            </div>
        </div>
    </section>
<?php
unset($_SESSION['msg']);
include_once ROOT_DIR . 'views/footer.inc'; ?>