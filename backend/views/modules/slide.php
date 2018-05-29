
<?php 
/* INICIO DE SESSION VALIDADA*/
	
if (!isset($_SESSION["validar"])) {
	header("location:ingreso");
	exit();
}

include "views/modules/botonera.php";
include "views/modules/header.php";

 ?>


<div id="imgSlide" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
			
	<hr>

	<p><span class="fa fa-arrow-down"></span>  Arrastra aquí tu imagen (tamaño recomendado: 1600px * 600px y 2MB o menos).</p>
		
		<ul id="columnasSlide">
			<?php 

				$slideObjects = new slideControllers();
				$slides = $slideObjects->showSlidesInViewController();

			 ?>
			 <?php if(!empty($slides)): ?>
				 <?php foreach($slides as $key => $value): ?>

					<li id="<?php echo $value["id"]; ?>" class="bloqueSlide">
						<span class="fa fa-times eliminarSlide" ruta=<?php echo $value["ruta"]; ?>></span>
				       	<img src="<?php echo substr($value["ruta"], 6); ?>" class="handleImg"/>
		       		</li>
	       		<?php endforeach ?>
       		<?php endif ?>
			
		</ul>

		<button id="ordenarSlide" class="btn btn-warning pull-right" style="margin:10px 30px">Ordenar Slides</button>

		<button id="guardarSlide" class="btn btn-primary pull-right" style="display:none; margin:10px 30px">Guardar Orden Slides</button>

</div>

<!--===============================================-->

<div id="textoSlide" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">

<hr>
	
	<ul id="ordenarTextSlide">


		 <?php if(!empty($slides)): ?>
			 <?php foreach($slides as $key => $value): ?>
			 	<li id="item<?php echo $value["id"]; ?>">
					<span class="fa fa-pencil editarSlide" style="background:blue"></span>
					<img src="<?php echo substr($value["ruta"], 6); ?>" style="float:left; margin-bottom:10px" width="80%">
					<h1><?php if(isset($value["titulo"])){echo $value["titulo"];} ?></h1>
					<p><?php if(isset($value["descripcion"])){echo $value["descripcion"];} ?></p>
				</li>

			 <?php endforeach ?>
		<?php endif ?>

	</ul>
</div>

<div id="slide" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
	<div style="width: 100%;">
		<button class="btn btn-primary updateSlider" style="float: right; right:0px;">Actualizar slider</button>
	</div>
	<br/><br/>
	<br/>
	<ul id="slideCarousel">
		<?php if(!empty($slides)): ?>
			 <?php foreach($slides as $key => $value): ?>

			 	<li>
			       	<img src="<?php echo substr($value["ruta"], 6); ?>"> 	
			       	<div class="slideCaption">
			       		<h3><?php if(isset($value["titulo"])){echo $value["titulo"];} ?></h3>
				   		<p><?php if(isset($value["descripcion"])){echo $value["descripcion"];} ?></p>
			       	</div>
		       </li>

			 <?php endforeach ?>
		<?php endif ?>
	</ul>
</div>
