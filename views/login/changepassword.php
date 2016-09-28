<?php
$msg = $this->vars['msg'];
$pageTitle = $this->vars['pageTitle'];
$pageMessage = $this->vars['pageMessage'];
include_once ROOT_DIR.'views/header.inc';
?>

    <br><br>
    <form action="<?php echo URL_DIR.'login/changePassword';?>" method="post">
        <table align="center">
            <tr>
                <td>
                    <?php echo $msg;?>
                    <h1>Changement de mot de passe :</h1>
                    Nouveau mot de passe:<br><input type="password" name="newPassword" size="25"/><br><br>
                    Nouveau mot de passe:<br><input type="password" name="newPasswordConfirmation" size="25"/><br><br>
                    <input class="btn btn-primary" type="submit" name="Submit" value="  Change  "/>

                    <br/><br/>
                </td>
            </tr>
        </table>
    </form>







<?php

include_once ROOT_DIR.'views/footer.inc';

?>