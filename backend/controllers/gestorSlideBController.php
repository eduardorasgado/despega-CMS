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

			$nameSplitted = explode(".", $datos['nombreImagen']);
			$extension = end($nameSplitted);
			$noSpaces = str_replace(" ", "_", $datos['nombreImagen']);
			//En caso que la imagen sea png
			if ($extension == "png") {
				$ruta = "views/images/slide/slide-".$noSpaces;
				$origen = imagecreatefrompng($datos["imagenTemporal"]);
				return $ruta;
			}

			//En caso que la imagen sea jpg
			else
			{
				$ruta = "views/images/slide/slide-".$noSpaces;
			
				//variable donde guardaremos la imagen
				$origen = imagecreatefromjpeg($datos["imagenTemporal"]);
				return $ruta;
			}
		}
	}
}