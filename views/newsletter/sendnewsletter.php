<?php
/**
 * Created by PhpStorm.
 * User: gueny_000
 * Date: 18/10/2016
 * Time: 11:11
 */
include_once ROOT_DIR.'views/header.inc';

$sending_errors = $this->vars['sending_errors'];
$success = $this->vars['sending_success'];
$msg_errors = $this->vars['msg_errors'];
$msg_success = $this->vars['msg_success'];

if(sizeof($sending_errors) > 1)
{
    $this->vars['msg_errors'] = $lang['NEWSLETTER_SENTERROR_PL'];
}elseif (sizeof($sending_errors) == 1)
{
    $this->vars['msg_errors'] = $lang['NEWSLETTER_SENTERROR_SING'];
}else
{
    $this->vars['msg_errors'] = $lang['NEWSLETTER_NO_ERROR'];
}

if($success == 0)
{
    $this->vars['msg_success'] = $lang['NEWSLETTER_SENT_NOSUBSCRIBERS'];
}elseif($success == 1)
{
    $this->vars['msg_success'] = $lang['NEWSLETTER_SENTSUCCESS_0'] . " " . $this->vars['sending_success']. " " . $lang['NEWSLETTER_SENTSUCCESS_1_SING'];
}else
{
    $this->vars['msg_success'] = $lang['NEWSLETTER_SENTSUCCESS_0'] . " " . $this->vars['sending_success']. " " . $lang['NEWSLETTER_SENTSUCCESS_1_PL'];
}

?>

    <section>
        <div class="foot bgreen">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <span class="text-center"><i style="color: darkgreen;" class="fa fa-check-circle fa-3x" aria-hidden="true"></i></span>
                        <p style="margin-top: 15px;"><?php echo $this->vars['msg_success'] ?></p>
                        <!-- Display errors -->
                        <p><?php echo $this->vars['msg_errors'] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php include_once ROOT_DIR.'views/footer.inc'; ?>