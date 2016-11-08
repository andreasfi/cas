<?php
$msg = $this->vars['msg'];
$pageTitle = $this->vars['pageTitle'];
$pageMessage = $this->vars['pageMessage'];
include_once ROOT_DIR.'views/header.inc';
$requestUri = explode('/', $_SERVER['REQUEST_URI']);
?>

    <br><br>
    <form action="<?php echo URL_DIR.'/login/changePassword/'.$requestUri[4];?>" method="post">
        <table align="center">
            <tr>
                <td>
                    <h1><?php echo $lang['PASSWORD_CHANGE']; ?> :</h1>
                    <?php echo $lang['NEW_PASSWORD']; ?> :<br><input type="password" name="newPassword" size="25"/><br><br>
                    <?php echo $lang['NEW_PASSWORD']; ?> :<br><input type="password" name="newPasswordConfirmation" size="25"/><br><br>
                    <input class="btn btn-primary" type="submit" name="Submit" value="<?php echo $lang['CHANGE']; ?>"/>

                    <br/><br/>
                </td>
            </tr>
        </table>
    </form>







<?php

include_once ROOT_DIR.'views/footer.inc';

?>