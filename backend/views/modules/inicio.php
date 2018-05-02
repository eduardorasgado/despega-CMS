
<?php 
/* INICIO DE SESSION VALIDADA*/
	
if (!isset($_SESSION["validar"])) {
	header("location:index.php?action=ingreso");
	exit();
}

include "views/modules/botonera.php";
include "views/modules/header.php";

 ?>


<div id="inicio" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
			 
	<div class="jumbotron">
	    <h1>Bienvenid@ <?php echo $_SESSION["user"] ?></h1>
	    <p>Este es tu panel de control en Despega CMS.</p>
	</div>

		<hr>
	
	<ul>

		<li class="botonesInicio">
		
			<a href="slide.html">
			<div style="background:#4CF53A">
			<span class="fa fa-toggle-right"></span>
			<p>Slide</p>
			</div>
			</a>

		</li>

		<li class="botonesInicio">
		
			<a href="articulos.html">
			<div style="background:#F640DA">
			<span class="fa fa-file-text-o"></span>
			<p>Artículos</p>
			</div>
			</a>

		</li>

		<li class="botonesInicio">
		
			<a href="galeria.html">
			<div style="background:#04E6DE">
			<span class="fa fa-image"></span>
			<p>Imágenes</p>
			</div>
			</a>

		</li>

		<li class="botonesInicio">
		
			<a href="videos.html">
			<div style="background:#1434AD"> 
			<span class="fa fa-film"></span>
			<p>Videos</p>
			</div>
			</a>

		</li>

		<li class="botonesInicio">
		
			<a href="suscriptores.html">
			<div style="background:#ED3E3E">
			<span class="fa fa-users"></span>
			<p>Suscriptores</p>
			</div>
			</a>

		</li>

	</ul>

</div>
