<?php include_once ROOT_DIR.'views/header.inc';
?>

<style>
	.carousel{
		z-index: -99;
		opacity: 0.8;
	}
    .carousel-inner h2, .carousel-inner P{
        background-color: rgba(247, 247, 247, 0.74902);
        color: BLACK;
    }

	.carousel-inner h2{
        font-size:50px;
	}

	.carousel-inner img{
		min-width: 100%;
		margin-top: -10%;
	}

</style>

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner " role="listbox">
    <div class="item active">
      <img class="img-responsive center-block" src="<?php echo URL_DIR;?>/img/img1.jpg" alt="Cabane">
      <div class="carousel-caption">
          <h2 class="mytitle"><?php echo $lang['WELCOME_MESSAGE']; ?></h2>
          <p><?php echo $lang['WEBSITE_NAME'] ,' , ', $lang['CAS_HOMETOWN']; ?></p>
      </div>
    </div>
    <div class="item">
      <img class="img-responsive center-block" src="<?php echo URL_DIR;?>/img/img2.jpg" alt="Alpinisme">
      <div class="carousel-caption">
          <h2 class="mytitle"><?php echo $lang['WELCOME_MESSAGE']; ?></h2>
          <p><?php echo $lang['WEBSITE_NAME'] ,' , ', $lang['CAS_HOMETOWN']; ?></p>
      </div>
    </div>
    <div class="item">
      <img class="img-responsive center-block" src="<?php echo URL_DIR;?>/img/img3.jpg" alt="Peau de Phoque">
      <div class="carousel-caption">
          <h2 class="mytitle"><?php echo $lang['WELCOME_MESSAGE']; ?></h2>
          <p><?php echo $lang['WEBSITE_NAME'] ,' , ', $lang['CAS_HOMETOWN']; ?></p>
      </div>
    </div>
	  <div class="item">
      <img class="img-responsive center-block" src="<?php echo URL_DIR;?>/img/img4.jpg" alt="Peau de Phoque">
      <div class="carousel-caption">
          <h2 class="mytitle"><?php echo $lang['WELCOME_MESSAGE']; ?></h2>
          <p><?php echo $lang['WEBSITE_NAME'] ,' , ', $lang['CAS_HOMETOWN']; ?></p>
      </div>
    </div>
	  <div class="item">
      <img class="img-responsive center-block" src="<?php echo URL_DIR;?>/img/img5.jpg" alt="Raquettes">
      <div class="carousel-caption">
          <h2 class="mytitle"><?php echo $lang['WELCOME_MESSAGE']; ?></h2>
          <p><?php echo $lang['WEBSITE_NAME'] ,' , ', $lang['CAS_HOMETOWN']; ?></p>
      </div>
    </div>

  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    <div class="content">
        <div class="container features-two">
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="f-block bblue">
                        <i class="fa fa-blind"></i>
                        <h3>Notre club</h3>
                        <p>Bénéficiez de notre réseau de montagnards pour organisert et participer</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="f-block bblue">
                        <i class="fa fa-building"></i>
                        <h3>Outil de gestion</h3>
                        <p>Avec notre outil de gestion des sorties nous pouvons garantir </p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4">
                    <div class="f-block bblue">
                        <a href="#"><i class="fa fa-thumbs-up"></i></a>
                        <a href="#"><h3>Nos avantages membres</h3></a>
                        <p>Postulez en tant que memebre pour pouvoir bénéficier de tous nos avantages</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="foot blightblue">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <!-- User icon -->
                    <span class="twitter-icon text-center"><i class="fa fa-user"></i></span>
                    <p><em>"Le club alpin suisse de montana est vraiment bien"</em><br>Pierre Baran, Trailmaster CAS Montana</p>

                </div>
            </div>
        </div>
    </div>

<?php include_once ROOT_DIR.'views/footer.inc';
?>