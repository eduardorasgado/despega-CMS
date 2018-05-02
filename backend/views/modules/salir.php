<?php 
/* INICIO DE SESSION VALIDADA*/
	
if (!isset($_SESSION["validar"])) {
	header("location:ingreso");
	exit();
}
else
{
	/*DESTRUIR SESSION*/

	session_destroy();
	header("location:out");
}

 ?>