<?php 

/*=========================================
=            INDEX.PHP BACKEND            =
=========================================*/
//MODELOS
require_once("models/conexionBModel.php");

require_once("models/enlacesBModel.php");
require_once("models/ingresoBModel.php");

//CONTROLADORES
require_once("controllers/templateBController.php");
require_once("controllers/enlacesBController.php");
require_once("controllers/ingresoBController.php");

session_start();

$templateController = new TemplateController();
$templateController->template();


/*=====  End of INDEX.PHP BACKEND  ======*/
