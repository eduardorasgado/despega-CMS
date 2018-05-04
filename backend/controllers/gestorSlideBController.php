<?php 

class slideControllers
{
	public function mostrarImagenController($datos)
	{
		//capturamos ancho y algo con la propiedad getimagesize
		$sizing = getimagesize($datos["imagenTemporal"]);

		var_dump($sizing);
	}
}