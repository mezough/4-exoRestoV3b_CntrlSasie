<?php
namespace projet1\webapp;



require_once 'C:/wamp64/www/Data_Base/Correction_Resto/0-exoRestoV3b_CntrlSasie/4-exoRestoV3b_CntrlSasie/vendor/autoload.php';
require_once '../config.php';

// use DmException;

use projet1\dao\DaoResto;
use projet1\metier\Categorie;
use projet1\metier\Plat;
use projet1\controler\DmException;
use projet1\controler\MyExceptionCase;



$dao = new DaoResto();
$message = "";
// inserer le plat dans la BDD
// !!! attention utiliser POST !!!!!!!
if (isset($_POST['id'])) {
    $id         = $_POST['id'];
    $libelle    = $_POST['libelle'];
    $prix       = $_POST['prix'];
    $idCat      = $_POST['idCat'];


    try {

        // controle de la saisie utilisateur
        // libelle doit etre renseigne
        if (strlen(trim($libelle)) < 3)  throw new DmException(MyExceptionCase::MIN_LONGUEUR_3);

        // prix doit etre superieur a 200
        if ($prix < 200) throw new DmException(MyExceptionCase::PRIX_MUST_BE_POSITIF);

        // creation des objets
        $categorie = new Categorie($idCat, "");
        $plat = new Plat($id, $libelle, $prix, $categorie);

        // appeler un service (methode / function) qui insere dans la BDD
        $dao = new DaoResto();
        $dao->insertPlat($plat);
        $message = "Plat added successfully!";
        // $dao->insertPlat($id,$libelle, $prix, $idCat);

    } catch (DmException $e) {
        $message = $e->getMessage();
    } catch (\Exception $e) {
        // pas d action
    }
}

// code pour recuperer la liuste des categories pour le select html
$dao = new DaoResto();
// liste des categories et des plats
$categories = $dao->getCategories();


require '../view/vplat.php';


