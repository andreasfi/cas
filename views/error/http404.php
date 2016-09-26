<?php include_once  'views/header.inc'; ?>
<hr>
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-md-12 text-center">
                    <h2><strong><?php echo $this->vars['title']?></strong><span class="lightblue"></span></h2>
                    <h3><?php echo 'Page '.$this->vars['controller'].'/'. $this->vars['method']. ' '. 'not found';  ?></h3>
                    <hr />
            </div>
        </div>
    </div>

<?php

include_once 'views/footer.inc';
