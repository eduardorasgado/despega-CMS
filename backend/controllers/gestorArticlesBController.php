<?php 

class gestorArticlesController
{
	//Mostrar imagenes en el article image section
	public function uploadImageController($datos)
	{
		//arreglo de propiedades
		list($ancho, $alto) = getimagesize($datos["imagenTemporal"]);

		if ($ancho < 800 || $alto < 400)
		{
			return false;
		}
		else
		{
			//obtener la extension del archivo
			$nameSplitted = explode(".",$datos["imagenTemporal"]);

			$extension = end($nameSplitted);

			//queda almacenado la extension de la imagen
			$noLastElement = array_pop($nameSplitted);

			//unir el array en string, del nombre pero ya 
			//sin la externsion(que fue quitada por el pop)
			$noExtension = implode("-", $nameSplitted);

			//quitar espacios
			$noSpaces = str_replace(" ", "_", $noExtension);

			//elegir un numero aleatorio
			$aleatorio = mt_rand(100,999);
			return $extension;
			//crear nombre complejo ṕara subirlo al server
			$ruta = "../../views/images/articulos/temp/article_".$noSpaces."_".$aleatorio;

			if ($extension == "png")
			{
				$ruta = $ruta.".png";

				$origen = imagecreatefrompng($datos["imagenTemporal"]);

				//cortar la imagen a 800 x 400
				$cropped = self::cropImage($origen);

				imagepng($cropped, $ruta);

				return $ruta;

			}//extension png
			
			else if ($extension == "jpeg" || $extension == "jpg" || $extension == "JPG")
			{
				$ruta = $ruta."jpg";
				
				$origen = imagecreatefromjpeg($datos["imagenTemporal"]);

				//cortar la imagen a 800 x 400
				$cropped = self::cropImage($origen);

				//guardar los archivos en la carpeta del servidor
				imagejpeg($cropped, $ruta);

				return $ruta;

			}//extension jpg
			else
			{
				return false;
			}
		}
	}

	#UTILIDADES DE ARTICLES-----------------------------
	private function cropImage($origen)
	{
		$destiny = imagecrop($origen, [
									"x" => 0,
									"y" => 0,
									"width" => 800,
									"height" => 400,
								]);
		return $destiny;
	}
}