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

			//obtener la extension del nombre del archivo
			$nameSplitted = explode(".", $datos['nombreImagen']);
			$extension = end($nameSplitted);
			
			//quitar espacios
			$noSpaces = str_replace(" ", "_", $datos['nombreImagen']);

			//En caso que la imagen sea png
			if ($extension == "png") {
				$ruta = "views/images/slide/slide-".$noSpaces;
				$origen = imagecreatefrompng($datos["imagenTemporal"]);
				imagepng($origen, $ruta);
				return true;
			}

			//En caso que la imagen sea jpg
			else if ($extension == "jpeg" || $extension == "jpg" || $extension == "JPG") 
			{	
				$ruta = "views/images/slide/slide-".$noSpaces;
			
				//variable donde guardaremos la imagen
				$origen = imagecreatefromjpeg($datos["imagenTemporal"]);

				//guardar los archivos en la carpeta del servidor
				imagejpeg($origen,$ruta);
				return true;
			}
			else
			{
				//en caso de no tener ninguna extension de las anteriores
				return false;
			}
			
		}
	}
}