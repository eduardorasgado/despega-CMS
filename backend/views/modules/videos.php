
<?php 
/* INICIO DE SESSION VALIDADA*/
	
if (!isset($_SESSION["validar"])) {
	header("location:index.php?action=ingreso");
	exit();
}

include "views/modules/botonera.php";
include "views/modules/header.php";

 ?>


<div id="videos" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">

<form method="post" action="validarVideo.php" enctype="multipart/form-data">

	 	<input type="file" name="video" class="btn btn-default">
	
	<input type="button" value="Subir Video" class="btn btn-info">

</form>

<ul id="galeriaVideo">
	<li>
		<span class="fa fa-times"></span>
		<video controls>
			<source src="views/videos/video01.mp4" type="video/mp4">
			</video>	
	</li>

	<li>
		<span class="fa fa-times"></span>
		<video controls>
			<source src="views/videos/video02.mp4" type="video/mp4">
			</video>	
	</li>

	<li>
		<span class="fa fa-times"></span>
		<video controls>
			<source src="views/videos/video03.mp4" type="video/mp4">
			</video>	
	</li>

	<li>
		<span class="fa fa-times"></span>
		<video controls>
			<source src="views/videos/video04.mp4" type="video/mp4">
			</video>	
	</li>

</ul>


	<button class="btn btn-warning " style="margin:10px 30px;">Ordenar Videos</button>

</div>