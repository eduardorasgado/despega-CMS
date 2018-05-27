
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>FrontEnd</title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="views/images/icono.jpg">

	<link rel="stylesheet" href="views/css/bootstrap.min.css">
	<link rel="stylesheet" href="views/css/font-awesome.min.css">
	<link rel="stylesheet" href="views/css/style.css">
	<link rel="stylesheet" href="views/css/fonts.css">
	<link rel="stylesheet" href="views/css/cssFancybox/jquery.fancybox.css">

	<script src="views/js/jquery-2.2.0.min.js"></script>
	<script src="views/js/bootstrap.min.js"></script>
	<script src="views/js/jquery.fancybox.js"></script>
	<script src="views/js/animatescroll.js"></script>
	<script src="views/js/jquery.scrollUp.js"></script>

</head>

<body>

	<div class="container-fluid">

		<!--=====================================
		HEADER
		======================================-->
		<?php  
		include("modules/header.php");
		?>

		<!--====  Fin de HEADER  ====-->

		<!--=====================================
		SLIDE
		======================================-->
		<?php 
		include("modules/slide.php");
		 ?>

		<!--====  Fin de SLIDE  ====-->

		<!--=====================================
		TOP
		======================================-->

		<?php 
		include("modules/top.php");
		 ?>

		<!--====  Fin de TOP  ====-->

		<!--=====================================
		GALERIA
		======================================-->

		<?php 
		include("modules/gallery.php");
		 ?>

		<!--====  Fin de GALERIA  ====-->

		<!--=====================================
		ARTÍCULOS
		======================================-->

		<?php 
		include("modules/articles.php");
		 ?>

		<!--====  Fin de ARTÍCULOS  ====-->

		<!--=====================================
		VIDEOS
		======================================-->

		<?php 
		include("modules/videos.php");
		 ?>

		<!--====  Fin de VIDEOS  ====-->

		<!--=====================================
			CONTÁCTENOS         
		======================================-->

		<footer class="row" id="contactenos">

			<hr>
			
			<h1 class="text-center text-info"><b>CONTÁCTENOS</b></h1>

			<hr>
			
			<div class="container-fluid footer-1">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d122042.35062006253!2d-96.80577198801356!3d17.081286080152847!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c72249df26d9b1%3A0xac88a77657dffc3b!2sOaxaca%2C+Oax.!5e0!3m2!1ses!2smx!4v1527422157473" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

	            		<h4 class="blockquote-reverse text-primary">
	            			<ul>
				              <li><span class="glyphicon glyphicon-phone"></span>  987 123 1234</li>
				              <li><span class="glyphicon glyphicon-map-marker"></span>  Calle 45F 32 - 45</li>
				              <li><span class="glyphicon glyphicon-envelope"></span>  contacto@tuempresa.com</li>    
				          	</ul>      
	            		</h4>
	        
	       			</div>

				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="formulario" >

					<ol>
	            		<li>
	                		<a href="http://www.facebook.com" target="_blank">
	                  		<i class="fa fa-facebook" style="font-size:24px;"></i>  
	               		 	</a>
	           			</li>

	            		<li>
	                		<a href="http://www.youtube.com" target="_blank">  
	                  		<i class="fa fa-youtube" style="font-size:24px;"></i>  
	               			</a>
	            		</li>
	            
	            		<li>
	                		<a href="http://www.vimeo.com" target="_blank">
	                  		<i class="fa fa-vimeo" style="font-size:24px;"></i>  
	                		</a>
	            		</li>
	       			</ol>

	       			<form>
						    <input type="text" class="form-control"  placeholder="Nombre">
		
						    <input type="email" class="form-control" placeholder="Email">

						    <textarea name="" id="" cols="30" rows="10" placeholder="Contenido del Mensaje" class="form-control"></textarea>

						 
						  	<input type="button" class="btn btn-default" value="Enviar">
					</form>
									

				</div>
			</div>

			<div class="container-fluid footer-2">
				<div class="company-foot">
					<p>Tu empresa &copy; 2018 - 2019. Todos los derechos reservados</p>
				</div>
			</div>

		</footer>

		<!--====  Fin de CONTÁCTENOS ====-->

		<!--=====================================
			ARTÍCULO MODAL         
		======================================-->

			<?php 
			include("modules/articleModal.php");
			 ?>
    	<!--====  Fin de ARTICULO MODAL ====-->
		
	</div>




<script src="views/js/script.js"></script>

</body>
</html>


