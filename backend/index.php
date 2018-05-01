<?php 

/*=========================================
=            INDEX.PHP BACKEND            =
=========================================*/
//MODELOS
require_once("models/enlacesBModel.php");


//CONTROLADORES
require_once("controllers/templateBController.php");
require_once("controllers/enlacesBController.php");

$templateController = new TemplateController();
$templateController->template();


/*=====  End of INDEX.PHP BACKEND  ======*/
