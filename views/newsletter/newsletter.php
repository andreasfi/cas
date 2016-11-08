<?php
include_once ROOT_DIR.'views/header.inc';
?>

<div class="cwell">
    <!-- Contact form -->
    <h3 class="title"><?php echo $lang['NEWSLETTER']; ?></h3>
    <div class="form">

        <div class="alert alert-danger" style="display: <?php echo $this->vars['display_error']['general'] ?> ">
            <strong><?php echo $lang['NEWSLETTER_ERR'] ?> </strong> <?php echo $lang['NEWSLETTER_ERR_INVALID']; ?>
        </div>

        <form class="form-horizontal" method="post" action="<?php echo URL_DIR.'newsletter/sendnewsletter' ?>">
            <!-- Name -->
            <div class="form-group">
                <label class="control-label col-md-2" for="name"><?php echo $lang['NEWSLETTER_SUBJECT'] ?></label>
                <div class="col-md-9">
                    <small style="color: red; display: <?php echo $this->vars['display_error']['subject'] ?> "><?php echo $lang['NEWSLETTER_ERR_SUBJECT_MAXCHAR'] ?></small>
                    <input type="text" class="form-control" maxlength="120" required name="subject" id="subject" value="<?php echo $this->vars['subject']; ?>">
                </div>
            </div>
            <!-- Message -->
            <div class="form-group">
                <label class="control-label col-md-2" for="message"><?php echo $lang['NEWSLETTER_MSG'] ?></label>
                <div class="col-md-9">
                    <small style="color: red; display: <?php echo $this->vars['display_error']['message'] ?> "><?php echo $lang['NEWSLETTER_ERR_MSG_MAXCHAR'] ?></small>
                    <textarea class="form-control" required minlength="10" maxlength="3000" id="message" name="message" rows="6"><?php echo $this->vars['message']; ?></textarea>
                </div>
            </div>
            <!-- Buttons -->
            <div class="form-group">
                <!-- Buttons -->
                <div class="col-md-10 col-md-offset-2">
                    <button type="submit" class="btn btn-info"><?php echo $lang['NEWSLETTER_SENDBUTTON'] ?> <i class="fa fa-envelope" aria-hidden="true"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>


<?php
include_once ROOT_DIR.'views/footer.inc';
?>