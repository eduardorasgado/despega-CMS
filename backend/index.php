<?php 

/*=========================================
=            INDEX.PHP BACKEND            =
=========================================*/
//CONEXION DB
require_once("models/conexionBModel.php");

//MODELOS
require_once("models/enlacesBModel.php");
require_once("models/ingresoBModel.php");
require_once("models/gestorSlideBModel.php");
require_once("models/gestorArticlesBModel.php");

//CONTROLADORES
require_once("controllers/templateBController.php");
require_once("controllers/enlacesBController.php");
require_once("controllers/ingresoBController.php");
require_once("controllers/gestorSlideBController.php");
require_once("controllers/gestorArticlesBController.php");

date_default_timezone_set('America/Monterrey');

session_start();

$templateController = new TemplateController();
$templateController->template();


/*=====  End of INDEX.PHP BACKEND  ======*/
