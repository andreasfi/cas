<?php


//Collect data from controller and session
$msg = $this->vars['msg'];
$user = $_SESSION['user'];
$events = $this->vars['user_events']; //Declared in the controller
$eventusers = $this->vars['eventUsers']; //Declared in the controller
$events_msg = $this->vars['user_events_msg'];
$pageTitle = $this->vars['pageTitle'];
$pageMessage = $this->vars['pageMessage'];
include_once ROOT_DIR . 'views/header.inc';
?>
<div class="content">
    <div class="container">
        <div class="row">
            <section id="sorties_container" class="row col-lg-12">
                <div class="col-lg-5">
                    <table align="center">
                        <tr>
                            <td>
                                <h1><?php echo $lang['WELCOME'], ' ' . $user->getFirstname() . ' ' . $user->getLastname(); ?></h1>
                                <h3><?php echo $lang['MY_PERSONNAL_DATA']; ?></h3>
                                <form action="<?php echo URL_DIR . '/login/welcome'; ?>" method="post">
                                    <?php echo $lang['FIRSTNAME']; ?> :<br><input type="text" name="firstname" size="25"
                                                                                  value="<?php echo $user->getFirstname(); ?>"/><br>
                                    <?php echo $lang['LASTNAME']; ?> :<br><input type="text" name="lastname" size="25"
                                                                                 value="<?php echo $user->getLastname(); ?>"/><br>
                                    <?php echo $lang['PHONE']; ?> :<br><input type="text" name="phone" size="25"
                                                                              value="<?php echo $user->getPhone(); ?>"/><br><br>
                                    <input class="btn btn-primary" type="submit" name="action" value="<?php echo $lang['CHANGE_DATA']; ?>"><br><br>
                                </form>
                                <a href="<?php echo URL_DIR . '/login/logout'; ?>"><?php echo $lang['LOGOUT']; ?></a><br>
                                <a href="<?php echo URL_DIR . '/login/changepassword'; ?>"><?php echo $lang['PASSWORD_CHANGE']; ?></a>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-lg-7">
                    <h1><?php echo $lang['WELCOME_H1_LISTEVENTS']; ?></h1>

                    <table class="table table-striped table-hover col-lg-5">
                        <tr>
                            <th><?php echo $lang['WELCOME_DATE_START'] ?></th>
                            <th><?php echo $lang['WELCOME_DATE_END'] ?></th>
                            <th><?php echo $lang['WELCOME_STATUS'] ?></th>
                            <th><?php echo $lang['WELCOME_TITLE'] ?></th>
                        </tr>
                        <?php

                        foreach($eventusers as $e) {

                            $user_id = $e->getUser()->getId();
                            $status = null;
                            $startDate = $e->getEvent()->getStartDate();
                            $endDate = $e->getEvent()->getEndDate();
                            $title = $e->getEvent()->getTitle();
                            $description = $e->getEvent()->getDescription();

                            if($_SESSION['user']->getId() == $e->getEvent()->getOwner())
                            {
                                $status = "<b style='color: darkblue;'>Trailmaster</b>";
                            }else
                            {
                                $status = $e->getStatus()->getStatusName();
                            }

                            /*
                            foreach ($events as $e) {
                                $status = $e->getStatus();
                                $startDate = $e->getStartDate();
                                $endDate = $e->getEndDate();
                                $title = $e->getTitle();
                                $description = $e->getDescription(); //For the tooltip

                                /*$startDate = $startDate->format('Y-m-d H:i:s');
                                $endDate = $endDate->format('Y-m-d H:i:s');
                                */
                            ?>

                            <tr onclick='redirectToEvent("<?php echo $e->getEvent()->getId() ?>")'><td><?php echo $startDate ?></td><td><?php echo $endDate ?></td><td><?php echo $status ?></td><td><?php echo $title ?></td></tr>

                            <?php
                        }


                        ?>

                    </table>
                </div>


                <?php if ($events_msg != 'rien') {
                    echo "<div id=\"message\" class=\"col-md-12\">
      
    </div>";
                } ?>


            </section>



        </div>
    </div>
</div>


<script type="text/javascript">

    function redirectToEvent(eventID)
    {
        window.location.href = "<?php echo URL_DIR . '/sorties/details/' ?>"+eventID;
    }

</script>



<?php
unset($_SESSION['msg']);
include_once ROOT_DIR . 'views/footer.inc';
?>

