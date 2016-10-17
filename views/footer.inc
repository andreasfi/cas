
<footer>
	<div class="container">
		<div class="row">


			<div class="widgets">

				<div class="col-md-3">
					<div class="fwidget">

						<h4>Contact</h4>

						<p>CAS MONTANA</p>
						<hr />
						<i class="fa fa-home"></i> &nbsp; Crans-Montana
						<hr />
						<i class="fa fa-phone"></i> &nbsp; +41 27 000 00 00
						<hr />
						<i class="fa fa-envelope-o"></i> &nbsp; <a href="mailto:#">cas@casmontana.ch</a>
						<hr />
						<div class="social">
							<a href="#" class="bblue"><i class="fa fa-facebook"></i></a>
							<a href="#" class="borange"><i class="fa fa-google-plus"></i></a>
							<a href="#" class="blightblue"><i class="fa fa-twitter"></i></a>
							<a href="#" class="bviolet"><i class="fa fa-linkedin"></i></a>
							<a href="#" class="bred"><i class="fa fa-pinterest"></i></a>
							<a href="#" class="borange"><i class="fa fa-rss"></i></a>
						</div>

					</div>
				</div>

				<div class="col-md-3">
					<div class="fwidget">
						<h4>Pages</h4>
						<ul>
							<li><a href="<?php echo URL_DIR;?>/home">Home</a></li>
							<li><a href="<?php echo URL_DIR;?>/login">Login</a></li>
							<li><a href="<?php echo URL_DIR;?>/proximite">A proximité</a></li>
							<li><a href="<?php echo URL_DIR;?>/sorties">Sorties - Calendrier</a></li>
							<li><a href="<?php echo URL_DIR;?>/contact">Contact</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-3">
					<div class="fwidget">

						<h4>Newsletter</h4>
						<p>Inscrivez vous à notre newsletter.</p>
						<p></p>

						<form class="form-inline" role="form">
							<div class="input-group">
								<input type="text" class="form-control" id="subscribe" placeholder="Subscribe...">
								<span class="input-group-btn">
					<button type="submit" class="btn btn-danger">Subscribe</button>
				</span>
							</div>
						</form>

					</div>
				</div>

				<div class="col-md-3">
					<div class="fwidget">
						<h4>Devenez membre</h4>
						<p>
							Pour adhérer à notre section, veuillez remplir le formulaire d'adhésion en suivant le lien suivant:
							<a href="<?php echo URL_DIR;?>/login">Cliquez ici</a>
						</p>
					</div>
				</div>

			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="copy">
					<p>Copyright &copy; <a href="#">CASMONTANA</a></p>
				</div>
			</div>

		</div>
		<div class="clearfix"></div>
	</div>
</footer>
<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>
<script src="<?php echo URL_DIR;?>/js/custom.js"></script>

<!-- This page JS -->

</body>
</html>
<?php

$_SESSION['msg']="";