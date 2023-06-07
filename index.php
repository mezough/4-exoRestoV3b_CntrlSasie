<?php

namespace projet1;

require_once 'C:/wamp64/www/Data_Base/Correction_Resto/0-exoRestoV3b_CntrlSasie/4-exoRestoV3b_CntrlSasie/vendor/autoload.php';


require_once './src/config.php';

use projet1\webapp\CtrlRestau;



$uri = $_SERVER['REQUEST_URI'];
$chaines = explode("?", $uri);
$route = $chaines[0];

// echo $route;

$method = strtolower($_SERVER['REQUEST_METHOD']);
$ctrl = new CtrlRestau();

if ($method == 'get' && $route == '/')                                      $ctrl->getIndex();
elseif ($method == 'get' && $route == '')                                   $ctrl->getIndex();
elseif ($method == 'get' && $route == '/ajouter-un-plat')                   $ctrl->createPlat();
elseif ($method == 'post' && $route == '/ajouter-un-plat')                  $ctrl->createPlat();
elseif ($method == 'get' && $route == '/infos-plat')                        $ctrl->getInfos();
elseif ($method == 'get' && $route == '/clear-session')                     $ctrl->clearSession();
else                                                                        $ctrl->getIndex();
