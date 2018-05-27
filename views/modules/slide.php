<div class="row">

	<div id="slide" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

			<ul>
		       <?php 

				$slideObjects = new slideControllers();
				$slides = $slideObjects->showSlidesInViewController();

			 ?>
			 <?php if(!empty($slides)): ?>
				 <?php foreach($slides as $key => $value): ?>
				 
		       		<li>
		           	<img src="<?php echo "backend/".substr($value["ruta"], 6); ?>">
		           	<div class="slideCaption">
		           		<h3><?php echo $value["titulo"]; ?></h3>
				   		<p><?php echo $value["descripcion"]; ?></p>
		           	</div>
		           </li>

	       		<?php endforeach ?>
       		<?php endif ?>

			</ul>

		    <ol id="indicadores">

		    <?php $counterRole = 1; ?>
			 <?php if(!empty($slides)): ?>
				 <?php foreach($slides as $key => $value): ?>
				 	<li role-slide = "<?php echo $counterRole; ?>"<span class="fa fa-circle"></span></li>
				 	<?php $counterRole++; ?>
	       		<?php endforeach ?>
       		<?php endif ?>			
				
			</ol>

			<div id="slideIzq"><span class="fa fa-chevron-left"></span></div>
			<div id="slideDer"><span class="fa fa-chevron-right"></span></div>

	</div>

</div>