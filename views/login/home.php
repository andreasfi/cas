<?php include_once ROOT_DIR.'views/header.inc'; 
?>

<style>	
</style>

<div class="jumbotron text-center">
	<h1>Bienvenue!</h1>
	<p>Club Alpin Suisse, Crans-Montana</p>
</div>

<div class="row">
	<div id="carousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carousel" data-slide-to="0" class="active"></li>
			<li data-target="#carousel" data-slide-to="1"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<div class="item-active">
				<img src="./img/img1.jpg" alt="Cabane" class="img-responsive center-block">
			</div>
			<div class="item">
				<img src="./img/img2.jpg" alt="Alpinisme" class="img-responsive center-block">
			</div>
		</div>

		<!-- Left and Right controls -->
		<a class="left carousel-control" role="button" data-slide="prev">
			<span class="glyphicon gliphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" role="button" data-slide="next">
			<span class="glyphicon gliphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>


<script type="application/javascript">
	$(document).ready(function(){
		//enable carousel
		$("#carousel").carousel({interval: 1000});
		
		//enable indicators
		$(".item").click(function(){
			$("#carousel").carousel(1);
				console.log("click");
		});
		// enable Carousel Controls
		$(".left").click(function(){
    		$("#myCarousel").carousel("prev");
			console.log("click");
		});
		$(".right").click(function(){
    		$("#myCarousel").carousel("next");
		});
	});
	
</script>

<?php include_once ROOT_DIR.'views/footer.inc'; 
?>