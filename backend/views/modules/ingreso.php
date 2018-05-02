<?php 
/* INICIO DE SESSION VALIDADA*/
	
if (isset($_SESSION["validar"]))
{
	if ($_SESSION["valida"]) {
		header("location:index.php?action=inicio");
		exit();
	}
}

 ?>



<!--=====================================
FORMULARIO DE INGRESO           
======================================-->

<div id="backIngreso">

	<form method="post" id="formIngreso" onsubmit="return validarIngreso()">

		<h1 id="tituloFormIngreso">INGRESO AL PANEL DE CONTROL</h1>
		
		<input class="form-control formIngreso" id="usuarioIngreso" type="text" placeholder="Ingrese su Usuario" name="usuarioIngreso">
		<input class="form-control formIngreso" id="passwordIngreso" type="password" placeholder="Ingrese su Contraseña" name="passwordIngreso">
		<?php 

		$ingresoUser = new ingresoAdminControllers();
		$ingresoUser->ingresarController();	

		if (isset($_GET["action"])) {
			if ($_GET["action"] == "captcha") {
				echo "<div class='alert alert-danger'>Oops Necesitamos que demuestres que no eres un robot</div>";
			}
		}

		 ?>
		<input class="form-control formIngreso btn btn-primary" type="submit" value="Enviar">

	</form>
</div>

<!--==== end onf FORMULARIO INGRESO   =======-->
