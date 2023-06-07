<?php

namespace projet1\webapp;

require_once 'C:/wamp64/www/Data_Base/Correction_Resto/0-exoRestoV3b_CntrlSasie/4-exoRestoV3b_CntrlSasie/vendor/autoload.php';
require_once '../config.php';
// require_once '../view/incHeader.php';
// require_once '../view/incMenuBar.php';

use projet1\dao\DaoResto;
use projet1\metier\Categorie;
use projet1\metier\Plat;
use projet1\src\config;

use projet1\view\incMenuBar;


// liste des plats
$dao = new DaoResto();
$categories = $dao->getCategories();
// on veut [categorie1,[plat1,plat2 ... ]],[categorie2,[plat1,plat2 ... ]], ... ]
//          partie 1                     , partie 2
$liste = [];
foreach ($categories as $categorie) {
    $plats = $dao->getPlatsByCategorie($categorie);
    $partie = [$categorie, $plats];
    array_push($liste, $partie);
}
require '../view/vindex.php';

