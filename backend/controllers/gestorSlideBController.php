<?php 

class slideControllers
{
	public function mostrarImagenController($datos)
	{
		//capturamos ancho y algo con la propiedad getimagesize
		list($ancho, $alto) = getimagesize($datos["imagenTemporal"]);
		
		if ($ancho < 1600 || $alto < 600) 
		{
			return false;
		}
		else
		{
			return true;
		}
	}
}