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

			//elegir un numero aleatorio
			$aleatorio = mt_rand(100,9999);

			//crear nombre complejo ṕara subirlo al server
			$ruta = "../../views/images/articulos/temp/article_".$aleatorio;

			if ($datos["imagenType"] == "image/png")
			{
				$ruta = $ruta.".png";

				$origen = imagecreatefrompng($datos["imagenTemporal"]);

				//cortar la imagen a 800 x 400
				$cropped = self::cropImage($origen);

				imagepng($cropped, $ruta);

				return $ruta;

			}//extension png
			
			else if ($datos["imagenType"] == "image/jpeg")
			{
				$ruta = $ruta.".jpg";
				
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

	#Guardar articulo
	public function guardarArticuloController()
	{
		if (isset($_POST["tituloArticulo"])) {
			$imagen = $_FILES["imagen"]["tmp_name"];
			
			//con glob recorremos una carpeta
			$borrar = glob("views/images/articulos/temp/*");

			//borramos todos los archivos de la carpeta 
			//temp
			foreach ($borrar as $file) {
				unlink($file);
			}

			//elegir un numero aleatorio
			$aleatorio = mt_rand(100,9999);

			//crear nombre complejo ṕara subirlo al server
			$ruta = "../../views/images/articulos/article_".$aleatorio;
			return $_FILES["imagen"]["type"];
			if ($_FILES["imagen"]["type"] == "image/png")
			{
				$ruta = $ruta.".png";

				$origen = imagecreatefrompng($datos["imagenTemporal"]);

				//cortar la imagen a 800 x 400
				$cropped = self::cropImage($origen);

				imagepng($cropped, $ruta);

				return $ruta;

			}//extension png
			
			else if ($_FILES["imagen"]["type"] == "image/jpeg")
			{
				$ruta = $ruta.".jpg";
				
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